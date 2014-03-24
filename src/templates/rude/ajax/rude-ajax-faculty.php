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

	public static function html()
	{
		?>
		<table class="ui collapsing table segment full-width">
			<thead class="small-font">
				<th>#</th>
				<th>Полное наименование</th>
				<th>Сокращённое наименование</th>
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
				</tr>
			<?
			}
			?>
		</table>
	<?
	}
}