<?

namespace rude;

define('RUDE_ERR_MYSQL_CONNECTION_ERROR',  'Возникла ошибка при подключении к MariaDB: ');
define('RUDE_ERR_MYSQL_QUERY_ERROR',       'Не удалось выполнить следующий SQL запрос: ');
define('RUDE_ERR_MYSQL_SET_CHARSET_ERROR', 'Ошибка при загрузке набора символов UTF-8: ');

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
			new errcode(RUDE_ERR_MYSQL_CONNECTION_ERROR, $this->mysqli->connect_errno);
		}

		if (!$this->mysqli->set_charset("utf8"))
		{
			new errcode(RUDE_ERR_MYSQL_SET_CHARSET_ERROR, $this->mysqli->connect_errno);
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

	public function insert_id()
	{
		return $this->mysqli->insert_id;
	}

	public function columns($table)
	{
		$sql = 'SHOW COLUMNS FROM ' . $table;

		$result = $this->query($sql);


		$table_columns = [];

		while ($column = $result->fetch_row())
		{
			if (!empty($column[0]))
			{
				$table_columns[] = $column[0]; // [0] - field
				// [1] - type
				// [2] - null
				// [3] - key
				// [4] - default
				// [5] - extra
			}
		}

		return $table_columns;
	}
}