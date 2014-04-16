<?

namespace rude;

class training_form
{
	public static function get($field = false)
	{
		$q = new query(RUDE_TABLE_TRAINING_FORM);


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
}
