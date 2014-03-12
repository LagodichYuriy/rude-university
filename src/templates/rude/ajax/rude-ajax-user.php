<?

namespace rude;

class ajax_user
{
	public static function add()
	{
		$username = get(RUDE_FIELD_USERNAME);
		$password = get(RUDE_FIELD_PASSWORD);
		$role     = get(RUDE_FIELD_ROLE);

		$q = new query(RUDE_TABLE_ROLES);
		$q->where(RUDE_FIELD_ROLE, $role);
		$q->start();

		$role = $q->get_object();

		if ($role === null)
		{
			die();
		}

		$role_id = $role->id;

		$user_id = users::add($username, $password, $role_id);
	}

	public static function edit()
	{
		$id       = get(RUDE_FIELD_ID);
		$username = get(RUDE_FIELD_USERNAME);
		$password = get(RUDE_FIELD_PASSWORD);
		$role     = get(RUDE_FIELD_ROLE);


		$role_id = roles::get_id($role);


		$q = new uquery(RUDE_TABLE_USERS);

		if ($username) { $q->update(RUDE_FIELD_USERNAME,       $username); }
		if ($role_id)  { $q->update(RUDE_FIELD_ROLE_ID,  (int) $role_id);  }

		if ($password && $password != RUDE_TEXT_UTF8_DOTS)
		{
			$q->update(RUDE_FIELD_PASSWORD, $password);
		}

		$q->where(RUDE_FIELD_ID, (int) $id);
		$q->limit(1);
		$q->start();
	}


	public static function delete()
	{
		$username = get(RUDE_FIELD_USERNAME);

		users::delete($username);
	}

	public static function is_exists()
	{
		$username = get(RUDE_FIELD_USERNAME);
		$password = get(RUDE_FIELD_PASSWORD);


		if (users::is_exists($username, $password))
		{
			echo '1'; die;
		}

		echo '0'; die;
	}

