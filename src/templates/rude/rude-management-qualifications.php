<? namespace rude; ?>

<? require_once 'ajax/rude-ajax-qualification.php'; ?>

<div class="middle">
	<div class="middle-item full-width">
		<div class="tool">
			<a href="<?= url::ajax(RUDE_TASK_AJAX_QUALIFICATION_ADD_FORM) ?>" class="fancybox-faculties float"><img src="src/icons/add.png"></a>
			<a href="<?= url::ajax(RUDE_TASK_AJAX_QUALIFICATION_ADD_FORM) ?>" class="fancybox-users undecorated"><div class="tool-desc"><?= RUDE_TEXT_ADD_NEW_QUALIFICATION ?></div></a>
		</div>

		<div id="info-specialties">
			<? ajax_qualification::html(); ?>
		</div>
	</div>
</div>