/*
###################################################################
            CHATX BUILDING MARKUP, UI AND ADDING CSS STYLES
            VERSION 1.9.0
###################################################################
*/

// loading styles
jQuery('<link>').appendTo('head').attr({
    type: 'text/css',
    rel: 'stylesheet',
    href: chatx_server + 'assets/css/chatx_styles.css'
});

const markup = `
            <chx_header>
                <chx_div class="chx-bar">
                    <chx_i class="icon-chat"></chx_i>
                    <chx_span>ChatX</chx_span>
                    <chx_div class="chx-pulsating-circle"></chx_div>
                    <input id="false_shoutbox_name" type="name" maxlength="15" placeholder onblur="valName()"/>
                    <chx_div class="name-required"></chx_div>
                    <chx_i class="icon-refresh"></chx_i>
                    <chx_div class="chat_popover_parent">
                        <a href="javascript:void(0);" class="chx-settings-button"><chx_i class="icon-gear"></chx_i></a>
                        <chx_div class="chat_popover">
                            <chx_div>
                                <chx_span class="chx-fast-track"></chx_span>
                                <input type="checkbox" id="icd" name="icd" value="icd"/>
                                <label for="icd"></label>
                            </chx_div>
                            <chx_div>
                                <a class="chx-management-link" target="_blank"></a>
                                <a class="chatx_logout"><chx_span class="logout"></chx_span> <i class="icon-logout"></i></a>
                            </chx_div>
                        </chx_div>
                    </chx_div>
                    <chx_i class="icon-minimize"></chx_i><chx_i class="icon-expand"></chx_i>
                </chx_div>
            </chx_header>
            <chx_div class="chx-login-form">
                <chx_i class="icon-plus chx-close"></chx_i>
                <label class="chx-switch-tab first" for="chx-login-form"></label>
                <input class="chx-form-radio" type="radio" id="chx-login-form" name="chx-switch" checked="checked"/>
                <chx_span class="chx-login-form-contents">
                <form name="chx-login">
                    <input type="text" name="u" placeholder>
                    <input type="password" name="p" placeholder>
                    <chx_div class="chx-login-button icon-login"></chx_div>
                </form>
                </chx_span>
                <label class="chx-switch-tab second" for="chx-signup-form"></label>
                <input class="chx-form-radio" type="radio" id="chx-signup-form" name="chx-switch"/>
                <chx_span class="chx-signup-form-contents"></chx_span>
            </chx_div>
            <div class="chx-container scrollbar-macosx">
                <chx_div class="shoutbox">
                    <chx_div class="shoutbox-helper">
                        <chx_span class="chx-helper"></chx_span>
                        <chx_li><chx_span class="chx-key">Alt</chx_span> + <chx_span class="chx-key">Q</chx_span> <chx_span class="chx-desc1"></chx_span></chx_li>
                        <chx_li><chx_span class="chx-desc2"></chx_span></chx_li>
                        <chx_li><chx_span class="chx-key">Enter</chx_span> <chx_span class="chx-desc3"></chx_span></chx_li>
                        <chx_hr></chx_hr>
                        <chx_p></chx_p>
                    </chx_div>
                    <chx_div class="chx-history">
                        <chx_span class="first">
                            <a onclick="jQuery('.shoutbox-helper').toggleClass('visible')"></a>
                        </chx_span>
                        <chx_span class="second">
                            <a onclick="chatHistory()"></a>
                        </chx_span>
                    </chx_div>
                    <chx_ul class="shoutbox-content"></chx_ul>
                </chx_div>
            </div>
            <chx_div class="shoutbox-form">
                <form id="chx-new-message">
                    <input type="hidden" id="shoutbox-name" name="name" maxlength="15" />
                    <chx_div class="bb-popup">
                        <chx_div id="bb1">B</chx_div>
                        <chx_div id="bb2">U</chx_div>
                        <chx_div id="bb3">I</chx_div>
                        <chx_div id="bb4"><chx_i class="icon-color"></chx_i></chx_div>
                        <chx_div id="bb5"><chx_i class="icon-photo"></chx_i></chx_div>
                        <chx_div class="chx-imgur-uploader"></chx_div>
                        <chx_div id="bb6"><chx_i class="icon-link"></chx_i></chx_div>
                    </chx_div>
                    <chx_div class="chx-color-bb-prompt">
                        <chx_i id="bb4_1" class="icon-hue chx-red"></chx_i>
                        <chx_i id="bb4_2" class="icon-hue chx-orange"></chx_i>
                        <chx_i id="bb4_3" class="icon-hue chx-yellow"></chx_i>
                        <chx_i id="bb4_4" class="icon-hue chx-green"></chx_i>
                        <chx_i id="bb4_5" class="icon-hue chx-lightblue"></chx_i>
                        <chx_i id="bb4_6" class="icon-hue chx-blue"></chx_i>
                        <chx_i id="bb4_7" class="icon-hue chx-purple"></chx_i>
                    </chx_div>
                    <chx_div class="chx-image-bb-prompt">
                            <input type="text" name="url_to_img" placeholder>
                            <chx_div class="chx-process-img">
                                <chx_span>OK</chx_span>
                            </chx_div>
                    </chx_div>
                    <chx_div class="chx-pre-textarea scrollbar-macosx">
                        <chx_i class="icon-plus"></chx_i>
                        <textarea id="shoutbox-comment" rows="2" data-min-rows="2" placeholder name="comment"></textarea>
                    </chx_div>
                    <chx_div id="chx-send-message">
                        <chx_i class="icon-send"></chx_i>
                    </chx_div>
                </form>
            </chx_div>
`;
document.getElementById('chatx').innerHTML = markup;

