<?
	namespace rude;

	require_once 'report/rude-report-header.php';
	require_once 'report/rude-report-timetable.php';
?>
<html>
	<head>
		<!-- CSS -->
		<link href="src/css/report.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<? rude_report_header::html() ?>

		<? rude_report_timetable::html() ?>
	</body>
</html>