<?

namespace rude;

class disciplines
{
	public static function get($field = false)
	{
        $q = new query(RUDE_TABLE_DISCIPLINES);

        if ($field === false)
        {
            $database = new database();

            $q = "
			SELECT
				" . RUDE_TABLE_DISCIPLINES       . ".*,
				" . RUDE_TABLE_DISCIPLINES_TYPES . ".name AS " . RUDE_FIELD_NAME_TYPE_NAME . "
			FROM
				" . RUDE_TABLE_DISCIPLINES       . ",
				" . RUDE_TABLE_DISCIPLINES_TYPES . "
			WHERE
				1 = 1
		";

            $database->query($q);

            return $database->get_object_list();
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

	public static function get_types()
	{
		$q = new query(RUDE_TABLE_DISCIPLINES_TYPES);
		$q->start();

		return $q->get_object_list();
	}

    public static function add($name, $type_id)
    {
        $q = new cquery(RUDE_TABLE_USERS);
        $q->add(RUDE_FIELD_NAME, $name);
        $q->add(RUDE_FIELD_NAME_TYPE_ID,  $type_id);
        $q->start();

        return $q->get_id();
    }

    public static function delete($name)
    {
        $q = new dquery(RUDE_TABLE_DISCIPLINES);
        $q->where(RUDE_FIELD_NAME, $name);
        $q->limit(1);
        $q->start();
    }

    public static function get_type_by_id($type_name)
    {
        $types = disciplines::get_types();

        foreach ($types as $type)
        {
            if ($type->role == $type_name)
            {
                return $type->id;
            }
        }

        return null;
    }
}