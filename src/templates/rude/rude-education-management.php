<? namespace rude; ?>

<? require_once 'ajax/rude-ajax-education.php'; ?>
<? require_once 'rude-table-time-budget.php'; ?>

<div class="box">
	<h2>Управление учебной программой</h2>
</div>

<div class="middle">
	<div class="middle-item">
		<? table_time_budget::html() ?>
	</div>
</div>