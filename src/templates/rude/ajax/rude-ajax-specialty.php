<?

namespace rude;

class ajax_specialty
{
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