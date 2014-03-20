<? namespace rude; ?>

<div id="navigation">
	<? require_once 'ajax/rude-ajax-user.php'; ?>
	<? require_once 'ajax/rude-ajax-role.php'; ?>

	<div class="ui sidebar active inverted vertical menu">
		<div class="item">
			<b>Панель навигации</b>
			<div class="menu">
				<a class="item" href="<?= RUDE_FILE_INDEX ?>"><?= RUDE_TEXT_INDEX_PAGE ?></a>
			</div>

			<? if (ajax_user::has_access() or ajax_role::has_access()) : ?>
			<b>Пользователи</b>
			<div class="menu">
					<a class="item" href="?task=<?= RUDE_TASK_USER_MANAGEMENT ?>"><?= RUDE_TEXT_USER_MANAGEMENT ?></a>
			</div>
			<? endif; ?>

			<b>Учебная программа</b>
			<div class="menu">
				<a class="item" href="?task=<?= RUDE_TASK_EDUCATION_MANAGEMENT ?>"><?= RUDE_TEXT_EDUCATION_MANAGEMENT ?></a>
			</div>

			<div class="menu">
				<a class="item" href="?task=<?= RUDE_TASK_LOGOUT ?>"><?= RUDE_TEXT_LOGOUT ?></a>
			</div>
		</div>
	</div>
</div>

