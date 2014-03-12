<?

namespace rude;

class ajax_role
{
	public static function add()
	{
		$role = get(RUDE_FIELD_ROLE);
		$allow_user_management = get(RUDE_FIELD_ALLOW_USER_MANAGEMENT);
		$allow_role_management = get(RUDE_FIELD_ALLOW_ROLE_MANAGEMENT);

		if ($role === false)
		{
			return false;
		}


		$role_id = roles::add($role, $allow_user_management, $allow_role_management);

		return $role_id;
	}

	public static function delete()
	{
		$role_id = get(RUDE_FIELD_ROLE_ID);

		roles::delete($role_id);
	}

	public static function html_form_add()
	{
		?>
		<html>
		<? require_once(RUDE_TEMPLATE_DIR . '/rude-header.php') ?>

		<body>
		<div id="stylized" class="myform">
			<form id="form" name="form" method="post" action="index.php?task=<?= RUDE_TASK_ROLE_ADD ?>">
				<h1>Добавление роли</h1>
				<p>Форма для добавления новых ролей</p>


				<?= html::input(RUDE_FIELD_ROLE, 'Роль'); ?>

				<?= html::checkbox(RUDE_FIELD_ALLOW_USER_MANAGEMENT, 'Управление пользователями'); ?>
				<?= html::checkbox(RUDE_FIELD_ALLOW_ROLE_MANAGEMENT, 'Управление ролями'); ?>

				<div class="clear"></div>

				<div id="error-box"></div>

				<?= html::button(RUDE_TEXT_ADD, 'validate(); return false;'); ?>
			</form>


			<script>
				function validate()
				{
					var role = $('#' + '<?= RUDE_FIELD_ROLE ?>').val();
					var allow_user_management = 0;
					var allow_role_management = 0;

					if (role)
					{
						if ($('#' + '<?= RUDE_FIELD_ALLOW_USER_MANAGEMENT ?>').is(':checked')) { allow_user_management = 1; }
						if ($('#' + '<?= RUDE_FIELD_ALLOW_ROLE_MANAGEMENT ?>').is(':checked')) { allow_role_management = 1; }

						add_role(role, allow_user_management, allow_role_management);
					}


					var log = '<pre>';

					if (!role)
					{
						log += '> Введите название роли' + '<br />';
					}

					log += '</pre>';


					errors(log);
				}

				function errors(log)
				{
					rude_animation('#error-box', log);
				}

				function add_role(role, allow_user_management, allow_role_management)
				{
					$.ajax({
						type: 'POST',
						url: 'index.php',
						data: {
							task:     '<?= RUDE_TASK_AJAX ?>',
							target:   '<?= RUDE_TASK_AJAX_ROLE_ADD ?>',

							role:                  role,
							allow_user_management: allow_user_management,
							allow_role_management: allow_role_management
						},

						success: function(data)
						{
							parent.$.fancybox.close();
						}
					});
				}
			</script>
		</div>
		</body>

		</html>
	<?
	}

	public static function html_form_delete()
	{
		?>
		<html>
		<? require_once(RUDE_TEMPLATE_DIR . '/rude-header.php') ?>

		<body>
		<div id="stylized" class="myform">
			<form id="form" name="form" method="post" action="index.php?task=<?= RUDE_TASK_ROLE_DELETE ?>">
				<h1>Удаление роли</h1>
				<p class="red">Внимание! Данная операция необратима!</p>

				<?
				$role = get(RUDE_FIELD_ROLE);

				$role_id = roles::get_id($role);
				?>

				Вы точно уверены, что хотите удалить роль <b>"<?= $role ?>"</b>?

				<div class="button-box">
					<button class="button" type="submit" onclick="delete_role('<?= $role_id ?>'); parent.$.fancybox.close();">Да</button>
					<button class="button-last" type="submit" onclick="parent.$.fancybox.close();">Нет</button>
				</div>
			</form>

			<script>
				function delete_role(role_id)
				{
					$.ajax({
						type: 'POST',
						url: 'index.php',
						data: {
							task:     '<?= RUDE_TASK_AJAX ?>',
							target:   '<?= RUDE_TASK_AJAX_ROLE_DELETE ?>',
							role_id:  role_id
						},

						success: function(data)
						{
							parent.$.fancybox.close();
						}
					});
				}
			</script>
		</div>
		</body>

		</html>
	<?
	}

	public static function html()
	{
		?>
		<table class="full-width">
			<tr>
				<th>#</th>
				<th>Название</th>
				<th>Пользователей</th>
				<th>Управление пользователями</th>
				<th>Управление ролями</th>
				<th>Действия</th>
			</tr>

			<?
			$role_list = roles::count();

			foreach ($role_list as $role)
			{
				?>
				<tr>
					<td><?= $role->{RUDE_FIELD_ID} ?></td>
					<td><?= $role->{RUDE_FIELD_ROLE} ?></td>
					<td><?= $role->{RUDE_FIELD_COUNT} ?></td>
					<td>
						<?
							if ($role->{RUDE_FIELD_ALLOW_USER_MANAGEMENT})
							{
								echo RUDE_TEXT_YES;
							}
							else
							{
								echo RUDE_TEXT_NO;
							}
						?>
					</td>
					<td>
						<?
						if ($role->{RUDE_FIELD_ALLOW_ROLE_MANAGEMENT})
						{
							echo RUDE_TEXT_YES;
						}
						else
						{
							echo RUDE_TEXT_NO;
						}
						?>
					</td>

					<td>
<!--						<a href="--><?//= url::ajax(RUDE_TASK_AJAX_ROLE_EDIT_FORM) . url::param(RUDE_FIELD_ROLE, $role->role) ?><!--" class="fancybox-smallest"><img src="src/icons/edit.png" class="padding-small" title="--><?//= RUDE_TEXT_EDIT ?><!--" /></a>-->
						<a href="<?= url::ajax(RUDE_TASK_AJAX_ROLE_DELETE_FORM) . url::param(RUDE_FIELD_ROLE, $role->role) ?>" class="fancybox-small"><img src="src/icons/remove.png" class="padding-small" title="<?= RUDE_TEXT_DELETE_SELECTED ?>" /></a>
					</td>
				</tr>
			<?
			}
			?>
		</table>
	<?
	}

	public static function js()
	{
		?>
		<script>
			$(document).ready(function ()
			{
				$(".fancybox-smallest").fancybox({
					type: 'iframe',

					width: 432 + 20,
					height: 261 + 20,
					fitToView : false,
					autoSize : false,
					'beforeClose': function()
					{
						reload_info();
					}
				});
			});

			$(document).ready(function ()
			{
				$(".fancybox-small").fancybox({
					type: 'iframe',

					width: 432 + 20,
					height: 168 + 20 + 10,
					fitToView : false,
					autoSize : false,
					'beforeClose': function()
					{
						reload_info();
					}
				});
			});

			function reload_info()
			{
				$.ajax({
					type: 'POST',
					url: 'index.php',
					data: {
						task:     '<?= RUDE_TASK_AJAX ?>',
						target:   '<?= RUDE_TASK_AJAX_ROLE_SUMMARY ?>'
					},

					success: function(data)
					{
						rude_animation('#info', data);
					}
				});
			}
		</script>
	<?
	}
}