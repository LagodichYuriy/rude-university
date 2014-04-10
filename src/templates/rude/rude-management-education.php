<? namespace rude; ?>

<? require_once 'ajax/rude-ajax-education.php'; ?>
<? require_once 'rude-table-time-budget.php'; ?>
<style type = "text/css">

	.no-border-bottom
	{
		text-align:center;
		border-bottom-width: 0;
		min-width: 35px;
	}

	.no-border-top
	{
		text-align:center;
		border-top-width: 0;
		min-width: 35px;
	}

	.underline
	{
		text-decoration: underline;
	}

	.uppercase
	{
		text-transform: uppercase;
	}

	.small-width {
		min-width: 25px;
	}

	.small-height {
		text-align: center;
		min-height: 20px;
	}

	.medium-width {
		text-align: center;
		min-width: 35px;
	}

	#container
	{
		padding-left: 276px;
		padding-right: 34px;
		position: relative;
	}

	.menu
	{
		padding-bottom: 20px;
	}

	.definition
	{
		min-width: 160px;
		float: left;
	}

	.table-width {
		text-align: center;
		min-width: 62px;
	}
	.courses-width
	{
		min-width: 62px;
	}
	.td-width
	{
		min-width: 30px;
	}
	.margin_bottom
	{
		margin-bottom: 200px;
	}
</style>

<div class="middle">
	<div class="middle-item">
		<?table_time_budget::html()?>
	</div>
</div>