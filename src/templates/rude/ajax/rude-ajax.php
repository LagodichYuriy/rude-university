<?

namespace rude;

require_once 'rude-ajax-user.php';

$target = get(RUDE_TARGET);

switch ($target)
{
	case RUDE_TASK_AJAX_ADD_USER:
		ajax_user::add();
		break;

	case RUDE_TASK_AJAX_ADD_USER_FORM:
		ajax_user::html_form();
		break;

	default:
		break;
}