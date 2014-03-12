<? namespace rude; ?>

<? require_once 'ajax/rude-ajax-role.php'; ?>

<div class="box">
	<h2>Управление ролями</h2>
</div>

<div class="middle">
	<div class="tool">
		<a href="<?= url::ajax(RUDE_TASK_AJAX_ROLE_ADD_FORM) ?>" class="fancybox-smallest float"><img src="src/icons/add.png"></a>
		<a href="<?= url::ajax(RUDE_TASK_AJAX_ROLE_ADD_FORM) ?>" class="fancybox-smallest undecorated"><div class="tool-desc"><?= RUDE_TEXT_ADD_NEW_ROLE ?></div></a>
	</div>

	<div id="info">
		<? ajax_role::html(); ?>
	</div>

	<? ajax_role::js(); ?>
</div>