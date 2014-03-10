<? namespace rude; ?>

<? require_once 'ajax/rude-ajax-user.php'; ?>

<div class="box">
	<h2>Управление пользователями</h2>
</div>

<div class="user-management">
	<?

	?>

	<div class="tool">
		<a href="<?= url::ajax(RUDE_TASK_AJAX_USER_ADD_FORM) ?>" class="fancybox float"><img src="src/icons/add.png"></a>
		<a href="<?= url::ajax(RUDE_TASK_AJAX_USER_ADD_FORM) ?>" class="fancybox undecorated"><div class="tool-desc"><?= RUDE_TEXT_ADD_NEW_USER ?></div></a>
	</div>

	<div id="info">
		<? ajax_user::info(); ?>
	</div>

	<? ajax_user::info_js(); ?>
</div>