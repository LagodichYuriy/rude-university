<? namespace rude; ?>

<div id="navigation">
	<? require_once 'ajax/rude-ajax-user.php'; ?>
	<? require_once 'ajax/rude-ajax-role.php'; ?>

	<div class="ui sidebar active inverted vertical menu">
		<div class="item">
			<b><?= RUDE_TEXT_NAVIGATION_PANEL ?></b>
			<div class="menu">
				<a class="item" href="<?= RUDE_FILE_INDEX ?>"><?= RUDE_TEXT_INDEX_PAGE ?></a>
			</div>

			<? if (ajax_user::has_access() or ajax_role::has_access()) : ?>
			<b><?= RUDE_TEXT_USERS ?></b>
			<div class="menu">
					<a class="item" href="?task=<?= RUDE_TASK_MANAGEMENT_USERS ?>"><?= RUDE_TEXT_MANAGEMENT_USERS ?></a>
			</div>
			<? endif; ?>

			<b><?= RUDE_EDUCATIONAL_PROGRAM ?></b>
			<div class="menu">
				<a class="item" href="?task=<?= RUDE_TASK_MANAGEMENT_FACULTIES ?>"><?= RUDE_TEXT_MANAGEMENT_FACULTIES ?></a>
				<a class="item" href="?task=<?= RUDE_TASK_MANAGEMENT_EDUCATION ?>"><?= RUDE_TEXT_MANAGEMENT_EDUCATION ?></a>
			</div>

			<div class="menu">
				<a class="item" href="?task=<?= RUDE_TASK_LOGOUT ?>"><?= RUDE_TEXT_LOGOUT ?></a>
			</div>
		</div>
	</div>
</div>

