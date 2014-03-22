<?

namespace rude;

class faculties
{
	public static function get()
	{
		$q = new query(RUDE_TABLE_FACULTIES);
		$q->start();

		return $q->get_object_list();
	}

	public static function add($name, $shortname)
	{
		$q = new cquery(RUDE_TABLE_FACULTIES);
		$q->add(RUDE_FIELD_NAME, $name);
		$q->add(RUDE_FIELD_SHORTNAME, $shortname);
		$q->start();

		return $q->get_id();
	}
}