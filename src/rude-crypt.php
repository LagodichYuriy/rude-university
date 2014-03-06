<?

namespace rude;

class crypt
{
	public static function struct_password($password, $salt = false)
	{
		if (!$salt)
		{
			$salt = crypt::struct_salt();
		}

		$hash = md5($password . $salt);

		return array($hash, $salt);
	}

	public static function struct_salt($length = 32)
	{
		$alphabet = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

		$salt  = '';

		for ($i = 0; $i < $length; $i++)
		{
			$salt .= $alphabet[mt_rand(0, strlen($alphabet) - 1)];
		}

		return $salt;
	}

	public static function is_equal($password, $hash, $salt)
	{
		list($tmp_hash, $tmp_salt) = crypt::struct_password($password, $salt);

		if ($tmp_hash === $hash and $tmp_salt === $salt)
		{
			return true;
		}

		return false;
	}
}