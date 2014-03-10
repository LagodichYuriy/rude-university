<?

namespace rude;

require_once 'rude-ajax-user.php';

$target = get(RUDE_TARGET);

switch ($target)
{
	case RUDE_TASK_AJAX_USER_ADD:
		ajax_user::add();
		break;

	case RUDE_TASK_AJAX_USER_EDIT:
		ajax_user::edit();
		break;

	case RUDE_TASK_AJAX_USER_DELETE:
		ajax_user::delete();
		break;

	case RUDE_TASK_AJAX_USER_IS_EXISTS:
		ajax_user::is_exists();
		break;

	case RUDE_TASK_AJAX_USER_ADD_FORM:
		ajax_user::html_form_add();
		break;

	case RUDE_TASK_AJAX_USER_EDIT_FORM:
		ajax_user::html_form_edit();
		break;

	case RUDE_TASK_AJAX_USER_DELETE_FORM:
		ajax_user::html_form_delete();
		break;

	case RUDE_TASK_AJAX_USER_INFO:
		ajax_user::info();
		break;

	default:
		break;
}