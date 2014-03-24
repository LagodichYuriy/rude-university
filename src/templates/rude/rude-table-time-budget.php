<?

namespace rude;

class table_time_budget {

	public static function html() {
		?>
		<table class="budget-table">
			<thead>
				<? table_time_budget::header_html() ?>
			</thead>
			<tbody>
				<? table_time_budget::body_html() ?>
			</tbody>
		</table>
		<?
	}

	private static function header_html() {
		?>
        <table border = 1>
		<tr>
			<td rowspan="3">
				<div class="rotate-270 uppercase">
					<?= RUDE_TABLE_TIME_BUDGET_COURSES ?>
				</div>
			</td>
			<td colspan="4">
				<div class="small-height">
					<?= RUDE_TABLE_TIME_BUDGET_SEPTEMBER ?>
				</div>
			</td>
			<td class="no-border-bottom">
				<div class="small-height"></div>
			</td>
			<td colspan="3">
				<div class="small-height">
					<?= RUDE_TABLE_TIME_BUDGET_OCTOBER ?>
				</div>
			</td>
			<td class="no-border-bottom">
				<div class="small-height"></div>
			</td>
			<td colspan="4">
				<div class="small-height">
					<?= RUDE_TABLE_TIME_BUDGET_NOVEMBER ?>
				</div>
			</td>
            <td class="no-border-bottom">
                <div class="small-height"></div>
            </td>
			<td colspan="4">
				<div class="small-height">
					<?= RUDE_TABLE_TIME_BUDGET_DECEMBER ?>
				</div>
			</td>
			<td class="no-border-bottom">
				<div class="small-height"></div>
			</td>
			<td colspan="3">
				<div class="small-height">
					<?= RUDE_TABLE_TIME_BUDGET_JANUARY ?>
				</div>
			</td>
			<td class="no-border-bottom">
				<div class="small-height"></div>
			</td>
			<td colspan="3">
				<div class="small-height">
					<?= RUDE_TABLE_TIME_BUDGET_FEBRUARY ?>
				</div>
			</td>
			<td class="no-border-bottom">
				<div class="small-height"></div>
			</td>
			<td colspan="4">
				<div class="small-height">
					<?= RUDE_TABLE_TIME_BUDGET_MARCH ?>
				</div>
			</td>
			<td class="no-border-bottom">
				<div class="small-height"></div>
			</td>
			<td colspan="3">
				<div class="small-height">
					<?= RUDE_TABLE_TIME_BUDGET_APRIL ?>
				</div>
			</td>
			<td class="no-border-bottom">
				<div class="small-height"></div>
			</td>
			<td colspan="4">
				<div class="small-height">
					<?= RUDE_TABLE_TIME_BUDGET_MAY ?>
				</div>
			</td>
			<td colspan="4">
				<div class="small-height">
					<?= RUDE_TABLE_TIME_BUDGET_JUNE ?>
				</div>
			</td>
			<td class="small-height no-border-bottom">
				<div class="small-height"></div>
			</td>
			<td colspan="3">
				<div class="small-height">
					<?= RUDE_TABLE_TIME_BUDGET_JULE ?>
				</div>
			</td>
			<td class="no-border-bottom">
				<div class="small-height"></div>
			</td>
			<td colspan="4">
				<div class="small-height">
					<?= RUDE_TABLE_TIME_BUDGET_AUGUST ?>
				</div>
			</td>
			<td rowspan="3">
				<div>
					<?= RUDE_TABLE_TIME_BUDGET_THEORETICAL_EDUСATION ?>
				</div>
			</td>
			<td rowspan="3">
				<div>
					<?= RUDE_TABLE_TIME_BUDGET_EXAMINATION_SESSION ?>
				</div>
			</td>
			<td rowspan="3">
				<div>
					<?= RUDE_TABLE_TIME_BUDGET_PRACTICE ?>
				</div>
			</td>
			<td rowspan="3">
				<div>
					<?= RUDE_TABLE_TIME_BUDGET_DIPLOMA_DESIGN ?>
				</div>
			</td>
			<td rowspan="3">
				<div>
					<?= RUDE_TABLE_TIME_BUDGET_STATE_EXAMS ?>
				</div>
			</td>
			<td rowspan="3">
				<div>
					<?= RUDE_TABLE_TIME_BUDGET_HOLIDAYS ?>
				</div>
			</td>
			<td rowspan="3">
				<div>
					<?= RUDE_TABLE_TIME_BUDGET_ALL ?>
				</div>
			</td>
		</tr>
		<tr>
			<td>1</td>
            <td class="no-border-bottom">1</td>
			<td class="no-border-bottom">8</td>
			<td class="no-border-bottom">15</td>
			<td class="no-border-bottom">22</td>
			<td class="no-border-bottom">
				<div class="underline">29</div>09
			</td>
			<td class="no-border-bottom">6</td>
			<td class="no-border-bottom">13</td>
			<td class="no-border-bottom">20</td>
			<td class="no-border-top no-border-bottom">
				<div class="underline">27</div>10
			</td>
			<td class="no-border-bottom">3</td>
			<td class="no-border-bottom">10</td>
			<td class="no-border-bottom">17</td>
            <td class="no-border-top no-border-bottom">
                <div class="underline">27</div>10
            </td>
			<td class="no-border-bottom">24</td>
			<td class="no-border-bottom">1</td>
			<td class="no-border-bottom">8</td>
			<td class="no-border-bottom">15</td>
			<td class="no-border-bottom">22</td>
			<td class="no-border-top no-border-bottom">
				<div class="underline">29</div>12
			</td>
			<td class="no-border-bottom">5</td>
			<td class="no-border-bottom">12</td>
			<td class="no-border-bottom">19</td>
			<td class="no-border-top no-border-bottom">
				<div class="underline">26</div>01
			</td>
			<td class="no-border-bottom">2</td>
			<td class="no-border-bottom">9</td>
			<td class="no-border-bottom">16</td>
			<td class="no-border-top no-border-bottom">
				<div class="underline">23</div>02
			</td>
			<td class="no-border-bottom">2</td>
			<td class="no-border-bottom">9</td>
			<td class="no-border-bottom">16</td>
			<td class="no-border-bottom">23</td>
			<td class="no-border-top no-border-bottom">
				<div class="underline">30</div>03
			</td>
			<td class="no-border-bottom">6</td>
			<td class="no-border-bottom">13</td>
			<td class="no-border-bottom">20</td>
			<td class="no-border-top no-border-bottom">
				<div class="underline">27</div>04
			</td>
			<td class="no-border-bottom">4</td>
			<td class="no-border-bottom">11</td>
			<td class="no-border-bottom">18</td>
			<td class="no-border-bottom">25</td>
			<td class="no-border-bottom">1</td>
			<td class="no-border-bottom">8</td>
			<td class="no-border-bottom">15</td>
			<td class="no-border-bottom">22</td>
			<td class="no-border-top no-border-bottom">
				<div class="underline">29</div>06
			</td>
			<td class="no-border-bottom">6</td>
			<td class="no-border-bottom">13</td>
			<td class="no-border-bottom">20</td>
			<td class="no-border-top no-border-bottom">
				<div class="underline">27</div>07
			</td>
			<td class="no-border-bottom">3</td>
			<td class="no-border-bottom">10</td>
			<td class="no-border-bottom">17</td>
		</tr>
		<tr>
			<td class="no-border-top">1</td>
			<td class="no-border-top">8</td>
			<td class="no-border-top">15</td>
			<td class="no-border-top">22</td>
			<td class="no-border-top">
				<div class="underline">29</div>09
			</td>
			<td class="no-border-top">6</td>
			<td class="no-border-top">13</td>
			<td class="no-border-top">20</td>
			<td class="no-border-top">
				<div class="underline">27</div>10
			</td>
			<td class="no-border-top">3</td>
			<td class="no-border-top">10</td>
			<td class="no-border-top">17</td>
			<td class="no-border-top">24</td>
			<td class="no-border-top">1</td>
			<td class="no-border-top">8</td>
			<td class="no-border-top">15</td>
			<td class="no-border-top">22</td>
			<td class="no-border-top">
				<div class="underline">29</div>12
			</td>
			<td class="no-border-top">5</td>
			<td class="no-border-top">12</td>
			<td class="no-border-top">19</td>
			<td class="no-border-top">
				<div class="underline">26</div>01
			</td>
			<td class="no-border-top">2</td>
			<td class="no-border-top">9</td>
			<td class="no-border-top">16</td>
			<td class="no-border-top">
				<div class="underline">23</div>02
			</td>
			<td class="no-border-top">2</td>
			<td class="no-border-top">9</td>
			<td class="no-border-top">16</td>
			<td class="no-border-top">23</td>
			<td class="no-border-top">
				<div class="underline">30</div>03
			</td>
			<td class="no-border-top">6</td>
			<td class="no-border-top">13</td>
			<td class="no-border-top">20</td>
			<td class="no-border-top">
				<div class="underline">27</div>04
			</td>
			<td class="no-border-top">4</td>
			<td class="no-border-top">11</td>
			<td class="no-border-top">18</td>
			<td class="no-border-top">25</td>
			<td class="no-border-top">1</td>
			<td class="no-border-top">8</td>
			<td class="no-border-top">15</td>
			<td class="no-border-top">22</td>
			<td class="no-border-top">
				<div class="underline">29</div>06
			</td>
			<td class="no-border-top">6</td>
			<td class="no-border-top">13</td>
			<td class="no-border-top">20</td>
			<td class="no-border-top">
				<div class="underline">27</div>07
			</td>
			<td class="no-border-top">3</td>
			<td class="no-border-top">10</td>
			<td class="no-border-top">17</td>
			<td class="no-border-top">24</td>
		</tr>
        </table>
		<?
	}

	private static function body_html() {
		?>
		<? $a = array('I', 'II', 'III', 'IV');
        for ($i = 0; $i < 4; $i++) : ?>
			<table border = 1>
                        <tr>
                            <td rowspan="3"class = "table-width">
                                <?= $a[$i]; ?>
                            </td>
                        </tr>

				<? for ($j = 0; $j < 52; $j++) : ?>
					<td>
						<div class="small-width small-height">
                            <form method="post" name="drop_down_box">
                                <select name="menu" size="1" style="width:15px" >
                                    <option selected="selected" value="first"></option>
                                    <option value="second" style = "padding-left: 0px">:</option>
                                    <option value="third">=</option>
                                    <option value="fifth">//</option>
                                    <option value="sixth">O</option>
                                    <option value="seventh">/</option>
                                    <option value="eighth">X</option>
                                    <option value="ninth">И</option>
                                </select>
                            </form>
                        </div>
					</td>
				<? endfor; ?>
				<? for ($j = 0; $j < 7; $j++) : ?>
					<td>
						<div class="medium-width"></div>
					</td>
				<? endfor; ?>
			</tr>
            </table>
		<? endfor; ?>
		<?
	}

}