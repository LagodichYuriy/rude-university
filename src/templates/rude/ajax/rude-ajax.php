<?

$target = get($_REQUEST, RUDE_TARGET);

switch ($target)
{
	case RUDE_TASK_AJAX_ADD_USER:
		require_once 'rude-add-user.php';
		break;

	default:
		break;
}