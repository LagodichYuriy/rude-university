<?

function get($what, $src = false, $default = false)
{
	if ($src === false)
	{
		$src = $_REQUEST;
	}

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