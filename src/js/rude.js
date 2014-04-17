/* ========================== */
/* Semantic-UI error replacer */
/* ========================== */

function rude_semantic_error(html)
{
	$('.ui.error.message').show().html('<ul class="list"><li>' + html + '</li></ul>');
}

/* ================================= */
/* JavaScript page redirect function */
/* ================================= */
function rude_redirect(url)
{
	window.location.replace(url);
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

/* ===================================== */
/* Helps to erase the last one character */
/* ===================================== */
function rude_remove_last_char(string)
{
	return string.substring(0, string.length - 1);
}


/* ======================================= */
/* jQuery + fancybox popup section [users] */
/* ======================================= */

$(document).ready(function ()
{
	$(".fancybox-users").fancybox({
		type: 'iframe',

		width: 432 + 20,
		height: 335  + 30,
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
		height: 172,
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
		height: 240,
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
		height: 172,
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
		'beforeClose': function()
		{
			rude_reload_faculties();
		}
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
		'beforeClose': function()
		{
			rude_reload_faculties();
		}

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
		'beforeClose': function()
		{
			rude_reload_faculties();
		}

	});
});

function rude_reload_faculties()
{
	$.ajax({
		type: 'POST',
		url: 'index.php',
		data: {
			task:     'ajax',             // RUDE_TASK_AJAX
			target:   'ajax_faculty_summary'// RUDE_TASK_AJAX_ROLE_SUMMARY
		},

		success: function(data)
		{
			rude_animation('#info-faculties', data);
		}
	});
}


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
		'beforeClose': function()
		{
			rude_reload_qualifications();
		}

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
		'beforeClose': function()
		{
			rude_reload_qualifications();
		}

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
		'beforeClose': function()
		{
			rude_reload_qualifications();
		}

	});
});

function rude_reload_qualifications()
{
	$.ajax({
		type: 'POST',
		url: 'index.php',
		data: {
			task:     'ajax',             // RUDE_TASK_AJAX
			target:   'ajax_qualification_summary'// RUDE_TASK_AJAX_ROLE_SUMMARY
		},

		success: function(data)
		{
			rude_animation('#info-qualification', data);
		}
	});
}



/* ======================================= */
/* jQuery + fancybox popup section [specialty] */
/* ======================================= */

$(document).ready(function ()
{
	$(".fancybox-specialty").fancybox({
		type: 'iframe',

		width: 432 + 20,
		height: 310,
		fitToView : false,
		autoSize : false,
		'beforeClose': function()
		{
			rude_reload_specialty();
		}

	});
});

$(document).ready(function ()
{
	$(".fancybox-specialty-edit").fancybox({
		type: 'iframe',

		width: 432 + 20,
		height: 310,
		fitToView : false,
		autoSize : false,
		'beforeClose': function()
		{
			rude_reload_specialty();
		}

	});
});


$(document).ready(function ()
{
	$(".fancybox-specialty-delete").fancybox({
		type: 'iframe',

		width: 432 + 20,
		height: 190,
		fitToView : false,
		autoSize : false,
		'beforeClose': function()
		{
			rude_reload_specialty();
		}

	});
});




function rude_reload_specialty()
{
	$.ajax({
		type: 'POST',
		url: 'index.php',
		data: {
			task:     'ajax',             // RUDE_TASK_AJAX
			target:   'ajax_specialty_summary'// RUDE_TASK_AJAX_ROLE_SUMMARY
		},

		success: function(data)
		{
			rude_animation('#info-specialties', data);
		}
	});
}



/* ======================================= */
/* jQuery + fancybox popup section [department] */
/* ======================================= */

$(document).ready(function ()
{
	$(".fancybox-department").fancybox({
		type: 'iframe',

		width: 432 + 20,
		height: 190,
		fitToView : false,
		autoSize : false,
		'beforeClose': function()
		{
			rude_reload_department();
		}

	});
});

$(document).ready(function ()
{
	$(".fancybox-department-edit").fancybox({
		type: 'iframe',

		width: 432 + 20,
		height: 190,
		fitToView : false,
		autoSize : false,
		'beforeClose': function()
		{
			rude_reload_department();
		}

	});
});


$(document).ready(function ()
{
	$(".fancybox-department-delete").fancybox({
		type: 'iframe',

		width: 432 + 20,
		height: 185,
		fitToView : false,
		autoSize : false,
		'beforeClose': function()
		{
			rude_reload_department();
		}

	});
});




function rude_reload_department()
{
	$.ajax({
		type: 'POST',
		url: 'index.php',
		data: {
			task:     'ajax',             // RUDE_TASK_AJAX
			target:   'ajax_department_summary'// RUDE_TASK_AJAX_ROLE_SUMMARY
		},

		success: function(data)
		{
			rude_animation('#info-department', data);
		}
	});
}
/* ======================================= */
/* jQuery + fancybox popup section [specialization] */
/* ======================================= */

    $(document).ready(function ()
    {
        $(".fancybox-specializations").fancybox({
            type: 'iframe',

            width: 432 + 20,
            height: 239,
            fitToView : false,
            autoSize : false,
            'beforeClose': function()
            {
                rude_reload_specializations();
            }
        });
    });

    $(document).ready(function ()
    {
        $(".fancybox-specializations-edit").fancybox({
            type: 'iframe',

            width: 432 + 20,
            height: 239,
            fitToView : false,
            autoSize : false,
            'beforeClose': function()
            {
                rude_reload_specializations();
            }

        });
    });


    $(document).ready(function ()
    {
        $(".fancybox-specializations-delete").fancybox({
            type: 'iframe',

            width: 432 + 20,
            height: 172,
            fitToView : false,
            autoSize : false,
            'beforeClose': function()
            {
                rude_reload_specializations();
            }

        });
    });

    function rude_reload_specializations()
    {
        $.ajax({
            type: 'POST',
            url: 'index.php',
            data: {
                task:     'ajax',             // RUDE_TASK_AJAX
                target:   'ajax_specialization_summary'// RUDE_TASK_AJAX_ROLE_SUMMARY
            },

            success: function(data)
            {
                rude_animation('#info-specializations', data);
            }
        });
    }