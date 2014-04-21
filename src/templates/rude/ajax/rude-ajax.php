<?

namespace rude;

require_once 'rude-ajax-faculty.php';
require_once 'rude-ajax-report.php';
require_once 'rude-ajax-role.php';
require_once 'rude-ajax-user.php';
require_once 'rude-ajax-qualification.php';
require_once 'rude-ajax-specialty.php';
require_once 'rude-ajax-department.php';
require_once 'rude-ajax-specialization.php';


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



	case RUDE_TASK_AJAX_FACULTY_ADD_FORM:
		ajax_faculty::html_form_add();
		break;

	case RUDE_TASK_AJAX_FACULTY_ADD:
		ajax_faculty::add();
		break;

	case RUDE_TASK_AJAX_FACULTY_SUMMARY:
		ajax_faculty::html();
		break;

	case RUDE_TASK_AJAX_FACULTY_EDIT_FORM:
		ajax_faculty::html_form_edit();
		break;
	case RUDE_TASK_AJAX_FACULTY_EDIT:
		ajax_faculty::edit();
		break;

	case RUDE_TASK_AJAX_FACULTY_DELETE_FORM:
		ajax_faculty::html_form_delete();
		break;
	case RUDE_TASK_AJAX_FACULTY_DELETE:
		ajax_faculty::delete();
		break;



	case RUDE_TASK_AJAX_QUALIFICATION_ADD_FORM:
		ajax_qualification::html_form_add();
		break;

	case RUDE_TASK_AJAX_QUALIFICATION_ADD:
		ajax_qualification::add();
		break;

	case RUDE_TASK_AJAX_QUALIFICATION_SUMMARY:
		ajax_qualification::html();
		break;

	case RUDE_TASK_AJAX_QUALIFICATION_EDIT_FORM:
		ajax_qualification::html_form_edit();
		break;
	case RUDE_TASK_AJAX_QUALIFICATION_EDIT:
		ajax_qualification::edit();
		break;

	case RUDE_TASK_AJAX_QUALIFICATION_DELETE_FORM:
		ajax_qualification::html_form_delete();
		break;
	case RUDE_TASK_AJAX_QUALIFICATION_DELETE:
		ajax_qualification::delete();
		break;




	case RUDE_TASK_AJAX_SPECIALTY_ADD_FORM:
		ajax_specialty::html_form_add();
		break;

	case RUDE_TASK_AJAX_SPECIALTY_ADD:
		ajax_specialty::add();
		break;

	case RUDE_TASK_AJAX_SPECIALTY_SUMMARY:
		ajax_specialty::html();
		break;

	case RUDE_TASK_AJAX_SPECIALTY_EDIT_FORM:
		ajax_specialty::html_form_edit();
		break;
	case RUDE_TASK_AJAX_SPECIALTY_EDIT:
		ajax_specialty::edit();
		break;

	case RUDE_TASK_AJAX_SPECIALTY_DELETE_FORM:
		ajax_specialty::html_form_delete();
		break;
	case RUDE_TASK_AJAX_SPECIALTY_DELETE:
		ajax_specialty::delete();
		break;







	case RUDE_TASK_AJAX_DEPARTMENT_ADD_FORM:
		ajax_department::html_form_add();
		break;

	case RUDE_TASK_AJAX_DEPARTMENT_ADD:
		ajax_department::add();
		break;

	case RUDE_TASK_AJAX_DEPARTMENT_SUMMARY:
		ajax_department::html();
		break;

	case RUDE_TASK_AJAX_DEPARTMENT_EDIT_FORM:
		ajax_department::html_form_edit();
		break;
	case RUDE_TASK_AJAX_DEPARTMENT_EDIT:
		ajax_department::edit();
		break;

	case RUDE_TASK_AJAX_DEPARTMENT_DELETE_FORM:
		ajax_department::html_form_delete();
		break;
	case RUDE_TASK_AJAX_DEPARTMENT_DELETE:
		ajax_department::delete();
		break;



    case RUDE_TASK_AJAX_SPECIALIZATION_ADD:
        ajax_specialization::add();
        break;
    case RUDE_TASK_AJAX_SPECIALIZATION_ADD_FORM;
        ajax_specialization::html_form_add();
        break;

    case RUDE_TASK_AJAX_SPECIALIZATION_EDIT:
        ajax_specialization::edit();
        break;
    case RUDE_TASK_AJAX_SPECIALIZATION_EDIT_FORM:
        ajax_specialization::html_form_edit();
        break;

    case RUDE_TASK_AJAX_SPECIALIZATION_DELETE:
        ajax_specialization::delete();
        break;
    case RUDE_TASK_AJAX_SPECIALIZATION_DELETE_FORM:
        ajax_specialization::html_form_delete();
        break;

    case RUDE_TASK_AJAX_SPECIALIZATION_SUMMARY:
        ajax_specialization::html();
        break;


	case RUDE_TASK_AJAX_REPORT_ADD:
		ajax_report::add();
		break;

	case RUDE_TASK_AJAX_REPORT_EDIT:
		ajax_report::edit();
		break;

	default:
		break;
}