	public static function html_form_add()
	{
		?>
		<html>
		<? require_once(RUDE_TEMPLATE_DIR . '/rude-header.php') ?>

		<body>
		<div id="stylized" class="myform">
			<form id="form" name="form" method="post" action="index.php?task=<?= RUDE_TASK_USER_ADD ?>">
				<h1>Добавление пользователя</h1>
				<p>Форма для добавления новых пользователей</p>


				<?= html::input(RUDE_FIELD_USERNAME, 'Логин'); ?>
				<?= html::input(RUDE_FIELD_PASSWORD, 'Пароль'); ?>
				<?= html::input(RUDE_FIELD_PASSWORD_REPEAT, 'Пароль (повторно)'); ?>

				<?
				$role_list = roles::get();
				$item_list = select::fields($role_list, RUDE_FIELD_ROLE);
				?>

				<?=	html::select(RUDE_FIELD_ROLE, $item_list, RUDE_TEXT_USER_ROLE); ?>

				<div id="error-box"></div>

				<?= html::button(RUDE_TEXT_ADD, 'validate(); return false;'); ?>
			</form>


			<script>
				function validate()
				{
					var username        = $('#<?= RUDE_FIELD_USERNAME ?>').val();
					var password        = $('#<?= RUDE_FIELD_PASSWORD ?>').val();
					var password_repeat = $('#<?= RUDE_FIELD_PASSWORD_REPEAT ?>').val();

					var role            = $('#<?= RUDE_FIELD_ROLE ?>').val();


					if (username && password && password_repeat && (password == password_repeat))
					{
						add_user(username, password, role);
					}


					var log = '<pre>';

					if (!username)
					{
						log += '> Введите имя пользователя' + '<br />';
					}

					if (!password)
					{
						log += '> Укажите пароль' + '<br />';
					}

					if (!password_repeat)
					{
						log += '> Укажите пароль повторно' + '<br />';
					}

					if (password != password_repeat)
					{
						log += '> Пароли дожны совпадать' + '<br />';
					}

					log += '</pre>';


					errors(log);
				}

				function errors(log)
				{
					rude_animation('#error-box', log);
				}

				function add_user(username, password, role)
				{
					$.ajax({
						type: 'POST',
						url: 'index.php',
						data: {
							task:     '<?= RUDE_TASK_AJAX ?>',
							target:   '<?= RUDE_TASK_AJAX_USER_ADD ?>',

							username: username,
							password: password,
							role:     role
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

	public static function html_form_edit()
	{
		?>
		<html>
		<? require_once(RUDE_TEMPLATE_DIR . '/rude-header.php') ?>

		<body>
		<div id="stylized" class="myform">
			<form id="form" name="form" method="post" action="index.php?task=<?= RUDE_TASK_USER_EDIT ?>">
				<h1>Изменение пользователя</h1>
				<p>Форма для изменения данных пользователя</p>

				<?
					$username = get(RUDE_FIELD_USERNAME);

					$user = users::get($username);
				?>

				<?= html::input(RUDE_FIELD_ID, false, $user->id, RUDE_HTML_INPUT_TYPE_HIDDEN); ?>

				<?= html::input(RUDE_FIELD_USERNAME, 'Логин', $user->username); ?>
				<?= html::input(RUDE_FIELD_PASSWORD, 'Пароль', RUDE_TEXT_UTF8_DOTS); ?>
				<?= html::input(RUDE_FIELD_PASSWORD_REPEAT, 'Пароль (повторно)', RUDE_TEXT_UTF8_DOTS); ?>

				<?
				$role_list = roles::get();
				$item_list = select::fields($role_list, RUDE_FIELD_ROLE);
				?>

				<?=	html::select(RUDE_FIELD_ROLE, $item_list, RUDE_TEXT_USER_ROLE, $user->role); ?>

				<div id="error-box"></div>

				<?= html::button(RUDE_TEXT_ADD, 'validate(); return false;'); ?>
			</form>


			<script>
				function validate()
				{
					var id              = $('#<?= RUDE_FIELD_ID ?>').val();
					var username        = $('#<?= RUDE_FIELD_USERNAME ?>').val();
					var password        = $('#<?= RUDE_FIELD_PASSWORD ?>').val();
					var password_repeat = $('#<?= RUDE_FIELD_PASSWORD_REPEAT ?>').val();
					var role            = $('#<?= RUDE_FIELD_ROLE ?>').val();


					if (username && password && password_repeat && (password == password_repeat))
					{
						edit_user(id, username, password, role);
					}


					var log = '<pre>';

					if (!username)
					{
						log += '> Введите имя пользователя' + '<br />';
					}

					if (!password)
					{
						log += '> Укажите пароль' + '<br />';
					}

					if (!password_repeat)
					{
						log += '> Укажите пароль повторно' + '<br />';
					}

					if (password != password_repeat)
					{
						log += '> Пароли дожны совпадать' + '<br />';
					}

					log += '</pre>';


					errors(log);
				}

				function errors(log)
				{
					rude_animation('#error-box', log);
				}

				function edit_user(id, username, password, role)
				{
					$.ajax({
						type: 'POST',
						url: 'index.php',
						data: {
							task:     '<?= RUDE_TASK_AJAX ?>',
							target:   '<?= RUDE_TASK_AJAX_USER_EDIT ?>',

							id      : id,
							username: username,
							password: password,
							role:     role
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
			<form id="form" name="form" method="post" action="index.php?task=<?= RUDE_TASK_USER_DELETE ?>">
				<h1>Удаление пользователя</h1>
				<p class="red">Внимание! Данная операция необратима!</p>

				<?
				$username = get(RUDE_FIELD_USERNAME);
				?>

				Вы точно уверены, что хотите удалить пользователя <b>"<?= $username ?></b>"?

				<div class="button-box">
					<button class="button" type="submit" onclick="delete_user('<?= $username ?>'); parent.$.fancybox.close();">Да</button>
					<button class="button-last" type="submit" onclick="parent.$.fancybox.close();">Нет</button>
				</div>
			</form>

			<script>
				function delete_user(username)
				{
					$.ajax({
						type: 'POST',
						url: 'index.php',
						data: {
							task:     '<?= RUDE_TASK_AJAX ?>',
							target:   '<?= RUDE_TASK_AJAX_USER_DELETE ?>',
							username: '<?= $username ?>'
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
				<th>Пользователь</th>
				<th>Привелегии</th>
				<th>Действия</th>
			</tr>

			<?
			$user_list = users::get();

			foreach ($user_list as $user)
			{
				?>
				<tr>
					<td><?= $user->id ?></td>
					<td><?= $user->username ?></td>
					<td><?= $user->role ?></td>
					<td>
						<a href="<?= url::ajax(RUDE_TASK_AJAX_USER_EDIT_FORM) . url::param(RUDE_FIELD_USERNAME, $user->username) ?>" class="fancybox"><img src="src/icons/edit.png" class="padding-small" title="<?= RUDE_TEXT_EDIT ?>" /></a>
						<a href="<?= url::ajax(RUDE_TASK_AJAX_USER_DELETE_FORM) . url::param(RUDE_FIELD_USERNAME, $user->username) ?>" class="fancybox-small"><img src="src/icons/remove.png" class="padding-small" title="<?= RUDE_TEXT_DELETE_SELECTED ?>" /></a>
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
				$(".fancybox").fancybox({
					type: 'iframe',

					width: 432 + 20,
					height: 335 + 20 + 40,
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
						target:   '<?= RUDE_TASK_AJAX_USER_SUMMARY ?>'
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