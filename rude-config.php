<?

/* ============================== */
/* Database configuration section */
/* ============================== */

define('RUDE_DATABASE_USER',   'root');
define('RUDE_DATABASE_PASS',   '1234');
define('RUDE_DATABASE_HOST',   'localhost');
define('RUDE_DATABASE_NAME',   'university');
define('RUDE_DATABASE_PREFIX', 'univ_');



/* =================================== */
/* Date and time configuration section */
/* =================================== */
define('RUDE_TIMEZONE', 'Europe/Minsk');


/* ======================================== */
/* Debug notification configuration section */
/* ======================================== */
define('RUDE_ERR_SHOW_MESSAGES', true);


/* ======================================================================== */
/* Database table names which are frequently used in query() set of classes */
/* ======================================================================== */
define('RUDE_TABLE_CLASSES',           RUDE_DATABASE_PREFIX . 'classes');
define('RUDE_TABLE_DEPARTMENTS',       RUDE_DATABASE_PREFIX . 'departments');
define('RUDE_TABLE_DISCIPLINES',       RUDE_DATABASE_PREFIX . 'disciplines');
define('RUDE_TABLE_DISCIPLINES_TYPES', RUDE_DATABASE_PREFIX . 'disciplines_types');
define('RUDE_TABLE_FACULTIES',         RUDE_DATABASE_PREFIX . 'faculties');
define('RUDE_TABLE_QUALIFICATIONS',    RUDE_DATABASE_PREFIX . 'qualifications');
define('RUDE_TABLE_REPORTS',           RUDE_DATABASE_PREFIX . 'reports');
define('RUDE_TABLE_ROLES',             RUDE_DATABASE_PREFIX . 'roles');
define('RUDE_TABLE_SPECIALTIES',       RUDE_DATABASE_PREFIX . 'specialties');
define('RUDE_TABLE_USERS',             RUDE_DATABASE_PREFIX . 'users');



/* ========================= */
/* Filesystem define section */
/* ========================= */
define('RUDE_FILE_INDEX',          'index.php');

define('RUDE_DIR_ROOT',             __DIR__);
define('RUDE_DIR_SRC',              '/src');
define('RUDE_DIR_ICONS',            RUDE_DIR_SRC . '/icons');
define('RUDE_DIR_FONTS',            RUDE_DIR_SRC . '/fonts');

define('RUDE_DIR_TEMPLATES',        RUDE_DIR_ROOT . RUDE_DIR_SRC . '/templates');

define('RUDE_TEMPLATE_DIR',         RUDE_DIR_TEMPLATES . '/rude');
define('RUDE_TEMPLATE_FILE_INDEX',  RUDE_TEMPLATE_DIR . '/index.php');
define('RUDE_TEMPLATE_FILE_FOOTER', RUDE_TEMPLATE_DIR . '/footer.php');
define('RUDE_TEMPLATE_FILE_HEADER', RUDE_TEMPLATE_DIR . '/header.php');
define('RUDE_TEMPLATE_DIR_CSS',     RUDE_TEMPLATE_DIR . '/css/');
define('RUDE_TEMPLATE_DIR_JS',      RUDE_TEMPLATE_DIR . '/js/');


/* =============================== */
/* HTTP-side configuration section */
/* =============================== */
define('RUDE_TEMPLATE_HTTP_INDEX',  '/' . RUDE_FILE_INDEX);




define('RUDE_ROLE_ADMIN_ID',              '1');
define('RUDE_ROLE_MODERATOR_ID',          '2');

define('RUDE_TASK',                       'task');
define('RUDE_TARGET',                     'target');

define('RUDE_TARGET_ADD',                 'add');
define('RUDE_TARGET_EDIT',                'edit');

define('RUDE_TASK_TABLE_PREVIEW',         'table_preview');

define('RUDE_TASK_AJAX',                  'ajax');
define('RUDE_TASK_LOGOUT',                'logout');
define('RUDE_TASK_REPORT_PREVIEW',        'report_preview');


define('RUDE_HTML_NEWLINE',               '<br />');



