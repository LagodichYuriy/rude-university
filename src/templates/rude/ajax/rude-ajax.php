<?

namespace rude;

require_once 'rude-ajax-faculty.php';
require_once 'rude-ajax-role.php';
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

	case RUDE_TASK_AJAX_USER_SUMMARY:
		ajax_user::html();
		break;





	case RUDE_TASK_AJAX_ROLE_ADD:
		ajax_role::add();
		break;

	case RUDE_TASK_AJAX_ROLE_EDIT:
//		ajax_role::edit(); // TODO: implement it
		break;

	case RUDE_TASK_AJAX_ROLE_DELETE:
		ajax_role::delete();
		break;

	case RUDE_TASK_AJAX_ROLE_ADD_FORM:
		ajax_role::html_form_add();
		break;

	case RUDE_TASK_AJAX_ROLE_EDIT_FORM:
//		ajax_role::html_form_edit(); // TODO: implement it
		break;

	case RUDE_TASK_AJAX_ROLE_DELETE_FORM:
		ajax_role::html_form_delete();
		break;

	case RUDE_TASK_AJAX_ROLE_SUMMARY:
		ajax_role::html();
		break;




	case RUDE_TASK_AJAX_FACULTY_ADD:
		ajax_faculty::add();
		break;

	case RUDE_TASK_AJAX_FACULTY_SUMMARY:
		ajax_faculty::html();
		break;

	default:
		break;
}