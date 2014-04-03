<?

namespace rude;

require_once 'rude-report-lang.php';

class rude_report_timetable
{
	public static function html()
	{
		$image = new image(RUDE_REPORT_TABLE_FINAL_CREDITS, 130, 20);

		debug($image, true);

		?>
		<table class="border">
			<tr>
				<td rowspan="4"><?= RUDE_REPORT_TABLE_NO ?></td>
				<td rowspan="4"><?= RUDE_REPORT_TABLE_CYCLE_NAME ?></td>
				<td rowspan="4" class="relative small"><div class="rotate_270"><?= RUDE_REPORT_TABLE_DEPARTMENT ?></div></td>

				<td rowspan="1" colspan="9"><div class="nowrap"><?= RUDE_REPORT_TABLE_ACADEMIC_HOURS ?></div></td>
				<td rowspan="1" colspan="31"><div class="nowrap"><?= RUDE_REPORT_TABLE_DISTRIBUTION ?></div></td>
			</tr>

			<tr>
				<td rowspan="3" class="relative small column"><div class="rotate_270"><?= RUDE_REPORT_TABLE_EXAMS ?></div></td>
				<td rowspan="3" class="relative small column"><div class="rotate_270"><?= RUDE_REPORT_TABLE_CREADITS ?></div></td>
				<td rowspan="3" class="relative small column"><div class="rotate_270"><?= RUDE_REPORT_TABLE_MODEL_CALCULATIONS ?></div></td>
				<td rowspan="3" class="relative small column"><div class="rotate_270"><?= RUDE_REPORT_TABLE_TOTAL ?></div></td>
				<td rowspan="3" class="relative small column"><div class="rotate_270"><?= RUDE_REPORT_TABLE_CLASSROOM_FULL_TIME ?></div></td>
				<td rowspan="3" class="relative small column"><div class="rotate_270"><?= RUDE_REPORT_TABLE_CLASSROOM_EVENING_TIME ?></div></td>

				<td colspan="3" class="tiny"><?= RUDE_REPORT_TABLE_OF_THEM ?></td>

				<td colspan="6" class="tiny">I <?= RUDE_REPORT_TABLE_YEAR ?></td>
				<td colspan="6" class="tiny">II <?= RUDE_REPORT_TABLE_YEAR ?></td>
				<td colspan="6" class="tiny">III <?= RUDE_REPORT_TABLE_YEAR ?></td>
				<td colspan="6" class="tiny">IV <?= RUDE_REPORT_TABLE_YEAR ?></td>
				<td colspan="6" class="tiny">V <?= RUDE_REPORT_TABLE_YEAR ?></td>

				<td rowspan="3" class="relative small column"><div class="rotate_270 last_column bold"><?= RUDE_REPORT_TABLE_FINAL_CREDITS ?></div></td>
			</tr>

			<tr>
				<td rowspan="2" class="relative small"><div class="rotate_270"><?= RUDE_REPORT_TABLE_LECTURES ?></div></td>
				<td rowspan="2" class="relative small"><div class="rotate_270"><?= RUDE_REPORT_TABLE_LABS ?></div></td>
				<td rowspan="2" class="relative small"><div class="rotate_270"><?= RUDE_REPORT_TABLE_SEMINARS ?></div></td>

				<td colspan="3" class="tiny"><div class="nowrap">I <?= RUDE_REPORT_TABLE_TOTAL_SEMESTER ?></div><div class="nowrap">17<?= RUDE_REPORT_TABLE_TOTAL_WEEKS ?></div></td>
				<td colspan="3" class="tiny"><div class="nowrap">II <?= RUDE_REPORT_TABLE_TOTAL_SEMESTER ?></div><div class="nowrap">17 <?= RUDE_REPORT_TABLE_TOTAL_WEEKS ?></div></td>
				<td colspan="3" class="tiny"><div class="nowrap">III <?= RUDE_REPORT_TABLE_TOTAL_SEMESTER ?></div><div class="nowrap">17 <?= RUDE_REPORT_TABLE_TOTAL_WEEKS ?></div></td>
				<td colspan="3" class="tiny"><div class="nowrap">IV <?= RUDE_REPORT_TABLE_TOTAL_SEMESTER ?></div><div class="nowrap">17 <?= RUDE_REPORT_TABLE_TOTAL_WEEKS ?></div></td>
				<td colspan="3" class="tiny"><div class="nowrap">V <?= RUDE_REPORT_TABLE_TOTAL_SEMESTER ?></div><div class="nowrap">17 <?= RUDE_REPORT_TABLE_TOTAL_WEEKS ?></div></td>
				<td colspan="3" class="tiny"><div class="nowrap">VI <?= RUDE_REPORT_TABLE_TOTAL_SEMESTER ?></div><div class="nowrap">17 <?= RUDE_REPORT_TABLE_TOTAL_WEEKS ?></div></td>
				<td colspan="3" class="tiny"><div class="nowrap">VII <?= RUDE_REPORT_TABLE_TOTAL_SEMESTER ?></div><div class="nowrap">16 <?= RUDE_REPORT_TABLE_TOTAL_WEEKS ?></div></td>
				<td colspan="3" class="tiny"><div class="nowrap">VIII <?= RUDE_REPORT_TABLE_TOTAL_SEMESTER ?></div><div class="nowrap">16 <?= RUDE_REPORT_TABLE_TOTAL_WEEKS ?></div></td>
				<td colspan="3" class="tiny"><div class="nowrap">IX <?= RUDE_REPORT_TABLE_TOTAL_SEMESTER ?></div><div class="nowrap">16 <?= RUDE_REPORT_TABLE_TOTAL_WEEKS ?></div></td>
				<td colspan="3" class="tiny"><div class="nowrap">X <?= RUDE_REPORT_TABLE_TOTAL_SEMESTER ?></div><div class="nowrap">7 <?= RUDE_REPORT_TABLE_TOTAL_WEEKS ?></div></td>
			</tr>
			<tr>
				<? rude_report_timetable::html_td_total() ?>
				<? rude_report_timetable::html_td_total() ?>
				<? rude_report_timetable::html_td_total() ?>
				<? rude_report_timetable::html_td_total() ?>
				<? rude_report_timetable::html_td_total() ?>
				<? rude_report_timetable::html_td_total() ?>
				<? rude_report_timetable::html_td_total() ?>
				<? rude_report_timetable::html_td_total() ?>
				<? rude_report_timetable::html_td_total() ?>
				<? rude_report_timetable::html_td_total() ?>
			</tr>

			<tr>
				<? rude_report_timetable::html_td_loop(1, 43); ?>
			</tr>

			<tr>
				<? rude_report_timetable::html_td_empty(1) ?>
				<td>Цикл социально­гуманитарных дисциплин</td>
				<? rude_report_timetable::html_td_empty(41) ?>
			</tr>
		</table>
	<?
	}

	public static function html_td_empty($count)
	{
		for ($i = 0; $i < $count; $i++)
		{
			?><td></td><?
		}
	}

	public static function html_td_total()
	{
		?>
		<td class="relative small short"><div class="rotate_270"><?= RUDE_REPORT_TABLE_TOTAL_HOURS ?></div></td>
		<td class="relative small short"><div class="rotate_270"><?= RUDE_REPORT_TABLE_TOTAL_CLASSROOM_HOURS ?></div></td>
		<td class="relative small short"><div class="rotate_270"><?= RUDE_REPORT_TABLE_TOTAL_CREDITS ?></div></td>
	<?
	}

	public static function html_td_loop($from, $to)
	{
		if ($to < $from)
		{
			return;
		}

		for ($i = $from; $i <= $to; $i++)
		{
			?><td class="bold"><?= $i ?></td><?
		}
	}
}