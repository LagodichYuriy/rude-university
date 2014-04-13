<?

namespace rude;

class spell
{
	public static function years($num) // `срок обучения составляет $num лет`
	{
		switch ($num)
		{
			case 1:
				return 'год';
				break;

			case 2:
			case 3:
			case 4:
				return 'года';
				break;

			default:
				return 'лет';
				break;
		}
	}
}