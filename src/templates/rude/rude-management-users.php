<? namespace rude; ?>
<? require_once 'ajax/rude-ajax-user.php'; ?>
<? require_once 'ajax/rude-ajax-role.php'; ?>

<<<<<<< HEAD:src/templates/rude/rude-management-users.php
<?
	if (!ajax_user::has_access() && !ajax_role::has_access())
	{
		headers::redirect(RUDE_FILE_INDEX);
		die();
	}
?>



<div class="middle">

<? if (ajax_user::has_access()) : ?>
	<div class="middle-item two-column first">
		<div class="tool">
			<a href="<?= url::ajax(RUDE_TASK_AJAX_USER_ADD_FORM) ?>" class="fancybox-users float"><img src="src/icons/add.png"></a>
			<a href="<?= url::ajax(RUDE_TASK_AJAX_USER_ADD_FORM) ?>" class="fancybox-users undecorated"><div class="tool-desc"><?= RUDE_TEXT_ADD_NEW_USER ?></div></a>
		</div>

=======
<? if (!(ajax_user::having_access() or ajax_role::having_access()))
{
    headers::redirect(RUDE_FILE_INDEX);
    die();
}
?>

<div class="box">
	<h2>Управление пользователями</h2>
</div>

<div class="middle">
	<div class="middle-item">
        <? if (ajax_user::having_access()) : ?>
		    <div class="tool">
    			<a href="<?= url::ajax(RUDE_TASK_AJAX_USER_ADD_FORM) ?>" class="fancybox-users float"><img src="src/icons/add.png"></a>
    			<a href="<?= url::ajax(RUDE_TASK_AJAX_USER_ADD_FORM) ?>" class="fancybox-users undecorated"><div class="tool-desc"><?= RUDE_TEXT_ADD_NEW_USER ?></div></a>
	    	</div>
        <? endif; ?>
>>>>>>> 8f1d8f6aadd003f3003e260dc0cacc9e92d327d6:src/templates/rude/rude-user-management.php
		<div id="info-users">
			<? ajax_user::html(); ?>
		</div>
	</div>
<? endif; ?>

<<<<<<< HEAD:src/templates/rude/rude-management-users.php
<? if (ajax_role::has_access()) : ?>
	<div class="middle-item two-column">
=======

	<div class="middle-item">
        <? if (ajax_role::having_access()) : ?>
>>>>>>> 8f1d8f6aadd003f3003e260dc0cacc9e92d327d6:src/templates/rude/rude-user-management.php
		<div class="tool">
            <a href="<?= url::ajax(RUDE_TASK_AJAX_ROLE_ADD_FORM) ?>" class="fancybox-roles-smallest float"><img src="src/icons/add.png"></a>
			<a href="<?= url::ajax(RUDE_TASK_AJAX_ROLE_ADD_FORM) ?>" class="fancybox-roles-smallest undecorated"><div class="tool-desc"><?= RUDE_TEXT_ADD_NEW_ROLE ?></div></a>
		</div>
        <? endif; ?>
		<div id="info-roles">
			<? ajax_role::html(); ?>
		</div>
	</div>
<? endif; ?>

</div>