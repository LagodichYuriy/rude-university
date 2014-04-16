<?

namespace rude;

class ajax_specialty
{
	public static function add()
	{
		$name      = get(name);
		$qualificatio_name = get(qualificatio_name);
		$faculties_name = get (faculties_shortname);


		$faculties = faculties::getshort($faculties_name);
		$id_faculty = $faculties->id;

		$qualification = qualifications::get($qualificatio_name);
		$id_qualificatio = $qualification->id;



		if ($name === false or $qualificatio_name === false or $faculties_name===false )
		{
			return false;
		}

		$specialty_id = specialties::add($name, $id_qualificatio,$id_faculty);
		return $specialty_id;
	}

	public static function edit()
	{
		if (!ajax_user::has_access())
		{
			die();
		}

		$id       = get(RUDE_FIELD_ID);
		$name = get(RUDE_FIELD_NAME);
		$faculties_shortname = get(faculties_shortname);
		$qualificatio_name = get(qualificatio_name);


		$faculties = faculties::getshort($faculties_shortname);
		$id_faculty = $faculties->id;

		$qualification = qualifications::get($qualificatio_name);
		$id_qualificatio = $qualification->id;

		$q = new uquery(RUDE_TABLE_SPECIALTIES);

		if ($name) { $q->update(RUDE_FIELD_NAME,       $name); }
		if ($id_faculty) { $q->update(faculty_id,       $id_faculty); }
		if ($id_qualificatio) { $q->update(qualification_id,       $id_qualificatio); }





		$q->where(RUDE_FIELD_ID, (int) $id);
		$q->limit(1);
		$q->start();
	}

	public static function delete()
	{
		$name = get(RUDE_FIELD_NAME);
		specialties::delete($name);
	}

	public static function html_form_add()
	{
		if (!ajax_user::has_access())
		{
			die();
		}

		?>
		<html>
		<? require_once(RUDE_TEMPLATE_DIR . '/rude-header.php') ?>

		<body class="ajax_bg">
		<div>
			<h1>Добавление специальности</h1>
			<p>Форма для добавления специальности</p>
			<form id="form" name="form" method="post" class="ui form" action="index.php?task=<?= RUDE_TASK_AJAX_SPECIALTY_ADD_FORM ?>">

				<div class="field">
					<label>Факультет</label>
					<div class="ui fluid selection dropdown">
						<div class="text">Select</div>
						<i class="dropdown icon"></i>
						<input type="hidden" id="faculties_name">
						<div class="menu">
							<?	$faculty_list = faculties::get();
							foreach ($faculty_list as $faculty)
							{
								?>
								<div class="item" data-value="<?= $faculty->shortname  ?>"><?= $faculty->shortname  ?></div>
							<?
							}?>
						</div>
					</div>
				</div>

				<div class="field">
					<label>Наименование</label>
					<div class="ui left labeled icon input">
						<input id="<?=RUDE_FIELD_NAME?>" name="<?=RUDE_FIELD_NAME?>" type="text" placeholder="Наименование">
						<i class="user icon"></i>
						<div class="ui corner label">
							<i class="icon asterisk"></i>
						</div>
					</div>
				</div>



				<div class="field">
					<label>Квалификация</label>
					<div class="ui fluid selection dropdown">
						<div class="text">Select</div>
						<i class="dropdown icon"></i>
						<input type="hidden" id="qualificatio_name">
						<div class="menu">
							<?	$qualification_list = qualifications::get();
							foreach ($qualification_list as $qualification)
							{
								?>
								<div class="item" data-value="<?= $qualification->name  ?>"><?= $qualification->name  ?></div>
							<?
							}?>
						</div>
					</div>
				</div>



				<div id="submit" class="ui blue submit button">Добавить</div>
			</form>
		</div>
		<script>
			$('.ui.selection.dropdown')
				.dropdown()
			;
			$('.ui.form').form(
				{
					name:
					{
						identifier: 'name',

						rules:
							[{
								type: 'empty',
								prompt: 'Пожалуйста, введите наименование факультета'
							}]
					}


				});

			$(".form").submit(function (event) {

				event.preventDefault();

				var specialty_name = $('#name').val();
				var specialty_faculties_name = $('#faculties_name').val();
				var specialty_qualificatio_name = $('#qualificatio_name').val();

				if (!specialty_name || !specialty_faculties_name || !specialty_qualificatio_name)
				{
					return true; // allow default semantic-UI validation

				}

				$.ajax({
					type: 'POST',
					url: 'index.php',
					data: {
						task:     '<?= RUDE_TASK_AJAX ?>',
						target:   '<?= RUDE_TASK_AJAX_SPECIALTY_ADD ?>',

						name: specialty_name,
						faculties_shortname: specialty_faculties_name,
						qualificatio_name : specialty_qualificatio_name
					},

					success: function(data)
					{
						parent.$.fancybox.close();
					}
				});

				return true;
			});
		</script>


		</body>

		</html>
	<?
	}

