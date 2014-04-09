<?
	namespace rude;

	$task = get(RUDE_TASK);

	switch ($task)
	{
		case RUDE_TASK_AJAX:
			require_once 'ajax/rude-ajax.php';
			die;

		case RUDE_TASK_LOGOUT:
			session::destroy();
			headers::redirect(RUDE_FILE_INDEX);
			break;

		case RUDE_TASK_REPORT_PREVIEW:
			require_once 'rude-report-preview.php';
			die;

		default:
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
			case RUDE_TASK_MANAGEMENT_DEPARTMENTS:
				require_once 'rude-management-departments.php';
				break;

			case RUDE_TASK_MANAGEMENT_FACULTIES:
				require_once 'rude-management-faculties.php';
				break;

			case RUDE_TASK_MANAGEMENT_QUALIFICATIONS:
				require_once 'rude-management-qualifications.php';
				break;

			case RUDE_TASK_MANAGEMENT_SPECIALTIES:
				require_once 'rude-management-specialties.php';
				break;

			case RUDE_TASK_MANAGEMENT_USERS:
				require_once 'rude-management-users.php';
				break;

			case RUDE_TASK_MANAGEMENT_EDUCATION:
				require_once 'rude-management-education.php';
				break;

			case RUDE_TASK_MANAGEMENT_REPORTS:
				require_once 'rude-management-reports.php';
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