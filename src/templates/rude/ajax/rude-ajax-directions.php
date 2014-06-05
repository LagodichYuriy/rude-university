<?

namespace rude;

class ajax_direction
{
	public static function add()
	{
		$name      = get(RUDE_FIELD_NAME);
		$code      = get(RUDE_FIELD_CODE);

		if ($name === false or $code === false)
		{
			return false;
		}


		$direction_id = directions::add($name, $code);
		return $direction_id;
	}

	public static function delete()
	{
		$name = get(RUDE_FIELD_NAME);
		directions::delete($name);
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
			<h1>Добавление основного направления</h1>
			<p>Форма для добавления основного направления</p>
			<form id="form" name="form" method="post" class="ui form" action="index.php?task=<?= RUDE_TASK_AJAX_DIRECTION_ADD_FORM ?>">
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
					<label>Код основного направления</label>
					<div class="ui left labeled icon input">
						<input id="<?=RUDE_FIELD_CODE?>" name="<?=RUDE_FIELD_CODE?>" type="text" placeholder="Код основного направления">
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
								prompt: 'Пожалуйста, введите наименование специлазиации'
							}]
					},

					code:
					{
						identifier: 'code',

						rules:
							[{
								type: 'empty',
								prompt: 'Пожалуйста, введите код основного направления'
							}]
					}


				});

			$(".form").submit(function (event) {

				event.preventDefault();

				var direction_name = $('#name').val();
				var direction_code = $('#code').val();

				if (!direction_name || !direction_code)
				{
					return true; // allow default semantic-UI validation
				}

				$.ajax({
					type: 'POST',
					url: 'index.php',
					data: {
						task:     '<?= RUDE_TASK_AJAX ?>',
						target:   '<?= RUDE_TASK_AJAX_DIRECTION_ADD ?>',

						name: direction_name,
						code: direction_code
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

		$id     = get(RUDE_FIELD_ID);
		$name   = get(RUDE_FIELD_NAME);
		$code   = get(RUDE_FIELD_CODE);


		$q = new uquery(RUDE_TABLE_DIRECTIONS);

		if ($name) { $q->update(RUDE_FIELD_NAME,       $name); }
		if ($code) { $q->update(RUDE_FIELD_CODE,       $code); }




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
		$directions = directions::get($name)?>
		<body class="ajax_bg">
		<div>
			<h1>Редактирование основного направления</h1>
			<p>Форма для изменения основного направления</p>
			<form id="form" name="form" method="post" class="ui form" action="index.php?task=<?= RUDE_TASK_AJAX_DIRECTION_EDIT_FORM ?>">
				<div class="field" hidden>
					<label>ID</label>
					<div class="ui left labeled icon input">
						<input id="<?=RUDE_FIELD_ID?>" name="<?=RUDE_FIELD_ID?>" value="<?=$directions->id?>" type="text" placeholder="ID">
						<i class="user icon"></i>
						<div class="ui corner label">
							<i class="icon asterisk"></i>
						</div>
					</div>
				</div>
				<div class="field">
					<label>Наименование</label>
					<div class="ui left labeled icon input">
						<input id="<?=RUDE_FIELD_NAME?>" name="<?=RUDE_FIELD_NAME?>" value="<?=$directions->name?>" type="text" placeholder="Наименование">
						<i class="user icon"></i>
						<div class="ui corner label">
							<i class="icon asterisk"></i>
						</div>
					</div>
				</div>
				<div class="field">
					<label>Код</label>
					<div class="ui left labeled icon input">
						<input id="<?=RUDE_FIELD_CODE?>" name="<?=RUDE_FIELD_CODE?>" value="<?=$directions->code?>" type="text" placeholder="Код">
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
								prompt: 'Пожалуйста, введите наименование основного направления'
							}]
					},

					code:
					{
						identifier: 'code',

						rules:
							[{
								type: 'empty',
								prompt: 'Пожалуйста, введите код основного направления'
							}]
					}


				});

			$(".form").submit(function (event) {

				event.preventDefault();
				var direction_id   = $('#id').val();
				var direction_name = $('#name').val();
				var direction_code = $('#code').val();

				if (!direction_name || !direction_code || !direction_id)
				{
					return true; // allow default semantic-UI validation
				}

				$.ajax({
					type: 'POST',
					url: 'index.php',
					data: {
						task:     '<?= RUDE_TASK_AJAX ?>',
						target:   '<?= RUDE_TASK_AJAX_DIRECTION_EDIT ?>',

						name:   direction_name,
						code:   direction_code,
						id:     direction_id
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
			<h1>Удаление основного направления</h1>
			<p class="red">Внимание! Данная операция необратима!</p>
			<form id="form" name="form" method="post" class="ui form" action="index.php?task=<?= RUDE_TASK_AJAX_DIRECTION_DELETE ?>">
				Вы точно уверены, что хотите удалить основное направление: <b>"<?= $name ?></b>"?
				<div class="button-box">
					<button class="ui blue submit button"  type="submit" onclick="delete_direction('<?= $name ?>'); parent.$.fancybox.close();">Да</button>
					<button style="float: right !important;" class="ui blue submit button"  type="submit" onclick="parent.$.fancybox.close();">Нет</button>
				</div>
			</form>
		</div>
		<script>
			function delete_direction(name)
			{
				$.ajax({

					type:   'POST',
					url:    'index.php',
					data: {
						task:     '<?= RUDE_TASK_AJAX ?>',
						target:   '<?= RUDE_TASK_AJAX_DIRECTION_DELETE ?>',
						name:     '<?= $name ?>'
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
		<table id="info_directions" class="ui collapsing table segment full-width">
			<thead class="small-font">
			<th>#</th>
			<th>Наименование</th>
			<th>Код</th>
			<th></th>
			<th></th>
			</thead>

			<?

			$direction_list = directions::get();

			foreach ($direction_list as $direction)
			{
				?>
				<tr>
					<td><?= $direction->{RUDE_FIELD_ID} ?></td>
					<td><?= $direction->{RUDE_FIELD_NAME} ?></td>
					<td><?= $direction->{RUDE_FIELD_CODE} ?></td>
					<td class="no-padding width-20px">
						<a href="<?= url::ajax(RUDE_TASK_AJAX_DIRECTION_EDIT_FORM) . url::param(RUDE_FIELD_NAME, $direction->name) ?>" class="fancybox-directions-edit"><img src="src/icons/edit.png" class="small-padding" title="<?= RUDE_TEXT_EDIT ?>" /></a>
					</td>
					<td class="no-padding no-border width-20px">
						<a href="<?= url::ajax(RUDE_TASK_AJAX_DIRECTION_DELETE_FORM) . url::param(RUDE_FIELD_NAME, $direction->name) ?>" class="fancybox-directions-delete"><img src="src/icons/remove.png" class="small-padding" title="<?= RUDE_TEXT_DELETE_SELECTED ?>" /></a>
					</td>
				</tr>
			<?
			}
			?>
		</table>
	<?
	}
}