	public static function html_form_edit()
	{
		if (!ajax_user::has_access())
		{
			die();
		}

		?>
		<html>
		<? require_once(RUDE_TEMPLATE_DIR . '/rude-header.php') ?>
		<? $name = get(RUDE_FIELD_NAME);
		$spesuiality = specialties::get_one($name);
		$faculties = faculties::getshort_by_id($spesuiality->faculty_id);
		$qualification = qualifications::get_by_id($spesuiality->qualification_id)?>
		<body class="ajax_bg">
		<div>
			<h1>Изменение специальности</h1>
			<p>Форма для редактирования специальности</p>
			<form id="form" name="form" method="post" class="ui form" action="index.php?task=<?= RUDE_TASK_AJAX_SPECIALTY_EDIT_FORM ?>">

				<div class="field">
					<label>Факультет</label>
					<div class="ui fluid selection dropdown">
						<div class="text">Select</div>
						<i class="dropdown icon"></i>

						<input type="hidden" id="faculties_name" value="<?=$faculties->shortname?>">
						<div class="menu">
							<?	$faculty_list = faculties::get();
							foreach ($faculty_list as $faculty)
							{
								?>
								<div class="item" data-value="<?= $faculty->shortname  ?>"><?= $faculty->shortname  ?></div>
							<?
							}?>
						</div>
					</div>
				</div>

				<div class="field">
					<label>Наименование</label>
					<div class="ui left labeled icon input">
						<input id="<?=RUDE_FIELD_NAME?>" name="<?=RUDE_FIELD_NAME?>" type="text" placeholder="Наименование" value="<?=$spesuiality->name?>">
						<i class="user icon"></i>
						<div class="ui corner label">
							<i class="icon asterisk"></i>
						</div>
					</div>
				</div>

				<div class="field" hidden>
					<label>id</label>
					<div class="ui left labeled icon input">
						<input id="<?=RUDE_FIELD_ID?>" name="<?=RUDE_FIELD_ID?>" type="text" placeholder="id" value="<?=$spesuiality->id?>">
						<i class="user icon"></i>
						<div class="ui corner label">
							<i class="icon asterisk"></i>
						</div>
					</div>
				</div>



				<div class="field">
					<label>Квалификация</label>
					<div class="ui fluid selection dropdown">
						<div class="text">Select</div>
						<i class="dropdown icon"></i>
						<input type="hidden" id="qualificatio_name" value="<?= $qualification->name ?>">
						<div class="menu">
							<?	$qualification_list = qualifications::get();
							foreach ($qualification_list as $qualification)
							{
								?>
								<div class="item" data-value="<?= $qualification->name  ?>"><?= $qualification->name  ?></div>
							<?
							}?>
						</div>
					</div>
				</div>



				<div id="submit" class="ui blue submit button">Изменить</div>
			</form>
		</div>
		<script>
			$('.ui.selection.dropdown')
				.dropdown()
			;
			$('.ui.form').form(
				{
					name:
					{
						identifier: 'name',

						rules:
							[{
								type: 'empty',
								prompt: 'Пожалуйста, введите наименование факультета'
							}]
					}


				});

			$(".form").submit(function (event) {

				event.preventDefault();

				var specialty_name = $('#name').val();
				var specialty_faculties_name = $('#faculties_name').val();
				var specialty_qualificatio_name = $('#qualificatio_name').val();
				var id = $('#id').val();

				if (!specialty_name || !specialty_faculties_name || !specialty_qualificatio_name)
				{
					return true; // allow default semantic-UI validation

				}

				$.ajax({
					type: 'POST',
					url: 'index.php',
					data: {
						task:     '<?= RUDE_TASK_AJAX ?>',
						target:   '<?= RUDE_TASK_AJAX_SPECIALTY_EDIT ?>',

						name: specialty_name,
						faculties_shortname: specialty_faculties_name,
						qualificatio_name : specialty_qualificatio_name,
						id: id
					},

					success: function(data)
					{
						parent.$.fancybox.close();
					}
				});

				return true;
			});
		</script>


		</body>

		</html>
	<?
	}

