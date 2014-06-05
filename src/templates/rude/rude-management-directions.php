<? namespace rude; ?>

<? require_once 'ajax/rude-ajax-directions.php';?>

<div class="middle">
	<div class="middle-item full-width">
		<div class="tool">
			<a href="<?= url::ajax(RUDE_TASK_AJAX_DIRECTION_ADD_FORM) ?>" class="fancybox-directions float"><img src="src/icons/add.png"></a>
			<a href="<?= url::ajax(RUDE_TASK_AJAX_DIRECTION_ADD_FORM) ?>" class="fancybox-directions undecorated"><div class="tool-desc"><?= RUDE_TEXT_ADD_NEW_DIRECTION ?></div></a>
		</div>

		<div id="info-direction">
			<? ajax_direction::html(); ?>
		</div>
	</div>
</div>
