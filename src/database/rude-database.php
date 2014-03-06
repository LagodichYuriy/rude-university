<?

namespace rude;

define('RUDE_ERR_MYSQL_CONNECTION_ERROR', 'Не удалось подключиться к MySQL: ');
define('RUDE_ERR_MYSQL_QUERY_ERROR',      'Не удалось выполнить следующий SQL запрос: ');

require_once __DIR__ . '/../rude-errcode.php';

class database
{
	/** @var \mysqli  */
	private $mysqli = null;

	public function __construct($host = RUDE_DATABASE_HOST,
							$user = RUDE_DATABASE_USER,
							$pass = RUDE_DATABASE_PASS,
							$name = RUDE_DATABASE_NAME)
	{
		$this->mysqli = new \mysqli($host, $user, $pass, $name);

		if ($this->mysqli->connect_errno)
		{
			new errcode(RUDE_ERR_MYSQL_CONNECTION_ERROR, mysqli_connect_error());
		}
	}

	public function query($string)
	{
		$result = $this->mysqli->query($string);

		if ($result === false)
		{
			new errcode(RUDE_ERR_MYSQL_CONNECTION_ERROR, $string);
		}

		return $result;
	}

	public function escape($var)
	{
		return $this->mysqli->real_escape_string($var); // default action
	}
}