<?

namespace rude;

class url
{
	public static function ajax($target)
	{
		return 'index.php?task=' . RUDE_TASK_AJAX . '&target=' . urlencode($target);
	}

	public static function param($name, $val, $is_first_arg = false)
	{
		$and = '&';

		if ($is_first_arg !== false)
		{
			$and = '?';
		}

		return $and . urlencode($name) . '=' . urlencode($val);
	}
}