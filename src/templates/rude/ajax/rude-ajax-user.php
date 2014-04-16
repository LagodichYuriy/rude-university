<?

namespace rude;

class ajax_user
{
	public static function has_access()
	{
		$allow_user_management = get(RUDE_FIELD_ALLOW_USER_MANAGEMENT, $_SESSION);

		return $allow_user_management === '1';
	}

	public static function add()
	{
		if (!ajax_user::has_access())
		{
			die();
		}

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
		if (!ajax_user::has_access())
		{
			die();
		}

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
			list($hash, $salt) = crypt::struct_password($password);
			$q->update(RUDE_FIELD_HASH,     $hash);
			$q->update(RUDE_FIELD_SALT,     $salt);
		}

		$q->where(RUDE_FIELD_ID, (int) $id);
		$q->limit(1);
		$q->start();
	}

	public static function delete()
	{
		if (!ajax_user::has_access())
		{
			die();
		}

		$username = get(RUDE_FIELD_USERNAME);

		if ($username === get(RUDE_FIELD_USERNAME, $_SESSION))
		{
			die();
		}

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
		if (!ajax_user::has_access())
		{
			die();
		}

		?>
		<html>
		<? require_once(RUDE_TEMPLATE_DIR . '/rude-header.php') ?>

		<body class="ajax_bg">
		<div>
			<h1>Добавление пользователя</h1>
			<p>Форма для добавления новых пользователей</p>
			<form id="form" name="form" method="post" class="ui form" action="index.php?task=<?= RUDE_TASK_AJAX_USER_ADD_FORM ?>">

				<div class="field">
					<label>Логин</label>
					<div class="ui left labeled icon input">
						<input id="<?=RUDE_FIELD_USERNAME?>" name="<?=RUDE_FIELD_USERNAME?>" type="text" placeholder="Логин">
						<i class="user icon"></i>
						<div class="ui corner label">
							<i class="icon asterisk"></i>
						</div>
					</div>
				</div>

				<div class="field">
					<label>Пароль</label>
					<div class="ui left labeled icon input">
						<input id="<?=RUDE_FIELD_PASSWORD?>" name="<?=RUDE_FIELD_PASSWORD?>" type="text" placeholder="Пароль">
						<i class="user icon"></i>
						<div class="ui corner label">
							<i class="icon asterisk"></i>
						</div>
					</div>
				</div>

				<div class="field">
					<label>Пароль(повторно)</label>
					<div class="ui left labeled icon input">
						<input id="<?=RUDE_FIELD_PASSWORD_REPEAT?>" name="<?=RUDE_FIELD_PASSWORD_REPEAT?>" type="text" placeholder="Пароль(повторно)">
						<i class="user icon"></i>
						<div class="ui corner label">
							<i class="icon asterisk"></i>
						</div>
					</div>
				</div>



				<div class="field">
					<label>Роль</label>
					<div class="ui fluid selection dropdown">
						<div class="text">Select</div>
						<i class="dropdown icon"></i>
						<input type="hidden" id="<?=RUDE_FIELD_ROLE?>">
						<div class="menu">
							<?	$roles_list = roles::get();
							foreach ($roles_list as $role)
							{
								?>
								<div class="item" data-value="<?= $role->role  ?>"><?= $role->role  ?></div>
							<?
							}?>
						</div>
					</div>
				</div>



				<div id="submit" class="ui blue submit button">Добавить</div>
			</form>
		</div>
		<script>
			$('.ui.selection.dropdown')
				.dropdown()
			;
			$('.ui.form').form(
				{
					username:
					{
						identifier: 'username',

						rules:
							[{
								type: 'empty',
								prompt: 'Пожалуйста, введите наименование факультета'
							}]
					},
					password:
					{
						identifier: 'password',

						rules:
							[{
								type: 'empty',
								prompt: 'Пожалуйста, введите наименование факультета'
							}]
					},
					password_repeat:
					{
						identifier: 'password_repeat',

						rules:
							[{
								type: 'empty',
								prompt: 'Пожалуйста, введите наименование факультета'
							}]
					}


				});

			$(".form").submit(function (event) {

				event.preventDefault();

				var username        = $('#<?= RUDE_FIELD_USERNAME ?>').val();
				var password        = $('#<?= RUDE_FIELD_PASSWORD ?>').val();
				var password_repeat = $('#<?= RUDE_FIELD_PASSWORD_REPEAT ?>').val();

				var role            = $('#<?= RUDE_FIELD_ROLE ?>').val();

				if (!username || !password || !password_repeat || !(password == password_repeat))
				{
					return true; // allow default semantic-UI validation

				}

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

				return true;
			});
		</script>


		</body>

		</html>
	<?
	}

	public static function html_form_edit()
	{
		if (!ajax_user::has_access())
		{
			die();
		}

		?>
		<html>
		<? require_once(RUDE_TEMPLATE_DIR . '/rude-header.php');
		$username = get(RUDE_FIELD_USERNAME);

		$user = users::get($username);?>
		<body class="ajax_bg">
		<div>
			<h1>Изменение пользователя</h1>
			<p>Форма для изменения данных пользователя</p>
			<form id="form" name="form" method="post" class="ui form" action="index.php?task=<?= RUDE_TASK_AJAX_USER_EDIT_FORM ?>">

				<div class="field" hidden>
					<label>id</label>
					<div class="ui left labeled icon input">
						<input id="<?=RUDE_FIELD_ID?>" name="<?=RUDE_FIELD_ID?>" type="text" value="<?= $user->id?>" placeholder="">
						<i class="user icon"></i>
						<div class="ui corner label">
							<i class="icon asterisk"></i>
						</div>
					</div>
				</div>

				<div class="field">
					<label>Логин</label>
					<div class="ui left labeled icon input">
						<input id="<?=RUDE_FIELD_USERNAME?>" name="<?=RUDE_FIELD_USERNAME?>" type="text" value="<?= $user->username?>" placeholder="Наименование">
						<i class="user icon"></i>
						<div class="ui corner label">
							<i class="icon asterisk"></i>
						</div>
					</div>
				</div>

				<div class="field">
					<label>Пароль</label>
					<div class="ui left labeled icon input">
						<input id="<?=RUDE_FIELD_PASSWORD?>" name="<?=RUDE_FIELD_PASSWORD?>" type="text" value="<?=RUDE_TEXT_UTF8_DOTS?>" placeholder="Пароль">
						<i class="user icon"></i>
						<div class="ui corner label">
							<i class="icon asterisk"></i>
						</div>
					</div>
				</div>

				<div class="field">
					<label>Пароль(повторно)</label>
					<div class="ui left labeled icon input">
						<input id="<?=RUDE_FIELD_PASSWORD_REPEAT?>" name="<?=RUDE_FIELD_PASSWORD_REPEAT?>" type="text" value="<?=RUDE_TEXT_UTF8_DOTS?>" placeholder="Пароль">
						<i class="user icon"></i>
						<div class="ui corner label">
							<i class="icon asterisk"></i>
						</div>
					</div>
				</div>



				<div class="field">
					<label>Роль</label>
					<div class="ui fluid selection dropdown">
						<div class="text">Select</div>
						<i class="dropdown icon"></i>
						<input type="hidden" id="<?=RUDE_FIELD_ROLE?>" value="<?= $user->role ?>">
						<div class="menu">
							<?	$roles_list = roles::get();
							foreach ($roles_list as $role)
							{
								?>
								<div class="item" data-value="<?= $role->role  ?>"><?= $role->role  ?></div>
							<?
							}?>
						</div>
					</div>
				</div>



				<div id="submit" class="ui blue submit button">Изменить</div>
			</form>
		</div>
		<script>
			$('.ui.selection.dropdown')
				.dropdown()
			;
			$('.ui.form').form(
				{
					username:
					{
						identifier: 'username',

						rules:
							[{
								type: 'empty',
								prompt: 'Пожалуйста, введите наименование факультета'
							}]
					},
					password:
					{
						identifier: 'password',

						rules:
							[{
								type: 'empty',
								prompt: 'Пожалуйста, введите наименование факультета'
							}]
					},
					password_repeat:
					{
						identifier: 'password_repeat',

						rules:
							[{
								type: 'empty',
								prompt: 'Пожалуйста, введите наименование факультета'
							}]
					}


				});

			$(".form").submit(function (event) {

				event.preventDefault();

				var id              = $('#<?= RUDE_FIELD_ID ?>').val();
				var username        = $('#<?= RUDE_FIELD_USERNAME ?>').val();
				var password        = $('#<?= RUDE_FIELD_PASSWORD ?>').val();
				var password_repeat = $('#<?= RUDE_FIELD_PASSWORD_REPEAT ?>').val();
				var role            = $('#<?= RUDE_FIELD_ROLE ?>').val();

				if (!username || !password || !password_repeat || !(password == password_repeat))
				{
					return true; // allow default semantic-UI validation

				}

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

				return true;
			});
		</script>


		</body>

		</html>
	<?
	}

	public static function html_form_delete()
	{
		if (!ajax_user::has_access())
		{
			die();
		}

		$name = get(RUDE_FIELD_USERNAME);


		?>
		<html>
		<? require_once(RUDE_TEMPLATE_DIR . '/rude-header.php') ?>

		<body class="ajax_bg">
		<div>
			<h1>Удаление пользователя</h1>
			<p class="red">Внимание! Данная операция необратима!</p>
			<form id="form" name="form" method="post" class="ui form" action="index.php?task=<?= RUDE_TASK_USER_DELETE ?>">
				Вы точно уверены, что хотите удалить пользователя <b>"<?= $name ?></b>"?
				<div class="button-box">
					<button class="ui blue submit button"  type="submit" onclick="delete_user('<?= $name ?>'); parent.$.fancybox.close();">Да</button>
					<button style="float: right !important;" class="ui blue submit button"  type="submit" onclick="parent.$.fancybox.close();">Нет</button>
				</div>
			</form>
		</div>
		<script>
			function delete_user(name)
			{
				$.ajax({
					type: 'POST',
					url: 'index.php',
					data: {
						task:     '<?= RUDE_TASK_AJAX ?>',
						target:   '<?= RUDE_TASK_AJAX_USER_DELETE ?>',
						name: '<?= $name ?>'
					},

					success: function(data)
					{
						parent.$.fancybox.close();
					}
				});
			}
		</script>


		</body>

		</html>
	<?
	}

	public static function html()
	{
		?>
		<table class="ui loading form collapsing table segment full-width">
			<thead>
			<tr class="small-font">
				<th>#</th>
				<th>Пользователь</th>
				<th>Привелегии</th>
				<th>Действия</th>
			</tr>
			</thead>
			<tbody>
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
						<a href="<?= url::ajax(RUDE_TASK_AJAX_USER_EDIT_FORM) . url::param(RUDE_FIELD_USERNAME, $user->username) ?>" class="fancybox-users"><img src="src/icons/edit.png" class="small-padding" title="<?= RUDE_TEXT_EDIT ?>" /></a>
						<? if ($user->username !== get(RUDE_FIELD_USERNAME, $_SESSION)) : ?>
							<a href="<?= url::ajax(RUDE_TASK_AJAX_USER_DELETE_FORM) . url::param(RUDE_FIELD_USERNAME, $user->username) ?>" class="fancybox-users-small"><img src="src/icons/remove.png" class="small-padding" title="<?= RUDE_TEXT_DELETE_SELECTED ?>" /></a>
						<? endif; ?>
					</td>
				</tr>
			<?
			}
			?>
			</tbody>
		</table>
	<?
	}
}