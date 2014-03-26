<?

namespace rude;

class classes
{
	public static function get()
	{
		$q = new query(RUDE_TABLE_CLASSES);
		$q->start();

		return $q->get_object_list();
	}
}
