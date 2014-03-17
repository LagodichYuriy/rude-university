<? namespace rude; ?>

<? require_once 'ajax/rude-ajax-user.php'; ?>
<? require_once 'ajax/rude-ajax-role.php'; ?>

<?
$permissions = users::permissions();

$access_to_users = $permissions[RUDE_FIELD_ALLOW_USER_MANAGEMENT];
$access_to_roles = $permissions[RUDE_FIELD_ALLOW_ROLE_MANAGEMENT];


if (!$access_to_users && !$access_to_roles)
{
	headers::redirect(RUDE_FILE_INDEX);
	die();
}
?>

<div class="box">
	<h2>Управление пользователями</h2>
</div>

<? if ($access_to_users) : ?>

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

<? endif; ?>

<? if ($access_to_roles) : ?>

	<div class="middle-item">
		<div class="tool">
			<a href="<?= url::ajax(RUDE_TASK_AJAX_ROLE_ADD_FORM) ?>" class="fancybox-roles-smallest float"><img src="src/icons/add.png"></a>
			<a href="<?= url::ajax(RUDE_TASK_AJAX_ROLE_ADD_FORM) ?>" class="fancybox-roles-smallest undecorated"><div class="tool-desc"><?= RUDE_TEXT_ADD_NEW_ROLE ?></div></a>
		</div>

		<div id="info-roles">
			<? ajax_role::html(); ?>
		</div>
	</div>

<? endif; ?>
</div>