<?

namespace rude;

class ajax_department
{
	public static function add()
	{
		$name      = get(RUDE_FIELD_NAME);


		if ($name === false)
		{
			return false;
		}


		$department_id = departments::add($name);
		return $department_id;
	}

	public static function delete()
	{
		$name = get(RUDE_FIELD_NAME);
		departments::delete($name);
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
			<h1>Добавление кафедры</h1>
			<p>Форма для добавления кафедр</p>
			<form id="form" name="form" method="post" class="ui form" action="index.php?task=<?= RUDE_TASK_AJAX_DEPARTMENT_ADD_FORM ?>">
				<div class="field">
					<label>Наименование кафедры</label>
					<div class="ui left labeled icon input">
						<input id="<?=RUDE_FIELD_NAME?>" name="<?=RUDE_FIELD_NAME?>" type="text" placeholder="Наименование кафедры">
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
					}


				});

			$(".form").submit(function (event) {

				event.preventDefault();

				var department_name = $('#name').val();


				if (!department_name)
				{
					return true; // allow default semantic-UI validation
				}

				$.ajax({
					type: 'POST',
					url: 'index.php',
					data: {
						task:     '<?= RUDE_TASK_AJAX ?>',
						target:   '<?= RUDE_TASK_AJAX_DEPARTMENT_ADD ?>',

						name: department_name

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



		$q = new uquery(RUDE_TABLE_DEPARTMENTS);

		if ($name) { $q->update(RUDE_FIELD_NAME,       $name); }





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
		$department = departments::get($name)?>
		<body class="ajax_bg">
		<div>
			<h1>Редактирование кафедры</h1>
			<p>Форма для изменения кафедры</p>

			<form id="form" name="form" method="post" class="ui form" action="index.php?task=<?= RUDE_TASK_AJAX_DEPARTMENT_EDIT_FORM ?>">
				<div class="field" hidden>
					<label>ID</label>
					<div class="ui left labeled icon input">

						<input id="<?=RUDE_FIELD_ID?>" name="<?=RUDE_FIELD_ID?>" value="<?=$department->id?>" type="text" placeholder="ID">
						<i class="user icon"></i>
						<div class="ui corner label">
							<i class="icon asterisk"></i>
						</div>
					</div>
				</div>
				<div class="field">
					<label>Наименование кафедры</label>
					<div class="ui left labeled icon input">
						<input id="<?=RUDE_FIELD_NAME?>" name="<?=RUDE_FIELD_NAME?>" value="<?=$department->name?>" type="text" placeholder="Наименование кафедры">
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
					}


				});

			$(".form").submit(function (event) {

				event.preventDefault();
				var department_id=$('#id').val();
				var department_name = $('#name').val();

				if (!department_name  || !department_id)
				{
					return true; // allow default semantic-UI validation
				}

				$.ajax({
					type: 'POST',
					url: 'index.php',
					data: {
						task:     '<?= RUDE_TASK_AJAX ?>',
						target:   '<?= RUDE_TASK_AJAX_DEPARTMENT_EDIT ?>',

						name: department_name,

						id: department_id
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
			<h1>Удаление кафедры</h1>
			<p class="red">Внимание! Данная операция необратима!</p>
			<form id="form" name="form" method="post" class="ui form" action="index.php?task=<?= RUDE_TASK_DEPARTMENT_DELETE ?>">
				Вы точно уверены, что хотите удалить кафедру <b>"<?= $name ?></b>"?
				<div class="button-box">
					<button class="ui blue submit button"  type="submit" onclick="delete_department('<?= $name ?>'); parent.$.fancybox.close();">Да</button>
					<button style="float: right !important;" class="ui blue submit button"  type="submit" onclick="parent.$.fancybox.close();">Нет</button>
				</div>
			</form>
		</div>
		<script>
			function delete_department(name)
			{
				$.ajax({
					type: 'POST',
					url: 'index.php',
					data: {
						task:     '<?= RUDE_TASK_AJAX ?>',
						target:   '<?= RUDE_TASK_AJAX_DEPARTMENT_DELETE ?>',
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
				<th>Наименование кафедры</th>

				<th></th>
				<th></th>
			</thead>

			<?

			$department_list = departments::get();

			foreach ($department_list as $department)
			{
				?>
				<tr>
					<td><?= $department->{RUDE_FIELD_ID} ?></td>
					<td><?= $department->{RUDE_FIELD_NAME} ?></td>
					<td class="no-padding width-20px">
						<a href="<?= url::ajax(RUDE_TASK_AJAX_DEPARTMENT_EDIT_FORM) . url::param(RUDE_FIELD_NAME, $department->name) ?>" class="fancybox-department-edit"><img src="src/icons/edit.png" class="small-padding" title="<?= RUDE_TEXT_EDIT ?>" /></a>
					</td>
					<td class="no-padding no-border width-20px">
						<a href="<?= url::ajax(RUDE_TASK_AJAX_DEPARTMENT_DELETE_FORM) . url::param(RUDE_FIELD_NAME, $department->name) ?>" class="fancybox-department-delete"><img src="src/icons/remove.png" class="small-padding" title="<?= RUDE_TEXT_DELETE_SELECTED ?>" /></a>
					</td>
				</tr>
			<?
			}
			?>
		</table>
	<?
	}
}