/*
###################################################################
            STARTING MAIN FUNCTION
            
###################################################################
*/

jQuery.getScript(chatx_server + 'dynamic_js.php', function() {
    

    // Storing some elements in variables for a cleaner code base

    var refreshButton = jQuery('.chx-bar .icon-refresh'),
        shoutboxForm = jQuery('.shoutbox-form'),
        form = shoutboxForm.find('form'),
        nameElement = form.find('#shoutbox-name'),
        commentElement = form.find('#shoutbox-comment'),
        ul = jQuery('chx_ul.shoutbox-content'),
        icd = jQuery('#icd');
        chx_resize = 'chx-container';
        
    function scrollBottom() {
        jQuery(".chx-container").stop().animate({ scrollTop: jQuery(".shoutbox-content")[0].scrollHeight},0);
    }

    // Replace :) with emoji icons (if library not loaded throw error):
    if (e_o === 1) {
        try {
            emojione.ascii = true;
        } catch(e) {
            jQuery('.shoutbox').prepend('<chx_li class="chx-emojione-error"></chx_li>');
        }
    }

    // Load the comments.
    load();

    nameElement.val(localStorage.getItem('nameElement') || "");

    // On form submit, if everything is filled in, publish the shout to the database

    var canPostComment = true;

    form.submit(function(e) {
        e.preventDefault();

        if (!canPostComment) return;

        var name = nameElement.val().trim();
        var comment = commentElement.val().trim();

        if (name.length && comment.length && comment.length <= m_c) {

            publish(name, comment);

            // Prevent new shouts from being published

            canPostComment = false;

            // Allow a new comment to be posted after 0.5 seconds

            setTimeout(function() {
                canPostComment = true;
            }, 500);

        }

    });

    // Clicking on the REPLY button writes the name of the person you want to reply to into the textbox.

    ul.on('click', '.shoutbox-comment-reply', function(e) {

        var replyName = jQuery(this).data('name');

        commentElement.val('@' + '[b]' + replyName + '[/b] ').focus();

    });

    // Clicking the refresh button will force the load function

    var canReload = true;

    refreshButton.click(function() {

        if (!canReload) return false;

        load();
        canReload = false;

        // Allow additional reloads after 500 millisecond
        setTimeout(function() {
            canReload = true;
        }, 500);
    });


    var loadInt;
    var checkInt = +localStorage.getItem('intLoad');
    icd.prop('checked', !!checkInt);
    var time = checkInt ? fastTrack : slowTrack;
    loadInt = setInterval(load, time);

    // Automatically refresh the shouts in slow and fast track mode. Do not refrech when minimized
    icd.on('change', function() {
        clearInterval(loadInt);
        loadInt = setInterval(load, (jQuery(this).prop('checked') ? fastTrack : slowTrack));
        localStorage.setItem('intLoad', jQuery(this).prop('checked') * 1);
    });


    jQuery('.chat').on('click', '.icon-expand', function() {
        loadInt = setInterval(load, (jQuery(icd).prop('checked') ? fastTrack : slowTrack));
        jQuery("#chatx").draggable('enable');
        jQuery("#chatx").removeClass("minimized");
        scrollBottom();
    });

    jQuery('.chat').on('click', '.icon-minimize', function() {
        clearInterval(loadInt);
        jQuery("#chatx").draggable('disable');
        jQuery("#chatx").addClass("minimized");
    });


    if (localStorage.toggled != "expanded") {
        clearInterval(loadInt);
    }

    // sending shouts to the database
    function publish(name, comment) {

        var published = jQuery.ajax({

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
            load();

        });

    }

    function load() {
        jQuery.ajax({
            dataType: "json",
            url: chatx_server + 'load.php',
            xhrFields: {
                withCredentials: true
            },
            success: function(data) {
                appendComments(data);
                if (window.atBottom) {
                    scrollBottom();
                }
            }

        });
    }
    // Rendering an array of shouts as HTML
    function appendComments(data) {

       ul.empty();

        data.forEach(function(d) {
            ul.prepend('<chx_li>' +
                '<chx_p class="shoutbox-comment"><chx_span class="shoutbox-username"><b data-loggedin="' + d.loggedIn + '" data-name="' + d.name + '">' + d.name + '</b></chx_span>' + (e_o === 1 ? emojione.toImage(d.text) : d.text) + '</chx_p>' +
                '<chx_div class="shoutbox-comment-details"><chx_span class="shoutbox-comment-reply" data-name="' + d.name + '"><chx_i class="icon-reply"></chx_i></chx_span>' +
                '<chx_span class="shoutbox-comment-ago">' + d.timeAgo + '</chx_span></chx_div>' +
                '</chx_li>');
        });

    }

    // Max length of new message textarea
    jQuery("#shoutbox-comment").attr("maxlength", m_c);

    // Making bleeping online indicator when fast-track update is on
    jQuery('#icd').click(function() {
        if (jQuery(this).prop('checked')) {
            jQuery(".chx-pulsating-circle").show();
            jQuery("#false_shoutbox_name").css({"padding-right": "15px", "transition": "0.3s ease"});
        } else {
            jQuery(".chx-pulsating-circle").hide();
            jQuery("#false_shoutbox_name").css({"padding-right": "0", "transition": "0.3s ease"});
        }
    });

    // Loading custom scrollbar library
    jQuery.getScript(chatx_server + 'assets/js/scrollbar.min.js', function() {
        jQuery('.chx-container.scrollbar-macosx').scrollbar({
            "onScroll": function(y){
            if(y.scroll >= y.maxScroll - 20) {
                window.atBottom = true;
                jQuery('.ui-resizable-s').addClass('visible');
            } else {
                window.atBottom = false;
                jQuery('.ui-resizable-s').removeClass('visible');
            }
            }
        });
        jQuery('.chx-pre-textarea.scrollbar-macosx').scrollbar();
        

        

        var chx_height = localStorage.getItem(chx_resize);

        if (chx_height === null) chx_height = {};
        else chx_height = JSON.parse(chx_height);
        jQuery('.' + chx_resize).css(chx_height);
        
        // making ChatX appear after scrollbar library loaded as well as some other functions
        jQuery.when(jQuery("#chatx").fadeIn(150))
            .done(function() {
                chatxVisibility();
                scrollBottom();
                jQuery(this).css({
                    "opacity": "1"
                });
                fastTrackIsOn();
                loadNickname();
            });

    });

    // Loading jquery-ui.min library and executing draggable and resizable funcs afrer library is loaded
    jQuery.getScript(chatx_server + 'assets/js/jquery-ui.min.js', function() {

        jQuery("#chatx").draggable({
            containment: "window",
            handle: 'chx_header',
            scroll: false,
            stop: function(event, ui) {
                chat_custom_position[this.id] = ui.position;
                localStorage.chat_custom_position = JSON.stringify(chat_custom_position);
            }
        });
        
        jQuery(".chx-container").resizable({
            handles: "s",
            resize: function() {
                var maxHeight = (typeof ForumAPITicket !== 'undefined' ? jQuery(window).scrollTop() /* fixing mybb issue */ : "") + jQuery(window).height() - jQuery("#chatx").position().top - jQuery(".shoutbox-form").height() - 36;
                var sizeHistory = JSON.stringify({height: this.style.height});
                var sizeHistoryData = JSON.parse(sizeHistory);
                if(sizeHistoryData.height <= maxHeight + 'px') {
                    localStorage.setItem(chx_resize, sizeHistory);
                } else {
                   localStorage.setItem(chx_resize, '{"height":"'+ maxHeight +'px"}'); 
                }
                jQuery("#chatx.expanded .chx-container").css({"max-height": maxHeight, "height": sizeHistoryData.height});
                scrollBottom();
            }
        });
        jQuery('#chatx .ui-resizable-s').first().remove(); // two elements created for some reason. Not good

        jQuery(".chx-container").resize(function() {
            var a = "#chatx .scroll-bar";
            jQuery(a).fadeOut(0);
            clearTimeout(window.resizedFinished);
            window.resizedFinished = setTimeout(function() {
                jQuery(a).fadeIn(200);
            }, 500);
        });
        jQuery('<chx_div class="resize-helper"></chx_div>').appendTo('#chatx .ui-resizable-s');

    });

    // Loading featherlight gallery if option is on
    if (f_g === 1) {
        jQuery.getScript(chatx_server + 'assets/js/featherlight.min.js');
    }
    
    // MyBB integration if option is on
    if (m_a === 1) {
        jQuery.getScript(chatx_server + 'assets/js/mybb-authentication.min.js');
    }

    // language pack
    jQuery.getScript(chatx_server + 'data/languages/' + l_g + '/app_lang.' + l_g + '.php', function() {
        jQuery("#false_shoutbox_name").attr("placeholder", nameInputValue);
        jQuery(".chx-management-link").text(management);
        jQuery(".name-required").text(noNameError);
        jQuery(".chx-fast-track").text(fastUpdate);
        jQuery(".chx-switch-tab.first").text(login);
        jQuery(".chx-switch-tab.second").text(signup);
        jQuery("input[name='u'],input[name='reg_u']").attr("placeholder", userName);
        jQuery("input[name='p'], input[name='reg_p']").attr("placeholder", passWord);
        jQuery("input[name='p'], input[name='c_reg_p']").attr("placeholder", confirmPassWord);
        jQuery(".chx-reg-disabled-caption").text(regDisabled);
        jQuery(".chx-history .first a").text(chatHelper);
        jQuery(".chx-history .second a").text(messagesHistory);
        jQuery(".shoutbox-helper chx_p").text(newMessagesAtBottom);
        jQuery(".chx-helper").text(helper);
        jQuery(".chx-desc1").text(helper1stDesc);
        jQuery(".chx-desc2").text(helper2ndDesc);
        jQuery(".chx-desc3").text(helper3rdDesc);
        jQuery("#shoutbox-comment").attr("placeholder", newMessagePlaceholder);
        jQuery("input[name='url_to_img']").attr("placeholder", imgUrlPlaceholder);
        jQuery("head").append('<style>.chatx_login span {font-size:0 !important}.chatx_login chx_span::after {content: "' + login + '"; font-size: 12px} .chatx_logout chx_span::after {content: "' + logout + '"; font-size: 12px} .chx-mybb-login::after {content: "' + mybbSignup + '";}</style>'); // not good but ok for now
        jQuery(".chx-emojione-error").text(emojioneError);
    });
    
});

