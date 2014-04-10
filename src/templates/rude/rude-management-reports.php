<? namespace rude; ?>

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
				<div class="active title">
					<i class="dropdown icon"></i>
					Список циклов (компоненты и модули специальности)
				</div>
				<div class="active content">
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
			specialization:      $('#specialization').val()
		};

		console.log(report);
	}

	function report_show()
	{
		window.open('.<?= RUDE_TEMPLATE_HTTP_INDEX . url::param(RUDE_TASK, RUDE_TASK_REPORT_PREVIEW, true) ?>', '_blank').focus();
	}
</script>