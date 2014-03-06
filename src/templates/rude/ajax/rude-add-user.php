<? namespace rude; ?>
<html>
	<head>
		<meta http-equiv="content-Type" content="text/html; charset=UTF-8"/>
		<link href="src/css/style.css" rel="stylesheet" type="text/css" />
	</head>

	<body>
			<div id="stylized" class="myform">
				<form id="form" name="form" method="post" action="index.php?task=<?= RUDE_TASK_USER_ADD ?>">
					<h1>Добавление пользователя</h1>
					<p>Форма для добавления новых пользователей</p>

					<?= html::input(RUDE_FIELD_USERNAME, 'Логин') ?>


					<label for="password_one">Пароль</label>
					<input type="password" name="password_one" id="password_one" />

					<label for="password_two">Пароль (повторно)</label>
					<input type="password" name="password_two" id="password_two" />

					<label for="roles">Роль</label>
					<? $role_list = roles::get(); ?>
					<select name="roles" id="roles">
						<?
							foreach ($role_list as $role)
							{
								?><option><?= $role->role ?></option><?
							}
						?>
					</select>

					<button type="submit">Добавить</button>
					<div class="spacer"></div>
				</form>
			</div>
	</body>

</html>
