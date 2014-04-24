<?

namespace rude;

require_once 'rude-report-lang.php';

class report_timetable
{
	public static function html($report)
	{
		?>
		<table class="border font-10 full-width">
			<tr>
				<td rowspan="4">
					<?= RUDE_REPORT_TABLE_NO ?>
					<nobr>
						<?= RUDE_REPORT_TABLE_NO_PP ?>
					</nobr>
				</td>
				<td rowspan="4"><?= RUDE_REPORT_TABLE_CYCLE_NAME ?></td>
				<td rowspan="4" class="relative bottom"><? new image(RUDE_REPORT_TABLE_DEPARTMENT) ?></td>

				<td rowspan="1" colspan="9"><div class="nowrap"><?= RUDE_REPORT_TABLE_ACADEMIC_HOURS ?></div></td>
				<td rowspan="1" colspan="31"><div class="nowrap"><?= RUDE_REPORT_TABLE_DISTRIBUTION ?></div></td>
			</tr>

			<tr>
				<td rowspan="3" class="relative column bottom"><? new image(RUDE_REPORT_TABLE_EXAMS)                  ?></td>
				<td rowspan="3" class="relative column bottom"><? new image(RUDE_REPORT_TABLE_CREDITS)                ?></td>
				<td rowspan="3" class="relative column bottom"><? new image(RUDE_REPORT_TABLE_MODEL_CALCULATIONS)     ?></td>
				<td rowspan="3" class="relative column bottom"><? new image(RUDE_REPORT_TABLE_TOTAL)                  ?></td>
				<td rowspan="3" class="relative column bottom"><? new image(RUDE_REPORT_TABLE_CLASSROOM_FULL_TIME)    ?></td>
				<td rowspan="3" class="relative column bottom"><? new image(RUDE_REPORT_TABLE_CLASSROOM_EVENING_TIME) ?></td>

				<td colspan="3" class="tiny"><?= RUDE_REPORT_TABLE_OF_THEM ?></td>

				<td colspan="6" class="tiny">I <?= RUDE_REPORT_TABLE_YEAR ?></td>
				<td colspan="6" class="tiny">II <?= RUDE_REPORT_TABLE_YEAR ?></td>
				<td colspan="6" class="tiny">III <?= RUDE_REPORT_TABLE_YEAR ?></td>
				<td colspan="6" class="tiny">IV <?= RUDE_REPORT_TABLE_YEAR ?></td>
				<td colspan="6" class="tiny">V <?= RUDE_REPORT_TABLE_YEAR ?></td>

				<td rowspan="3" class="relative column bottom"><? new image(RUDE_REPORT_TABLE_FINAL_CREDITS) ?></td>
			</tr>

			<tr>
				<td rowspan="2" class="relative bottom"><? new image(RUDE_REPORT_TABLE_LECTURES) ?></td>
				<td rowspan="2" class="relative bottom"><? new image(RUDE_REPORT_TABLE_LABS) ?></td>
				<td rowspan="2" class="relative bottom"><? new image(RUDE_REPORT_TABLE_SEMINARS) ?></td>

				<td colspan="3" class="tiny"><div class="nowrap">I <?= RUDE_REPORT_TABLE_TOTAL_SEMESTER ?></div><div class="nowrap">17 <?= RUDE_REPORT_TABLE_TOTAL_WEEKS ?></div></td>
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
				<? report_timetable::html_td_total() ?>
				<? report_timetable::html_td_total() ?>
				<? report_timetable::html_td_total() ?>
				<? report_timetable::html_td_total() ?>
				<? report_timetable::html_td_total() ?>
				<? report_timetable::html_td_total() ?>
				<? report_timetable::html_td_total() ?>
				<? report_timetable::html_td_total() ?>
				<? report_timetable::html_td_total() ?>
				<? report_timetable::html_td_total() ?>
			</tr>

			<tr>
				<? report_timetable::html_td_loop(1, 43); ?>
			</tr>

			<?
				$timetable_rows = explode('~', $report->timetable);

				foreach ($timetable_rows as $timetable_row)
				{
					?>
					<tr>
					<?
						$timetable_cols = explode(',', $timetable_row);

						foreach ($timetable_cols as $timetable_col)
						{
							?><td><?= $timetable_col ?></td><?
						}
					?>
					</tr>
					<?
				}
			?>
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
		<td class="relative bottom"><? new image(RUDE_REPORT_TABLE_TOTAL_HOURS) ?></td>
		<td class="relative bottom"><? new image(RUDE_REPORT_TABLE_TOTAL_CLASSROOM_HOURS) ?></td>
		<td class="relative bottom"><? new image(RUDE_REPORT_TABLE_TOTAL_CREDITS) ?></td>
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