
/*
###################################################################
            CHATX BUILDING MARKUP, UI TEXT AND ADDING CSS STYLES
            
###################################################################
*/

// loading styles
$('<link>').appendTo('head').attr({
      type: 'text/css', 
      rel: 'stylesheet',
      href: chatx_server + 'assets/css/chatx_styles.css'
});

const translation = {
    nameInputValue: 'Enter name',
    management: 'ChatX management',
    noNameError: 'Please insert your name',
    fastUpdate: 'Fast track update',
    newMessagesAbove: 'New messages above',
    formattingTags: 'Formatting tags',
    helperValueText: 'Text',
    resultsIn: 'results in',
    producesImage: 'produces an image',
    producesLink: 'produces a link',
    newMessagePlaceholder: 'Start typing...',
    notSentError: 'Message not sent',
    ss: chatx_server
};

const markup = `
            <header>
                <div class="chx-bar"><i class="icon-chat"></i> <span>ChatX</span> <div class="pulsating-circle"></div><input id="false_shoutbox_name" type="name" maxlength="15" placeholder="${translation.nameInputValue}" onblur="valName()"/><div class="name-required">${translation.noNameError}</div> <i class="icon-refresh"></i>
                    <div class="chat_popover_parent"><a href="javascript:void(0);" class="chat_btn"><i class="icon-gear"></i></a>
                        <div class="chat_popover"><div><span>${translation.fastUpdate}</span><input type="checkbox" id="icd" name="icd" value="icd" /><label for="icd"></label><p><a class="chatx_management" href="${translation.ss}client/index.php" target="_blank">${translation.management}</a></p></div></div>
                    </div>
                    <i class="icon-minimize"></i><i class="icon-expand"></i>
                </div>
            </header>
            <div class="body scrollbar-macosx">
                <div class="shoutbox">
                    <ul class="shoutbox-content"></ul>
                    <div class="shoutbox-helper">
                        <p>${translation.newMessagesAbove}</p>
                        <hr>
                        <span>${translation.formattingTags}:
                        <li>[b]${translation.helperValueText}[/b] ${translation.resultsIn}: <b>${translation.helperValueText}</b></li>
                        <li>[i]${translation.helperValueText}[/i] ${translation.resultsIn}: <i>${translation.helperValueText}</i></li>
                        <li>[u]${translation.helperValueText}[/u] ${translation.resultsIn}: <u>${translation.helperValueText}</u></li>
                        <li>[color=red]${translation.helperValueText}[/color] ${translation.resultsIn}: <span style="color: red">${translation.helperValueText}</span></li>
                        <li>[img]Img.jpg[/img] ${translation.producesImage}</li>
                        <li>[url]Url[/url] ${translation.producesLink}</li>
                        </span>
                    </div>
                </div>
            </div>
            <div class="shoutbox-form">
                <form id="NewMessage">
                    <input type="hidden" id="shoutbox-name" name="name" maxlength="15" />
                    <div class="dropzone"></div>
                    <textarea id="shoutbox-comment" class="js-elasticArea" rows="2" data-min-rows="2" placeholder="${translation.newMessagePlaceholder}" name="comment" maxlength='240'></textarea>
                    <div id="notsent">${translation.notSentError}</div>
                    <button id="send_message" type="submit"><i class="icon-send"></i></button>
                </form>
            </div>
`;	
document.getElementById('chatx').innerHTML = markup;


/*
###################################################################
            STARTING MAIN FUNCTION
            
###################################################################
*/


