<?

$target = get(RUDE_TARGET);

switch ($target)
{
	case RUDE_TASK_AJAX_ADD_USER:
		require_once 'rude-add-user.php';
		break;

	case RUDE_TASK_AJAX_ADD_USER_FORM:
		require_once 'rude-add-user-form.php';
		break;

	default:
		break;
}