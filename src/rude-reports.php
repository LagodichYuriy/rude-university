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
	 * @return int
	 */
	public static function add($report)
	{
		$q = new cquery(RUDE_TABLE_REPORTS);

		$q->add('year',                $report->year);
		$q->add('duration',            $report->duration);
		$q->add('rector',              $report->rector);
		$q->add('registration_number', $report->registration_number);
		$q->add('training_form',       $report->training_form);
		$q->add('qualification',       $report->qualification);
		$q->add('specialty',           $report->specialty);
		$q->add('specialization',      $report->specialization);
		$q->add('calendar',            $report->calendar);
		$q->start();

		return $q->get_id();
	}
}