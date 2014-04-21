<? namespace rude; ?>

<? require_once 'ajax/rude-ajax-specialty.php'; ?>

<div class="middle">
	<div class="middle-item full-width">
		<div class="tool">
			<a href="<?= url::ajax(RUDE_TASK_AJAX_SPECIALTY_ADD_FORM) ?>" class="fancybox-specialty float"><img src="src/icons/add.png"></a>
			<a href="<?= url::ajax(RUDE_TASK_AJAX_SPECIALTY_ADD_FORM) ?>" class="fancybox-specialty undecorated"><div class="tool-desc"><?= RUDE_TEXT_ADD_NEW_SPECIALTY ?></div></a>
		</div>

		<div id="info-specialties">
			<? ajax_specialty::html(); ?>
		</div>
	</div>
</div>

<? namespace rude; ?>

<? require_once 'ajax/rude-ajax-specialization.php';?>

<div class="middle">
    <div class="middle-item full-width">
        <div class="tool">
            <a href="<?= url::ajax(RUDE_TASK_AJAX_SPECIALIZATION_ADD_FORM) ?>" class="fancybox-specializations float"><img src="src/icons/add.png"></a>
            <a href="<?= url::ajax(RUDE_TASK_AJAX_SPECIALIZATION_ADD_FORM) ?>" class="fancybox-specializations undecorated"><div class="tool-desc"><?= RUDE_TEXT_ADD_NEW_SPECIALIZATION ?></div></a>
        </div>

        <div id="info-specializations">
            <? ajax_specialization::html(); ?>
        </div>
    </div>
</div>