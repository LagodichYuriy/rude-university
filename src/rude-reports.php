<?

namespace rude;

class reports
{
	public static function get($report_id = false)
	{
		$where = '1 = 1';
		$limit = '';

		if ($report_id !== false)
		{
			$where = "reports." . RUDE_FIELD_ID . " = " . (int) $report_id;
			$limit = "LIMIT 1";
		}


		$database = new database();

		$q = '
			SELECT
				reports.*,
				training_form.name  AS training_form,
				qualification.name  AS qualification,
				specialty.name      AS specialty,
				specialization.name AS specialization

			FROM
				' . RUDE_TABLE_REPORTS . ' AS reports

			LEFT JOIN
				' . RUDE_TABLE_TRAINING_FORM . ' as training_form ON reports.training_form_id = training_form.id
			LEFT JOIN
				' . RUDE_TABLE_QUALIFICATIONS . ' as qualification ON reports.qualification_id = qualification.id
			LEFT JOIN
				' . RUDE_TABLE_QUALIFICATIONS . ' as specialty ON reports.specialty_id = specialty.id
			LEFT JOIN
				' . RUDE_TABLE_QUALIFICATIONS . ' as specialization ON reports.specialization_id = specialization.id

			WHERE
				' . $where . '

			' . $limit;

		$database->query($q);


		if ($report_id !== false)
		{
			return $database->get_object();
		}

		return $database->get_object_list();
	}

	/**
	 * @param report $report
	 * @return int
	 */
	public static function add($report)
	{
		$q = new cquery(RUDE_TABLE_REPORTS);

		$q->add(RUDE_FIELD_YEAR,                $report->year);
		$q->add(RUDE_FIELD_DURATION,            $report->duration);
		$q->add(RUDE_FIELD_RECTOR,              $report->rector);
		$q->add(RUDE_FIELD_REGISTRATION_NUMBER, $report->registration_number);
		$q->add(RUDE_FIELD_TRAINING_FORM_ID,    $report->training_form_id);
		$q->add(RUDE_FIELD_QUALIFICATION_ID,    $report->qualification_id);
		$q->add(RUDE_FIELD_SPECIALTY_ID,        $report->specialty_id);
		$q->add(RUDE_FIELD_SPECIALIZATION_ID,   $report->specialization_id);
		$q->add(RUDE_FIELD_CALENDAR,            $report->calendar);

		$q->start();

		return $q->get_id();
	}

	/**
	 * @param report $report
	 */
	public static function update($report)
	{
		$q = new uquery(RUDE_TABLE_REPORTS);

		$q->update(RUDE_FIELD_YEAR,                $report->year);
		$q->update(RUDE_FIELD_DURATION,            $report->duration);
		$q->update(RUDE_FIELD_RECTOR,              $report->rector);
		$q->update(RUDE_FIELD_REGISTRATION_NUMBER, $report->registration_number);
		$q->update(RUDE_FIELD_TRAINING_FORM_ID,    $report->training_form_id);
		$q->update(RUDE_FIELD_QUALIFICATION_ID,    $report->qualification_id);
		$q->update(RUDE_FIELD_SPECIALTY_ID,        $report->specialty_id);
		$q->update(RUDE_FIELD_SPECIALIZATION_ID,   $report->specialization_id);
		$q->update(RUDE_FIELD_CALENDAR,            $report->calendar);

		$q->where(RUDE_FIELD_ID, (int) $report->id);

		debug($q->sql());

		$q->start();
	}
}