/*
###################################################################
            ADDITIONAL COMPONENTS
            
###################################################################
*/

// Setting ChatX in expanded and minimized mode
jQuery('#chatx').addClass(localStorage.toggled);

jQuery('.icon-expand').on('click', function() {

    if (localStorage.toggled != "expanded") {
        jQuery('#chatx').addClass("expanded", true);
        localStorage.toggled = "expanded";
    }

});

jQuery('.icon-minimize').on('click', function() {
    jQuery('#chatx').removeClass('expanded');
    localStorage.toggled = "minimized";
});

// Keep nickname input in localstorage
jQuery(document).ready(function() {
    jQuery(window).unload(saveNickname);
});

function loadNickname() {
    if (!sessionName) {
        jQuery('#false_shoutbox_name').val(localStorage.nameElement);
    }
}

function saveNickname() {
    localStorage.nameElement = jQuery('#false_shoutbox_name').val();
}

// Autoresize textarea
const textarea = document.getElementById('shoutbox-comment');

textarea.addEventListener('input', function() {
    this.rows = 2;
    this.rows = countRows(this.scrollHeight);
    
    if(this.rows >= 6) {
        jQuery('.chx-pre-textarea, #chx-new-message').addClass("scrollable");
    } else {
        jQuery('.chx-pre-textarea, #chx-new-message').removeClass("scrollable");
    }
    if ( !jQuery('.shoutbox-form').visible() ) {
        var calcFormHeight = jQuery('.chx-container').height()  - 18;
        jQuery('.chx-container').css("height", calcFormHeight + "px");
        localStorage.setItem(chx_resize, '{"height":"'+ calcFormHeight +'px"}');
    }
});

