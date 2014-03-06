<?

namespace rude;

class select
{
	public static function fields($item_list, $item_field)
	{
		$result = array();

		foreach ($item_list as $item)
		{
			if (isset($item->$item_field))
			{
				$result[] = $item->$item_field;
			}
		}

		return $result;
	}
}