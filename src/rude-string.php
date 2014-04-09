<?

namespace rude;

class string
{
	public static function first_letter($string)
	{
		return $string[0];
	}

	public static function remove_last_char($string)
	{
		return substr($string, 0, -1);
	}
}