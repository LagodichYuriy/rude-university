<?

namespace rude;

define('RUDE_HTML_CALENDAR_COLUMN_WIDTH', 86);

class report_calendar
{
	/** @param report $report */
	public static function html($report)
	{
		?>
		<table class="full-width large-font">
			<tr>
				<th>
					<b>1. <?= RUDE_TABLE_TIME_BUDGET_TIMETABLE ?></b>
				</th>
				<th>
					<b>2. <?= RUDE_TABLE_TIME_BUDGET_TOTALS ?></b>
				</th>
			</tr>
		</table>

		<div class="relative">
			<div class="calendar-left">
				<table class="border font-10 no-padding">
					<? report_calendar::html_head() ?>

					<?
						$calendar_rows = explode('~', $report->calendar);
					?>

					<tr>
						<td>I</td>
						<? report_calendar::html_loop_input($calendar_rows[0]) ?>
					</tr>

					<tr>
						<td>II</td>
						<? report_calendar::html_loop_input($calendar_rows[1]) ?>
					</tr>

					<tr>
						<td>III</td>
						<? report_calendar::html_loop_input($calendar_rows[2]) ?>
					</tr>

					<tr>
						<td>IV</td>
						<? report_calendar::html_loop_input($calendar_rows[3]) ?>
					</tr>
				</table>
			</div>

			<div class="calendar-right">
				<table class="border font-10 no-padding">
					<tr>
						<th class="large-width">
							<? new image('Теоретическое', RUDE_HTML_CALENDAR_COLUMN_WIDTH, RUDE_REPORT_IMAGE_DEFAULT_HEIGHT, 90, RUDE_IMAGE_DEFAULT_FONT, 8) ?>
							<? new image('обучение',      RUDE_HTML_CALENDAR_COLUMN_WIDTH, RUDE_REPORT_IMAGE_DEFAULT_HEIGHT, 90, RUDE_IMAGE_DEFAULT_FONT, 8) ?>
						</th>
						<th class="large-width">
							<? new image('Экзаменационные', RUDE_HTML_CALENDAR_COLUMN_WIDTH, RUDE_REPORT_IMAGE_DEFAULT_HEIGHT, 90, RUDE_IMAGE_DEFAULT_FONT, 8) ?>
							<? new image('сессии',          RUDE_HTML_CALENDAR_COLUMN_WIDTH, RUDE_REPORT_IMAGE_DEFAULT_HEIGHT, 90, RUDE_IMAGE_DEFAULT_FONT, 8) ?>
						</th>
						<th class="medium-width"><? new image('Практики', RUDE_HTML_CALENDAR_COLUMN_WIDTH, RUDE_REPORT_IMAGE_DEFAULT_HEIGHT, 90, RUDE_IMAGE_DEFAULT_FONT, 8) ?></th>
						<th class="large-width">
							<? new image('Дипломное',      RUDE_HTML_CALENDAR_COLUMN_WIDTH, RUDE_REPORT_IMAGE_DEFAULT_HEIGHT, 90, RUDE_IMAGE_DEFAULT_FONT, 8) ?>
							<? new image('проектирование', RUDE_HTML_CALENDAR_COLUMN_WIDTH, RUDE_REPORT_IMAGE_DEFAULT_HEIGHT, 90, RUDE_IMAGE_DEFAULT_FONT, 8) ?>
						</th>
						<th class="large-width">
							<? new image('Итоговая',   RUDE_HTML_CALENDAR_COLUMN_WIDTH, RUDE_REPORT_IMAGE_DEFAULT_HEIGHT, 90, RUDE_IMAGE_DEFAULT_FONT, 8) ?>
							<? new image('аттестация', RUDE_HTML_CALENDAR_COLUMN_WIDTH, RUDE_REPORT_IMAGE_DEFAULT_HEIGHT, 90, RUDE_IMAGE_DEFAULT_FONT, 8) ?>
						</th>

						<th class="medium-width"><? new image('Каникулы', RUDE_HTML_CALENDAR_COLUMN_WIDTH, RUDE_REPORT_IMAGE_DEFAULT_HEIGHT, 90, RUDE_IMAGE_DEFAULT_FONT, 8) ?></th>
						<th class="medium-width"><? new image('Всего',    RUDE_HTML_CALENDAR_COLUMN_WIDTH, RUDE_REPORT_IMAGE_DEFAULT_HEIGHT, 90, RUDE_IMAGE_DEFAULT_FONT, 8) ?></th>
					</tr>

					<tr>
						<? report_calendar::html_calendar_total($calendar_rows) ?>
					</tr>
				</table>
			</div>
		</div>
		<?
	}

	public static function html_calendar_total($calendar_rows)
	{
//		foreach ()
	}
	
