<?

namespace rude;

class ajax_department
{
	public static function html()
	{
		?>
		<table class="ui collapsing table segment full-width">
			<thead class="small-font">
				<th>#</th>
				<th>Наименование кафедры</th>
			</thead>

			<?

			$department_list = departments::get();

			foreach ($department_list as $department)
			{
				?>
				<tr>
					<td><?= $department->{RUDE_FIELD_ID} ?></td>
					<td><?= $department->{RUDE_FIELD_NAME} ?></td>
				</tr>
			<?
			}
			?>
		</table>
	<?
	}
}