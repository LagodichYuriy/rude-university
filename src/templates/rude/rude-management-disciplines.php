<? namespace rude; ?>

<? require_once 'ajax/rude-ajax-discipline.php';?>

<div class="middle">
    <div class="middle-item full-width">
        <div class="tool">
            <a href="<?= url::ajax(RUDE_TASK_AJAX_DISCIPLINE_ADD_FORM) ?>" class="fancybox-disciplines float"><img src="src/icons/add.png"></a>
            <a href="<?= url::ajax(RUDE_TASK_AJAX_DISCIPLINE_ADD_FORM) ?>" class="fancybox-disciplines undecorated"><div class="tool-desc"><?= RUDE_TEXT_ADD_NEW_DISCIPLINE ?></div></a>
        </div>

        <div id="info-disciplines">
            <? ajax_discipline::html(); ?>
        </div>
    </div>
</div>