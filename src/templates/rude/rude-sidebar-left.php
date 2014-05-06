<? namespace rude; ?>

<div id="navigation">
	<? require_once 'ajax/rude-ajax-user.php'; ?>
	<? require_once 'ajax/rude-ajax-role.php'; ?>

	<div class="ui sidebar active inverted vertical menu">
		<div class="item">
			<b><?= RUDE_TEXT_NAVIGATION_PANEL ?></b>
			<div class="menu">
				<a class="item" href="<?= RUDE_FILE_INDEX ?>"><?= RUDE_TEXT_INDEX_PAGE ?></a>
			</div>

			<? if (ajax_user::has_access() or ajax_role::has_access()) : ?>
				<b><?= RUDE_TEXT_MANAGEMENT_COMPLEX ?></b>
				<div class="menu">
					<a class="item" href="?task=<?= RUDE_TASK_MANAGEMENT_USERS ?>"><?= RUDE_TEXT_MANAGEMENT_USERS ?></a>
				</div>
			<? endif; ?>

			<b><?= RUDE_TEXT_SUMMARY_INFORMATION ?></b>
			<div class="menu">
				<a class="item" href="?task=<?= RUDE_TASK_MANAGEMENT_DEPARTMENTS    ?>"><?= RUDE_TEXT_MANAGEMENT_DEPARTMENTS        ?></a>
				<a class="item" href="?task=<?= RUDE_TASK_MANAGEMENT_FACULTIES      ?>"><?= RUDE_TEXT_MANAGEMENT_FACULTIES          ?></a>
				<a class="item" href="?task=<?= RUDE_TASK_MANAGEMENT_QUALIFICATIONS ?>"><?= RUDE_TEXT_MANAGEMENT_QUALIFICATIONS     ?></a>
				<a class="item" href="?task=<?= RUDE_TASK_MANAGEMENT_SPECIALTIES    ?>"><?= RUDE_TEXT_MANAGEMENT_SPECIALTIES        ?></a>
				<a class="item" href="?task=<?= RUDE_TASK_MANAGEMENT_SPECIALIZATIONS?>"><?= RUDE_TEXT_MANAGEMENT_SPECIALIZATIONS    ?></a>
				<a class="item" href="?task=<?= RUDE_TASK_MANAGEMENT_DISCIPLINES    ?>"><?= RUDE_TEXT_MANAGEMENT_DISCIPLINES        ?></a>
				<a class="item" href="?task=<?= RUDE_TASK_MANAGEMENT_CALENDAR_LEGENDS    ?>"><?= RUDE_TEXT_MANAGEMENT_CALENDAR_LEGENDS       ?></a>
			</div>

			<b><?= RUDE_TEXT_EDUCATIONAL_PROGRAM ?></b>
			<div class="menu">
				<!--				<a class="item" href="?task=--><?//= RUDE_TASK_MANAGEMENT-_EDUCATION ?><!--">--><?//= RUDE_TEXT_MANAGEMENT_EDUCATION ?><!--</a>-->
				<a class="item" href="?task=<?= RUDE_TASK_MANAGEMENT_REPORTS ?>"><?= RUDE_TEXT_MANAGEMENT_REPORTS ?></a>
				<a class="item" href="?task=<?= RUDE_TASK_MANAGEMENT_REPORTS ?><?= url::param(RUDE_TARGET, RUDE_TARGET_ADD) ?>"><?= RUDE_TEXT_MANAGEMENT_REPORTS_ADD ?></a>

			</div>

			<div class="menu">
				<a class="item" href="?task=<?= RUDE_TASK_LOGOUT ?>"><?= RUDE_TEXT_LOGOUT ?></a>
			</div>
		</div>
	</div>
	<div class="sidebar_button" onclick="$('.vertical.sidebar').sidebar('toggle');"></div>
</div>


<script>
	$('.vertical.sidebar')
		.sidebar('toggle')
	;
</script>