	public static function html_head()
	{
		?>
		<tr>
			<th rowspan="3">
				<div>
					<?= string::after_each_char(RUDE_TABLE_TIME_BUDGET_COURSES, RUDE_HTML_NEWLINE); ?>
				</div>
			</th>
			<th colspan="4">
				<div class="small-height">
					<?= RUDE_TABLE_TIME_BUDGET_SEPTEMBER ?>
				</div>
			</th>
			<th>
				<div class="small-height">
				</div>
			</th>
			<th colspan="3" class="border">
				<div class="small-height">
					<?= RUDE_TABLE_TIME_BUDGET_OCTOBER ?>
				</div>
			</th>
			<th>
				<div class="small-height">
				</div>
			</th>
			<th colspan="4">
				<div class="small-height">
					<?= RUDE_TABLE_TIME_BUDGET_NOVEMBER ?>
				</div>
			</th>
			<th colspan="4">
				<div class="small-height">
					<?= RUDE_TABLE_TIME_BUDGET_DECEMBER ?>
				</div>
			</th>
			<th>
				<div class="small-height"></div>
			</th>
			<th colspan="3">
				<div class="small-height">
					<?= RUDE_TABLE_TIME_BUDGET_JANUARY ?>
				</div>
			</th>
			<th>
				<div class="small-height"></div>
			</th>
			<th colspan="3">
				<div class="small-height">
					<?= RUDE_TABLE_TIME_BUDGET_FEBRUARY ?>
				</div>
			</th>
			<th>
				<div class="small-height"></div>
			</th>
			<th colspan="4">
				<div class="small-height">
					<?= RUDE_TABLE_TIME_BUDGET_MARCH ?>
				</div>
			</th>
			<th>
				<div class="small-height"></div>
			</th>
			<th colspan="3">
				<div class="small-height">
					<?= RUDE_TABLE_TIME_BUDGET_APRIL ?>
				</div>
			</th>
			<th>
				<div class="small-height"></div>
			</th>
			<th colspan="4">
				<div class="small-height">
					<?= RUDE_TABLE_TIME_BUDGET_MAY ?>
				</div>
			</th>
			<th colspan="4">
				<div class="small-height">
					<?= RUDE_TABLE_TIME_BUDGET_JUNE ?>
				</div>
			</th>
			<th class="small-height ">
				<div class="small-height"></div>
			</th>
			<th colspan="3">
				<div class="small-height">
					<?= RUDE_TABLE_TIME_BUDGET_JULE ?>
				</div>
			</th>
			<th>
				<div class="small-height"></div>
			</th>
			<th colspan="4">
				<div class="small-height">
					<?= RUDE_TABLE_TIME_BUDGET_AUGUST ?>
				</div>
			</th>
		</tr>
		<tr>
			<td>1</td>
			<td>8</td>
			<td>15</td>
			<td>22</td>
			<td>
				<div class="underline">29</div>
				09
			</td>
			<td>6</td>
			<td>13</td>
			<td>20</td>
			<td>
				<div class="underline">27</div>
				10
			</td>
			<td>3</td>
			<td>10</td>
			<td>17</td>
			<td>24</td>
			<td>1</td>
			<td>8</td>
			<td>15</td>
			<td>22</td>
			<td>
				<div class="underline">29</div>
				12
			</td>
			<td>5</td>
			<td>12</td>
			<td>19</td>
			<td>
				<div class="underline">26</div>
				01
			</td>
			<td>2</td>
			<td>9</td>
			<td>16</td>
			<td>
				<div class="underline">23</div>
				02
			</td>
			<td>2</td>
			<td>9</td>
			<td>16</td>
			<td>23</td>
			<td>
				<div class="underline">30</div>
				03
			</td>
			<td>6</td>
			<td>13</td>
			<td>20</td>
			<td>
				<div class="underline">27</div>
				04
			</td>
			<td>4</td>
			<td>11</td>
			<td>18</td>
			<td>25</td>
			<td>1</td>
			<td>8</td>
			<td>15</td>
			<td>22</td>
			<td>
				<div class="underline">29</div>
				06
			</td>
			<td>6</td>
			<td>13</td>
			<td>20</td>
			<td>
				<div class="underline">27</div>
				07
			</td>
			<td>3</td>
			<td>10</td>
			<td>17</td>
			<td>24</td>
		</tr>
		<tr>
			<td>7</td>
			<td>14</td>
			<td>21</td>
			<td>28</td>
			<td>
				<div class="underline">05</div>
				10
			</td>
			<td>12</td>
			<td>19</td>
			<td>26</td>
			<td>
				<div class="underline">02</div>
				11
			</td>
			<td>7</td>
			<td>16</td>
			<td>23</td>
			<td>30</td>
			<td>7</td>
			<td>14</td>
			<td>21</td>
			<td>28</td>
			<td>
				<div class="underline">04</div>
				01
			</td>
			<td>11</td>
			<td>18</td>
			<td>25</td>
			<td>
				<div class="underline">01</div>
				02
			</td>
			<td>8</td>
			<td>15</td>
			<td>22</td>
			<td>
				<div class="underline">01</div>
				03
			</td>
			<td>8</td>
			<td>15</td>
			<td>22</td>
			<td>29</td>
			<td>
				<div class="underline">05</div>
				04
			</td>
			<td>12</td>
			<td>19</td>
			<td>26</td>
			<td>
				<div class="underline">03</div>
				05
			</td>
			<td>10</td>
			<td>17</td>
			<td>24</td>
			<td>31</td>
			<td>7</td>
			<td>14</td>
			<td>21</td>
			<td>28</td>
			<td>
				<div class="underline">05</div>
				07
			</td>
			<td>12</td>
			<td>19</td>
			<td>26</td>
			<td>
				<div class="underline">02</div>
				08
			</td>
			<td>9</td>
			<td>16</td>
			<td>23</td>
			<td>31</td>
		</tr>
		<?
	}

	public static function html_loop_input($calendar_row)
	{
		$cells = explode(',', $calendar_row);

		foreach ($cells as $cell)
		{
			?><td><?= $cell ?></td><?
		}
	}
}