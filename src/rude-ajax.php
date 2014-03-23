<?

namespace rude;

class ajax
{
	public static function is_auth_valid()
	{
		$username = get(RUDE_FIELD_USERNAME);
		$password = get(RUDE_FIELD_PASSWORD);

		if (!$username or !$password)
		{
			die(RUDE_CODE_WRONG_USERNAME_OR_PASSWORD);
		}


		if (users::is_exists($username, $password))
		{
			if (session::init())
			{
				die(RUDE_CODE_SUCCESS);
			}

			die(RUDE_CODE_FAILED_TO_INIT_SESSION);
		}

		die(RUDE_CODE_USER_IS_NOT_EXISTS);
	}
}