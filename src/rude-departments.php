<?

namespace rude;

class departments
{
	public static function get()
	{
		$q = new query(RUDE_TABLE_DEPARTMENTS);
		$q->start();

		return $q->get_object_list();
	}

	public static function add($name)
	{
		$q = new cquery(RUDE_TABLE_FACULTIES);
		$q->add(RUDE_FIELD_NAME, $name);
		$q->start();

		return $q->get_id();
	}
}