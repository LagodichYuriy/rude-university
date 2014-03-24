<?

namespace rude;

class ajax_qualification
{
	public static function html()
	{
		?>
		<table class="ui collapsing table segment full-width">
			<thead class="small-font">
				<th>#</th>
				<th>Наименование</th>
			</thead>

			<?

			$qualification_list = qualifications::get();

			foreach ($qualification_list as $qualification)
			{
				?>
				<tr>
					<td><?= $qualification->{RUDE_FIELD_ID} ?></td>
					<td><?= $qualification->{RUDE_FIELD_NAME} ?></td>
				</tr>
			<?
			}
			?>
		</table>
	<?
	}
}