/* ================================================================== */
/* User management section [ADD/EDIT/DELETE] + same AJAX combinations */
/* ================================================================== */
define('RUDE_TASK_MANAGEMENT_USERS',      'user_management');

define('RUDE_TASK_USER_ADD',              'user_add');
define('RUDE_TASK_USER_EDIT',             'user_edit');
define('RUDE_TASK_USER_DELETE',           'user_delete');

define('RUDE_TASK_AJAX_USER_ADD_FORM',    'ajax_user_add_form');
define('RUDE_TASK_AJAX_USER_EDIT_FORM'  , 'ajax_user_edit_form');
define('RUDE_TASK_AJAX_USER_DELETE_FORM', 'ajax_user_delete_form');
define('RUDE_TASK_AJAX_USER_ADD',         'ajax_user_add');
define('RUDE_TASK_AJAX_USER_EDIT',        'ajax_user_edit');
define('RUDE_TASK_AJAX_USER_DELETE',      'ajax_user_delete');
define('RUDE_TASK_AJAX_USER_IS_EXISTS',   'ajax_user_is_exists');
define('RUDE_TASK_AJAX_USER_SUMMARY',     'ajax_user_summary');


/* ================================================================== */
/* Role management section [ADD/EDIT/DELETE] + same AJAX combinations */
/* ================================================================== */
define('RUDE_TASK_MANAGEMENT_ROLES',      'role_management');

define('RUDE_TASK_ROLE_ADD',              'role_add');
define('RUDE_TASK_ROLE_EDIT',             'role_edit');
define('RUDE_TASK_ROLE_DELETE',           'role_delete');

define('RUDE_TASK_AJAX_ROLE_ADD_FORM',    'ajax_role_add_form');
define('RUDE_TASK_AJAX_ROLE_EDIT_FORM'  , 'ajax_role_edit_form');
define('RUDE_TASK_AJAX_ROLE_DELETE_FORM', 'ajax_role_delete_form');
define('RUDE_TASK_AJAX_ROLE_ADD',         'ajax_role_add');
define('RUDE_TASK_AJAX_ROLE_EDIT',        'ajax_role_edit');
define('RUDE_TASK_AJAX_ROLE_DELETE',      'ajax_role_delete');
//define('RUDE_TASK_AJAX_ROLE_IS_EXISTS',   'ajax_role_is_exists');
define('RUDE_TASK_AJAX_ROLE_SUMMARY',     'ajax_role_summary');


/* ======================================================================= */
/* Education management section [ADD/EDIT/DELETE] + same AJAX combinations */
/* ======================================================================= */
define('RUDE_TASK_MANAGEMENT_EDUCATION',  'education_management');


/* ==================================================================== */
/* Report management section [ADD/EDIT/DELETE] + same AJAX combinations */
/* ==================================================================== */
define('RUDE_TASK_MANAGEMENT_REPORTS', 'report_management');

define('RUDE_TASK_AJAX_REPORT_ADD',    'ajax_report_add');
define('RUDE_TASK_AJAX_REPORT_EDIT',   'ajax_report_edit');
define('RUDE_TASK_AJAX_REPORT_DELETE', 'ajax_report_delete');


/* ===================================================================== */
/* Faculty management section [ADD/EDIT/DELETE] + same AJAX combinations */
/* ===================================================================== */
define('RUDE_TASK_MANAGEMENT_FACULTIES',     'faculty_management');

define('RUDE_TASK_AJAX_FACULTY_ADD_FORM',    'ajax_faculty_add_form');
define('RUDE_TASK_AJAX_FACULTY_EDIT_FORM'  , 'ajax_faculty_edit_form');
define('RUDE_TASK_AJAX_FACULTY_DELETE_FORM', 'ajax_faculty_delete_form');
define('RUDE_TASK_AJAX_FACULTY_ADD',         'ajax_faculty_add');
define('RUDE_TASK_AJAX_FACULTY_EDIT',        'ajax_faculty_edit');
define('RUDE_TASK_AJAX_FACULTY_DELETE',      'ajax_faculty_delete');
define('RUDE_TASK_AJAX_FACULTY_SUMMARY',     'ajax_faculty_summary');


