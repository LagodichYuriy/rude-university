<? namespace rude; ?>

<? require_once 'ajax/rude-ajax-user.php'; ?>
<? require_once 'ajax/rude-ajax-role.php'; ?>

<div class="box">
	<h2>Управление пользователями</h2>
</div>

<div class="middle">
	<div class="middle-item">
		<div class="tool">
			<a href="<?= url::ajax(RUDE_TASK_AJAX_USER_ADD_FORM) ?>" class="fancybox-users float"><img src="src/icons/add.png"></a>
			<a href="<?= url::ajax(RUDE_TASK_AJAX_USER_ADD_FORM) ?>" class="fancybox-users undecorated"><div class="tool-desc"><?= RUDE_TEXT_ADD_NEW_USER ?></div></a>
		</div>

		<div id="info-users">
			<? ajax_user::html(); ?>
		</div>

		<? ajax_user::js(); ?>
	</div>


	<div class="middle-item">
		<div class="tool">
			<a href="<?= url::ajax(RUDE_TASK_AJAX_ROLE_ADD_FORM) ?>" class="fancybox-roles-smallest float"><img src="src/icons/add.png"></a>
			<a href="<?= url::ajax(RUDE_TASK_AJAX_ROLE_ADD_FORM) ?>" class="fancybox-roles-smallest undecorated"><div class="tool-desc"><?= RUDE_TEXT_ADD_NEW_ROLE ?></div></a>
		</div>

		<div id="info-roles">
			<? ajax_role::html(); ?>
		</div>
	</div>

</div>