	public static function html_form_delete()
	{
		if (!ajax_user::has_access())
		{
			die();
		}

		$name = get(RUDE_FIELD_NAME);


		?>
		<html>
		<? require_once(RUDE_TEMPLATE_DIR . '/rude-header.php') ?>

		<body class="ajax_bg">
		<div>
			<h1>Удаление специальности</h1>
			<p class="red">Внимание! Данная операция необратима!</p>
			<form id="form" name="form" method="post" class="ui form" action="index.php?task=<?= RUDE_TASK_AJAX_SPECIALTY_DELETE_FORM?>">
				Вы точно уверены, что хотите удалить специальность <b>"<?= $name ?></b>"?
				<div class="button-box">
					<button class="ui blue submit button"  type="submit" onclick="delete_specialti('<?= $name ?>'); parent.$.fancybox.close();">Да</button>
					<button style="float: right !important;" class="ui blue submit button"  type="submit" onclick="parent.$.fancybox.close();">Нет</button>
				</div>
			</form>
		</div>
		<script>
			function delete_specialti(name)
			{
				$.ajax({
					type: 'POST',
					url: 'index.php',
					data: {
						task:     '<?= RUDE_TASK_AJAX ?>',
						target:   '<?= RUDE_TASK_AJAX_SPECIALTY_DELETE ?>',
						name: '<?= $name ?>'
					},

					success: function(data)
					{
						parent.$.fancybox.close();
					}
				});
			}
		</script>


		</body>

		</html>
	<?
	}

	public static function html()
	{
		?>
		<table class="ui collapsing table segment full-width">
			<thead class="small-font">
				<th>#</th>
				<th>Факультет</th>
				<th>Наименование</th>
				<th>Квалификация</th>
			</thead>

			<?

			$i = 1;

			$specialty_list = specialties::get();

			foreach ($specialty_list as $specialty)
			{
				?>
				<tr>
					<td><?= $i++ ?></td>
					<td><?= $specialty->faculty_shortname  ?></td>
					<td><?= $specialty->{RUDE_FIELD_NAME}  ?></td>
					<td><?= $specialty->qualification_name ?></td>
					<td>
						<a href="<?= url::ajax(RUDE_TASK_AJAX_SPECIALTY_EDIT_FORM) . url::param(RUDE_FIELD_NAME, $specialty->name) ?>" class="fancybox-specialty-edit"><img src="src/icons/edit.png" class="small-padding" title="<?= RUDE_TEXT_EDIT ?>" /></a>


					</td>
					<td>

						<a href="<?= url::ajax(RUDE_TASK_AJAX_SPECIALTY_DELETE_FORM) . url::param(RUDE_FIELD_NAME, $specialty->name) ?>" class="fancybox-specialty-delete"><img src="src/icons/remove.png" class="small-padding" title="<?= RUDE_TEXT_DELETE_SELECTED ?>" /></a>

					</td>
				</tr>
			<?
			}
			?>
		</table>
	<?
	}
}