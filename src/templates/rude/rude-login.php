<html>
<? require_once 'rude-header.php' ?>
<body>
<div id="container">
	<div class="middle center">
		<div id="stylized" class="myform">
			<form id="form" name="form" method="post" action="index.php">
				<h1>Авторизация</h1>
				<p>Форма для авторизации пользователей</p>

				<label for="username">Логин</label>
				<input type="text" name="username" id="username" />

				<label for="password">Пароль</label>
				<input type="password" name="password" id="password" />

				<div id="error-box"></div>

				<button type="submit" onclick="validate(); return false;">Вход</button>
				<div class="spacer"></div>
			</form>
		</div>

		<script>
			function is_exists(username, password)
			{
				$.ajax({
					type: 'POST',
					url: 'index.php',
					data: {
						task:     '<?= RUDE_TASK_AJAX ?>',
						target:   '<?= RUDE_TASK_AJAX_USER_IS_EXISTS ?>',

						username: username,
						password: password
					},

					success: function(code)
					{
						switch (code)
						{
							case '1':
								$('#form').submit();
								break;

							default:
								errors('<pre>Проверьте правильность ввода<br />указанных данных</pre>');
								break;

						}
					}
				});
			}

			function validate()
			{
				var username        = $('#username').val();
				var password        = $('#password').val();


				if (username && password)
				{
					is_exists(username, password);
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

				log += '</pre>';

				errors(log);


				return false;
			}

			function errors(log)
			{
				rude_animation('#error-box', log);
			}
		</script>
	</div>
</div>
<? require_once 'rude-footer.php' ?>
</body>
</html>