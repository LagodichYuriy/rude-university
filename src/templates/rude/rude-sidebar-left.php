<? namespace rude; ?>

<div id="navigation" class="relative">
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
			<div class="sidebar_button" onclick="$('.vertical.sidebar').sidebar('toggle');
			if ($('.vertical.sidebar').sidebar('is open'))
			{
				document.cookie = 'sidebar_is_showed=1;path=\;expires=42000';

				iconLeft();
			}
				else
			{
				document.cookie = 'sidebar_is_showed=0;path=\;expires=42000';

				iconRight();
			}
			">
				<div id="sidebar-trigger" class="relative full-height">
					<i id="sidebar-trigger-left"  class="sidebar-trigger triangle left  icon" style="display: none!important;"></i>
				</div>
			</div>
		</div>
	</div>
</div>


<script>
	function iconRight()
	{
		$('#sidebar-trigger').html('<i class="sidebar-trigger triangle right icon"></i>');
	}

	function iconLeft()
	{
		$('#sidebar-trigger').html('<i class="sidebar-trigger triangle left icon"></i>');
	}

	function getCookie(name) {
		var cookie = " " + document.cookie;
		var search = " " + name + "=";
		var setStr = null;
		var offset = 0;
		var end = 0;
		if (cookie.length > 0) {
			offset = cookie.indexOf(search);
			if (offset != -1) {
				offset += search.length;
				end = cookie.indexOf(";", offset)
				if (end == -1) {
					end = cookie.length;
				}
				setStr = unescape(cookie.substring(offset, end));
			}
		}
		return(setStr);
	}

	$('.vertical.sidebar').sidebar('show');
	iconLeft();


	if (getCookie('sidebar_is_showed')=='1')
	{
		$('.vertical.sidebar').sidebar('show');
		$('.vertical.sidebar').sidebar('push page');
		iconLeft();
	}
	else
	{
		$('.vertical.sidebar').sidebar('hide');
		iconRight();
	}
</script>

