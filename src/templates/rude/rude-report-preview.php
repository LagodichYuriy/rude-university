<?
	namespace rude;

	require_once 'report/rude-report-header.php';
	require_once 'report/rude-report-calendar.php';
	require_once 'report/rude-report-timetable.php';
?>
<html>
	<head>
		<!-- CSS -->
		<link href="src/css/report.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<? report_header::html() ?>
		<? report_calendar::html() ?>
		<? report_timetable::html() ?>
	</body>
</html>