$(function () {

	// Storing some elements in variables for a cleaner code base

	var refreshButton = $('.chx-bar .icon-refresh'),
		shoutboxForm = $('.shoutbox-form'),
		form = shoutboxForm.find('form'),
		nameElement = form.find('#shoutbox-name'),
		commentElement = form.find('#shoutbox-comment'),
		ul = $('ul.shoutbox-content'),
		icd = $('#icd');

	// Replace :) with emoji icons:
	emojione.ascii = true;

	// Load the comments.
	load();

	nameElement.val(localStorage.getItem('nameElement') || "");

	// On form submit, if everything is filled in, publish the shout to the database

	var canPostComment = true;

	form.submit(function (e) {
		e.preventDefault();

		if (!canPostComment) return;

		var name = nameElement.val().trim();
		var comment = commentElement.val().trim();

		if (name.length && comment.length && comment.length <= 240) {

			publish(name, comment);

			// Prevent new shouts from being published

			canPostComment = false;

			// Allow a new comment to be posted after 0.5 seconds

			setTimeout(function () {
				canPostComment = true;
			}, 500);

		}

	});

	// Clicking on the REPLY button writes the name of the person you want to reply to into the textbox.

	ul.on('click', '.shoutbox-comment-reply', function (e) {

		var replyName = $(this).data('name');

		commentElement.val('@' + '[b]' + replyName + '[/b] ').focus();

	});

	// Clicking the refresh button will force the load function

	var canReload = true;

	refreshButton.click(function () {

		if (!canReload) return false;

		load();
		canReload = false;

		// Allow additional reloads after 500 millisecond
		setTimeout(function () {
			canReload = true;
		}, 500);
	});


	var loadInt;
	var checkInt = +localStorage.getItem('intLoad');
	icd.prop('checked', !!checkInt);
	var time = checkInt ? 3000 : 15000;
	loadInt = setInterval(load, time);
	
	// Automatically refresh the shouts every 15 seconds
	icd.on('change', function () {
		clearInterval(loadInt);
		loadInt = setInterval(load, ($(this).prop('checked') ? 3000 : 15000));
		localStorage.setItem('intLoad', $(this).prop('checked') * 1);
	});


	$('.chat').on('click', '.icon-expand', function () {
		loadInt = setInterval(load, ($(icd).prop('checked') ? 3000 : 15000));
		$("#chatx").draggable('enable');
		$( "#chatx" ).removeClass( "minimized" );

	});

	$('.chat').on('click', '.icon-minimize', function () {
		clearInterval(loadInt);
		$("#chatx").draggable('disable');
		$( "#chatx" ).addClass( "minimized" );
	});


	if (localStorage.toggled != "expanded") {
		clearInterval(loadInt);
	}

// Storing shouts in the database
function publish(name, comment) {

    var published = $.ajax({
        
        url: chatx_server + 'publish.php',
        type: "POST",
        crossDomain: true,
        dataType: "json",
        data: {
            name: name,
		    comment: comment
        },
        xhrFields: {
        withCredentials: true
        }
   
    });

    published.complete(function() {
			localStorage.setItem('nameElement', nameElement.val());
			commentElement.val("");
			function delayedLoad() {
			load();
			}
			setTimeout(delayedLoad, 50);
    });

}



function load() {	
    $.ajax({
        dataType: "json",
        url: chatx_server + 'load.php',
        xhrFields: {
        withCredentials: true
        },
        success: function(data) {appendComments(data);}
   
    });
}



	// Rendering an array of shouts as HTML
	function appendComments(data) {

		ul.empty();

		data.forEach(function (d) {
			ul.append('<li>' +
				'<span class="shoutbox-username"><b data-loggedin="'+ d.loggedIn +'">' + d.name + '</b></span>' +
				'<p class="shoutbox-comment">' + emojione.toImage(d.text) + '</p>' +
				'<div class="shoutbox-comment-details"><span class="shoutbox-comment-reply" data-name="' + d.name + '">Reply<i class="icon-reply"></i></span>' +
				'<span class="shoutbox-comment-ago">' + d.timeAgo + '</span></div>' +
				'</li>');
		});

	}
	



    // Making bleeping online indicator when fast-track update is on
	$('#icd').click(function () {
		if ($(this).prop('checked')) {
			$("div.pulsating-circle").css("display", "block");
			$("#false_shoutbox_name").css({
				"padding-right": "15px",
				"transition": "0.3s ease"
			});
		} else {
			$("div.pulsating-circle").css("display", "none");
			$("#false_shoutbox_name").css({
				"padding-right": "0",
				"transition": "0.3s ease"
			});
		}
	});

	if ($('#icd').prop('checked')) {
		$("div.pulsating-circle").css("display", "block");
		$("#false_shoutbox_name").css("padding-right", "15px");
	}
	
	

    // Loading custom scrollbar library
	$.getScript(chatx_server + 'assets/js/scrollbar.min.js', function () {});
	
		// Loading Deaggabe.min library and executing draggable afrer library is loaded
	$.getScript(chatx_server + 'assets/js/draggable.min.js', function () {

		$("#chatx").draggable({
			containment: "window",
			handle: 'header',
			scroll: false,
			stop: function (event, ui) {
				chat_custom_position[this.id] = ui.position;
				localStorage.chat_custom_position = JSON.stringify(chat_custom_position);
			}
		});


	});

});


