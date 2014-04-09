<?

namespace rude;

class uquery
{
	/** @var database  */
	private $database = null;         // database class


	private $update_table = null;     // [required] UPDATE
	private $update_fields = null;    // [required] SET
	private $where_list = null;       // [required] WHERE
	private $limit = null;            // [optional] LIMIT

	// UPDATE  `university`.`univ_users` SET `username` = `ihatemynickna' WHERE `univ_users`.`id` = 7;

	/** @var \mysqli_result */
	private $result = null;           // query result

	public function __construct($update_table)
	{
		$this->database = new database();

		$this->update_table = $update_table;
	}

	public function columns()
	{
		return $this->database->columns($this->update_table);
	}

	public function update($key, $val)
	{
		$this->update_fields[] = array($key, $val);
	}

	public function where($where, $val = false)
	{
		if ($val === false)
		{
			$this->where_list[] = $where;
		}
		else if (is_string($val))
		{
			$this->where_list[] = $where . " = '" . $val . "'";
		}
		else if (is_int($val) || is_float($val) || is_double($val))
		{
			$this->where_list[] = $where . ' = ' . $val;
		}
		else
		{
			$this->where_list[] = $where . " = '" . $val . "'"; // default
		}
	}

	public function limit($limit)
	{
		$this->limit = (int) $limit;
	}

	public function sql()
	{
		$sql = '';

		$sql .= $this->sql_update();
		$sql .= $this->sql_set();
		$sql .= $this->sql_where();
		$sql .= $this->sql_limit();

		return $sql;
	}

	public function sql_update()
	{
		return 'UPDATE ' . $this->update_table . PHP_EOL;
	}

	public function sql_set()
	{
		$result = 'SET';

		foreach ($this->update_fields as $fields)
		{
			list($key, $value) = $fields;

			$result .= PHP_EOL . "`" . $key . "` = ";


			if (is_string($value))
			{
				$result .= "'" . $value . "',";
			}
			else if (is_int($value) || is_float($value) || is_double($value))
			{
				$result .= $value . ',';
			}
		}

		$result  = string::remove_last_char($result);
		$result .= PHP_EOL;

		return $result;
	}

	public function sql_where()
	{
		if (empty($this->where_list))
		{
			return 'WHERE 1 = 1' . PHP_EOL;
		}

		return 'WHERE ' . implode(' AND ', $this->where_list) . PHP_EOL;
	}

	public function sql_limit()
	{
		if (!empty($this->limit))
		{
			return 'LIMIT ' .  $this->limit;
		}

		return '';
	}

	public function start()
	{
		$sql = $this->sql();

		$this->result = $this->database->query($sql);
	}

	public function escape($var)
	{
		return $this->database->escape($var);
	}
}