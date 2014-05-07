<? namespace rude; ?>

<? require_once 'ajax/rude-ajax-calendar-legend.php'; ?>

<div class="middle">
	<div class="middle-item full-width">
		<div class="tool">
			<a href="<?= url::ajax(RUDE_TASK_AJAX_CALENDAR_LEGEND_ADD_FORM) ?>" class="fancybox-calendar_legend float"><img src="src/icons/add.png"></a>
			<a href="<?= url::ajax(RUDE_TASK_AJAX_CALENDAR_LEGEND_ADD_FORM) ?>" class="fancybox-calendar_legend undecorated"><div class="tool-desc"><?= RUDE_TEXT_ADD_NEW_CALENDAR_LEGEND ?></div></a>
		</div>

		<div id="info-calendar_legend">
			<? ajax_calendar_legend::html(); ?>
		</div>
	</div>
</div>