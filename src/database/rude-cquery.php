<?

namespace rude;

class cquery
{
	/** @var database  */
	private $database = null;         // database class


	private $insert_table = null;     // [required] INSERT INTO
	private $insert_fields = null;    // [required] VALUES

	/** @var \mysqli_result */
	private $result = null;           // query result

	public function __construct($insert_table)
	{
		$this->database = new database();

		$this->insert_table = $insert_table;
	}

	public function columns()
	{
		return $this->database->columns($this->insert_table);
	}

	public function add($field_name, $field_value)
	{
		$this->insert_fields[] = array($field_name, $field_value);
	}

	public function sql()
	{
		$columns = $this->columns();


		$sql  = 'INSERT INTO ' . $this->insert_table . ' (';
		$sql .= implode(',' . PHP_EOL, $columns);
		$sql .= PHP_EOL . ')' . PHP_EOL . 'VALUES' . PHP_EOL . '(' . PHP_EOL;


		$value_list = array();

		foreach ($columns as $column)
		{
			$value = 'NULL';

			foreach ($this->insert_fields as $fields)
			{
				list($field_name, $field_value) = $fields;

				if ($column == $field_name)
				{
					if (is_int($field_value) || is_float($field_value) || is_double($field_value))
					{
						$value = $field_value;
					}
					else
					{
						$value = "'" . $field_value . "'";
					}

					break;
				}
			}

			$value_list[] = $value;
		}



		$sql .= implode(', ', $value_list) . PHP_EOL . ');';


		return $sql;
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

	public function get_id()
	{
		return $this->database->insert_id();
	}
}