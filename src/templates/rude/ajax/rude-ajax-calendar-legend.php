<?

namespace rude;

class ajax_calendar_legend
{
	public static function add()
	{
		$name      = get(RUDE_FIELD_NAME);
		$simbol		= get (RUDE_FIELD_SIMBOL);

		if ($name === false)
		{
			return false;
		}


		$calendar_legend_id = calendar_legends::add($name,$simbol);
		return $calendar_legend_id;
	}

	public static function delete()
	{
		$name = get(RUDE_FIELD_NAME);
		calendar_legends::delete($name);
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
			<h1>Добавление условного обозначения</h1>
			<p>Форма для добавления условного обозначения</p>
			<form id="form" name="form" method="post" class="ui form" action="index.php?task=<?= RUDE_TASK_AJAX_CALENDAR_LEGEND_ADD_FORM ?>">
				<div class="field">
					<label>Описание</label>
					<div class="ui left labeled icon input">
						<input id="<?=RUDE_FIELD_NAME?>" name="<?=RUDE_FIELD_NAME?>" type="text" placeholder="Описание">
						<i class="user icon"></i>
						<div class="ui corner label">
							<i class="icon asterisk"></i>
						</div>
					</div>
				</div>

				<div class="field">
					<label>Условный знак</label>
					<div class="ui left labeled icon input">
						<input id="simbol" name="simbol" type="text" placeholder="Условный знак">
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
								prompt: ''
							}]
					},

					simbol:
					{
						identifier: 'simbol',

						rules:
							[{
								type: 'empty',
								prompt: ''
							}]
					}


				});

			$(".form").submit(function (event) {

				event.preventDefault();

				var calendar_legend_name = $('#name').val();
				var calendar_legend_simbol = $('#simbol').val();


				if (!calendar_legend_name || !calendar_legend_simbol)
				{
					return true; // allow default semantic-UI validation
				}

				$.ajax({
					type: 'POST',
					url: 'index.php',
					data: {
						task:     '<?= RUDE_TASK_AJAX ?>',
						target:   '<?= RUDE_TASK_AJAX_CALENDAR_LEGEND_ADD ?>',

						name: calendar_legend_name,
						simbol:calendar_legend_simbol

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
		$simbol = get('simbol');



		$q = new uquery(RUDE_TABLE_CALENDAR_LEGENDS);

		if ($name) { $q->update(RUDE_FIELD_NAME,       $name); }
		if ($simbol) { $q->update('simbol',       $simbol); }





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
		$calendar_legend = calendar_legends::get($name)?>
		<body class="ajax_bg">
		<div>
			<h1>Редактирование условного обозначения</h1>
			<p>Форма для изменения условного обозначения</p>

			<form id="form" name="form" method="post" class="ui form" action="index.php?task=<?= RUDE_TASK_AJAX_CALENDAR_LEGEND_EDIT_FORM ?>">
				<div class="field" hidden>
					<label>ID</label>
					<div class="ui left labeled icon input">

						<input id="<?=RUDE_FIELD_ID?>" name="<?=RUDE_FIELD_ID?>" value="<?=$calendar_legend->id?>" type="text" placeholder="ID">
						<i class="user icon"></i>
						<div class="ui corner label">
							<i class="icon asterisk"></i>
						</div>
					</div>
				</div>

				<div class="field">
					<label>Описание</label>
					<div class="ui left labeled icon input">
						<input id="<?=RUDE_FIELD_NAME?>" name="<?=RUDE_FIELD_NAME?>" value="<?=$calendar_legend->name?>" type="text" placeholder="Наименование кафедры">
						<i class="user icon"></i>
						<div class="ui corner label">
							<i class="icon asterisk"></i>
						</div>
					</div>
				</div>

				<div class="field">
					<label>Условный знак</label>
					<div class="ui left labeled icon input">
						<input id="simbol" name="simbol" type="text" value="<?=$calendar_legend->simbol?>" placeholder="Условный знак">
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

					simbol:
					{
						identifier: 'simbol',

						rules:
							[{
								type: 'empty',
								prompt: 'Пожалуйста, введите наименование факультета'
							}]
					}


				});

			$(".form").submit(function (event) {

				event.preventDefault();
				var calendar_legend_id=$('#id').val();
				var calendar_legend_name = $('#name').val();
				var calendar_legend_simbol = $('#simbol').val();

				if (!calendar_legend_name  || !calendar_legend_id || !calendar_legend_simbol)
				{
					return true; // allow default semantic-UI validation
				}

				$.ajax({
					type: 'POST',
					url: 'index.php',
					data: {
						task:     '<?= RUDE_TASK_AJAX ?>',
						target:   '<?= RUDE_TASK_AJAX_CALENDAR_LEGEND_EDIT ?>',

						name: calendar_legend_name,
						simbol:calendar_legend_simbol,
						id: calendar_legend_id
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
			<h1>Удаление условного обозначения</h1>
			<p class="red">Внимание! Данная операция необратима!</p>
			<form id="form" name="form" method="post" class="ui form" action="index.php?task=<?= RUDE_TASK_CALENDAR_LEGEND_DELETE ?>">
				Вы точно уверены, что хотите удалить условное обозначение с описанием: <b>"<?= $name ?></b>"?
				<div class="button-box">
					<button class="ui blue submit button"  type="submit" onclick="delete_calendar_legend('<?= $name ?>'); parent.$.fancybox.close();">Да</button>
					<button style="float: right !important;" class="ui blue submit button"  type="submit" onclick="parent.$.fancybox.close();">Нет</button>
				</div>
			</form>
		</div>
		<script>
			function delete_calendar_legend(name)
			{
				$.ajax({
					type: 'POST',
					url: 'index.php',
					data: {
						task:     '<?= RUDE_TASK_AJAX ?>',
						target:   '<?= RUDE_TASK_AJAX_CALENDAR_LEGEND_DELETE ?>',
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
				<th>Условный знак</th>
				<th>Описание</th>


				<th></th>
				<th></th>
			</thead>

			<?

			$calendar_legend_list = calendar_legends::get();

			foreach ($calendar_legend_list as $calendar_legend)
			{
				?>
				<tr>
					<td><?= $calendar_legend->{RUDE_FIELD_ID} ?></td>
					<td><?= $calendar_legend->simbol ?></td>
					<td><?= $calendar_legend->{RUDE_FIELD_NAME} ?></td>

					<td class="no-padding width-20px">
						<a href="<?= url::ajax(RUDE_TASK_AJAX_CALENDAR_LEGEND_EDIT_FORM) . url::param(RUDE_FIELD_NAME, $calendar_legend->name) ?>" class="fancybox-calendar_legend-edit"><img src="src/icons/edit.png" class="small-padding" title="<?= RUDE_TEXT_EDIT ?>" /></a>
					</td>
					<td class="no-padding no-border width-20px">
						<a href="<?= url::ajax(RUDE_TASK_AJAX_CALENDAR_LEGEND_DELETE_FORM) . url::param(RUDE_FIELD_NAME, $calendar_legend->name) ?>" class="fancybox-calendar_legend-delete"><img src="src/icons/remove.png" class="small-padding" title="<?= RUDE_TEXT_DELETE_SELECTED ?>" /></a>
					</td>
				</tr>
			<?
			}
			?>
		</table>
	<?
	}
}