function countRows(scrollHeight) {
    return Math.floor(scrollHeight / 18); // 18px = line-height
}

// Submit by Enter
jQuery(document).ready(function() {
    jQuery("#shoutbox-comment").on("keypress", function(event) {
        if ((event.keyCode == 10 || event.keyCode == 13)) {
            event.preventDefault();
            chatSubmit();
        }
    });
});

// registring function that shows warning message when name is not filled in
function errorNameEmpty() {
    jQuery('.name-required').css({
        'display': 'block'
    });
    setTimeout(function() {
        jQuery('.name-required').fadeOut(500);
    }, 2000);
}

// Submit form if name field is filled in, otherwise show warning
function chatSubmit() {
    if (jQuery('#false_shoutbox_name').val() === '') {
        errorNameEmpty();
    } else {
        jQuery("#chx-new-message").submit();
        jQuery('.chx-pre-textarea, #chx-new-message').removeClass("scrollable");
        jQuery(".chx-container").stop().animate({ scrollTop: jQuery(".shoutbox-content")[0].scrollHeight}, 0);
    }
}

// invoke chatsubmit() when clicked on submit button
jQuery("#chx-send-message").click(function() {
    chatSubmit();
});

// Resizing textarea to initial height on submit
jQuery("#chx-new-message").submit(function(event) {
    event.preventDefault();
    jQuery('#shoutbox-comment').attr('rows', 2);
});

