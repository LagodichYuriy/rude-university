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

<div class="sidebar-left">
	<? require_once 'rude-sidebar-left.php'; ?>
</div>

<div id="container">
	<?
		switch ($task)
		{
			case RUDE_TASK_MANAGEMENT_USERS:
				require_once 'rude-management-users.php';
				break;

			case RUDE_TASK_MANAGEMENT_EDUCATION:
				require_once 'rude-management-education.php';
				break;

			case RUDE_TASK_MANAGEMENT_REPORTS:
				require_once 'rude-management-reports.php';
				break;

			case RUDE_TASK_MANAGEMENT_FACULTIES:
				require_once 'rude-management-faculties.php';
				break;

			default:
				require_once 'rude-index-default.php';
				break;
		}
	?>
</div>
<? require_once 'rude-footer.php' ?>
</body>
</html>