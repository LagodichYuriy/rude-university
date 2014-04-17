<?

namespace rude;

class ajax_faculty
{
	public static function add()
	{
		$name      = get(RUDE_FIELD_NAME);
		$shortname = get(RUDE_FIELD_SHORTNAME);

		if ($name === false or $shortname === false)
		{
			return false;
		}


		$faculty_id = faculties::add($name, $shortname);
		return $faculty_id;
	}

	public static function delete()
	{
		$name = get(RUDE_FIELD_NAME);
		faculties::delete($name);
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
			<h1>Добавление факультета</h1>
			<p>Форма для добавления факультетов</p>
			<form id="form" name="form" method="post" class="ui form" action="index.php?task=<?= RUDE_TASK_AJAX_FACULTY_ADD_FORM ?>">
				<div class="field">
					<label>Полное наименование</label>
					<div class="ui left labeled icon input">
						<input id="<?=RUDE_FIELD_NAME?>" name="<?=RUDE_FIELD_NAME?>" type="text" placeholder="Полное наименование">
						<i class="user icon"></i>
						<div class="ui corner label">
							<i class="icon asterisk"></i>
						</div>
					</div>
				</div>
				<div class="field">
					<label>Сокращённое наименование</label>
					<div class="ui left labeled icon input">
						<input id="<?=RUDE_FIELD_SHORTNAME?>" name="<?=RUDE_FIELD_SHORTNAME?>" type="text" placeholder="Сокращённое наименование">
						<i class="user icon"></i>
						<div class="ui corner label">
							<i class="icon asterisk"></i>
						</div>
					</div>
				</div>

				<div id="submit" class="ui blue submit button">Добавить</div>
			</form>
		</div>
		<script>
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
					},

