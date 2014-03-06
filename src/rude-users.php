<?

namespace rude;

class users
{
	public static function get()
	{
		$q = new query(RUDE_TABLE_USERS);
		$q->join(RUDE_TABLE_ROLES, 'id');
		$q->start();

		return $q->get_object_list();
	}

	public static function add($username, $password, $role_id)
	{

	}
}