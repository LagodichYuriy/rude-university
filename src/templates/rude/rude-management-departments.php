<? namespace rude; ?>

<? require_once 'ajax/rude-ajax-department.php'; ?>

<div class="middle">
	<div class="middle-item full-width">
		<div class="tool">
			<a href="<?= url::ajax(RUDE_TASK_AJAX_DEPARTMENT_ADD_FORM) ?>" class="fancybox-department float"><img src="src/icons/add.png"></a>
			<a href="<?= url::ajax(RUDE_TASK_AJAX_DEPARTMENT_ADD_FORM) ?>" class="fancybox-department undecorated"><div class="tool-desc"><?= RUDE_TEXT_ADD_NEW_DEPARTMENT ?></div></a>
		</div>

		<div id="info-department">
			<? ajax_department::html(); ?>
		</div>
	</div>
</div>