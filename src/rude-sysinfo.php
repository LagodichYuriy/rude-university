<?

namespace rude;

class sysinfo
{
	public static function get_host($http = false)
	{
		if (isset($_SERVER['HTTP_X_FORWARDED_HOST']) && $host = $_SERVER['HTTP_X_FORWARDED_HOST'])
		{
			$elements = explode(',', $host);

			$host = trim(end($elements));
		}
		else
		{
			if (!$host = $_SERVER['HTTP_HOST'])
			{
				if (!$host = $_SERVER['SERVER_NAME'])
				{
					$host = !empty($_SERVER['SERVER_ADDR']) ? $_SERVER['SERVER_ADDR'] : '';
				}
			}
		}

		// Remove port number from host
		$host = preg_replace('/:\d+$/', '', $host);

		if ($http)
		{
			return 'http://' . trim($host);
		}

		return trim($host);
	}
}