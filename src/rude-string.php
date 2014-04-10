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

	function split($str, $l = 0)
	{
		if ($l > 0)
		{
			$ret = array();
			$len = mb_strlen($str, 'UTF-8');

			for ($i = 0; $i < $len; $i += $l)
			{
				$ret[] = mb_substr($str, $i, $l, 'UTF-8');
			}

			return $ret;
		}

		return preg_split('//u', $str, -1, PREG_SPLIT_NO_EMPTY);
	}

	public static function after_each_char($string, $extra = RUDE_HTML_NEWLINE)
	{
		$char_list = string::split($string);

		foreach ($char_list as &$char)
		{
			$char .= $extra;
		}

		return implode('', $char_list);
	}
}