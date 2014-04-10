<?
	namespace rude;

	require_once 'report/rude-report-lang.php';
?>

<div class="middle">
	<div class="middle-item full-width">

		<div class="ui fluid form segment">
			<div class="three fields">
				<div class="field">
					<label>Год набора</label>
					<input id="year" name="year" placeholder="<?= timestamp::current_year(); ?>" type="text">
				</div>
				<div class="field">
					<label>Срок обучения (лет)</label>
					<input id="duration" name="duration" placeholder="4" type="text">
				</div>
				<div class="field">
					<label>ФИО ректора</label>
					<input id="rector" name="rector" placeholder="М.П. Батура" type="text">
				</div>
			</div>

			<div class="field">
				<label>Регистрационный номер учебного плана</label>
				<input id="registration_number" name="registration_number" placeholder="<?= timestamp::date() . '/000'; ?>" type="text">
			</div>

			<div class="field">
				<div class="ui fluid selection dropdown active medium-font">
					<input type="hidden" id="training_form" name="training_form">
					<div class="default text">Форма обучения</div>
					<i class="dropdown icon"></i>
					<div class="menu">
						<?
							$class_list = classes::get();

							foreach ($class_list as $class)
							{
								?><div class="item" data-value="<?= $class->id ?>"><?= $class->name ?></div><?
							}
						?>
					</div>
				</div>
			</div>

			<div class="field">
				<div class="ui fluid selection dropdown active medium-font">
					<input type="hidden" id="qualification" name="qualification">
					<div class="default text">Квалификация специалиста</div>
					<i class="dropdown icon"></i>
					<div class="menu">
						<?
							$qualification_list = qualifications::get();

							foreach ($qualification_list as $qualification)
							{
								?><div class="item" data-value="<?= $qualification->id ?>"><?= $qualification->name ?></div><?
							}
						?>
					</div>
				</div>
			</div>

			<div class="field">
				<div class="ui fluid selection dropdown active medium-font">
					<input type="hidden" id="specialty" name="specialty">
					<div class="default text">Специальность</div>
					<i class="dropdown icon"></i>
					<div class="menu">
						<?
							$qualification_list = qualifications::get();

							foreach ($qualification_list as $qualification)
							{
								?><div class="item" data-value="<?= $qualification->id ?>"><?= $qualification->name ?></div><?
							}
						?>
					</div>
				</div>
			</div>

			<div class="field">
				<div class="ui fluid selection dropdown active medium-font">
					<input type="hidden" id="specialization" name="specialization">
					<div class="default text">Специализация</div>
					<i class="dropdown icon"></i>
					<div class="menu">
						<?
							$qualification_list = qualifications::get();

							foreach ($qualification_list as $qualification)
							{
								?><div class="item" data-value="<?= $qualification->id ?>"><?= $qualification->name ?></div><?
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
					<div class="fields">
						<div class="field small-font width-80 padding-right-1">
							<label>Название цикла</label>
							<input id="module" name="module" placeholder="Цикл социально-гуманитарных дисциплин" type="text">
						</div>
						<div class="field small-font margin-button width-20">
							<div class="ui green submit button mini margin-left-2" onclick="module_add()">Добавить</div>
						</div>
					</div>

					<table class="ui table segment small-font">
						<thead>
							<tr>
								<th class="width-30px">#</th>
								<th>Наименование</th>
							</tr>
						</thead>
						<tbody id="modules">

						</tbody>
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
								<?= RUDE_TABLE_TIME_BUDGET_SEPTEMBER ?></div>
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
								<div>
									<?= RUDE_TABLE_TIME_BUDGET_MAY ?>
								</div>
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
								<div class="underline">29</div>09
							</td>
							<td>6</td>
							<td>13</td>
							<td>20</td>
							<td>
								<div class="underline">27</div>10
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
								<div class="underline">29</div>12
							</td>
							<td>5</td>
							<td>12</td>
							<td>19</td>
							<td>
								<div class="underline">26</div>01
							</td>
							<td>2</td>
							<td>9</td>
							<td>16</td>
							<td>
								<div class="underline">23</div>02
							</td>
							<td>2</td>
							<td>9</td>
							<td>16</td>
							<td>23</td>
							<td>
								<div class="underline">30</div>03
							</td>
							<td>6</td>
							<td>13</td>
							<td>20</td>
							<td>
								<div class="underline">27</div>04
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
								<div class="underline">29</div>06
							</td>
							<td>6</td>
							<td>13</td>
							<td>20</td>
							<td>
								<div class="underline">27</div>07
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
								<div class="underline">05</div>10
							</td>
							<td>12</td>
							<td>19</td>
							<td>26</td>
							<td>
								<div class="underline">02</div>11
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
								<div class="underline">04</div>01
							</td>
							<td>11</td>
							<td>18</td>
							<td>25</td>
							<td>
								<div class="underline">01</div>02
							</td>
							<td>8</td>
							<td>15</td>
							<td>22</td>
							<td>
								<div class="underline">01</div>03
							</td>
							<td>8</td>
							<td>15</td>
							<td>22</td>
							<td>29</td>
							<td>
								<div class="underline">05</div>04
							</td>
							<td>12</td>
							<td>19</td>
							<td>26</td>
							<td>
								<div class="underline">03</div>05
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
								<div class="underline">05</div>07
							</td>
							<td>12</td>
							<td>19</td>
							<td>26</td>
							<td>
								<div class="underline">02</div>08
							</td>
							<td>9</td>
							<td>16</td>
							<td>23</td>
							<td>31</td>
						</tr>

						<tr>
							<td>I</td>

							<? loop_input(1, 52) ?>
						</tr>

						<tr>
							<td>II</td>

							<? loop_input(2, 52) ?>
						</tr>

						<tr>
							<td>III</td>

							<? loop_input(3, 52) ?>
						</tr>

						<tr>
							<td>IV</td>

							<? loop_input(4, 52) ?>
						</tr>
					</table>
				</div>
			</div>

			<div class="clear"></div>

			<div class="field">
				<div class="ui buttons">
					<div class="ui positive button" onclick="form_validate(); report_save()">Сохранить</div>
					<div class="ui button submit" onclick="form_validate(); report_show();">Предпросмотр</div>
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
				year:
				{
					identifier  : 'year',
					rules:
						[{
							type   : 'empty',
							prompt : 'Пожалуйста, не оставляйте это поле пустым'
						}]
				},
				duration:
				{
					identifier  : 'duration',
					rules:
						[{
							type   : 'empty',
							prompt : 'Пожалуйста, не оставляйте это поле пустым'
						}]
				},
				rector:
				{
					identifier  : 'rector',
					rules:
						[{
							type   : 'empty',
							prompt : 'Пожалуйста, не оставляйте это поле пустым'
						}]
				},
//				registration_number:
//				{
//					identifier  : 'registration_number',
//					rules:
//						[{
//							type   : 'empty',
//							prompt : 'Пожалуйста, не оставляйте это поле пустым'
//						}]
//				},
				training_form:
				{
					identifier  : 'training_form',
					rules:
						[{
							type   : 'empty',
							prompt : 'Пожалуйста, не оставляйте это поле пустым'
						}]
				},
				qualification:
				{
					identifier  : 'qualification',
					rules:
						[{
							type   : 'empty',
							prompt : 'Пожалуйста, не оставляйте это поле пустым'
						}]
				},
				specialty:
				{
					identifier  : 'specialty',
					rules:
						[{
							type   : 'empty',
							prompt : 'Пожалуйста, не оставляйте это поле пустым'
						}]
				},
				specialization:
				{
					identifier  : 'specialization',
					rules:
						[{
							type   : 'empty',
							prompt : 'Пожалуйста, не оставляйте это поле пустым'
						}]
				}
			});

		$('.ui.form').form('validate form');
	}

	function module_validate()
	{
		$('.ui.form').form(
		{
			module:
			{
				identifier  : 'module',
				rules:
					[{
						type   : 'empty',
						prompt : 'Пожалуйста, не оставляйте это поле пустым'
					}]
			}
		});

		$('.ui.form').form('validate form');
	}


	var module_counter = 0;

	function module_add()
	{
		module_validate();


		var module = $('#module').val();

		if (module)
		{
			module_counter++;

			$('#modules').append('<tr><td>' + module_counter + '</td><td>' + module + '</td></tr>');
		}
	}

	function report_struct()
	{

	}

	function report_save()
	{
		var report =
		{
			year:                $('#year').val(),
			duration:            $('#duration').val(),
			rector:              $('#rector').val(),
			registration_number: $('#registration_number').val(),
			training_form:       $('#training_form').val(),
			qualification:       $('#qualification').val(),
			specialty:           $('#specialty').val(),
			specialization:      $('#specialization').val(),

			calendar:            calendar_data()
		};

		console.log(report);
	}

	function report_show()
	{
		window.open('.<?= RUDE_TEMPLATE_HTTP_INDEX . url::param(RUDE_TASK, RUDE_TASK_REPORT_PREVIEW, true) ?>', '_blank').focus();
	}

	function calendar_data()
	{
		var I   = calendar_struct_string('calendar-1');
		var II  = calendar_struct_string('calendar-2');
		var III = calendar_struct_string('calendar-3');
		var IV  = calendar_struct_string('calendar-4');

		return I + '~' + II + '~' + III + '~' + IV;
	}

	function calendar_struct_string(selector)
	{
		var str = '';

//		[].forEach.call(selector, function(cell)
//		{
//			if (cell.value)
//			{
//				str += cell.value;
//			}
//
//			str += ',';
//		});

		var elements = document.getElementsByClassName(selector);

		for(var i = 0; i < elements.length; i++)
		{
//			alert(elements[i].value);

			if (elements[i].value)
			{
				str += elements[i].value;
			}

			str += ',';
		}

		return rude_remove_last_char(str);
	}
</script>

<?
	function loop_input($id, $count)
	{
		for ($i = 0; $i < $count; $i++)
		{
			?>
			<td>
				<input type="text" maxlength="2" class="square-cell calendar-<?= (int) $id ?>" value="" />
			</td>
			<?
		}
	}
?>