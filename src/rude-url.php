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

	public static function task($task, $is_first_arg = false)
	{
		return url::param(RUDE_TASK, $task, $is_first_arg);
	}

	public static function target($target, $is_first_arg = false)
	{
		return url::param(RUDE_TARGET, $target, $is_first_arg);
	}
}