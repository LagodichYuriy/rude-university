<?

namespace rude;

class ajax_qualification
{
	public static function add()
	{
		$name      = get(RUDE_FIELD_NAME);


		if ($name === false)
		{
			return false;
		}
		$qualific = qualifications::add($name);
		return $qualific;
	}

	public static function delete()
	{
		$name = get(RUDE_FIELD_NAME);
		qualifications::delete($name);
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
			<h1>Добавление квалификации</h1>
			<p>Форма для добавления квалификации</p>
			<form id="form" name="form" method="post" class="ui form" action="index.php?task=<?= RUDE_TASK_AJAX_QUALIFICATION_ADD_FORM ?>">
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

				var qualifications_name        = $('#<?= RUDE_FIELD_NAME ?>').val();

				if (!qualifications_name)
				{
					return true; // allow default semantic-UI validation
				}

				$.ajax({
					type: 'POST',
					url: 'index.php',
					data: {
						task:     '<?= RUDE_TASK_AJAX ?>',
						target:   '<?= RUDE_TASK_AJAX_QUALIFICATION_ADD ?>',

						name: qualifications_name

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



		$q = new uquery(RUDE_TABLE_QUALIFICATIONS);

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
		$faculties = qualifications::get($name)?>
		<body class="ajax_bg">
		<div>
			<h1>Редактирование квалификации</h1>
			<p>Форма для изменения квалификации</p>
			<form id="form" name="form" method="post" class="ui form" action="index.php?task=<?= RUDE_TASK_AJAX_QUALIFICATION_EDIT_FORM ?>">
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
					<label>Наименование</label>
					<div class="ui left labeled icon input">
						<input id="<?=RUDE_FIELD_NAME?>" name="<?=RUDE_FIELD_NAME?>" value="<?=$faculties->name?>" type="text" placeholder="Наименование">
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
				var qualific_id=$('#id').val();
				var qualific_name = $('#name').val();


				if (!qualific_name || !qualific_id )
				{
					return true; // allow default semantic-UI validation
				}

				$.ajax({
					type: 'POST',
					url: 'index.php',
					data: {
						task:     '<?= RUDE_TASK_AJAX ?>',
						target:   '<?= RUDE_TASK_AJAX_QUALIFICATION_EDIT ?>',

						name: qualific_name,

						id: qualific_id
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
			<h1>Удаление квалификации</h1>
			<p class="red">Внимание! Данная операция необратима!</p>
			<form id="form" name="form" method="post" class="ui form" action="index.php?task=<?= RUDE_TASK_QUALIFICATION_DELETE ?>">
				Вы точно уверены, что хотите удалить квалификацию <b>"<?= $name ?></b>"?
				<div class="button-box">
					<button class="ui blue submit button"  type="submit" onclick="delete_qualifications('<?= $name ?>'); parent.$.fancybox.close();">Да</button>
					<button style="float: right !important;" class="ui blue submit button"  type="submit" onclick="parent.$.fancybox.close();">Нет</button>
				</div>
			</form>
		</div>
		<script>
			function delete_qualifications(name)
			{
				$.ajax({
					type: 'POST',
					url: 'index.php',
					data: {
						task:     '<?= RUDE_TASK_AJAX ?>',
						target:   '<?= RUDE_TASK_AJAX_QUALIFICATION_DELETE ?>',
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
				<th>Наименование</th>

				<th></th>
				<th></th>
			</thead>

			<?

			$qualification_list = qualifications::get();

			foreach ($qualification_list as $qualification)
			{
				?>
				<tr>
					<td><?= $qualification->{RUDE_FIELD_ID} ?></td>
					<td><?= $qualification->{RUDE_FIELD_NAME} ?></td>
					<td class="no-padding width-20px">
						<a href="<?= url::ajax(RUDE_TASK_AJAX_QUALIFICATION_EDIT_FORM) . url::param(RUDE_FIELD_NAME, $qualification->name) ?>" class="fancybox-qualification-edit"><img src="src/icons/edit.png" class="small-padding" title="<?= RUDE_TEXT_EDIT ?>" /></a>
					</td>
					<td class="no-padding no-border width-20px">
						<a href="<?= url::ajax(RUDE_TASK_AJAX_QUALIFICATION_DELETE_FORM) . url::param(RUDE_FIELD_NAME, $qualification->name) ?>" class="fancybox-qualification-delete"><img src="src/icons/remove.png" class="small-padding" title="<?= RUDE_TEXT_DELETE_SELECTED ?>" /></a>
					</td>
				</tr>
			<?
			}
			?>
		</table>
	<?
	}
}