/*
###################################################################
            ADDITIONAL COMPONENTS
            
###################################################################
*/

	// Setting ChatX in expanded and minimized mode
	$('#chatx').addClass(localStorage.toggled);

	$('.icon-expand').on('click', function () {

		if (localStorage.toggled != "expanded") {
			$('#chatx').addClass("expanded", true);
			localStorage.toggled = "expanded";
		}

	});

	$('.icon-minimize').on('click', function () {
		$('#chatx').removeClass('expanded');
		localStorage.toggled = "minimized";
	});

// Keep nickname input in localstorage
$(document).ready(function () {
	$(window).unload(saveSettings);
	loadSettings();
});

function loadSettings() {
	$('#false_shoutbox_name').val(localStorage.nameElement);
}

function saveSettings() {
	localStorage.nameElement = $('#false_shoutbox_name').val();
}

// Autoresize textarea
const textarea = document.getElementById('shoutbox-comment');

textarea.addEventListener('input', function () {
	this.rows = 2; // Erm...
	this.rows = countRows(this.scrollHeight);
});

function countRows(scrollHeight) {
	return Math.floor(scrollHeight / 18); // 18px = line-height
}


// Submit by Enter
$(document).ready(function () {
	$("#shoutbox-comment").on("keypress", function (event) {
		if ((event.keyCode == 10 || event.keyCode == 13)) {
			event.preventDefault();
			chatSubmit();
		}
	});
});

// registring function that shows warning message when name is not filled in
function errorNameEmpty() {
    $('.name-required').css({
			'display': 'block'
		});
		setTimeout(function () {
			$('.name-required').fadeOut(500);
		}, 2000);
}

function errorMessageEmpty() {
    $('#notsent').css({
			'display': 'block'
		});
		setTimeout(function () {
			$('#notsent').fadeOut(500);
		}, 2000);
}


// Submit form if name field is filled, otherwise show warning
function chatSubmit() {
	if ($('#false_shoutbox_name').val() === '') {
		errorNameEmpty();
	} else {
		$("#NewMessage").submit();

	}
}


// invoke chatsubmit() when clicked on submit button
$( "#send_message" ).click(function() {
    chatSubmit();
});


// Resizing textarea to initial height on submit
$("#NewMessage").submit(function (event) {
	event.preventDefault();
	$('#shoutbox-comment').attr('rows', 2);
});

// Disable new lines by enter
$('#shoutbox-comment').keydown(function (e) {
	var s = $('#shoutbox-comment').val();
	while (s.indexOf("\n") > -1)
		s = s.replace("\n", "");
	$('#shoutbox-comment').val(s);
});


$('.chat_popover_parent a').on('click', function () {
	$('.chat_popover_parent > a').not(this).parent().removeClass('active');
	$(this).parent().toggleClass('active');
});


// Hide settings widnow when clicked off
$(document).on('click touchstart', function (event) {
	if (!$(event.target).closest('.chat_popover_parent').length) {
		// Hide the menus.
		$('.chat_popover_parent.active').removeClass('active');
	}
});

// Working with position of chat
var sPositions = localStorage.chat_custom_position || "{}",
	chat_custom_position = JSON.parse(sPositions);
$.each(chat_custom_position, function (id, pos) {
	$("#" + id).css(pos);
});

if (localStorage.getItem("chat_custom_position") === null) {
	$("#chatx").css({"position": "fixed", "top": "15px", "left": "15px"});
} else {
	$("#chatx").css({"position": "fixed"});
}

// making ChatX appear after pageload complete
$( window ).on( "load", function() {
	$("#chatx").fadeIn(600);
});

