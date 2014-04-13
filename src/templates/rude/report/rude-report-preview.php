<?
	namespace rude;

	require_once 'rude-report-header.php';
	require_once 'rude-report-calendar.php';
	require_once 'rude-report-timetable.php';

	$report = new report();

	$report->year                = get('year');
	$report->duration            = get('duration');
	$report->rector              = get('rector');
	$report->registration_number = get('registration_number');
	$report->training_form       = get('training_form');
	$report->qualification       = get('qualification');
	$report->specialty           = get('specialty');
	$report->specialization      = get('specialization');
	$report->calendar            = get('calendar');
?>
<html>
	<head>
		<!-- CSS -->
		<link href="src/css/report.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<? report_header::html($report) ?>
		<? report_calendar::html($report) ?>
		<? report_timetable::html($report) ?>
	</body>
</html>