					shortname:
					{
						identifier: 'shortname',

						rules:
							[{
								type: 'empty',
								prompt: 'Пожалуйста, введите сокращенное наименование факультета'
							}]
					}


				});

			$(".form").submit(function (event) {

				event.preventDefault();

				var faculty_name = $('#name').val();
				var faculty_shortname = $('#shortname').val();

				if (!faculty_name || !faculty_shortname)
				{
					return true; // allow default semantic-UI validation
				}

				$.ajax({
					type: 'POST',
					url: 'index.php',
					data: {
						task:     '<?= RUDE_TASK_AJAX ?>',
						target:   '<?= RUDE_TASK_AJAX_FACULTY_ADD ?>',

						name: faculty_name,
						shortname: faculty_shortname
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

	public static function edit()
	{
		if (!ajax_user::has_access())
		{
			die();
		}

		$id       = get(RUDE_FIELD_ID);
		$name = get(RUDE_FIELD_NAME);
		$shortname = get(RUDE_FIELD_SHORTNAME);


		$q = new uquery(RUDE_TABLE_FACULTIES);

		if ($name) { $q->update(RUDE_FIELD_NAME,       $name); }
		if ($shortname) { $q->update(RUDE_FIELD_SHORTNAME,       $shortname); }




		$q->where(RUDE_FIELD_ID, (int) $id);
		$q->limit(1);
		$q->start();
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
		   $faculties = faculties::get($name)?>
		<body class="ajax_bg">
		<div>
			<h1>Редактирование факультета</h1>
			<p>Форма для изменения факультетов</p>
			<form id="form" name="form" method="post" class="ui form" action="index.php?task=<?= RUDE_TASK_AJAX_FACULTY_EDIT_FORM ?>">
				<div class="field" hidden>
					<label>ID</label>
					<div class="ui left labeled icon input">
						<input id="<?=RUDE_FIELD_ID?>" name="<?=RUDE_FIELD_ID?>" value="<?=$faculties->id?>" type="text" placeholder="ID">
						<i class="user icon"></i>
						<div class="ui corner label">
							<i class="icon asterisk"></i>
						</div>
					</div>
				</div>
				<div class="field">
					<label>Полное наименование</label>
					<div class="ui left labeled icon input">
						<input id="<?=RUDE_FIELD_NAME?>" name="<?=RUDE_FIELD_NAME?>" value="<?=$faculties->name?>" type="text" placeholder="Полное наименование">
						<i class="user icon"></i>
						<div class="ui corner label">
							<i class="icon asterisk"></i>
						</div>
					</div>
				</div>
				<div class="field">
					<label>Сокращённое наименование</label>
					<div class="ui left labeled icon input">
						<input id="<?=RUDE_FIELD_SHORTNAME?>" name="<?=RUDE_FIELD_SHORTNAME?>" value="<?=$faculties->shortname?>" type="text" placeholder="Сокращённое наименование">
						<i class="user icon"></i>
						<div class="ui corner label">
							<i class="icon asterisk"></i>
						</div>
					</div>
				</div>

				<div id="submit" class="ui blue submit button">Изменить</div>
			</form>
		</div>
		<script>
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
					},

					shortname:
					{
						identifier: 'shortname',

						rules:
							[{
								type: 'empty',
								prompt: 'Пожалуйста, введите сокращенное наименование факультета'
							}]
					}


				});

			$(".form").submit(function (event) {

				event.preventDefault();
				var faculty_id=$('#id').val();
				var faculty_name = $('#name').val();
				var faculty_shortname = $('#shortname').val();

				if (!faculty_name || !faculty_shortname || !faculty_id)
				{
					return true; // allow default semantic-UI validation
				}

				$.ajax({
					type: 'POST',
					url: 'index.php',
					data: {
						task:     '<?= RUDE_TASK_AJAX ?>',
						target:   '<?= RUDE_TASK_AJAX_FACULTY_EDIT ?>',

						name: faculty_name,
						shortname: faculty_shortname,
						id: faculty_id
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
			<h1>Удаление факультета</h1>
			<p class="red">Внимание! Данная операция необратима!</p>
			<form id="form" name="form" method="post" class="ui form" action="index.php?task=<?= RUDE_TASK_FACULTY_DELETE ?>">
				Вы точно уверены, что хотите удалить факультет <b>"<?= $name ?></b>"?
				<div class="button-box">
					<button class="ui blue submit button"  type="submit" onclick="delete_faculty('<?= $name ?>'); parent.$.fancybox.close();">Да</button>
					<button style="float: right !important;" class="ui blue submit button"  type="submit" onclick="parent.$.fancybox.close();">Нет</button>
				</div>
			</form>
		</div>
		<script>
			function delete_faculty(name)
			{
				$.ajax({
					type: 'POST',
					url: 'index.php',
					data: {
						task:     '<?= RUDE_TASK_AJAX ?>',
						target:   '<?= RUDE_TASK_AJAX_FACULTY_DELETE ?>',
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
		<table id="info_faculties" class="ui collapsing table segment full-width">
			<thead class="small-font">
				<th>#</th>
				<th>Полное наименование</th>
				<th>Сокращённое наименование</th>
				<th></th>
				<th></th>
			</thead>

			<?

			$faculty_list = faculties::get();

			foreach ($faculty_list as $faculty)
			{
				?>
				<tr>
					<td><?= $faculty->{RUDE_FIELD_ID} ?></td>
					<td><?= $faculty->{RUDE_FIELD_NAME} ?></td>
					<td><?= $faculty->{RUDE_FIELD_SHORTNAME} ?></td>
					<td class="no-padding width-20px">
						<a href="<?= url::ajax(RUDE_TASK_AJAX_FACULTY_EDIT_FORM) . url::param(RUDE_FIELD_NAME, $faculty->name) ?>" class="fancybox-faculties-edit"><img src="src/icons/edit.png" class="small-padding" title="<?= RUDE_TEXT_EDIT ?>" /></a>
					</td>
					<td class="no-padding no-border width-20px">
						<a href="<?= url::ajax(RUDE_TASK_AJAX_FACULTY_DELETE_FORM) . url::param(RUDE_FIELD_NAME, $faculty->name) ?>" class="fancybox-faculties-delete"><img src="src/icons/remove.png" class="small-padding" title="<?= RUDE_TEXT_DELETE_SELECTED ?>" /></a>
					</td>
				</tr>
			<?
			}
			?>
		</table>
	<?
	}
}