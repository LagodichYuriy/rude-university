<?
	namespace rude;


	switch (RUDE_TASK)
	{
		case RUDE_TASK_AJAX:
			$username = get(RUDE_FIELD_USERNAME);
			$password = get(RUDE_FIELD_PASSWORD);

			if (users::is_exists($username, $password))
			{
				session::init();

				die('1');
			}

			die('0');

			break;
	}
?>
<html>
<? require_once 'rude-header.php' ?>
<body>
	<div class="center">
		<p class="heavy"></p>
		<form id="form" name="form" method="post" class="ui form" action="index.php">
			<div class="field">
				<label>Логин</label>
				<div class="ui left labeled icon input">
					<input id="username" name="username" type="text" placeholder="Имя пользователя">
					<i class="user icon"></i>
					<div class="ui corner label">
						<i class="icon asterisk"></i>
					</div>
				</div>
			</div>
			<div class="field">
				<label>Пароль</label>
				<div class="ui left labeled icon input">
					<input id="password" name="password" type="password">
					<i class="lock icon"></i>
					<div class="ui corner label">
						<i class="icon asterisk"></i>
					</div>
				</div>
			</div>
			<div class="ui error message">
				<div class="header">We noticed some issues</div>
			</div>
			<div id="submit" class="ui blue submit button">Войти</div>
		</form>
	</div>

	<script>
		$('.ui.form').form({ username: {
			identifier: 'username',
				rules: [
				{
					type: 'empty',
					prompt: 'Пожалуйста, введите имя пользователя'
				}
			]
		},
		password: {
			identifier: 'password',
				rules: [
				{
					type: 'empty',
					prompt: 'Пожалуйста, укажите пароль'
				}
			]
		}, onSuccess: submit});


		function submit()
		{
			var username = $('#username').val();
			var password = $('#password').val();


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
//						case '1':
//							break;

						default:
							alert(code);
							break;

					}
				}
			});
		}
	</script>

<? require_once 'rude-footer.php' ?>
</body>
</html>