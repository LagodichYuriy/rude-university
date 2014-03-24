<?

namespace rude;

class ajax_role
{
<<<<<<< HEAD
	public static function has_access()
	{
		$allow_role_management = get(RUDE_FIELD_ALLOW_ROLE_MANAGEMENT, $_SESSION);
		return $allow_role_management === '1';
	}

	public static function add()
	{
		if (!ajax_role::has_access())
		{
			die();
		}

=======
    public static function having_access()
    {
        $role_name = get(RUDE_FIELD_ROLE, $_SESSION);
        $role = roles::get_role_by_name($role_name);
        return $role->allow_role_management === '1';
    }

	public static function add()
	{
        if (!ajax_role::having_access())
        {
            die();
        }
>>>>>>> 8f1d8f6aadd003f3003e260dc0cacc9e92d327d6
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
<<<<<<< HEAD
		if (!ajax_role::has_access())
		{
			die();
		}

		$role_id = get(RUDE_FIELD_ROLE_ID);
=======
        if(!ajax_role::having_access())
        {
            die();
        }
        $role_id = get(RUDE_FIELD_ROLE_ID);
>>>>>>> 8f1d8f6aadd003f3003e260dc0cacc9e92d327d6

		$user_role_id = roles::get_id(get(RUDE_FIELD_ROLE, $_SESSION));

		if ($role_id === $user_role_id)
		{
			die();
		}

		roles::delete($role_id);
	}

	public static function html_form_add()
	{
<<<<<<< HEAD
		if (!ajax_role::has_access())
		{
			die();
		}

=======
        if(!ajax_role::having_access())
        {
            die();
        }
        $role = get(RUDE_FIELD_ROLE);

        if ($role === get(RUDE_FIELD_ROLE, $_SESSION))
		{
    		die();
    	}
>>>>>>> 8f1d8f6aadd003f3003e260dc0cacc9e92d327d6
		?>
		<html>
		<? require_once(RUDE_TEMPLATE_DIR . '/rude-header.php') ?>

		<body>
		<div id="stylized" class="myform">
			<form id="form" name="form" method="post" action="index.php?task=<?= RUDE_TASK_ROLE_ADD ?>">
				<h1>Добавление роли</h1>
				<p>Форма для добавления новых ролей</p>


				<?= html::input(RUDE_FIELD_ROLE, 'Роль'); ?>

				<div class="checkbox-item">
					<?= html::checkbox(RUDE_FIELD_ALLOW_USER_MANAGEMENT, 'Управление пользователями'); ?>
				</div>
				<div class="checkbox-item">
					<?= html::checkbox(RUDE_FIELD_ALLOW_ROLE_MANAGEMENT, 'Управление ролями'); ?>
				</div>

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
<<<<<<< HEAD
		if (!ajax_role::has_access())
		{
			die();
		}

		$role = get(RUDE_FIELD_ROLE);

		if ($role === get(RUDE_FIELD_ROLE, $_SESSION))
		{
			die();
		}

=======
        if(!ajax_role::having_access())
        {
            die();
        }
>>>>>>> 8f1d8f6aadd003f3003e260dc0cacc9e92d327d6
		?>
		<html>
		<? require_once(RUDE_TEMPLATE_DIR . '/rude-header.php') ?>

		<body>
		<div id="stylized" class="myform">
			<form id="form" name="form" method="post" action="index.php?task=<?= RUDE_TASK_ROLE_DELETE ?>">
				<h1>Удаление роли</h1>
				<p class="red">Внимание! Данная операция необратима!</p>

				<?
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
<<<<<<< HEAD
		?>
		<table class="ui collapsing table segment full-width">
			<thead class="small-font">
=======
        ?>
		<table class="full-width">
			<tr>
>>>>>>> 8f1d8f6aadd003f3003e260dc0cacc9e92d327d6
				<th>#</th>
				<th>Название</th>
				<th>Пользователей</th>
				<th>Управление пользователями</th>
				<th>Управление ролями</th>
				<th>Действия</th>
<<<<<<< HEAD
			</thead>
=======
                <?

                ?>
			</tr>
>>>>>>> 8f1d8f6aadd003f3003e260dc0cacc9e92d327d6

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
<<<<<<< HEAD
					<? if ($role->role !== get(RUDE_FIELD_ROLE, $_SESSION)) : ?>
						<a href="<?= url::ajax(RUDE_TASK_AJAX_ROLE_DELETE_FORM) . url::param(RUDE_FIELD_ROLE, $role->role) ?>" class="fancybox-roles-small"><img src="src/icons/remove.png" class="padding-small" title="<?= RUDE_TEXT_DELETE_SELECTED ?>" /></a>
					<? endif; ?>
=======
                <? if (ajax_role::having_access()) : ?>
<!--						<a href="--><?//= url::ajax(RUDE_TASK_AJAX_ROLE_EDIT_FORM) . url::param(RUDE_FIELD_ROLE, $role->role) ?><!--" class="fancybox-smallest"><img src="src/icons/edit.png" class="padding-small" title="--><?//= RUDE_TEXT_EDIT ?><!--" /></a>-->
						<a href="<?= url::ajax(RUDE_TASK_AJAX_ROLE_DELETE_FORM) . url::param(RUDE_FIELD_ROLE, $role->role) ?>" class="fancybox-roles-small"><img src="src/icons/remove.png" class="padding-small" title="<?= RUDE_TEXT_DELETE_SELECTED ?>" /></a>
                <? endif; ?>
>>>>>>> 8f1d8f6aadd003f3003e260dc0cacc9e92d327d6
					</td>
				</tr>
			<?
			}
			?>
		</table>
	<?
	}
}