// Disable new lines by enter
jQuery('#shoutbox-comment').keydown(function(e) {
    var s = jQuery('#shoutbox-comment').val();
    while (s.indexOf("\n") > -1)
        s = s.replace("\n", "");
    jQuery('#shoutbox-comment').val(s);
});

jQuery('.chat_popover_parent a').on('click', function() {
    jQuery('.chat_popover_parent > a').not(this).parent().removeClass('active');
    jQuery(this).parent().toggleClass('active');
});

// Hide settings widnow when clicked off
jQuery(document).on('click touchstart', function(event) {
    if (!jQuery(event.target).closest('.chat_popover_parent').length) {
        jQuery('.chat_popover_parent.active').removeClass('active');
    }
});

// Working with position of chat
var sPositions = localStorage.chat_custom_position || "{}",
    chat_custom_position = JSON.parse(sPositions);
jQuery.each(chat_custom_position, function(id, pos) {
    jQuery("#" + id).css(pos);
});

if (localStorage.getItem("chat_custom_position") === null) {
    jQuery("#chatx").css({
        "top": "15px",
        "left": "15px"
    });
}

// add bleeping cirlce when fast track is on
function fastTrackIsOn() {
    if (jQuery('#icd').prop('checked')) {
        jQuery(".chx-pulsating-circle").show();
        jQuery("#false_shoutbox_name").css("padding-right", "15px");
    }
}

function valName() {
    var getFalseShoutBoxName = document.getElementById("false_shoutbox_name").value;
    document.getElementById("shoutbox-name").value = getFalseShoutBoxName;

}

function chatHistory() {
    window.open(chatx_server + 'client/history.php','_blank','width=400,height=750,top=15,left=15');
}

