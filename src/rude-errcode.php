<?

namespace rude;

class errcode
{
	public function __construct($err_title, $err_explain)
	{
		if (RUDE_ERR_SHOW_MESSAGES)
		{
			debug($err_title);
			debug($err_explain);
		}
	}
}