<?

namespace rude;

class report
{
	public $id                  = ''; // id из БД
	public $year                = ''; // год набора
	public $duration            = ''; // протяжённость обучения
	public $rector              = ''; // ФИО ректора
	public $registration_number = ''; // гегистрационный номер плана
	public $training_form       = ''; // форма обучения
	public $training_form_id    = ''; // форма обучения (id)
	public $qualification       = ''; // квалификация
	public $qualification_id    = ''; // квалификация (id)
	public $specialty           = ''; // специальность
	public $specialty_id        = ''; // специальность (id)
	public $specialization      = ''; // специализация
	public $specialization_id   = ''; // специализация (id)
	public $calendar            = ''; // календарь

	public function load($report_id)
	{
		$report = reports::get((int) $report_id);

		$this->id                  = $report->id;
		$this->year                = $report->year;
		$this->duration            = $report->duration;
		$this->rector              = $report->rector;
		$this->registration_number = $report->registration_number;
		$this->training_form       = $report->training_form;
		$this->training_form_id    = $report->training_form_id;
		$this->qualification       = $report->qualification;
		$this->qualification_id    = $report->qualification_id;
		$this->specialty           = $report->specialty;
		$this->specialty_id        = $report->specialty_id;
		$this->specialization      = $report->specialization;
		$this->specialization_id   = $report->specialization_id;
		$this->calendar            = $report->calendar;
	}
}