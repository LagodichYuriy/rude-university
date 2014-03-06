<?

namespace rude\structs;

use rude\cquery;

class user
{
	public $id;
	public $username;
	public $password;
	public $salt;

	public function __construct($id, $username, $password, $salt)
	{
		$this->id = $id;
		$this->username = $username;
		$this->password = $password;
		$this->salt = $salt;
	}

	public function load($id)
	{

	}

	public function add()
	{

	}
}