// Widget visibility on screen
! function(t) {
    var i = t(window);
    t.fn.visible = function(t, e, o) {
        if (!(this.length < 1)) {
            var r = this.length > 1 ? this.eq(0) : this,
                n = r.get(0),
                f = i.width(),
                h = i.height(),
                o = o ? o : "both",
                l = e === !0 ? n.offsetWidth * n.offsetHeight : !0;
            if ("function" == typeof n.getBoundingClientRect) {
                var g = n.getBoundingClientRect(),
                    u = g.top >= 0 && g.top < h,
                    s = g.bottom > 0 && g.bottom <= h,
                    c = g.left >= 0 && g.left < f,
                    a = g.right > 0 && g.right <= f,
                    v = t ? u || s : u && s,
                    b = t ? c || a : c && a;
                if ("both" === o) return l && v && b;
                if ("vertical" === o) return l && v;
                if ("horizontal" === o) return l && b
            } else {
                var d = i.scrollTop(),
                    p = d + h,
                    w = i.scrollLeft(),
                    m = w + f,
                    y = r.offset(),
                    z = y.top,
                    B = z + r.height(),
                    C = y.left,
                    R = C + r.width(),
                    j = t === !0 ? B : z,
                    q = t === !0 ? z : B,
                    H = t === !0 ? R : C,
                    L = t === !0 ? C : R;
                if ("both" === o) return !!l && p >= q && j >= d && m >= L && H >= w;
                if ("vertical" === o) return !!l && p >= q && j >= d;
                if ("horizontal" === o) return !!l && m >= L && H >= w
            }
        }
    }
}(jQuery);

function chatxVisibility() {
    jQuery(window).on("load resize", function() {
        if (!jQuery('.chx-container').visible() && jQuery('#chatx').hasClass('expanded')) {

            let keysToRemove = ["chx-container", "chat_custom_position"];
            for (key of keysToRemove) {
                localStorage.removeItem(key);
            }
            jQuery('#chatx').animate({
                top: '15px',
                left: '15px'
            }, 500);
            jQuery("#chatx.expanded .chx-container").animate({height: "360px"}, 500);
        }
    });
}

function bbtags(h, a, i) {
    var g = document.getElementById(h);
    g.focus();
    if (g.setSelectionRange) {
        var c = g.scrollTop;
        var e = g.selectionStart;
        var f = g.selectionEnd;
        g.value = g.value.substring(0, g.selectionStart) + a + g.value.substring(g.selectionStart, g.selectionEnd) + i + g.value.substring(g.selectionEnd, g.value.length);
        g.selectionStart = e;
        g.selectionEnd = f + a.length + i.length;
        g.scrollTop = c;
    } else {
        if (document.selection && document.selection.createRange) {
            g.focus();
            var b = document.selection.createRange();
            if (b.text != "") {
                b.text = a + b.text + i;
            } else {
                b.text = a + "REPLACE" + i;
            }
            g.focus();
        }
    }
    textarea.rows = countRows(textarea.scrollHeight);
}

jQuery(document).on('keydown', function(e) {
    if ((e.metaKey || e.altKey) && (String.fromCharCode(e.which).toLowerCase() === 'q')) {
        jQuery(".bb-popup").fadeIn(300);
    }
});

jQuery(document).on('click touchstart', function(event) {
    if (!jQuery(event.target).closest('.bb-popup, .chx-color-bb-prompt, .chx-image-bb-prompt, .icon-plus').length) {

        jQuery('.bb-popup, .chx-color-bb-prompt, .chx-image-bb-prompt').fadeOut(300);
    }
});

jQuery(".shoutbox-form .icon-plus").click(function() {
    jQuery(".bb-popup").fadeIn(300);
});

bb1.onclick = function() {
    javascript: bbtags("shoutbox-comment", "[b]", "[/b]");
}
bb2.onclick = function() {
    javascript: bbtags("shoutbox-comment", "[u]", "[/u]");
}
bb3.onclick = function() {
    javascript: bbtags("shoutbox-comment", "[i]", "[/i]");
}
bb4.onclick = function() {

    var height = jQuery(".shoutbox-form").height();
    jQuery(".chx-color-bb-prompt").css({
        height: height - 3
    });
    jQuery(".chx-image-bb-prompt").fadeOut(0);
    jQuery(".chx-color-bb-prompt").fadeIn(300);

    bb4_1.onclick = function() {
        javascript: bbtags("shoutbox-comment", "[color=red]", "[/color]");
    }
    bb4_2.onclick = function() {
        javascript: bbtags("shoutbox-comment", "[color=orange]", "[/color]");
    }
    bb4_3.onclick = function() {
        javascript: bbtags("shoutbox-comment", "[color=yellow]", "[/color]");
    }
    bb4_4.onclick = function() {
        javascript: bbtags("shoutbox-comment", "[color=green]", "[/color]");
    }
    bb4_5.onclick = function() {
        javascript: bbtags("shoutbox-comment", "[color=lightblue]", "[/color]");
    }
    bb4_6.onclick = function() {
        javascript: bbtags("shoutbox-comment", "[color=blue]", "[/color]");
    }
    bb4_7.onclick = function() {
        javascript: bbtags("shoutbox-comment", "[color=purple]", "[/color]");
    }

    jQuery(".icon-hue").click(function() {
        jQuery(".chx-color-bb-prompt").fadeOut(300);
    });
}
bb5.onclick = function() {
    
    var height = jQuery(".shoutbox-form").height();
    jQuery(".chx-image-bb-prompt").css({
        height: height - 3
    });
    jQuery(".chx-color-bb-prompt").fadeOut(0);
    jQuery(".chx-image-bb-prompt").fadeIn(300);
}
bb6.onclick = function() {
    javascript: bbtags("shoutbox-comment", "[url]", "[/url]");
}

