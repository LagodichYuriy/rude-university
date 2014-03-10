<?

define('RUDE_DATABASE_USER',              'root');
define('RUDE_DATABASE_PASS',              '1234');
define('RUDE_DATABASE_HOST',              'localhost');
define('RUDE_DATABASE_NAME',              'university');
define('RUDE_DATABASE_PREFIX',            'univ_');

define('RUDE_TABLE_USERS',                RUDE_DATABASE_PREFIX . 'users');
define('RUDE_TABLE_ROLES',                RUDE_DATABASE_PREFIX . 'roles');

define('RUDE_FILE_INDEX',                 'index.php');

define('RUDE_DIR_ROOT',                   __DIR__);
define('RUDE_DIR_SRC',                    '/src');
define('RUDE_DIR_TEMPLATES',              RUDE_DIR_ROOT . RUDE_DIR_SRC . '/templates');


define('RUDE_TEMPLATE_DIR',               RUDE_DIR_TEMPLATES . '/rude');
define('RUDE_TEMPLATE_FILE_INDEX',        RUDE_TEMPLATE_DIR . '/index.php');
define('RUDE_TEMPLATE_FILE_FOOTER',       RUDE_TEMPLATE_DIR . '/footer.php');
define('RUDE_TEMPLATE_FILE_HEADER',       RUDE_TEMPLATE_DIR . '/header.php');
define('RUDE_TEMPLATE_DIR_CSS',           RUDE_TEMPLATE_DIR . '/css/');
define('RUDE_TEMPLATE_DIR_JS',            RUDE_TEMPLATE_DIR . '/js/');

define('RUDE_TEMPLATE_HTTP_INDEX',        '/index.php');

define('RUDE_ERR_SHOW_MESSAGES',          true);

define('RUDE_ROLE_ADMIN_ID',              '1');
define('RUDE_ROLE_MODERATOR_ID',          '2');

define('RUDE_TASK',                       'task');
define('RUDE_TASK_USER_MANAGEMENT',       'user_management');
define('RUDE_TASK_USER_ADD',              'user_add');
define('RUDE_TASK_USER_EDIT',             'user_edit');
define('RUDE_TASK_USER_DELETE',           'user_delete');
define('RUDE_TASK_TABLE_PREVIEW',         'table_preview');

define('RUDE_TASK_AJAX',                  'ajax');
define('RUDE_TASK_LOGOUT',                'logout');

define('RUDE_TARGET',                     'target');

define('RUDE_TASK_AJAX_USER_ADD_FORM',    'ajax_user_add_form');
define('RUDE_TASK_AJAX_USER_ADD',         'ajax_user_add');
define('RUDE_TASK_AJAX_USER_EDIT_FORM'  , 'ajax_user_edit_form');
define('RUDE_TASK_AJAX_USER_DELETE_FORM', 'ajax_user_delete_form');
define('RUDE_TASK_AJAX_USER_EDIT',        'ajax_user_edit');
define('RUDE_TASK_AJAX_USER_DELETE',      'ajax_user_delete');
define('RUDE_TASK_AJAX_USER_IS_EXISTS',   'ajax_user_is_exists');
define('RUDE_TASK_AJAX_USER_INFO',        'ajax_user_info');

define('RUDE_TEXT_USER_MANAGEMENT',       'Пользователи');
define('RUDE_TEXT_ADD',                   'Добавить');
define('RUDE_TEXT_ADD_NEW_USER',          'Добавить нового пользователя');
define('RUDE_TEXT_USER_ROLE',             'Роль пользователя');
define('RUDE_TEXT_LOGOUT',                'Выход');

define('RUDE_TEXT_UTF8_DOTS',             '••••••••');

define('RUDE_HTML_INPUT_TYPE_TEXT',       'text');
define('RUDE_HTML_INPUT_TYPE_PASSWORD',   'password');
define('RUDE_HTML_INPUT_TYPE_HIDDEN',     'hidden');

define('RUDE_FIELD_ID',                   'id');
define('RUDE_FIELD_USERNAME',             'username');
define('RUDE_FIELD_PASSWORD',             'password');
define('RUDE_FIELD_PASSWORD_REPEAT',      'password_repeat');
define('RUDE_FIELD_HASH',                 'hash');
define('RUDE_FIELD_SALT',                 'salt');
define('RUDE_FIELD_ROLE',                 'role');
define('RUDE_FIELD_ROLE_ID',              'role_id');
define('RUDE_FIELD_ROLES',                'roles');