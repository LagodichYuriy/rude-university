<?
	namespace rude;

	require_once 'report/rude-report-lang.php';


	switch (get(RUDE_TARGET))
	{
		case RUDE_TARGET_ADD:
		case RUDE_TARGET_EDIT:
			require_once 'report/rude-report-form.php';
			break;

		default:
			require_once 'report/rude-report-summary.php';
			break;
	}