<? namespace rude; ?>
<html>
	<? require_once(RUDE_TEMPLATE_DIR . '/rude-header.php') ?>

	<body>
			<div id="stylized" class="myform">
				<form id="form" name="form" method="post" action="index.php?task=<?= RUDE_TASK_USER_ADD ?>">
					<h1>Добавление пользователя</h1>
					<p>Форма для добавления новых пользователей</p>


					<?= html::input(RUDE_FIELD_USERNAME,        'Логин');             ?>
					<?= html::hidden('Проверьте правильность ввода');                 ?>

					<?= html::input(RUDE_FIELD_PASSWORD,        'Пароль');            ?>

					<div class="hidden">Проверьте правильность пароля</div>
					<div class="hidden">Введённые пароли должны совпадать</div>
					<?= html::input(RUDE_FIELD_PASSWORD_REPEAT, 'Пароль (повторно)'); ?>

					<?
						$role_list = roles::get();
						$item_list = select::fields($role_list, RUDE_FIELD_ROLE);
					?>

					<?=	html::select(RUDE_FIELD_ROLE, $item_list, ''); ?>

					<div id="error-box"></div>

					<?= html::button(RUDE_TEXT_ADD, 'validate(); return false;'); ?>
					<div class="spacer"></div>
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
						$('#error-box').fadeOut('slow', function() {
							$('#error-box').html(log);
						}).fadeIn('slow');
					}

					function add_user(username, password, role)
					{
						$.ajax({
							type: 'POST',
							url: 'index.php?task=<?= RUDE_TASK_USER_ADD ?>',
							data: {
								task:     '<?= RUDE_TASK_AJAX ?>',
								target:   '<?= RUDE_TASK_AJAX_ADD_USER ?>',

								username: username,
								password: password,
								role:     role
							},

							success: function(data)
							{
								alert(data);
							}
						});
					}
				</script>
			</div>
	</body>

</html>
