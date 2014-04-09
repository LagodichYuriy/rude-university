<?

namespace rude;

class qualifications
{
	public static function get($field = false)
	{
		$q = new query(RUDE_TABLE_QUALIFICATIONS);


		if ($field === false)
		{
			$q->start();

			return $q->get_object_list();
		}


		if (is_int($field))
		{
			$q->where(RUDE_FIELD_ID, $field);
		}
		else if (is_string($field))
		{
			$q->where(RUDE_FIELD_NAME, $field);
		}

		$q->start();


		return $q->get_object();
	}

	public static function add($name)
	{
		$q = new cquery(RUDE_TABLE_QUALIFICATIONS);
		$q->add(RUDE_FIELD_NAME, $name);

		$q->start();

		return $q->get_id();
	}

	public static function delete($name)
	{
		$q = new dquery(RUDE_TABLE_QUALIFICATIONS);
		$q->where(RUDE_FIELD_NAME, $name);
		$q->limit(1);
		$q->start();
	}
}