<?

namespace rude;

class users
{
	/* ================================================================ */
	/* Helps to get user by it's id or username (mixed param supported) */
	/* ================================================================ */
	/* Notes:                                                           */
	/*   1. If `field` var is not provided => select all existing users */
	/* ================================================================ */
	public static function get($field = false)
	{
		$q = new query(RUDE_TABLE_USERS);
		$q->join(RUDE_TABLE_ROLES, RUDE_FIELD_ROLE_ID, RUDE_FIELD_ID);

		if ($field === false)
		{
			$q->start();

			return $q->get_object_list();
		}


		if (is_int($field))
		{
			$q->where(RUDE_FIELD_ID, $field);
		}
		else if (is_string($field))
		{
			$q->where(RUDE_FIELD_USERNAME, $field);
		}

		$q->start();


		return $q->get_object();
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

		return $q->get_id();
	}

	public static function delete($username)
	{
		$q = new dquery(RUDE_TABLE_USERS);
		$q->where(RUDE_FIELD_USERNAME, $username);
		$q->limit(1);
		$q->start();
	}

	public static function is_exists($username, $password)
	{
		$user = users::get($username);

		if ($user == null)
		{
			return false;
		}


		list($hash, $salt) = crypt::struct_password($password, $user->salt);

		if ($hash == $user->hash and $salt == $user->salt)
		{
			return true;
		}

		return false;
	}
}