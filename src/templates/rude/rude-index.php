<?
	namespace rude;

	$task = get(RUDE_TASK);

	switch ($task)
	{
		case RUDE_TASK_AJAX:
			require_once 'ajax/rude-ajax.php';

			exit();
			break;

		case RUDE_TASK_LOGOUT:
			session::destroy();
			headers::redirect(RUDE_FILE_INDEX);
			break;
	}
?>
<html>
<? require_once 'rude-header.php' ?>
<body>
<div id="navigation">
	<? require_once 'rude-navigation-panel.php'; ?>
</div>
<div id="container">
	<?
		switch ($task)
		{
			case RUDE_TASK_USER_MANAGEMENT:
				require_once 'rude-user-management.php';
				break;

			case RUDE_TASK_ROLE_MANAGEMENT:
				require_once 'rude-role-management.php';
				break;

			default:
				require_once 'rude-default.php';
				break;
		}
	?>
</div>
<? require_once 'rude-footer.php' ?>
</body>
</html>