<?

define("RUDE_AUTH", true);

require_once 'rude-config.php';

require_once './src/rude-globals.php';

require_once './src/rude-timestamp.php';

require_once './src/database/rude-query.php';
require_once './src/database/rude-cquery.php';
require_once './src/database/rude-dquery.php';
require_once './src/database/rude-uquery.php';

require_once './src/rude-crypt.php';
require_once './src/rude-environment.php';
require_once './src/rude-errcode.php';
require_once './src/rude-escape.php';
require_once './src/rude-headers.php';
require_once './src/rude-html.php';
require_once './src/rude-image.php';
require_once './src/rude-js.php';

require_once './src/rude-select.php';
require_once './src/rude-session.php';
require_once './src/rude-spell.php';
require_once './src/rude-string.php';
require_once './src/rude-sysinfo.php';
require_once './src/rude-url.php';

require_once './src/rude-departments.php';
require_once './src/rude-disciplines.php';
require_once './src/rude-faculties.php';
require_once './src/rude-qualifications.php';
require_once './src/rude-reports.php';
require_once './src/rude-roles.php';
require_once './src/rude-specialties.php';
require_once './src/rude-training-form.php';
require_once './src/rude-users.php';
require_once './src/rude-specializations.php';

require_once './src/rude-report.php';

require_once './src/rude-ajax.php';

require_once './src/plugins/table/table.php';

\rude\timestamp::set_timezone(RUDE_TIMEZONE);

error_reporting(-1);

$is_valid = \rude\session::init();

if ($is_valid)
{
	require_once './src/templates/rude/rude-index.php';
}
else
{
	require_once './src/templates/rude/rude-login.php';
}