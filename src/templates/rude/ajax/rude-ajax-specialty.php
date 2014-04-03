<?

namespace rude;

class ajax_specialty
{
	public static function add()
	{
		$name      = get(RUDE_FIELD_NAME);
		$shortname = get(RUDE_FIELD_SHORTNAME);

		if ($name === false or $shortname === false)
		{
			return false;
		}


		$faculty_id = specialties::add($name, $shortname);
		return $faculty_id;
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
					<label>Наименование</label>
					<div class="ui left labeled icon input">
						<input id="<?=RUDE_FIELD_NAME?>" name="<?=RUDE_FIELD_NAME?>" type="text" placeholder="Полное наименование">
						<i class="user icon"></i>
						<div class="ui corner label">
							<i class="icon asterisk"></i>
						</div>
					</div>
				</div>

				<div class="field">
					<label>Факультет</label>
					<div class="dropdown">
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
						target:   '<?= RUDE_TASK_AJAX_SPECIALTY_ADD ?>',

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
				</tr>
			<?
			}
			?>
		</table>
	<?
	}
}