<?

namespace rude;

class report_header
{
	/** @param report $report */
	public static function html($report)
	{
		?>
		<table class="font-11 line-16 margin-bottom-50">
			<tr>
				<td class="width-25">
					<p>УТВЕРЖДАЮ</p>
					<p>Ректор учреждения высшего образования</p>
					<p>«Белорусский государственный университет информатики и радиоэлектроники»</p>
					<p>__________ <?= $report->rector ?></p>
					<p>__________</p>

					<div class="clear"></div>

					<p>Регистрационный №: <?= $report->registration_number ?></p>
				</td>

				<td class="width-50 font-12 center padding">
					<p>Министерство образования Республики Беларусь</p>
					<p>
						<b>РАБОЧИЙ УЧЕБНЫЙ ПЛАН</b>
					</p>
					<p>
						<b>Для получения высшего образования</b>
					</p>
					<p>(<?= $report->training_form ?>)</p>
					<p>Специальность: <b><?= $report->specialty ?></b></p>
					<p>Специализация: <b><?= $report->specialization ?></b></p>
					<p>Для студентов набора <?= $report->year ?> года</p>
				</td>

				<td class="width-25">
					<p>
						Учреждение высшего образования
						«Белорусский государственный университет информатики и радиоэлектроники»
					</p>

					<div class="clear"></div>

					<p>
						Квалификация специалиста:
						<?= $report->qualification ?>
					</p>

					<p>
						Срок обучения в БГУИР <?= $report->duration ?> <?= spell::years($report->duration) ?>
					</p>
				</td>
			</tr>
		</table>
		<?
	}
}