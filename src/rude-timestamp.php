<?

namespace rude;

class timestamp
{
	public static function set_timezone($timezone)
	{
		return date_default_timezone_set($timezone);
	}

	public static function date($separator = '.')
	{
		return date('Y' . $separator . 'm' . $separator . 'd');
	}

	public static function current_year()
	{
		return date('Y');
	}
}