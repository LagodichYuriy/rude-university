<? namespace rude; ?>

<div class="middle">
	<div class="middle-item full-width">
		<div class="tool">
			<a href="<?= url::param(RUDE_TASK, RUDE_TASK_MANAGEMENT_REPORTS, true) . url::param(RUDE_TARGET, RUDE_TARGET_ADD) ?>" class="float"><img src="src/icons/add.png"></a>
			<a href="<?= url::param(RUDE_TASK, RUDE_TASK_MANAGEMENT_REPORTS, true) . url::param(RUDE_TARGET, RUDE_TARGET_ADD) ?>" class="undecorated"><div class="tool-desc"><?= RUDE_TEXT_ADD_NEW_REPORT ?></div></a>
		</div>

		<div id="info-reports">
			<table class="ui collapsing table segment full-width">
				<thead class="small-font">
				<th>#</th>
				<th>Наименование</th>
				</thead>

				<?

				$report_list = reports::get();

				foreach ($report_list as $report)
				{
					?>
					<tr>
						<td><?= $report->{RUDE_FIELD_ID} ?></td>
						<td><?= $report->{RUDE_FIELD_NAME} ?></td>
						<td>
							<a href="<?= url::param(RUDE_TASK, RUDE_TASK_MANAGEMENT_REPORTS, true) . url::param(RUDE_TARGET, RUDE_TARGET_EDIT) . url::param(RUDE_FIELD_ID, $report->id) ?>"><img src="src/icons/edit.png" class="small-padding" title="<?= RUDE_TEXT_EDIT ?>" /></a>
						</td>
					</tr>
					<?
				}
				?>
			</table>
		</div>
	</div>
</div>