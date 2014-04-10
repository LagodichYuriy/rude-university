<?

namespace rude;

class reports
{
	public static function get()
	{
		$q = new query(RUDE_TABLE_REPORTS);
		$q->start();

		return $q->get_object_list();
	}

	/**
	 * @param report $report
	 */
	public static function add($report)
	{
//		$report->
	}
}