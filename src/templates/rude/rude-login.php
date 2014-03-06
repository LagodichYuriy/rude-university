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

				<button type="submit">Вход</button>
				<div class="spacer"></div>
			</form>
		</div>
	</div>
</div>
<? require_once 'rude-footer.php' ?>
</body>
</html>