<? namespace rude; ?>

<? require_once 'ajax/rude-ajax-user.php'; ?>
<? require_once 'ajax/rude-ajax-role.php'; ?>

<div class="toolbar">
	<div class="box">
		<a href="<?= RUDE_FILE_INDEX ?>" class="navigation-link"><?= RUDE_TEXT_INDEX_PAGE ?></a>

	<? if (ajax_user::has_access() || ajax_role::has_access()) : ?>
		<a href="?task=<?= RUDE_TASK_USER_MANAGEMENT ?>" class="navigation-link"><?= RUDE_TEXT_USER_MANAGEMENT ?></a>
	<? endif; ?>
		<a href="?task=<?= RUDE_TASK_EDUCATION_MANAGEMENT ?>" class="navigation-link"><?= RUDE_TEXT_EDUCATION_MANAGEMENT ?></a>

		<div class="clear"></div>

		<a href="?task=<?= RUDE_TASK_LOGOUT ?>" class="navigation-link"><?= RUDE_TEXT_LOGOUT ?></a>
	</div>
</div>