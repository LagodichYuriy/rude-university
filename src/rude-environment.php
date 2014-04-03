<?

namespace rude;

class environment
{
	public static function set($name, $val)
	{
		putenv($name . '=' . $val);
	}

	public static function set_gd($path)
	{
		environment::set('GDFONTPATH', $path);
	}
}