<? namespace rude; ?>

<div class="middle">
	<div class="middle-item full-width">

		<div class="ui fluid form segment">
			<div class="three fields">
				<div class="field">
					<label>Год набора</label>
					<input placeholder="<?= timestamp::current_year(); ?>" type="text">
				</div>
				<div class="field">
					<label>Срок обучения (лет)</label>
					<input placeholder="4" type="text">
				</div>
				<div class="field">
					<label>ФИО ректора</label>
					<input placeholder="М.П. Батура" type="text">
				</div>
			</div>

			<div class="field">
				<label>Регистрационный номер учебного плана</label>
				<input placeholder="<?= timestamp::date() . '/000'; ?>" type="text">
			</div>

			<div class="field">
				<div class="ui fluid selection dropdown active medium-font">
					<input type="hidden" name="gender">
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
					<input type="hidden" name="gender">
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
					<input type="hidden" name="gender">
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
					<input type="hidden" name="gender">
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
					<div class="two fields">
						<div class="field small-font">
							<label>Название цикла</label>
							<input placeholder="Цикл социально-гуманитарных дисциплин" type="text">
						</div>
						<div class="field small-font margin-button">
							<div class="ui green submit button mini" onclick="add_module()">Добавить</div>
						</div>
					</div>
				</div>
			</div>

			<div class="clear"></div>

			<div class="field">
				<div class="ui buttons">
					<div class="ui positive button">Сохранить</div>
					<div class="ui button" onclick="show_report();">Предпросмотр</div>
				</div>
			</div>
		</div>
	</div>

<script>
	$('.ui.dropdown').dropdown();

	$('.ui.accordion').accordion();


	function add_module()
	{
		var html = $('#module').html();
	}

	function get_report()
	{

	}

	function show_report()
	{


		var win = window.open('.<?= RUDE_TEMPLATE_HTTP_INDEX . url::param(RUDE_TASK, RUDE_TASK_REPORT_PREVIEW, true) ?>', '_blank');

		win.focus();
	}
</script>