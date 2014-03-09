<?

namespace rude;

class users
{
	public static function get($username)
	{
		$q = new query(RUDE_TABLE_USERS);
		$q->join(RUDE_TABLE_ROLES, RUDE_FIELD_ID);
		$q->where(RUDE_FIELD_USERNAME, $username);
		$q->start();

		return $q->get_object();
	}


	public static function get_all()
	{
		$q = new query(RUDE_TABLE_USERS);
		$q->join(RUDE_TABLE_ROLES, RUDE_FIELD_ROLE_ID, RUDE_FIELD_ID);
		$q->start();

		debug($q->sql());

		return $q->get_object_list();
	}

	public static function add($username, $password, $role_id)
	{
		list($hash, $salt) = crypt::struct_password($password);


		$q = new cquery(RUDE_TABLE_USERS);
		$q->add(RUDE_FIELD_USERNAME, $username);
		$q->add(RUDE_FIELD_HASH,     $hash);
		$q->add(RUDE_FIELD_SALT,     $salt);
		$q->add(RUDE_FIELD_ROLE_ID,  $role_id);
		$q->start();


		debug($q->get_id());
//		debug($q->sql());
	}
}