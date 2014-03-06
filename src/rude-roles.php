<?

namespace rude;

class roles
{
	public static function get()
	{
		$q = new query(RUDE_TABLE_ROLES);
		$q->start();

		return $q->get_object_list();
	}
}