<?

namespace rude;

require_once 'rude-database.php';

define('RUDE_SQL_SELECT', 'SELECT');

class query
{
	/** @var database  */
	protected $database = null;        // database class


	protected $field_list = array();   // [optional] SELECT
	protected $from_table = null;      // [required] FROM
	protected $join_list = array();    // [optional] JOIN
	protected $where_list = array();   // [optional] WHERE
	protected $order_by = null;        // [optional] ORDER BY
	protected $order_direction = null; // [optional] ASC/DESC
	protected $limit = null;           // [optional] LIMIT


	/** @var \mysqli_result */
	protected $result = null;          // query result

	public function __construct($from_table = null)
	{
		$this->database = new database();

		$this->select($from_table);
	}

	public function field($db_field)
	{
		$this->field_list[] = $db_field;
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

	public function select($from_table)
	{
		$this->from_table = $from_table;
	}

	public function from($from)
	{
		$this->from_table = $from;
	}

	public function join($table, $field, $field_equals = false)
	{
		if ($field_equals === false)
		{
			$field_equals = $field;
		}

		$this->join_list[] = $table . ' ON ' . $this->from_table . '.' . $field . ' = ' . $table . '.' . $field_equals;;
	}

	public function sql()
	{
		$sql = '';

		if (!isset($this->from_table)) { return false; }

		if (empty($this->field_list))
		{
			$sql .= 'SELECT *' . PHP_EOL;
		}
		else
		{
			$sql .= 'SELECT ' . implode(',' . PHP_EOL, $this->field_list);
		}

		if (!empty($this->from_table))
		{
			$sql .= 'FROM ' . $this->from_table . PHP_EOL;
		}

		if (!empty($this->join_list))
		{
			$sql .= 'LEFT JOIN ' . implode(PHP_EOL, $this->join_list) . PHP_EOL;
		}

		if (empty($this->where_list))
		{
			$sql .= 'WHERE 1 = 1' . PHP_EOL;
		}
		else
		{
			$sql .= 'WHERE ' . implode(' AND ', $this->where_list) . PHP_EOL;
		}


		return $sql;
	}

	public function start()
	{
		$database = new database();

		$sql = $this->sql();

		$this->result = $database->query($sql);
	}

	public function get_object_list()
	{
		$object_list = array();

		while ($object = $this->result->fetch_object())
		{
			$object_list[] = $object;
		}

		return $object_list;
	}

	public function get_object()
	{
		if ($object = $this->result->fetch_object())
		{
			return $object;
		}

		return null;
	}
}