/* ======================================================================== */
/* Department management section [ADD/EDIT/DELETE] + same AJAX combinations */
/* ======================================================================== */
define('RUDE_TASK_MANAGEMENT_DEPARTMENTS',      'department_management');

define('RUDE_TASK_AJAX_DEPARTMENT_ADD_FORM',    'ajax_department_add_form');
define('RUDE_TASK_AJAX_DEPARTMENT_EDIT_FORM'  , 'ajax_department_edit_form');
define('RUDE_TASK_AJAX_DEPARTMENT_DELETE_FORM', 'ajax_department_delete_form');
define('RUDE_TASK_AJAX_DEPARTMENT_ADD',         'ajax_department_add');
define('RUDE_TASK_AJAX_DEPARTMENT_EDIT',        'ajax_department_edit');
define('RUDE_TASK_AJAX_DEPARTMENT_DELETE',      'ajax_department_delete');
define('RUDE_TASK_AJAX_DEPARTMENT_SUMMARY',     'ajax_department_summary');


/* =========================================================================== */
/* Qualification management section [ADD/EDIT/DELETE] + same AJAX combinations */
/* =========================================================================== */
define('RUDE_TASK_MANAGEMENT_QUALIFICATIONS',      'qualification_management');

define('RUDE_TASK_AJAX_QUALIFICATION_ADD_FORM',    'ajax_qualification_add_form');
define('RUDE_TASK_AJAX_QUALIFICATION_EDIT_FORM'  , 'ajax_qualification_edit_form');
define('RUDE_TASK_AJAX_QUALIFICATION_DELETE_FORM', 'ajax_qualification_delete_form');
define('RUDE_TASK_AJAX_QUALIFICATION_ADD',         'ajax_qualification_add');
define('RUDE_TASK_AJAX_QUALIFICATION_EDIT',        'ajax_qualification_edit');
define('RUDE_TASK_AJAX_QUALIFICATION_DELETE',      'ajax_qualification_delete');
define('RUDE_TASK_AJAX_QUALIFICATION_SUMMARY',     'ajax_qualification_summary');


/* ======================================================================= */
/* Specialty management section [ADD/EDIT/DELETE] + same AJAX combinations */
/* ======================================================================= */
define('RUDE_TASK_MANAGEMENT_SPECIALTIES',     'specialty_management');

define('RUDE_TASK_AJAX_SPECIALTY_ADD_FORM',    'ajax_specialty_add_form');
define('RUDE_TASK_AJAX_SPECIALTY_EDIT_FORM'  , 'ajax_specialty_edit_form');
define('RUDE_TASK_AJAX_SPECIALTY_DELETE_FORM', 'ajax_specialty_delete_form');
define('RUDE_TASK_AJAX_SPECIALTY_ADD',         'ajax_specialty_add');
define('RUDE_TASK_AJAX_SPECIALTY_EDIT',        'ajax_specialty_edit');
define('RUDE_TASK_AJAX_SPECIALTY_DELETE',      'ajax_specialty_delete');
define('RUDE_TASK_AJAX_SPECIALTY_SUMMARY',     'ajax_specialty_summary');


/* =========================================================== */
/* Language constants (defines & russian language equivalents) */
/* =========================================================== */
define('RUDE_TEXT_YES',                       'да');
define('RUDE_TEXT_NO',                        'нет');

define('RUDE_TEXT_INDEX_PAGE',                'Ознакомление');
define('RUDE_TEXT_MANAGEMENT_USERS',          'Пользователи');
define('RUDE_TEXT_MANAGEMENT_ROLES',          'Роли');
define('RUDE_TEXT_MANAGEMENT_EDUCATION',      'Календарь');

define('RUDE_TEXT_MANAGEMENT_COMPLEX',        'Управление комплексом');

