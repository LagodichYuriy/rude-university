<?

define("RUDE_AUTH", true);

require_once 'rude-config.php';

require_once './src/database/rude-query.php';
require_once './src/database/rude-cquery.php';

require_once './src/rude-crypt.php';
require_once './src/rude-escape.php';
require_once './src/rude-headers.php';
require_once './src/rude-html.php';
require_once './src/rude-roles.php';
require_once './src/rude-session.php';
require_once './src/rude-sysinfo.php';
require_once './src/rude-url.php';
require_once './src/rude-users.php';

require_once './src/plugins/table/table.php';



$is_valid = \rude\session::init();

if ($is_valid)
{
	require_once './src/templates/rude/rude-index.php';
}
else
{
	require_once './src/templates/rude/rude-login.php';
}


function get($src, $what, $default = false)
{
	if (!empty($src[$what]))
	{
		return $src[$what];
	}

	return $default;
}

function debug($var, $type_info = false)
{
	?><pre><? if ($type_info) { var_dump($var); } else { print_r($var); } ?></pre><?
}