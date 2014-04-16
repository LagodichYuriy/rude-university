<?

namespace rude;

class ajax_report
{
	public static function add()
	{
		$qualification = qualifications::get(get(RUDE_FIELD_QUALIFICATION));

		$specialty = qualifications::get(get(RUDE_FIELD_SPECIALTY));           // TODO: use another class

		$specialization = qualifications::get(get(RUDE_FIELD_SPECIALIZATION)); // TODO: use another class

		$training_form = training_form::get(get(RUDE_FIELD_TRAINING_FORM));


		$report = new report();

		$report->year                = get(RUDE_FIELD_YEAR);
		$report->duration            = get(RUDE_FIELD_DURATION);
		$report->rector              = get(RUDE_FIELD_RECTOR);
		$report->registration_number = get(RUDE_FIELD_REGISTRATION_NUMBER);
		$report->training_form_id    = $training_form->id;
		$report->qualification_id    = $qualification->id;
		$report->specialty_id        = $specialty->id;
		$report->specialization_id   = $specialization->id;
		$report->calendar            = get(RUDE_FIELD_CALENDAR);

		$report_id = reports::add($report);

		echo $report_id;
	}

	public static function edit()
	{
		$id = (int) get(RUDE_FIELD_ID);

		$qualification = qualifications::get(get(RUDE_FIELD_QUALIFICATION));

		$specialty = qualifications::get(get(RUDE_FIELD_SPECIALTY));           // TODO: use another class

		$specialization = qualifications::get(get(RUDE_FIELD_SPECIALIZATION)); // TODO: use another class

		$training_form = training_form::get(get(RUDE_FIELD_TRAINING_FORM));


		$report = new report();

		$report->id                  = $id;

		$report->year                = get(RUDE_FIELD_YEAR);
		$report->duration            = get(RUDE_FIELD_DURATION);
		$report->rector              = get(RUDE_FIELD_RECTOR);
		$report->registration_number = get(RUDE_FIELD_REGISTRATION_NUMBER);
		$report->training_form_id    = $training_form->id;
		$report->qualification_id    = $qualification->id;
		$report->specialty_id        = $specialty->id;
		$report->specialization_id   = $specialization->id;
		$report->calendar            = get(RUDE_FIELD_CALENDAR);

		reports::update($report);
	}
}