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

	public static function get_id($role_name)
	{
		$roles = roles::get();

		foreach ($roles as $role)
		{
			if ($role->role == $role_name)
			{
				return $role->id;
			}
		}

		return null;
	}
}