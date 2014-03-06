<?

namespace rude;

class session
{
	public static function init()
	{
		if (!defined('RUDE_AUTH')) die('DIRTY ACCESS ):');


		session_start();


		if (!empty($_SESSION[RUDE_FIELD_USERNAME]) &&
			!empty($_SESSION[RUDE_FIELD_PASSWORD]) &&
			!empty($_SESSION[RUDE_FIELD_ROLE]))
		{
			return true;
		}


		$username = get(RUDE_FIELD_USERNAME);
		$password = get(RUDE_FIELD_PASSWORD);

		if (!$username || !$password)
		{
			return false;
		}


		$query = new query(RUDE_TABLE_USERS);
		$query->where(RUDE_FIELD_USERNAME, $username);
		$query->start();

		$user = $query->get_object();

		if ($user === null)
		{
			return false;
		}


		if (!crypt::is_equal($password, $user->hash, $user->salt))
		{
			return false;
		}


		$_SESSION[RUDE_FIELD_USERNAME] = $user->username;
		$_SESSION[RUDE_FIELD_PASSWORD] = $user->hash;
		$_SESSION[RUDE_FIELD_ROLE]     = $user->role;


		if (empty($_SESSION[RUDE_FIELD_USERNAME]) or
			empty($_SESSION[RUDE_FIELD_PASSWORD]) or
			empty($_SESSION[RUDE_FIELD_ROLE]))
		{
			return false;
		}

		return true;
	}

	public static function destroy()
	{
		$_SESSION = array();

		if (ini_get("session.use_cookies"))
		{
			$params = session_get_cookie_params();

			setcookie(
				session_name(),
				'',
				time() - 42000,
				$params["path"],
				$params["domain"],
				$params["secure"],
				$params["httponly"]
			);
		}

		session_destroy();
	}
}