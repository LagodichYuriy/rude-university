<? namespace rude; ?>

<?
	$report = new report();

	$target = get(RUDE_TARGET);
	$report_id = get(RUDE_FIELD_ID);

	switch ($target)
	{
		case RUDE_TARGET_EDIT:
			$report->load($report_id);
			break;

		default:
			break;
	}

//
//	$disciplines = disciplines::get();
//
//	$name_list = null;
//	$type_list = null;
//
//	foreach ($disciplines as $discipline)
//	{
//		if ($discipline->name)
//		{
//			$name_list[] = $discipline->name;
//		}
//
//		if ($discipline->type_name)
//		{
//			$type_list[] = $discipline->type_name;
//		}
//	}
//
//	$name_list = array_values(array_unique($name_list));
//	$type_list = array_values(array_unique($type_list));
//
//	$module_list = array_merge($name_list, $type_list);
?>
	<input id="report_id" name="report_id" type="hidden" value="<? if ($report_id) { echo $report_id; } ?>" />

	<div class="middle">
	<div class="middle-item full-width">

	<div class="ui fluid form segment">
	<div class="three fields">
		<div class="field">
			<label>Год набора</label>
			<input id="year" name="year" placeholder="<?= timestamp::current_year(); ?>" type="text" value="<?= $report->year ?>">
		</div>
		<div class="field">
			<label>Срок обучения (лет)</label>
			<input id="duration" name="duration" placeholder="4" type="text" value="<?= $report->duration ?>">
		</div>
		<div class="field">
			<label>ФИО ректора</label>
			<input id="rector" name="rector" placeholder="М.П. Батура" type="text" value="<?= $report->rector ?>">
		</div>
	</div>

	<div class="field">
		<label>Регистрационный номер учебного плана</label>
		<input id="registration_number" name="registration_number" placeholder="<?= timestamp::date() . '/000'; ?>" type="text" value="<?= $report->registration_number ?>">
	</div>

	<div class="field">
		<div class="ui fluid selection dropdown active medium-font">
			<?
				$training_form_list = training_form::get();

				$active = 0;

				foreach ($training_form_list as $training_form)
				{
					if ($report->training_form)
					{
						$active++;

						if ($report->training_form == $training_form->name)
						{
							break;
						}
					}
				}
			?>

			<input type="hidden" id="training_form" name="training_form" <? if ($active) { ?>value="<?= $active ?>"<? } ?>>

			<div class="default text">Форма обучения</div>
			<i class="dropdown icon"></i>

			<div id="training_form_list" class="menu">
				<?
					$current = 0;

					foreach ($training_form_list as $training_form)
					{
						$current++;

						$class = 'item';

						if ($active == $current)
						{
							$class .= ' active';
						}

						?>
							<div class="<?= $class ?>" data-value="<?= $training_form->id ?>"><?= $training_form->name ?></div>
						<?
					}
				?>
			</div>
		</div>
	</div>

	<div class="field">
		<div class="ui fluid selection dropdown active medium-font">
			<?
				$qualification_list = qualifications::get();

				$active = 0;

				foreach ($qualification_list as $qualification)
				{
					if ($report->qualification)
					{
						$active++;

						if ($report->qualification == $qualification->name)
						{
							break;
						}
					}
				}
			?>

			<input type="hidden" id="qualification" name="qualification" <? if ($active) { ?>value="<?= $active ?>"<? } ?>>

			<div class="default text">Квалификация специалиста</div>
			<i class="dropdown icon"></i>

			<div id="qualification_list" class="menu">
				<?
					$current = 0;

					foreach ($qualification_list as $qualification)
					{
						$current++;

						$class = 'item';

						if ($active == $current)
						{
							$class .= ' active';
						}

						?>
							<div class="<?= $class ?>" data-value="<?= $qualification->id ?>"><?= $qualification->name ?></div>
						<?
					}
				?>
			</div>
		</div>
	</div>

	<div class="field">
		<div class="ui fluid selection dropdown active medium-font">
			<?
				$qualification_list = qualifications::get();

				$active = 0;

				foreach ($qualification_list as $qualification)
				{
					if ($report->specialty)
					{
						$active++;

						if ($report->specialty == $qualification->name)
						{
							break;
						}
					}
				}
			?>

			<input type="hidden" id="specialty" name="specialty" <? if ($active) { ?>value="<?= $active ?>"<? } ?>>

			<div class="default text">Специальность</div>
			<i class="dropdown icon"></i>

			<div id="specialty_list" class="menu">
				<?
					$current = 0;

					foreach ($qualification_list as $qualification)
					{
						$current++;

						$class = 'item';

						if ($active == $current)
						{
							$class .= ' active';
						}

						?>
							<div class="<?= $class ?>" data-value="<?= $qualification->id ?>"><?= $qualification->name ?></div>
						<?
					}
				?>
			</div>
		</div>
	</div>

	<div class="field">
		<div class="ui fluid selection dropdown active medium-font">
			<?
				$qualification_list = qualifications::get();

				$active = 0;

				foreach ($qualification_list as $qualification)
				{
					if ($report->specialization)
					{
						$active++;

						if ($report->specialization == $qualification->name)
						{
							break;
						}
					}
				}
			?>

			<input type="hidden" id="specialization" name="specialization" <? if ($active) { ?>value="<?= $active ?>"<? } ?>>

			<div class="default text">Специализация</div>
			<i class="dropdown icon"></i>

			<div id="specialization_list" class="menu">
				<?
					$current = 0;

					foreach ($qualification_list as $qualification)
					{
						$current++;

						$class = 'item';

						if ($active == $current)
						{
							$class .= ' active';
						}

						?>
							<div class="<?= $class ?>" data-value="<?= $qualification->id ?>"><?= $qualification->name ?></div>
						<?
					}
				?>
			</div>
		</div>
	</div>

	<div class="ui accordion full-width">
	<div class="title">
		<i class="dropdown icon"></i>
		Список циклов (компоненты и модули специальности)
	</div>
	<div class="content">
		<? require_once 'rude-report-timetable.php'; ?>

		<table id="module" class="ui table border full-width basic small-font padding-1px align-center min-cell-18">
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
				if (!$timetable_row)
				{
					continue;
				}

				?>
				<tr>
					<?
						$timetable_cols = explode(',', $timetable_row);

						foreach ($timetable_cols as $timetable_col)
						{
							if ($timetable_col === $timetable_cols[0])
							{
								?><td><input type="text" class="first-cell square-cell timetable-0" value="<?= $timetable_col ?>"/></td><?

								continue;
							}

							?><td><input type="text" class="square-cell timetable-0" value="<?= $timetable_col ?>"/></td><?
						}
					?>
				</tr>
			<?
			}
			?>

			<tfoot>
				<tr>
					<td colspan="43" class="no-border height-20"></td>
				</tr>

				<tr>
					<td colspan="2" class="no-border">
						<div class="ui button mini green" onclick="module_add();">Добавить строку</div>
					</td>
				</tr>
			</tfoot>
		</table>
	</div>

	<div class="title">
		<i class="dropdown icon"></i>
		Календарь учебного процесса
	</div>
	<div class="content">
	<table class="ui basic table small-font border no-padding align-center min-cell-18">
	<tr>
		<th rowspan="3">
			<?= string::after_each_char(RUDE_TABLE_TIME_BUDGET_COURSES, RUDE_HTML_NEWLINE) ?>
		</th>

		<th colspan="4">
			<?= RUDE_TABLE_TIME_BUDGET_SEPTEMBER ?>
		</th>

		<th></th>

		<th colspan="3">
			<?= RUDE_TABLE_TIME_BUDGET_OCTOBER ?>
		</th>

		<th></th>

		<th colspan="4">
			<?= RUDE_TABLE_TIME_BUDGET_NOVEMBER ?>
		</th>

		<th colspan="4">
			<?= RUDE_TABLE_TIME_BUDGET_DECEMBER ?>
		</th>

		<th></th>

		<th colspan="3">
			<?= RUDE_TABLE_TIME_BUDGET_JANUARY ?>
		</th>

		<th></th>

		<th colspan="3">
			<?= RUDE_TABLE_TIME_BUDGET_FEBRUARY ?>
		</th>

		<th></th>

		<th colspan="4">
			<?= RUDE_TABLE_TIME_BUDGET_MARCH ?>
		</th>

		<th></th>

		<th colspan="3">
			<?= RUDE_TABLE_TIME_BUDGET_APRIL ?>
		</th>

		<th></th>

		<th colspan="4">
			<?= RUDE_TABLE_TIME_BUDGET_MAY ?>
		</th>
		<th colspan="4">
			<?= RUDE_TABLE_TIME_BUDGET_JUNE ?>
		</th>

		<th></th>

		<th colspan="3">
			<?= RUDE_TABLE_TIME_BUDGET_JULE ?>
		</th>

		<th></th>

		<th colspan="4">
			<?= RUDE_TABLE_TIME_BUDGET_AUGUST ?>
		</th>
	</tr>
	<tr>
		<td>1</td>
		<td>8</td>
		<td>15</td>
		<td>22</td>
		<td>
			<div class="underline">29</div>
			09
		</td>
		<td>6</td>
		<td>13</td>
		<td>20</td>
		<td>
			<div class="underline">27</div>
			10
		</td>
		<td>3</td>
		<td>10</td>
		<td>17</td>
		<td>24</td>
		<td>1</td>
		<td>8</td>
		<td>15</td>
		<td>22</td>
		<td>
			<div class="underline">29</div>
			12
		</td>
		<td>5</td>
		<td>12</td>
		<td>19</td>
		<td>
			<div class="underline">26</div>
			01
		</td>
		<td>2</td>
		<td>9</td>
		<td>16</td>
		<td>
			<div class="underline">23</div>
			02
		</td>
		<td>2</td>
		<td>9</td>
		<td>16</td>
		<td>23</td>
		<td>
			<div class="underline">30</div>
			03
		</td>
		<td>6</td>
		<td>13</td>
		<td>20</td>
		<td>
			<div class="underline">27</div>
			04
		</td>
		<td>4</td>
		<td>11</td>
		<td>18</td>
		<td>25</td>
		<td>1</td>
		<td>8</td>
		<td>15</td>
		<td>22</td>
		<td>
			<div class="underline">29</div>
			06
		</td>
		<td>6</td>
		<td>13</td>
		<td>20</td>
		<td>
			<div class="underline">27</div>
			07
		</td>
		<td>3</td>
		<td>10</td>
		<td>17</td>
		<td>24</td>
	</tr>
	<tr>
		<td>7</td>
		<td>14</td>
		<td>21</td>
		<td>28</td>
		<td>
			<div class="underline">05</div>
			10
		</td>
		<td>12</td>
		<td>19</td>
		<td>26</td>
		<td>
			<div class="underline">02</div>
			11
		</td>
		<td>7</td>
		<td>16</td>
		<td>23</td>
		<td>30</td>
		<td>7</td>
		<td>14</td>
		<td>21</td>
		<td>28</td>
		<td>
			<div class="underline">04</div>
			01
		</td>
		<td>11</td>
		<td>18</td>
		<td>25</td>
		<td>
			<div class="underline">01</div>
			02
		</td>
		<td>8</td>
		<td>15</td>
		<td>22</td>
		<td>
			<div class="underline">01</div>
			03
		</td>
		<td>8</td>
		<td>15</td>
		<td>22</td>
		<td>29</td>
		<td>
			<div class="underline">05</div>
			04
		</td>
		<td>12</td>
		<td>19</td>
		<td>26</td>
		<td>
			<div class="underline">03</div>
			05
		</td>
		<td>10</td>
		<td>17</td>
		<td>24</td>
		<td>31</td>
		<td>7</td>
		<td>14</td>
		<td>21</td>
		<td>28</td>
		<td>
			<div class="underline">05</div>
			07
		</td>
		<td>12</td>
		<td>19</td>
		<td>26</td>
		<td>
			<div class="underline">02</div>
			08
		</td>
		<td>9</td>
		<td>16</td>
		<td>23</td>
		<td>31</td>
	</tr>

	<?
		$rows = array(false, false, false, false);

		if ($report->calendar)
		{
			$rows = explode('~', $report->calendar);
		}
	?>

	<tr>
		<td>I</td>

		<? loop_input_calendar(1, 52, $rows[0]) ?>
	</tr>

	<tr>
		<td>II</td>

		<? loop_input_calendar(2, 52, $rows[1]) ?>
	</tr>

	<tr>
		<td>III</td>

		<? loop_input_calendar(3, 52, $rows[2]) ?>
	</tr>

	<tr>
		<td>IV</td>

		<? loop_input_calendar(4, 52, $rows[3]) ?>
	</tr>
	</table>
	</div>
	</div>

	<div class="clear"></div>

	<div class="field">
		<div class="ui buttons">
			<div class="ui positive button" onclick="form_validate(); report_struct()">Сохранить</div>
			<div class="ui button" onclick="report_preview();">Предпросмотр</div>
		</div>
	</div>
	</div>
	</div>

	<script>
	$('.ui.dropdown').dropdown();

	$('.ui.accordion').accordion();

	function form_validate()
	{
		$('.ui.form').form(
		{
			year: {
				identifier: 'year',
				rules: [
					{
						type: 'empty',
						prompt: 'Пожалуйста, не оставляйте это поле пустым'
					}
				]
			},
			duration: {
				identifier: 'duration',
				rules: [
					{
						type: 'empty',
						prompt: 'Пожалуйста, не оставляйте это поле пустым'
					}
				]
			},
			rector: {
				identifier: 'rector',
				rules: [
					{
						type: 'empty',
						prompt: 'Пожалуйста, не оставляйте это поле пустым'
					}
				]
			},
			training_form: {
				identifier: 'training_form',
				rules: [
					{
						type: 'empty',
						prompt: 'Пожалуйста, не оставляйте это поле пустым'
					}
				]
			},
			qualification: {
				identifier: 'qualification',
				rules: [
					{
						type: 'empty',
						prompt: 'Пожалуйста, не оставляйте это поле пустым'
					}
				]
			},
			specialty: {
				identifier: 'specialty',
				rules: [
					{
						type: 'empty',
						prompt: 'Пожалуйста, не оставляйте это поле пустым'
					}
				]
			},
			specialization: {
				identifier: 'specialization',
				rules: [
					{
						type: 'empty',
						prompt: 'Пожалуйста, не оставляйте это поле пустым'
					}
				]
			}
		},
		{
			onSuccess: function(event)
			{
				report_save();

//				event.preventDefault();
			}
		});

		$('.ui.form').form('validate form');
	}

	function module_validate()
	{
		$('.ui.form').form(
		{
			module: {
				identifier: 'module',
				rules: [
					{
						type: 'empty',
						prompt: 'Пожалуйста, не оставляйте это поле пустым'
					}
				]
			}
		});

		$('.ui.form').form('validate form');
	}


	var module_counter = 0;

	function module_add()
	{
//		module_validate();


		var module = $('#module').html();

		var row = '<tr>';

		row += '<td><input type="text" class="first-cell square-cell timetable-0" value=""/></td>';
//		row += '';

		for (var i = 1; i < 43; i++)
		{
			if (i == 1){
				row += '<td><select type="text" class="square-cell timetable-2" value="">'+
					'<? $disciplines_list = disciplines::get();foreach ($disciplines_list as $disciplines){?>'+
					'<option>'+'<?=$disciplines->name  ?>'+'</option>'+
					'<?	}?>'+

					'<? $disciplines_type_list = disciplines::get_types();foreach ($disciplines_type_list as $disciplines_type){?>'+
					'<option>'+'<?=$disciplines_type->name  ?>'+'</option>'+
					'<?	}?>'+
					'</select></td>';
			}else
			row += '<td><input type="text" class="square-cell timetable-' + i + '" value=""/></td>';
		}

		row += '</tr>';

		$('#module').append(row);
	}

	function report_save()
	{
		var report_id = $('#report_id').val();

		if (!report_id)
		{
			return report_add();
		}

		return report_update(report_id);
	}

	function report_add()
	{
		var url = '<?= url::ajax(RUDE_TASK_AJAX_REPORT_ADD) ?>' + report_query();

		$.ajax(
		{
			type: 'POST',
			url: url,

			success: function(report_id)
			{
				alert('Учебный план был успешно сохранён');

				rude_redirect('<?= url::task(RUDE_TASK_MANAGEMENT_REPORTS, true) . url::target(RUDE_TARGET_EDIT) ?>&id=' + parseInt(report_id));
			}
		});
	}

	function report_update(report_id)
	{
		var url = '<?= url::ajax(RUDE_TASK_AJAX_REPORT_EDIT) ?>&id=' + report_id + report_query();

		$.ajax(
		{
			type: 'POST',
			url: url,

			success: function(data)
			{
				console.log(data);

				alert('Учебный план был успешно обновлён');
			}
		});
	}

	function report_struct()
	{
		var report =
		{
			year:                $('#year').val(),
			duration:            $('#duration').val(),
			rector:              $('#rector').val(),
			registration_number: $('#registration_number').val(),

			training_form:       semantic_ui_val('#training_form_list', $('#training_form').val()),
			qualification:       semantic_ui_val('#qualification_list', $('#qualification').val()),
			specialty:           semantic_ui_val('#specialty_list', $('#specialty').val()),
			specialization:      semantic_ui_val('#specialization_list', $('#specialization').val()),

			calendar: calendar_data(),
			timetable: timetable_data()
		};

		console.log(report);

//		report_clean(report);

		return report;
	}

	function report_clean(report)
	{
		for (var property in report)
		{
			if (!report[property])
			{
				delete report[property];
			}
		}
	}

	function report_query()
	{
		var query = '';

		var report = report_struct();

		for (var property in report)
		{
			query += '&' + property + '=' + encodeURIComponent(report[property]);
		}

		return query;
	}

	function report_preview()
	{
		window.open('.<?= RUDE_TEMPLATE_HTTP_INDEX . url::param(RUDE_TASK, RUDE_TASK_REPORT_PREVIEW, true) ?>' + report_query(), '_blank').focus();
	}

	function timetable_data()
	{
		var string = '';

		$('#module .square-cell').each(function(i, obj) {

			if ($(this).hasClass('first-cell'))
			{
				string = rude_remove_last_char(string);

				if (string)
				{
					string += '~';
				}
			}

			string += $(this).val() + ',';
		});

		string = rude_remove_last_char(string);

		return string;
	}

	function calendar_data()
	{
		var I = calendar_struct_string('calendar-1');
		var II = calendar_struct_string('calendar-2');
		var III = calendar_struct_string('calendar-3');
		var IV = calendar_struct_string('calendar-4');

		return I + '~' + II + '~' + III + '~' + IV;
	}

	function calendar_struct_string(selector)
	{
		var str = '';

		var elements = document.getElementsByClassName(selector);

		for (var i = 0; i < elements.length; i++)
		{
			if (elements[i].value)
			{
				str += elements[i].value;
			}

			str += ',';
		}

		return rude_remove_last_char(str);
	}

	function semantic_ui_val(selector, id)
	{
		return $(selector + " .item[data-value='" + id + "']").html();
	}
	</script>

<?

function loop_input_calendar($id, $count, $data_row = false)
{
	if ($data_row !== false)
	{
		$data_row = explode(',', $data_row);
	}

	for ($i = 0; $i < $count; $i++)
	{
		?>
		<td>
			<input type="text" maxlength="2" class="square-cell calendar-<?= (int) $id ?>" value="<? if (isset($data_row[$i])) { echo $data_row[$i]; } ?>"/>
		</td>
		<?
	}
}

function loop_input_timetable($id, $count, $data_row = false)
{
	if ($data_row !== false)
	{
		$data_row = explode(',', $data_row);
	}

	for ($i = 0; $i < $count; $i++)
	{
		?>
		<td>
			<input type="text" class="square-cell timetable-<?= (int) $id ?>" value="<? if (isset($data_row[$i])) { echo $data_row[$i]; } ?>"/>
		</td>
	<?
	}
}

?>