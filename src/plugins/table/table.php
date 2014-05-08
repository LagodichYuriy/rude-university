<?

class table
{
	public static function table_body()
	{
		for ($i = 0; $i < 4; $i++)
		{
			?>
			<tr><?
				switch ($i)
				{
					case 0:
						?>
						<td>Великая Отечественная война советского народа(в контексте Второй мировой войны)</td>
						<td id="semestr <?= $i ?>">1</td>
						<td id="hours <?= $i ?>">1</td>
						<td rowspan="4" id="name_of_practice">1</td>
						<td rowspan="4" id="semestr">1</td>
						<td rowspan="4" id="weeks">1</td>
						<td rowspan="4" id="zachetnie_edinici">1</td>
						<td rowspan="1">Технологическая</td>
						<td rowspan="1" id="technology_semestr">1</td>
						<td rowspan="1" id="technology_weeks">1</td>
						<td rowspan="1" id="technology_zachetnie_edinici">1</td>
						<td rowspan="4" id="diplom_practice_semestr">1</td>
						<td rowspan="4" id="diplom_practice_weeks">1</td>
						<td rowspan="4" id="diplom_practice_zachetnie_edinici">1</td>
						<td rowspan="4" id="result_zachetnie_edinici">1</td>
						<?break;
					case 1:
						?>
						<td>Охрана труда</td>
						<td id="semestr <?= $i ?>">1</td>
						<td id="hours <?= $i ?>">1</td>
						<td rowspan="3">Преддипломная</td>
						<td rowspan="3" id="preddiplom_semestr">1</td>
						<td rowspan="3" id="preddiplom_weeks">1</td>
						<td rowspan="3" id="preddiplom_zachetnie_edinici">1</td>
						<?break;
					case 2:
						?>
						<td>Коррупция и её общественная опасность</td>
						<td id="semestr <?= $i ?>">1</td>
						<td id="hours <?= $i ?>">1</td>
						<?break;
					case 3:
						?>
						<td>Экономика</td>
						<td id="semestr <?= $i ?>">1</td>
						<td id="hours <?= $i ?>">1</td>
						<?break;
				}?>
			</tr>
		<?
		}
	}

	public static function calculate_table_body($number_of_courses)
	{
		for ($j = 0; $j < $number_of_courses + 1; $j++)
		{
			?>
			<tr id="<?= $j ?>">
			<?
			for ($i = 0; $i < 7; $i++)
			{
				?>
				<td id="<?= $i ?>" class="medium-width small-height">1</td>
			<?
			}
			?>
			</tr>
		<?
		}
	}
}

?>



<table border=1>
	<tr>
		<th class="medium-width">
			<div>
				<?= "Теоретическое обучение" ?>
			</div>
		</th>
		<th class="medium-width">
			<div>
				<?= "Экзаменационные сессии" ?>
			</div>
		</th>
		<th class="medium-width">
			<div>
				<?= "Производственные практики" ?>
			</div>
		</th>
		<th class="medium-width">
			<div>
				<?= "Дипломное проектирование" ?>
			</div>
		</th>
		<th class="medium-width">
			<div>
				<?= "Итоговая аттестация" ?>
			</div>
		</th>
		<th class="medium-width">
			<div>
				<?= "Каникулы" ?>
			</div>
		</th>
		<th class="medium-width">
			<div>
				<?= "Всего" ?>
			</div>
		</th>
	</tr>
	<? table::calculate_table_body(5); ?>
</table>


<table border=1>
	<tr>
		<th class="medium-width" colspan=3>
			<div>
				<?= "IV. Факультативные дисциплины" ?>
			</div>
		</th>
		<th class="medium-width" colspan=4>
			<div>
				<?= "V. Учебные практики" ?>
			</div>
		</th>
		<th class="medium-width" colspan=4>
			<div>
				<?= "VI. Производственные практики" ?>
			</div>
		</th>
		<th class="medium-width" colspan=3>
			<div>
				<?= "VII. Дипломное проектирование" ?>
			</div>
		</th>
		<th class="medium-width" colspan=3>
			<div>
				<?= "VIII. Итоговая аттестация" ?>
			</div>
	</tr>
	<tr>
		<td>Название дисциплины</td>
		<td>Семестр</td>
		<td>Часов</td>
		<td>Название практики</td>
		<td>Семестр</td>
		<td>Недель</td>
		<td><?= "Зачетных\nединиц" ?></td>
		<td>Название практики</td>
		<td>Семестр</td>
		<td>Недель</td>
		<td><?= "Зачетных\nединиц" ?></td>
		<td>Семестр</td>
		<td>Недель</td>
		<td><?= "Зачетных\nединиц" ?></td>
		<td rowspan="5"><?= "1. Защита дипломной\n работы(проекта)в ГЭК" ?></td>
		<td><?= "Зачетных\nединиц" ?></td>
	</tr>
	<? table::table_body(); ?>


</table>