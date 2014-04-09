<?
	namespace rude;


	if (get(RUDE_TASK) == RUDE_TASK_AJAX_USER_IS_EXISTS)
	{
		ajax::is_auth_valid();
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
				<div class="header"></div>
			</div>
			<div id="submit" class="ui blue submit button">Войти</div>
		</form>
	</div>

	<script>
		$('.ui.form').form(
		{
			username:
			{
				identifier: 'username',

				rules:
				[{
					type: 'empty',
					prompt: 'Пожалуйста, введите имя пользователя'
				}]
			},

			password:
			{
				identifier: 'password',

				rules:
				[{
					type: 'empty',
					prompt: 'Пожалуйста, укажите пароль'
				}]
			}
		});

		$(".form").submit(function (event) {

			event.preventDefault();

			var username = $('#username').val();
			var password = $('#password').val();

			if (!username || !password)
			{
				return true; // allow default semantic-UI validation
			}

			$.ajax({
				type: "POST",

				data:
				{
					username: username,
					password: password
				},

				url: 'index.php?<?= RUDE_TASK ?>=<?= RUDE_TASK_AJAX_USER_IS_EXISTS ?>',

				success: function(code)
				{
					switch (code)
					{
						case '<?= RUDE_CODE_USER_IS_NOT_EXISTS ?>':
							rude_semantic_error('Указанного пользователя не существует');
							break;

						case '<?= RUDE_CODE_FAILED_TO_INIT_SESSION ?>':
							rude_semantic_error('Ошибка при попытке инициализации сессии');
							break;

						default:
							window.location.replace("<?= RUDE_FILE_INDEX ?>"); // in any other case try to reload page
							break;
					}
				}
			});

			return true;
		});
	</script>

<? require_once 'rude-footer.php' ?>
</body>
</html>