function loginForm() {
    jQuery("#chatx").click(function(e) {
        var target = jQuery(e.target);
        if (target.hasClass("chx-close")) {
            jQuery(".expanded .chx-login-form").fadeOut(500);
        } else {
            jQuery(".expanded .chx-login-form").fadeIn(500);
        }
    });
}

if( $('.chx-signup-form-contents').css('display') != 'initial' )  { 
    jQuery('.chx-switch-tab.first').addClass('active');
} 
jQuery('.chx-switch-tab').click(function() {
    jQuery('.chx-switch-tab').removeClass('active');
    jQuery(this).addClass('active');
})

function setRegForm() {
    if (r_e === 1) {
        if (jQuery(".chx-signup-form-contents form").length == 0) {
            jQuery('.chx-signup-form-contents').append('<form name="chx-signup">' +
                '<input type="text" name="reg_u" placeholder required>' +
                '<input type="password" name="reg_p" placeholder required>' +
                '<input type="password" name="c_reg_p" placeholder required>' +
                '<chx_div class="chx-login-button icon-login"></chx_div></form>');

        }
        
    } else {
         jQuery('.chx-signup-form-contents').append('<chx_i class="icon-lock chx-reg-disabled"></chx_i><chx_p class="chx-reg-disabled-caption"></chx_p>');
    }
}

function formSubmit(nameForm) {
    var empty = jQuery('form[name=' + nameForm + '] input').filter(function() {
        return this.value === "";
    });
    if(empty.length) {
        jQuery(empty).css({"box-shadow":"inset 0px 0px 0px 1px #bb5a5a"});
    } else {
        jQuery('form[name=' + nameForm + '] chx_div').submit();
        return false;
    }
}

jQuery('.chx-login-form-contents, .chx-signup-form-contents').on('keydown', function(e) {
    if(e.which == '13') {
        var nameForm = jQuery(this).find('form').attr('name');
        formSubmit(nameForm);
    }
});

function formButtonClick() {
    jQuery(".chx-login-button").on('click', function() {
        var nameForm = jQuery(this).closest('form').attr('name');
        formSubmit(nameForm);
    });
}
formButtonClick();

function formExtImage() {
    jQuery(".chx-process-img").on('click', function() {
        jQuery(".chx-image-bb-prompt").fadeOut(300);
        loadingModal();
        processExtImg();
    });
}
formExtImage();

function ajaxFormSubmitted() {
    
    setRegForm();
    formButtonClick();
    
    jQuery(".chx-login-form form").on("submit", function(e) {
        jQuery.ajax({
            type: "POST",
            url: chatx_server + "client/auth.php",
            data: jQuery(this).closest("form").serialize(),
            dataType: "json",
            xhrFields: {
                withCredentials: true
            },
            success: function(data) {
                jQuery.getScript(chatx_server + "dynamic_js.php");
                if (data.success) {

                    jQuery(".icon-refresh").trigger("click");

                } else {

                    if (jQuery(".chx-login-form chx_p").length == 0) {
                        jQuery(".chx-login-form").append("<chx_p>" + data.message + "</chx_p>");
                    }
                    setTimeout(function() {
                        jQuery(".chx-login-form chx_p").remove();
                    }, 2000);

                }
            }
        });
        e.preventDefault();
    });
    
}