define('RUDE_TEXT_MANAGEMENT_DEPARTMENTS',    'Кафедры');
define('RUDE_TEXT_MANAGEMENT_FACULTIES',      'Факультеты');
define('RUDE_TEXT_MANAGEMENT_QUALIFICATIONS', 'Квалификации');
define('RUDE_TEXT_MANAGEMENT_SPECIALTIES',    'Специальности');
define('RUDE_TEXT_MANAGEMENT_REPORTS',        'Все планы');
define('RUDE_TEXT_MANAGEMENT_REPORTS_ADD',    'Добавить новый');

define('RUDE_TEXT_ADD',                       'Добавить');
define('RUDE_TEXT_ADD_NEW_DEPARTMENT',        'Добавить новую кафедру');
define('RUDE_TEXT_ADD_NEW_FACULTY',           'Добавить новый факультет');
define('RUDE_TEXT_ADD_NEW_QUALIFICATION',     'Добавить новую квалификацию');
define('RUDE_TEXT_ADD_NEW_REPORT',            'Добавить новый учебный план');
define('RUDE_TEXT_ADD_NEW_ROLE',              'Добавить новую роль');
define('RUDE_TEXT_ADD_NEW_SPECIALTY',         'Добавить новую специальность');
define('RUDE_TEXT_ADD_NEW_USER',              'Добавить нового пользователя');

define('RUDE_TEXT_USER_ROLE',                 'Роль пользователя');
define('RUDE_TEXT_LOGOUT',                    'Выход');
define('RUDE_TEXT_EDIT',                      'редактировать');
define('RUDE_TEXT_DELETE_SELECTED',           'Удалить выбранное');
define('RUDE_TEXT_USERS',                     'Пользователи');
define('RUDE_TEXT_NAVIGATION_PANEL',          'Панель навигации');
define('RUDE_TEXT_SUMMARY_INFORMATION',       'Суммарная информация');
define('RUDE_TEXT_EDUCATIONAL_PROGRAM',       'Учебные планы');

define('RUDE_TEXT_UTF8_DOTS',                 '••••••••');


/* ============================================================ */
/* HTML <input> desctiption section: main types are listed here */
/* ============================================================ */
define('RUDE_HTML_INPUT_TYPE_TEXT',     'text');
define('RUDE_HTML_INPUT_TYPE_PASSWORD', 'password');
define('RUDE_HTML_INPUT_TYPE_HIDDEN',   'hidden');


/* ============================================================================================ */
/* Database field names & certain constanst frequently used in forms and query() set of classes */
/* ============================================================================================ */
define('RUDE_FIELD_ID',                    'id');
define('RUDE_FIELD_USERNAME',              'username');
define('RUDE_FIELD_PASSWORD',              'password');
define('RUDE_FIELD_PASSWORD_REPEAT',       'password_repeat');
define('RUDE_FIELD_NAME',                  'name');
define('RUDE_FIELD_SHORTNAME',             'shortname');
define('RUDE_FIELD_HASH',                  'hash');
define('RUDE_FIELD_SALT',                  'salt');
define('RUDE_FIELD_ROLE',                  'role');
define('RUDE_FIELD_ROLE_ID',               'role_id');
define('RUDE_FIELD_ROLES',                 'roles');
define('RUDE_FIELD_COUNT',                 'count');
define('RUDE_FIELD_QUALIFICATION_ID',      'qualification_id');
define('RUDE_FIELD_FACULTY_ID',            'faculty_id');
define('RUDE_FIELD_NAME_TYPE_ID',          'type_id');
define('RUDE_FIELD_NAME_TYPE_NAME',        'type_name');
define('RUDE_FIELD_ALLOW_USER_MANAGEMENT', 'allow_user_management');
define('RUDE_FIELD_ALLOW_ROLE_MANAGEMENT', 'allow_role_management');



/* =============================================== */
/* Code and statuses, primary used in AJAX answers */
/* =============================================== */
define('RUDE_CODE_FAILURE',                    '0');
define('RUDE_CODE_SUCCESS',                    '1');

define('RUDE_CODE_FAILED_TO_INIT_SESSION',     '2');
define('RUDE_CODE_WRONG_USERNAME_OR_PASSWORD', '5');
define('RUDE_CODE_USER_IS_NOT_EXISTS',         '6');