/*! imgur 2.0.4 | (c) 2016 Pedro RogГ©rio | MIT License */
! function (a, b) {
	"use strict";
	"function" == typeof define && define.amd ? define([], b) : "object" == typeof exports ? module.exports = b() : a.Imgur = b();
}(this, function () {
	"use strict";
	var a = function (b) {
		if (!(this && this instanceof a)) return new a(b);
		if (b || (b = {}), !b.clientid) throw "Provide a valid Client Id here: http://api.imgur.com/";
		this.clientid = b.clientid, this.endpoint = "https://api.imgur.com/3/image", this.callback = b.callback || void 0, this.dropzone = document.querySelectorAll(".dropzone"), this.run()
	};
	return a.prototype = {
		createEls: function (a, b, c) {
			var d, e = document.createElement(a);
			for (d in b) b.hasOwnProperty(d) && (e[d] = b[d]);
			return c && e.appendChild(document.createTextNode(c)), e
		},
		insertAfter: function (a, b) {
			a.parentNode.insertBefore(b, a.nextSibling)
		},
		post: function (a, b, c) {
			var d = new XMLHttpRequest;
			d.open("POST", a, !0), d.setRequestHeader("Authorization", "Client-ID " + this.clientid), d.onreadystatechange = function () {
				if (4 === this.readyState) {
					if (!(this.status >= 200 && this.status < 300)) throw new Error(this.status + " - " + this.statusText);
					var a = "";
					try {
						a = JSON.parse(this.responseText)
					} catch (b) {
						a = this.responseText
					}
					c.call(window, a)
				}
			}, d.send(b), d = null
		},
		createDragZone: function () {
			var a, b;
			a = this.createEls("i", {
				className: "icon-upload"
			}), b = this.createEls("input", {
				type: "file",
				accept: "image/*"
			}), Array.prototype.forEach.call(this.dropzone, function (c) {
				c.appendChild(a), c.appendChild(b), this.status(c), this.upload(c)
			}.bind(this))
		},
		loading: function () {
			var a, b;
			a = this.createEls("div", {
				className: "loading-modal"
			}), b = this.createEls("img", {
				className: "loading-image",
				src: chatx_server + "assets/img/loading.svg"
			}), a.appendChild(b), document.getElementById('chatx').appendChild(a)
		},
		status: function (a) {
			var b = this.createEls("div", {
				className: "status"
			});
			this.insertAfter(a, b)
		},
		matchFiles: function (a, b) {
			var c = b.nextSibling;
			if (a.type.match(/image/) && "image/svg+xml" !== a.type) {
				document.getElementById('chatx').classList.add("busy"), c.classList.remove("bg-success", "bg-danger"), c.innerHTML = "";
				var d = new FormData;
				d.append("image", a), this.post(this.endpoint, d, function (a) {
					document.getElementById('chatx').classList.remove("busy"), "function" == typeof this.callback && this.callback.call(this, a)
				}.bind(this))
			} else c.classList.remove("bg-success"), c.classList.add("bg-danger"), c.innerHTML = "Invalid Archive"
		},
		upload: function (a) {
			var b, c, d, e, f = ["dragenter", "dragleave", "dragover", "drop"];
			a.addEventListener("change", function (f) {
				if (f.target && "INPUT" === f.target.nodeName && "file" === f.target.type)
					for (c = f.target.files, d = 0, e = c.length; e > d; d += 1) b = c[d], this.matchFiles(b, a)
			}.bind(this), !1), f.map(function (b) {
				a.addEventListener(b, function (a) {
					a.target && "INPUT" === a.target.nodeName && "file" === a.target.type && ("dragleave" === b || "drop" === b ? a.target.parentNode.classList.remove("dropzone-dragging") : a.target.parentNode.classList.add("dropzone-dragging"))
				}, !1)
			})
		},
		run: function () {
			var a = document.querySelector(".loading-modal");
			a || this.loading(), this.createDragZone()
		}
	}, a
});


// Clearing textarea then getting image link from Imgur and auto-submitting it  
var feedback = function (res) {
	if (res.success === true) {
		$('#shoutbox-comment').val('');
		$('#shoutbox-comment').val($('#shoutbox-comment').val() + '[url=' + res.data.link + '][img]' + res.data.link + '[/img][/url] ');
		
		
		if($('#false_shoutbox_name').val() == ''){
		    $('#shoutbox-comment').attr('rows', 4);
		    errorNameEmpty();
		    
		} else {
		    chatSubmit();
		}
		
		if ($('#false_shoutbox_name').val() == ''){
		    $( "#send_message" ).one("click", function() {
                $('#shoutbox-comment').val('');
                errorMessageEmpty();
            });
            
        }
		
	}
};

// Imgur variables
new Imgur({
	clientid: 'b12794161e11f2b',
	callback: feedback
});


function valName() {
    var getFalseShoutBoxName = document.getElementById("false_shoutbox_name").value;
    document.getElementById("shoutbox-name").value = getFalseShoutBoxName;

}

$.getScript(chatx_server + 'dynamic_js.php', function () {});