function ajaxLogOutClicked() {
    jQuery(".chatx_logout").one("click", function() {
        jQuery.ajax({
            url: chatx_server + "client/logout.php?ajax",
            method: "GET",
            xhrFields: {
                withCredentials: true
            },
            success: function() {
                jQuery.getScript(chatx_server + "dynamic_js.php");
                jQuery(".icon-refresh").trigger("click");
                jQuery(".chx-login-form input").removeAttr("style");
                if (r_e === 1 && jQuery(".chx-signup-form-contents chx_i").length == 0) {
                    jQuery('.chx-signup-form-contents').remove();
                    jQuery('#chx-signup-form').attr('disabled', 'disabled');
                    jQuery('.chx-switch-tab.second').css({"opacity":".2"});
                }
            }
        });
    });
}

function loggingIn() {
    jQuery("#false_shoutbox_name").css({
        "visibility": "hidden"
    });
    loginForm();
    jQuery(".chatx_logout").hide();
    ajaxFormSubmitted();
    ajaxFormSubmitted = undefined;
}

function loggingOut() {
    jQuery("#false_shoutbox_name").css({
        "visibility": "visible"
    });
    jQuery("#false_shoutbox_name").val(sessionName);
    jQuery("#false_shoutbox_name").prop("disabled", true);
    valName();
    jQuery(".chx-login-form").hide();
    jQuery("#chatx").off('click');
    jQuery(".chatx_logout").css("display", "block");
    ajaxLogOutClicked();
}

jQuery(".chx-management-link").attr("href", chatx_server + "client/index.php");

function publicScenarioLoggingIn() {
    jQuery("#false_shoutbox_name").val('').prop("disabled", false);
    jQuery('.chatx_logout').removeClass('chatx_logout').addClass('chatx_login').html("<chx_span></chx_span> <i class='icon-login'></i>");
    jQuery(".chatx_login").click(function(e) {
        jQuery(".expanded .chx-login-form").fadeIn(500);
    });
    jQuery(".icon-plus.chx-close").click(function(e) {
        jQuery(".expanded .chx-login-form").fadeOut(500);
    });
    ajaxFormSubmitted();
    ajaxFormSubmitted = undefined;
}

function publicScenarioLoggingOut() {
    jQuery("#false_shoutbox_name").val(sessionName);
    jQuery("#false_shoutbox_name").prop("disabled", true);
    jQuery(".expanded .chx-login-form").hide();
    jQuery('.chatx_login').removeClass('chatx_login').addClass('chatx_logout').html("<chx_span></chx_span> <chx_i class='icon-logout'></chx_i>");
    ajaxLogOutClicked();
}

function loadingModal() {
    jQuery('<chx_div class="loading-modal"><img class="loading-image" src="' + chatx_server + 'assets/img/loading.svg"></chx_div>').appendTo('#chatx');
}

function generateImageTagAndSend(res) {
    var data = JSON.parse(res);
    if (res !== '' && data.link !== null) {
        jQuery('#shoutbox-comment').val('');
        jQuery('#shoutbox-comment').val(jQuery('#shoutbox-comment').val() + '[url=' + data.link + ']' + openDirectLink + '[/url][img h=' + data.clientHeight + ' d=' + data.link + ']' + data.thumbnail + '[/img] ');

        if (jQuery('#false_shoutbox_name').val() == '') {
            jQuery('#shoutbox-comment').attr('rows', 6);
            errorNameEmpty();

        } else {
            chatSubmit();
        }

    }
    jQuery('.loading-modal').remove();
}

function processExtImg() {
    imgLink = {
        'urlToImg': jQuery("input[name='url_to_img']").val()
    };
    var url = chatx_server + "imgur_uploader.php";
    $.ajax({
        url: url,
        type: "POST",
        data: imgLink,
        success: function(res) {
            generateImageTagAndSend(res);
        }
    });
}

jQuery('.chx-imgur-uploader').append('<form id="imgur_uploader"><chx_i class="icon-upload"></chx_i><input type="file" accept="image/*" name="chximg"></form>');

jQuery("[name='chximg']").on('change', function() {
    var file_data = jQuery('#imgur_uploader input').prop('files')[0];
    var form_data = new FormData();
    form_data.append('chximg', file_data);
    var url = chatx_server + "imgur_uploader.php";
    loadingModal();
    jQuery.ajax({
        type: "POST",
        url: url,
        data: form_data,
        contentType: false,
        enctype: 'multipart/form-data',
        processData: false,
        success: function(res) {
            generateImageTagAndSend(res);
        }
    });
});