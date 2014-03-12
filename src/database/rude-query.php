<?

namespace rude;

require_once 'rude-database.php';

class query
{
	/** @var database  */
	private $database = null;          // database class


	private $field_list = null;        // [optional] SELECT
	private $from_table = null;        // [required] FROM
	private $left_join_list = null;    // [optional] LEFT JOIN
	private $right_join_list = null;   // [optional] RIGHT JOIN
	private $where_list = null;        // [optional] WHERE
	private $group_by = null;          // [optional] GROUP BY
	private $order_by = null;          // [optional] ORDER BY
	private $order_direction = null;   // [optional] ASC/DESC
	private $limit = null;             // [optional] LIMIT


	private $left_join_tables = null;  // [autogen]
	private $right_join_tables = null; // [autogen]


	/** @var \mysqli_result */
	private $result = null;            // query result

	public function __construct($from_table)
	{
		$this->database = new database();

		$this->from_table = $from_table;
	}

	public function columns($table = false)
	{
		if ($table === false)
		{
			$table = $this->from_table;
		}

		return $this->database->columns($table);
	}

	public function field($db_field)
	{
		$this->field_list[] = $db_field;
	}

	public function table($db_table)
	{
		$this->field_list[] = $db_table . '.*';
	}

	public function count($field, $alias = RUDE_FIELD_COUNT)
	{
		$this->field_list[] = $field;
		$this->field_list[] = 'COUNT(`' . $field . '`) AS `' . $alias . '`';
	}

	public function join($table, $field, $field_equals = false)
	{
		if ($field_equals === false)
		{
			$field_equals = $field;
		}

		$this->left_join_tables[] = $table;
		$this->left_join_list[] = $table . ' ON ' . $this->from_table . '.' . $field . ' = ' . $table . '.' . $field_equals;
	}

	public function left_join($table, $field, $field_equals = false)
	{
		$this->join($table, $field, $field_equals);
	}

	public function right_join($table, $field, $field_equals = false)
	{
		if ($field_equals === false)
		{
			$field_equals = $field;
		}

		$this->right_join_tables[] = $table;
		$this->right_join_list[] = $table . ' ON ' . $this->from_table . '.' . $field . ' = ' . $table . '.' . $field_equals;
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

	public function group_by($field)
	{
		$this->group_by = $field;
	}

	public function sql()
	{
		$sql  = '';

		$sql .= $this->sql_select();
		$sql .= $this->sql_from();
		$sql .= $this->sql_left_join();
		$sql .= $this->sql_right_join();
		$sql .= $this->sql_where();
		$sql .= $this->sql_group_by();

		return $sql;
	}

	public function sql_select()
	{
		if (!empty($this->field_list))
		{
			return 'SELECT ' . implode(',' . PHP_EOL, $this->field_list);
		}

		if (!empty($this->left_join_tables))
		{
			$table_columns = $this->columns($this->from_table);


			$select = 'SELECT ' . $this->from_table . '.*, ';

			foreach ($this->left_join_tables as $join_table)
			{
				$join_columns = $this->columns($join_table);

				$required_columns = array_diff($join_columns, $table_columns);


				foreach ($required_columns as $required_column)
				{
					$select .= PHP_EOL . $join_table . '.' . $required_column . ',';
				}

				$select  = string::remove_last_char($select);
				$select .= PHP_EOL;
			}

			return $select;
		}


		return 'SELECT *' . PHP_EOL;
	}

	public function sql_from()
	{
		if (!empty($this->from_table))
		{
			return 'FROM ' . $this->from_table . PHP_EOL;
		}

		return '';
	}

	public function sql_left_join()
	{
		if (!empty($this->left_join_list))
		{
			return 'LEFT JOIN ' . implode(PHP_EOL, $this->left_join_list) . PHP_EOL;
		}

		return '';
	}

	public function sql_right_join()
	{
		if (!empty($this->right_join_list))
		{
			return 'RIGHT JOIN ' . implode(PHP_EOL, $this->right_join_list) . PHP_EOL;
		}

		return '';
	}

	public function sql_where()
	{
		if (empty($this->where_list))
		{
			return 'WHERE 1 = 1' . PHP_EOL;
		}

		return 'WHERE ' . implode(' AND ', $this->where_list) . PHP_EOL;
	}

	public function sql_group_by()
	{
		if ($this->group_by)
		{
			return 'GROUP BY ' . $this->group_by . PHP_EOL;
		}

		return '';
	}

	public function start()
	{
		$sql = $this->sql();

		$this->result = $this->database->query($sql);
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

	public function escape($var)
	{
		return $this->database->escape($var);
	}
}