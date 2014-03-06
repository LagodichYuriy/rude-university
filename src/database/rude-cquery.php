<?

namespace rude;

class cquery extends query
{
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
}