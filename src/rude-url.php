<?

namespace rude;

class url
{
	public static function ajax($target)
	{
		return 'index.php?task=' . RUDE_TASK_AJAX . '&target=' . urlencode($target);
	}
}