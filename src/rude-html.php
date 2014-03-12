<?

namespace rude;

class html
{
	public static function input($selector, $label = false, $value = false, $type = RUDE_HTML_INPUT_TYPE_TEXT, $title = false)
	{
		$result = '';

		if ($label !== false)
		{
			$result .= '<label for="' . $selector . '">' . $label . '</label>';
		}

		$result .= '<input ';
		$result .= ' type="' . $type . '"';
		$result .= ' name="' . $selector . '"';
		$result .= ' id="' . $selector . '"';

		if ($value !== false) { $result .= ' value="' . $value . '"'; }

		if ($title !== false) { $result .= ' title="' . $title . '"'; }

		$result .= '/>';


		return $result;
	}

	public static function checkbox($selector, $label = false)
	{
		$result = '<input type="checkbox" id="' . $selector . '" name="' . $selector . '">';

		if ($label !== false)
		{
			$result .= '<label for="' . $selector . '" class="label-checkbox">' . $label . '</label>';
		}


		return $result;
	}

	public static function select($id, $item_list, $label = false, $default = false)
	{
		$result = '';

		if ($label !== false)
		{
			$result .= '<label for="' . $id . '">' . $label . '</label>';
		}


		$result .= '<select name="' . $id . '" id="' . $id . '">';

		foreach ($item_list as $item)
		{
			$result .= '<option';

			if ($default !== false && $default == $item)
			{
				$result .= ' selected ';
			}

			$result .= '>';
			$result .= $item;
			$result .= '</option>';
		}

		$result .= '</select>';


		return $result;
	}

	public static function button($value, $onclick = false)
	{
		$result  = '<button';
		$result .= ' type="submit"';

		if ($onclick !== false)
		{
			$result .= ' onclick="' . $onclick . '"';
		}

		$result .= '>' . $value . '</button>';


		return $result;
	}

	public static function hidden($message)
	{
		return '<div class="hidden">' . $message . '</div>';
	}
}