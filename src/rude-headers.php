<?

namespace rude;

class headers
{
	public static function redirect($http_url)
	{
		header("Location: " . $http_url);

		exit;
	}
}