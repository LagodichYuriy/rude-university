/* ======================== */
/* jQuery animation section */
/* ======================== */

function rude_animation(selector, data)
{
	$(selector).fadeOut('slow', function() {
		$(selector).html(data)
	}).fadeIn('slow');
}


/* ======================================= */
/* jQuery + fancybox popup section [users] */
/* ======================================= */

$(document).ready(function ()
{
	$(".fancybox-users").fancybox({
		type: 'iframe',

		width: 432 + 20,
		height: 335 + 20 + 40,
		fitToView : false,
		autoSize : false,
		'beforeClose': function()
		{
			rude_reload_users();
			rude_reload_roles();
		}
	});
});

$(document).ready(function ()
{
	$(".fancybox-users-small").fancybox({
		type: 'iframe',

		width: 432 + 20,
		height: 172 + 20 + 10,
		fitToView : false,
		autoSize : false,
		'beforeClose': function()
		{
			rude_reload_users();
			rude_reload_roles();
		}
	});
});

function rude_reload_users()
{
	$.ajax({
		type: 'POST',
		url: 'index.php',
		data: {
			task:     'ajax',             // RUDE_TASK_AJAX
			target:   'ajax_user_summary' // RUDE_TASK_AJAX_USER_SUMMARY
		},

		success: function(data)
		{
			rude_animation('#info-users', data);
		}
	});
}



/* ======================================= */
/* jQuery + fancybox popup section [roles] */
/* ======================================= */

$(document).ready(function ()
{
	$(".fancybox-roles-smallest").fancybox({
		type: 'iframe',

		width: 432 + 20,
		height: 261 + 20,
		fitToView : false,
		autoSize : false,
		'beforeClose': function()
		{
			rude_reload_roles();
		}
	});
});

$(document).ready(function ()
{
	$(".fancybox-roles-small").fancybox({
		type: 'iframe',

		width: 432 + 20,
		height: 172 + 20 + 10,
		fitToView : false,
		autoSize : false,
		'beforeClose': function()
		{
			rude_reload_roles();
		}
	});
});

function rude_reload_roles()
{
	$.ajax({
		type: 'POST',
		url: 'index.php',
		data: {
			task:     'ajax',             // RUDE_TASK_AJAX
			target:   'ajax_role_summary' // RUDE_TASK_AJAX_ROLE_SUMMARY
		},

		success: function(data)
		{
			rude_animation('#info-roles', data);
		}
	});
}