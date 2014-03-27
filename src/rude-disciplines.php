<?

namespace rude;

class disciplines
{
	public static function get()
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

	public static function get_types()
	{
		$q = new query(RUDE_TABLE_DISCIPLINES_TYPES);
		$q->start();

		return $q->get_object_list();
	}
}