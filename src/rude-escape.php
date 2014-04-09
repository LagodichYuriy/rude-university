<?

namespace rude;

class escape
{
	public static function int($var)
	{
		return intval($var);
	}

	public static function float($var)
	{
		return floatval($var);
	}

	public static function double($var)
	{
		return doubleval($var);
	}
}