<?

namespace rude;

class html
{
	public static function input($id, $label = false, $type = RUDE_HTML_INPUT_TYPE_TEXT)
	{
		$result = '';

		if ($label !== false)
		{
			$result .= '<label for="' . $id . '">' . $label . '</label>';
		}

		$result = '<input type="' . $type . '" name="' . $id . '" id="' . $id . '" />';


		return $result;
	}
}