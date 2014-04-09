/* ========================== */
/* Semantic-UI error replacer */
/* ========================== */

function rude_semantic_error(html)
{
	$('.ui.error.message').show().html('<ul class="list"><li>' + html + '</li></ul>');
}



/* ======================== */
/* jQuery animation section */
/* ======================== */

function rude_animation(selector, data)
{
	$(selector).slideToggle('slow', function() {
		$(selector).html(data)
	}).slideToggle('slow');
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


/* ================================ */
/* Helps to define current HTTP url */
/* ================================ */
function rude_url()
{
	return window.location.pathname;
}

/* ============================ */
/* Helps to define current host */
/* ============================ */
function rude_url_host()
{
	var http = location.protocol;
	var slashes = http.concat("//");

	return slashes.concat(window.location.hostname);
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



/* ======================================= */
/* jQuery + fancybox popup section [faculties] */
/* ======================================= */

$(document).ready(function ()
{
	$(".fancybox-faculties").fancybox({
		type: 'iframe',

		width: 432 + 20,
		height: 239,
		fitToView : false,
		autoSize : false,

	});
});

$(document).ready(function ()
{
	$(".fancybox-faculties-edit").fancybox({
		type: 'iframe',

		width: 432 + 20,
		height: 239,
		fitToView : false,
		autoSize : false,

	});
});


$(document).ready(function ()
{
	$(".fancybox-faculties-delete").fancybox({
		type: 'iframe',

		width: 432 + 20,
		height: 172,
		fitToView : false,
		autoSize : false,

	});
});




/* ======================================= */
/* jQuery + fancybox popup section [qualification] */
/* ======================================= */

$(document).ready(function ()
{
	$(".fancybox-qualification").fancybox({
		type: 'iframe',

		width: 432 + 20,
		height: 180,
		fitToView : false,
		autoSize : false,

	});
});

$(document).ready(function ()
{
	$(".fancybox-qualification-edit").fancybox({
		type: 'iframe',

		width: 432 + 20,
		height: 209,
		fitToView : false,
		autoSize : false,

	});
});


$(document).ready(function ()
{
	$(".fancybox-qualification-delete").fancybox({
		type: 'iframe',

		width: 432 + 20,
		height: 172,
		fitToView : false,
		autoSize : false,

	});
});
