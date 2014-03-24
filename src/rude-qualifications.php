<?

namespace rude;

class qualifications
{
	public static function get()
	{
		$q = new query(RUDE_TABLE_QUALIFICATIONS);
		$q->start();

		return $q->get_object_list();
	}
}