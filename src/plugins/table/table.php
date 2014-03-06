<?

namespace rude;

require_once 'lang.php';

class table
{
	public function html()
	{
		?>
		<table>
			<tr>
				<td rowspan="4"><?= RUDE_PLUGIN_TABLE_NO ?></td>
				<td rowspan="4"><?= RUDE_PLUGIN_TABLE_CYCLE_NAME ?></td>
				<td rowspan="4" class="relative small"><div class="rotate_270"><?= RUDE_PLUGIN_TABLE_DEPARTMENT ?></div></td>

				<td rowspan="1" colspan="9"><div class="nowrap"><?= RUDE_PLUGIN_TABLE_ACADEMIC_HOURS ?></div></td>
				<td rowspan="1" colspan="31"><div class="nowrap"><?= RUDE_PLUGIN_TABLE_DISTRIBUTION ?></div></td>
			</tr>

			<tr>
				<td rowspan="3" class="relative small column"><div class="rotate_270"><?= RUDE_PLUGIN_TABLE_EXAMS ?></div></td>
				<td rowspan="3" class="relative small column"><div class="rotate_270"><?= RUDE_PLUGIN_TABLE_CREADITS ?></div></td>
				<td rowspan="3" class="relative small column"><div class="rotate_270"><?= RUDE_PLUGIN_TABLE_MODEL_CALCULATIONS ?></div></td>
				<td rowspan="3" class="relative small column"><div class="rotate_270"><?= RUDE_PLUGIN_TABLE_TOTAL ?></div></td>
				<td rowspan="3" class="relative small column"><div class="rotate_270"><?= RUDE_PLUGIN_TABLE_CLASSROOM_FULL_TIME ?></div></td>
				<td rowspan="3" class="relative small column"><div class="rotate_270"><?= RUDE_PLUGIN_TABLE_CLASSROOM_EVENING_TIME ?></div></td>

				<td colspan="3" class="tiny"><?= RUDE_PLUGIN_TABLE_OF_THEM ?></td>

				<td colspan="6" class="tiny">I <?= RUDE_PLUGIN_TABLE_YEAR ?></td>
				<td colspan="6" class="tiny">II <?= RUDE_PLUGIN_TABLE_YEAR ?></td>
				<td colspan="6" class="tiny">III <?= RUDE_PLUGIN_TABLE_YEAR ?></td>
				<td colspan="6" class="tiny">IV <?= RUDE_PLUGIN_TABLE_YEAR ?></td>
				<td colspan="6" class="tiny">V <?= RUDE_PLUGIN_TABLE_YEAR ?></td>

				<td rowspan="3" class="relative small column"><div class="rotate_270 last_column bold"><?= RUDE_PLUGIN_TABLE_FINAL_CREDITS ?></div></td>
			</tr>

			<tr>
				<td rowspan="2" class="relative small"><div class="rotate_270"><?= RUDE_PLUGIN_TABLE_LECTURES ?></div></td>
				<td rowspan="2" class="relative small"><div class="rotate_270"><?= RUDE_PLUGIN_TABLE_LABS ?></div></td>
				<td rowspan="2" class="relative small"><div class="rotate_270"><?= RUDE_PLUGIN_TABLE_SEMINARS ?></div></td>

				<td colspan="3" class="tiny"><div class="nowrap">I <?= RUDE_PLUGIN_TABLE_TOTAL_SEMESTER ?></div><div class="nowrap">17<?= RUDE_PLUGIN_TABLE_TOTAL_WEEKS ?></div></td>
				<td colspan="3" class="tiny"><div class="nowrap">II <?= RUDE_PLUGIN_TABLE_TOTAL_SEMESTER ?></div><div class="nowrap">17 <?= RUDE_PLUGIN_TABLE_TOTAL_WEEKS ?></div></td>
				<td colspan="3" class="tiny"><div class="nowrap">III <?= RUDE_PLUGIN_TABLE_TOTAL_SEMESTER ?></div><div class="nowrap">17 <?= RUDE_PLUGIN_TABLE_TOTAL_WEEKS ?></div></td>
				<td colspan="3" class="tiny"><div class="nowrap">IV <?= RUDE_PLUGIN_TABLE_TOTAL_SEMESTER ?></div><div class="nowrap">17 <?= RUDE_PLUGIN_TABLE_TOTAL_WEEKS ?></div></td>
				<td colspan="3" class="tiny"><div class="nowrap">V <?= RUDE_PLUGIN_TABLE_TOTAL_SEMESTER ?></div><div class="nowrap">17 <?= RUDE_PLUGIN_TABLE_TOTAL_WEEKS ?></div></td>
				<td colspan="3" class="tiny"><div class="nowrap">VI <?= RUDE_PLUGIN_TABLE_TOTAL_SEMESTER ?></div><div class="nowrap">17 <?= RUDE_PLUGIN_TABLE_TOTAL_WEEKS ?></div></td>
				<td colspan="3" class="tiny"><div class="nowrap">VII <?= RUDE_PLUGIN_TABLE_TOTAL_SEMESTER ?></div><div class="nowrap">16 <?= RUDE_PLUGIN_TABLE_TOTAL_WEEKS ?></div></td>
				<td colspan="3" class="tiny"><div class="nowrap">VIII <?= RUDE_PLUGIN_TABLE_TOTAL_SEMESTER ?></div><div class="nowrap">16 <?= RUDE_PLUGIN_TABLE_TOTAL_WEEKS ?></div></td>
				<td colspan="3" class="tiny"><div class="nowrap">IX <?= RUDE_PLUGIN_TABLE_TOTAL_SEMESTER ?></div><div class="nowrap">16 <?= RUDE_PLUGIN_TABLE_TOTAL_WEEKS ?></div></td>
				<td colspan="3" class="tiny"><div class="nowrap">X <?= RUDE_PLUGIN_TABLE_TOTAL_SEMESTER ?></div><div class="nowrap">7 <?= RUDE_PLUGIN_TABLE_TOTAL_WEEKS ?></div></td>
			</tr>
			<tr>
				<? $this->html_td_total() ?>
				<? $this->html_td_total() ?>
				<? $this->html_td_total() ?>
				<? $this->html_td_total() ?>
				<? $this->html_td_total() ?>
				<? $this->html_td_total() ?>
				<? $this->html_td_total() ?>
				<? $this->html_td_total() ?>
				<? $this->html_td_total() ?>
				<? $this->html_td_total() ?>
			</tr>

			<tr>
				<? $this->html_td_loop(1, 43); ?>
			</tr>

			<tr>
				<? $this->html_td_empty(1) ?>
				<td>Цикл социально­гуманитарных дисциплин</td>
				<? $this->html_td_empty(41) ?>
			</tr>
		</table>
		<?
	}

	public function html_td_empty($count)
	{
		for ($i = 0; $i < $count; $i++)
		{
			?><td></td><?
		}
	}

	public function html_td_total()
	{
		?>
		<td class="relative small short"><div class="rotate_270"><?= RUDE_PLUGIN_TABLE_TOTAL_HOURS ?></div></td>
		<td class="relative small short"><div class="rotate_270"><?= RUDE_PLUGIN_TABLE_TOTAL_CLASSROOM_HOURS ?></div></td>
		<td class="relative small short"><div class="rotate_270"><?= RUDE_PLUGIN_TABLE_TOTAL_CREDITS ?></div></td>
		<?
	}

	public function html_td_loop($from, $to)
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