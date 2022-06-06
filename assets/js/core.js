/*
###################################################################
            CHATX BUILDING MARKUP, UI AND ADDING CSS STYLES
            VERSION 2.3.0
###################################################################
*/

//loading styles
function load_css() {
    var h = document.head;
    var l = document.createElement("link");
    l.type = "text/css";
    l.rel = "stylesheet";
    l.href = chatx_server + 'assets/css/chatx_styles.css';
    h.appendChild(l);
}
load_css();

const markup = `
        <chx_div id="chatx" class="chat" style="display: none">
            <chx_header>
                <chx_div class="chx-bar">
                    <chx_i class="chxicon-chat"></chx_i>
                    <chx_span></chx_span>
                     <chx_i class="chxicon-user"></chx_i>
                    <chx_div class="chx-pulsating-circle"></chx_div>
                    <chx_i class="chxicon-pause"></chx_i>
                    <input id="false_shoutbox_name" type="name" maxlength="15" placeholder onblur="valName()"/>
                    <chx_div class="name-required"></chx_div>
                    <chx_i class="chxicon-refresh"></chx_i>
                    <chx_div class="chat_popover_parent">
                        <a class="chx-settings-button"><chx_i class="chxicon-gear"></chx_i></a>
                        <chx_div class="chat_popover">
                            <chx_div>
                                <chx_span class="chx-fast-track"></chx_span>
                                <input type="checkbox" id="icd" name="icd" value="icd"/>
                                <label for="icd"></label>
                            </chx_div>
                            <chx_div>
                                <chx_span class="chx-sound-notific">
                                    <chx_i class="chxicon-unmute"></chx_i>
                                </chx_span>
                                <chx_span class="chx-push-notific">
                                    <chx_i class="chxicon-notification-default"></chx_i>
                                </chx_span>
                                <chx_span class="chx-help">
                                    <chx_i class="chxicon-help"></chx_i>
                                </chx_span>
                            </chx_div>
                            <chx_div>
                                <a class="chx-management-link" target="_blank"></a>
                                <a class="chatx_logout"><chx_span class="logout"></chx_span> <i class="chxicon-logout"></i></a>
                            </chx_div>
                        </chx_div>
                    </chx_div>
                    <chx_i class="chxicon-minimize"></chx_i><chx_i class="chxicon-expand"></chx_i>
                </chx_div>
            </chx_header>
            <chx_div class="chx-login-form">
                <chx_i class="chxicon-plus chx-close"></chx_i>
                <label class="chx-switch-tab first" for="chx-login-form"></label>
                <input class="chx-form-radio" type="radio" id="chx-login-form" name="chx-switch" checked="checked"/>
                <chx_span class="chx-login-form-contents">
                <form name="chx-login">
                    <input type="text" name="u" placeholder>
                    <input type="password" name="p" placeholder>
                    <chx_div class="chx-login-button chxicon-login"></chx_div>
                </form>
                </chx_span>
                <label class="chx-switch-tab second" for="chx-signup-form"></label>
                <input class="chx-form-radio" type="radio" id="chx-signup-form" name="chx-switch"/>
                <chx_span class="chx-signup-form-contents"></chx_span>
            </chx_div>
            <div data-simplebar class="chx-container">
                <chx_div class="shoutbox">
                    <chx_ul class="shoutbox-history"></chx_ul>
                    <chx_div class="chx-history">
                        <chx_span>
                            <chx_i class="chxicon-arrow"></chx_i>
                            <chx_div>Ранее в чате</chx_div>
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
                        <chx_div id="bb4"><chx_i class="chxicon-color"></chx_i></chx_div>
                        <chx_div id="bb5"><chx_i class="chxicon-photo"></chx_i></chx_div>
                        <chx_div class="chx-imgur-uploader"></chx_div>
                        <chx_div id="bb6"><chx_i class="chxicon-link"></chx_i></chx_div>
                    </chx_div>
                    <chx_div class="chx-color-bb-prompt">
                        <chx_i id="bb4_1" class="chxicon-hue chx-red"></chx_i>
                        <chx_i id="bb4_2" class="chxicon-hue chx-orange"></chx_i>
                        <chx_i id="bb4_3" class="chxicon-hue chx-yellow"></chx_i>
                        <chx_i id="bb4_4" class="chxicon-hue chx-green"></chx_i>
                        <chx_i id="bb4_5" class="chxicon-hue chx-lightblue"></chx_i>
                        <chx_i id="bb4_6" class="chxicon-hue chx-blue"></chx_i>
                        <chx_i id="bb4_7" class="chxicon-hue chx-purple"></chx_i>
                    </chx_div>
                    <chx_div class="chx-image-bb-prompt">
                            <input type="text" name="url_to_img" placeholder>
                            <chx_div class="chx-process-img">
                                <chx_span>OK</chx_span>
                            </chx_div>
                    </chx_div>
                    <chx_div class="chx-link-bb-prompt">
                            <input type="text" name="url_to_link" placeholder>
                            <chx_div class="chx-process-link">
                                <chx_span>OK</chx_span>
                            </chx_div>
                            <input type="text" name="link_desc" placeholder>
                    </chx_div>
                    <chx_div data-simplebar class="chx-pre-textarea">
                        <chx_i class="chxicon-plus"></chx_i>
                        <textarea id="shoutbox-comment" rows="2" data-min-rows="2" placeholder name="comment"></textarea>
                    </chx_div>
                    <chx_div id="chx-send-message">
                        <chx_i class="chxicon-send"></chx_i>
                    </chx_div>
                </form>
            </chx_div>
        </chx_div>
`;
document.body.insertAdjacentHTML('afterbegin', markup);

/*
###################################################################
            STARTING MAIN FUNCTION
            
###################################################################
*/
chx_script(chatx_server + 'dynamic_js.php', function() {

    jQuery.when(
        jQuery.getScript(chatx_server + 'assets/js/jquery-ui.min.js'),
        jQuery.getScript(chatx_server + 'assets/js/simplebar.js'),
        e_o === 1 ? jQuery.getScript('https://cdn.jsdelivr.net/npm/emojione@3.1.2/lib/js/emojione.min.js') : null
    ).done(function() {


        // Storing some elements in variables for a cleaner code base
        let refreshButton = document.querySelectorAll(".chxicon-refresh")[0],
            shoutboxForm = jQuery('.shoutbox-form'),
            form = shoutboxForm.find('form'),
            nameElement = form.find('#shoutbox-name'),
            commentElement = form.find('#shoutbox-comment'),
            ul = jQuery('chx_ul.shoutbox-content'),
            ulHist = document.querySelector('chx_ul.shoutbox-history');
            icd = jQuery('#icd');
            chx_resize = 'chx-container';
            isMobile = window.matchMedia("only screen and (max-width: 760px)").matches;
            mouseDown = 0;
        document.querySelector('.' + chx_resize).onmousedown = function(e) {
            if (e.target.className !== "chatx_img") {
                mouseDown = 1;
            }
        };

        document.querySelector('.' + chx_resize).onmouseup = function() {
            mouseDown = 0;
        };



        // Trigger scroll to bottom of chat content
        function scrollBottom() {
            let wrapper = document.querySelector(".simplebar-content-wrapper");
            wrapper.scrollTop = wrapper.scrollHeight - wrapper.clientHeight;
        }


        // Replace :) with emoji icons if library is on:
        if (e_o === 1) {
            emojione.ascii = true;
        }

        nameElement.val(localStorage.getItem('nameElement') || "");

        // On form submit, if everything is filled in, publish the shout to the database
        let canPostComment = true;

        form.submit(function(e) {
            e.preventDefault();

            if (!canPostComment) return;

            let name = sessionName === '' ? nameElement.val().trim() : sessionName;
            let comment = commentElement.val().trim();

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
        jQuery('chx_ul').on('click', '.shoutbox-comment-reply', function(e) {
            let replyName = jQuery(this).data('name');
            commentElement.val('@' + '[b]' + replyName + '[/b] ').focus();
        });

        // Clicking the refresh button will force the load function
        let canReload = true;

        refreshButton.addEventListener('click', event => {
            if (!canReload) return false;

            load();
            canReload = false;

            // Allow additional reloads after 500 millisecond
            setTimeout(function() {
                canReload = true;
            }, 500);
        });

        let loadInt;
        let checkInt = +localStorage.getItem('intLoad');
        icd.prop('checked', !!checkInt);
        let time = checkInt ? fastTrack : slowTrack;
        loadInt = setInterval(load, time);

        // Automatically refresh the shouts in slow and fast track mode. Do not refrech when minimized
        icd.on('change', function() {
            clearInterval(loadInt);
            loadInt = setInterval(load, (jQuery(this).prop('checked') ? fastTrack : slowTrack));
            localStorage.setItem('intLoad', jQuery(this).prop('checked') * 1);
        });

        jQuery('.chxicon-expand').on('click', function() {
            loadInt = setInterval(load, (jQuery(icd).prop('checked') ? fastTrack : slowTrack));
            jQuery("#chatx").draggable('enable');
            jQuery("#chatx").removeClass("minimized");

            if (localStorage.toggled != "expanded") {
                jQuery('#chatx').addClass("expanded", true);
                localStorage.toggled = "expanded";
            }
            localStorage.setItem('chx_id', jQuery("chx_li").last().attr('class'));
            jQuery(".chx-bar").removeClass("chx-new");

            scrollBottom();
            if (isMobile) {
                jQuery("html").animate({
                    scrollTop: 0
                }, 200); // test article
            }
        });

        // Managing widget draggable and resizable state when minimized or expanded
        jQuery('.chxicon-minimize').on('click', function() {
            clearInterval(loadInt);
            jQuery("#chatx").draggable('disable');
            jQuery("#chatx").addClass("minimized");

            jQuery('#chatx').removeClass('expanded');
            localStorage.toggled = "minimized";
        });

        if (localStorage.toggled != "expanded") {
            clearInterval(loadInt);
        }

        // Sending shouts to the database
        function publish(name, comment) {

            let published = jQuery.ajax({

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
                if (sessionName) {
                    let src = chatx_server + 'assets/audio/1_1.ogg';
                    let audio = new Audio(src);
                    audio.play();
                }
            });

        }

        // Visual & audio notifications
        function notification() {
            let lastId = jQuery("chx_li").last().attr('class');
            let localId = localStorage.getItem('chx_id');
            let lastName = jQuery(".shoutbox-username b").last().data("name");

            if (jQuery("#chatx").hasClass("minimized")) {
                if (lastId && lastId !== localId && lastId !== 'denied') {
                    jQuery(".chx-bar").addClass("chx-new");
                }
            } else {

                soundMuted = localStorage.getItem('soundMuted');
                if (lastId && localId && lastId !== localId && localId !== 'denied' && lastName !== sessionName && sessionName && n_s !== 'null') {
                    if (!soundMuted) {
                        let src = chatx_server + 'assets/audio/' + n_s + '.ogg';
                        let audio = new Audio(src);
                        audio.play();
                    }

                    if (window.Notification) {
                        if (!document.hasFocus() && localStorage.getItem('notificationDisabled') !== '1') {
                            let thumbnail = chatx_server + 'assets/img/logo_shutter.png';
                            message = document.querySelectorAll('.shoutbox-comment-contents');
                            message = message[message.length - 1];
                            message = message.textContent;
                            push_notification = new Notification(lastName + ' ' + pushNotificationMessageSent, {
                                body: message,
                                icon: thumbnail
                            });
                        }
                    }
                }
                if (lastId !== 'denied') {
                    localStorage.setItem('chx_id', lastId);
                }
            }
        }

        // Highlights user's messages as well as displays user icon at bar
        function highlightMyMsg() {
            var userIcon = document.querySelector(".chx-bar .chxicon-user");
            var loggedInClass = "chxlogged-in";
            if (sessionName !== '') {
                jQuery(".shoutbox-username b[data-loggedin='true']:contains('" + sessionName + "')").closest("chx_li").attr("id", "chx-my-msg");
                userIcon.classList.add(loggedInClass);
            } else {
                userIcon.classList.remove(loggedInClass);
            }

            jQuery(".chatx_img").closest("chx_li").attr("data", "chx-img-msg");

        }



        // Rendering an array of shouts as HTML
        function appendComments(data) {
            ul.empty();

            data.forEach(function(d) {
                ul.prepend('<chx_li class="' + d.id + '">' +
                    '<chx_p class="shoutbox-comment">' +
                    '<chx_span class="shoutbox-username"><b data-loggedin="' + d.loggedIn + '" data-name="' + d.name + '">' + d.name + '</b></chx_span>' +
                    '<chx_div class="shoutbox-comment-contents">' + (e_o === 1 ? emojione.toImage(d.text) : d.text) + '</chx_div>' +
                    '<chx_div class="shoutbox-comment-details"><chx_span class="shoutbox-comment-ago">' + d.timeAgo + '<chx_span class="shoutbox-comment-time">' + d.timeStamp + '</chx_span></chx_span><chx_span class="shoutbox-comment-reply" data-name="' + d.name + '"><chx_i class="chxicon-reply"></chx_i></chx_span></chx_div>' +
                    '</chx_p>' +
                    '</chx_li>');
            });

        }

        // Max length of new message in textarea
        jQuery("#shoutbox-comment").attr("maxlength", m_c);

        // Making bleeping online indicator when fast-track update is on
        jQuery('#icd').click(function() {
            if (jQuery(this).prop('checked')) {
                jQuery(".chx-pulsating-circle").show();
                jQuery("#false_shoutbox_name").css({
                    "padding-right": "15px",
                    "transition": "0.3s ease"
                });
            } else {
                jQuery(".chx-pulsating-circle").hide();
                jQuery("#false_shoutbox_name").css({
                    "padding-right": "0",
                    "transition": "0.3s ease"
                });
            }
        });

        var secondLoad

        function load() {
            if (loadPaused) {
                jQuery.ajax({
                    dataType: "json",
                    url: chatx_server + 'load.php',
                    xhrFields: {
                        withCredentials: true
                    },
                    success: function(data) {
                        if (!secondLoad) {
                            appendComments(data);
                            scrollBottom();
                        } else {
                            var wrapper = document.querySelector(".simplebar-content-wrapper");
                            ul = jQuery('chx_ul.shoutbox-content');
                            if ((wrapper.scrollHeight - wrapper.scrollTop - 20) <= wrapper.clientHeight && mouseDown !== 1 && !document.querySelector(".shoutbox-comment-ago:hover")) {
                                if (ulHist.children.length > 0) {
                                    ulHist.innerHTML = "";
                                    document.querySelector('.chx-history chx_i').style.display = "block";
                                    document.querySelector('.chx-history chx_div').style.display = "none";
                                }
                                appendComments(data);
                                scrollBottom();
                            }

                        }
                        secondLoad = true;
                        notification();
                        highlightMyMsg();

                    }

                });
            } else {
                console.log('load paused')
            }
        }

        function chatHistory() {
            jQuery.ajax({
                dataType: "json",
                url: chatx_server + 'load.php?history',
                xhrFields: {
                    withCredentials: true
                },
                success: function(data) {
                    ul = jQuery('chx_ul.shoutbox-history'); //jQuery must be eliminated
                    appendComments(data);
                    highlightMyMsg();
                    document.querySelector('.chx-history chx_i').style.display = "none";
                    document.querySelector('.chx-history chx_div').style.display = "block";
                    document.querySelector(".chx-history chx_span").scrollIntoView();
                }
            });
        }
        document.querySelector(".chx-history chx_span").onclick = function() {
            chatHistory()
        };
        document.querySelector(".chxicon-help").onclick = function() {
            window.open(chatx_server + 'client/help.php', '_blank');
        }

        jQuery("#chatx").draggable({
            containment: "window",
            handle: 'chx_header',
            scroll: false,
            stop: function(event, ui) {
                chat_custom_position[this.id] = ui.position;
                localStorage.chat_custom_position = JSON.stringify(chat_custom_position);
            }
        });

        let chx_height = localStorage.getItem(chx_resize);

        if (chx_height === null) chx_height = {};
        else chx_height = JSON.parse(chx_height);
        jQuery('.' + chx_resize).css(chx_height);

        function resizeInt() {
            if (!isMobile) {
                jQuery(".chx-container").resizable({
                    handles: "s",
                    resize: function() {
                        let maxHeight = (typeof ForumAPITicket !== 'undefined' ? jQuery(window).scrollTop() /* fixing mybb issue */ : "") + jQuery(window).height() - jQuery("#chatx").position().top - jQuery(".shoutbox-form").height() - 36;
                        let sizeHistory = JSON.stringify({
                            height: this.style.height
                        });
                        let sizeHistoryData = JSON.parse(sizeHistory);
                        if (sizeHistoryData.height <= maxHeight + 'px') {
                            localStorage.setItem(chx_resize, sizeHistory);
                        } else {
                            localStorage.setItem(chx_resize, '{"height":"' + maxHeight + 'px"}');
                        }
                        jQuery("#chatx.expanded .chx-container").css({
                            "max-height": maxHeight,
                            "height": sizeHistoryData.height
                        });
                        scrollBottom();
                    }
                });
                jQuery('<chx_div class="resize-helper"></chx_div>').appendTo('#chatx .ui-resizable-s');
            }
        }

        // Making ChatX appear after scrollbar library loaded as well as some other functions
        jQuery.when(jQuery("#chatx").fadeIn(50))
            .done(function() {
                chatxVisibility();
                load();
                resizeInt();
                fastTrackIsOn();
                loadNickname();
                if (typeof soundMuted !== 'undefined' && soundMuted) {
                    jQuery('.chxicon-unmute').toggleClass('chxicon-unmute chxicon-mute');
                }
                var backBtn = document.querySelector('.shoutbox-form');
                backBtn.insertAdjacentHTML('beforeend', '<chx_div class="chx_down"><chx_i class="chxicon-arrow"></chx_i></chx_div>');

                var wrapper = document.querySelector(".simplebar-content-wrapper");
                backBtn2 = document.querySelector(".chx_down");
                isMobile ? null : resizableHandler = document.querySelector(".ui-resizable-handle");
                wrapper.addEventListener('scroll', function(e) {
                    backBtn2.style.display = "block";
                    backBtn2.addEventListener('click', function() {
                        scrollBottom();
                    });
                    isMobile ? null : resizableHandler.style.display = "none";
                    if ((wrapper.scrollHeight - wrapper.scrollTop - 20) <= wrapper.clientHeight) {
                        backBtn2.style.display = "none";
                        isMobile ? null : resizableHandler.style.display = "block";
                    }
                });
            });


    });

    // Loading featherlight gallery if option is on
    if (f_g === 1) {
        getScript(chatx_server + 'assets/js/featherlight.min.js');
    }

    // MyBB integration if option is on
    if (m_a === 1) {
        getScript(chatx_server + 'assets/js/mybb-authentication.min.js');
    }

    // Language pack
    jQuery.getScript(chatx_server + 'data/languages/' + l_g + '/app_lang.' + l_g + '.php', function() {
        jQuery(".chx-bar chx_span").first().text(chat);
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
        jQuery(".chx-history chx_div").text(recentlyInChat)
        jQuery("#shoutbox-comment").attr("placeholder", newMessagePlaceholder);
        jQuery("input[name='url_to_img']").attr("placeholder", imgUrlPlaceholder);
        jQuery("input[name='url_to_link']").attr("placeholder", linkUrlPlaceholder);
        jQuery("input[name='link_desc']").attr("placeholder", linkDesc);
        jQuery("head").append('<style>.chatx_login span {font-size:0 !important}.chatx_login chx_span::after {content: "' + login + '"; font-size: 12px} .chatx_logout chx_span::after {content: "' + logout + '"; font-size: 12px} .chx-mybb-login::after {content: "' + mybbSignup + '";}</style>'); // not good but ok for now
    });

});

/*
###################################################################
            ADDITIONAL COMPONENTS
            
###################################################################
*/

// Async loading of external dependencies
const getScript = url => new Promise((resolve, reject) => {
    const script = document.createElement('script')
    script.src = url
    script.async = true
    script.onerror = reject
    script.onload = script.onreadystatechange = function() {
        const loadState = this.readyState
        if (loadState && loadState !== 'loaded' && loadState !== 'complete') return
        script.onload = script.onreadystatechange = null
        resolve()
    }
    document.head.appendChild(script)
})

// Setting ChatX in expanded and minimized mode
jQuery('#chatx').addClass(localStorage.toggled);

jQuery('.chxicon-unmute, .chxicon-mute').on('click', function() {
    jQuery(this).toggleClass("chxicon-unmute chxicon-mute");
    if (jQuery(this).hasClass('chxicon-mute')) {
        localStorage.setItem('soundMuted', '1');
    } else {
        localStorage.removeItem('soundMuted');
    }
});

function pushNotification() {
    if (window.Notification) {
        var a = document.querySelector(".chx-push-notific chx_i");
        ntfDisb = 'chxicon-notification-disabled';
        ntfSubs = 'chxicon-notification-subscribed';
        if (Notification.permission === 'denied' || localStorage.getItem('notificationDisabled') === '1') {
            a.className = '';
            a.classList.add(ntfDisb);
            if (Notification.permission !== 'denied') {
                a.addEventListener('click', function() {
                    if (a.classList.contains(ntfSubs)) {
                        a.className = '';
                        a.classList.add(ntfDisb);
                        localStorage.setItem('notificationDisabled', '1');
                    } else {
                        a.className = '';
                        a.classList.add(ntfSubs);
                        localStorage.removeItem('notificationDisabled');

                    }
                });
            }
        } else {
            if (Notification.permission === 'default') {
                document.querySelector(".chxicon-notification-default").addEventListener('click', function() {
                    Notification.requestPermission();
                });
            } else {
                a.className = '';
                a.classList.add(ntfSubs);
                a.addEventListener('click', function() {
                    if (a.classList.contains(ntfSubs)) {
                        a.className = '';
                        a.classList.add(ntfDisb);
                        localStorage.setItem('notificationDisabled', '1');
                    } else {
                        a.className = '';
                        a.classList.add(ntfSubs);
                        localStorage.removeItem('notificationDisabled');

                    }
                });

            }

        }
    }
}
pushNotification();

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

    if (this.rows >= 6) {
        jQuery('.chx-pre-textarea, #chx-new-message').addClass("scrollable");
    } else {
        jQuery('.chx-pre-textarea, #chx-new-message').removeClass("scrollable");
    }
    if (!jQuery('.shoutbox-form').visible()) {
        if (jQuery('.chx-container').height() > 360) {
            let calcFormHeight = jQuery('.chx-container').height() - 18;
            jQuery('.chx-container').css("height", calcFormHeight + "px");
            localStorage.setItem(chx_resize, '{"height":"' + calcFormHeight + 'px"}');
        } else {
            let top = parseInt(jQuery('#chatx').css('top'), 10);
            jQuery('#chatx').css('top', top - 18 + 'px')

        }
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
        jQuery('.name-required').fadeOut(300);
    }, 2000);
}

// Submit form if name field is filled in, otherwise show warning
function chatSubmit() {
    if (jQuery('#false_shoutbox_name').val() === '') {
        errorNameEmpty();
    } else {
        jQuery("#chx-new-message").submit();
        jQuery('.chx-pre-textarea, #chx-new-message').removeClass("scrollable");
        jQuery(".chx-container").stop().animate({
            scrollTop: jQuery(".shoutbox-content")[0].scrollHeight
        }, 0);
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
    let s = jQuery('#shoutbox-comment').val();
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
let sPositions = localStorage.chat_custom_position || "{}",
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
    let getFalseShoutBoxName = document.getElementById("false_shoutbox_name").value;
    document.getElementById("shoutbox-name").value = getFalseShoutBoxName;

}

//chatHistory

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
    var resizeActivated;
    var resizeTimer;
    jQuery(window).on("load resize", function() {
        if (!jQuery('.chx-container').visible() && jQuery('#chatx').hasClass('expanded') && !resizeActivated) {

            let keysToRemove = ["chx-container", "chat_custom_position"];
            resizeActivated = true;
            for (key of keysToRemove) {
                localStorage.removeItem(key);
            }
            jQuery('#chatx').animate({
                top: '15px',
                left: '15px'
            }, 500);
            jQuery("#chatx.expanded .chx-container").animate({
                height: "360px"
            }, 500);
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(function() {
                resizeActivated = false
            }, 200);
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
    let a = e.metaKey || e.altKey;
    b = String.fromCharCode(e.which).toLowerCase();
    c = e.metaKey || e.ctrlKey;
    d = jQuery('#shoutbox-comment').is(':focus');
    if ((a) && (b === 'q')) {
        jQuery(".bb-popup").fadeToggle("fast");
        return false;
    }
    if ((a) && (b === 'w')) {
        document.getElementById('icd').click();
        return false;
    }
    if ((c) && (b === 'b') && d) {
        bbtags("shoutbox-comment", "[b]", "[/b]");
        return false;
    }
    if ((c) && (b === 'i') && d) {
        bbtags("shoutbox-comment", "[i]", "[/i]");
        return false;
    }
    if ((c) && (b === 'u') && d) {
        bbtags("shoutbox-comment", "[u]", "[/u]");
        return false;
    }
});

jQuery('.chxicon-plus, .chxicon-color').mousedown(function(event) {
    event.preventDefault();
});

jQuery(document).on('click touchstart mouseup', function(event) {
    if (!jQuery(event.target).closest('.bb-popup, .chx-color-bb-prompt, .chx-image-bb-prompt, .chx-link-bb-prompt, .chxicon-plus').length && this.getSelection().toString() == "") {

        jQuery('.bb-popup, .chx-color-bb-prompt, .chx-image-bb-prompt, .chx-link-bb-prompt').fadeOut("fast");
    }
});

jQuery(".shoutbox-form .chxicon-plus").click(function() {
    jQuery(".bb-popup").fadeIn("fast");
});

bb1.onclick = function() {
    bbtags("shoutbox-comment", "[b]", "[/b]");
}
bb2.onclick = function() {
    bbtags("shoutbox-comment", "[u]", "[/u]");
}
bb3.onclick = function() {
    bbtags("shoutbox-comment", "[i]", "[/i]");
}
bb4.onclick = function() {

    let height = jQuery(".shoutbox-form").height();
    jQuery(".chx-color-bb-prompt").css({
        height: height - 3
    });
    jQuery(".chx-image-bb-prompt, .chx-link-bb-prompt").fadeOut(0);
    jQuery(".chx-color-bb-prompt").fadeIn(300);

    bb4_1.onclick = function() {
        bbtags("shoutbox-comment", "[color=red]", "[/color]");
    }
    bb4_2.onclick = function() {
        bbtags("shoutbox-comment", "[color=orange]", "[/color]");
    }
    bb4_3.onclick = function() {
        bbtags("shoutbox-comment", "[color=yellow]", "[/color]");
    }
    bb4_4.onclick = function() {
        bbtags("shoutbox-comment", "[color=green]", "[/color]");
    }
    bb4_5.onclick = function() {
        bbtags("shoutbox-comment", "[color=lightblue]", "[/color]");
    }
    bb4_6.onclick = function() {
        bbtags("shoutbox-comment", "[color=blue]", "[/color]");
    }
    bb4_7.onclick = function() {
        bbtags("shoutbox-comment", "[color=purple]", "[/color]");
    }

    jQuery(".chxicon-hue").click(function() {
        jQuery(".chx-color-bb-prompt").fadeOut(300);
    });
}
jQuery("#bb5, #bb6").click(function() {
    let heightFormBB = jQuery(".shoutbox-form").height();
    jQuery(".chx-image-bb-prompt, .chx-link-bb-prompt").css({
        height: heightFormBB - 3
    });
});
bb5.onclick = function() {
    jQuery(".chx-color-bb-prompt, .chx-link-bb-prompt").fadeOut(0);
    jQuery(".chx-image-bb-prompt").fadeIn(300);
}

bb6.onclick = function() {
    jQuery(".chx-color-bb-prompt, .chx-image-bb-prompt").fadeOut(0);
    jQuery(".chx-link-bb-prompt").fadeIn(300);
}

function loginForm() {
    jQuery("#chatx").click(function(e) {
        let target = jQuery(e.target);
        if (target.hasClass("chx-close")) {
            jQuery(".expanded .chx-login-form").fadeOut(300);
        } else {
            jQuery(".expanded .chx-login-form").fadeIn(300);
        }
    });
}

if (jQuery('.chx-signup-form-contents').css('display') != 'initial') {
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
                '<chx_div class="chx-login-button chxicon-login"></chx_div></form>');

        }

    } else {
        jQuery('.chx-signup-form-contents').append('<chx_i class="chxicon-lock chx-reg-disabled"></chx_i><chx_p class="chx-reg-disabled-caption"></chx_p>');
    }
}

function formSubmit(nameForm) {
    let empty = jQuery('form[name=' + nameForm + '] input').filter(function() {
        return this.value === "";
    });
    if (empty.length) {
        jQuery(empty).css({
            "box-shadow": "inset 0px 0px 0px 1px #bb5a5a"
        });
    } else {
        jQuery('form[name=' + nameForm + '] chx_div').submit();
        return false;
    }
}

jQuery('.chx-login-form-contents, .chx-signup-form-contents').on('keydown', function(e) {
    if (e.which == '13') {
        let nameForm = jQuery(this).find('form').attr('name');
        formSubmit(nameForm);
    }
});

function formButtonClick() {
    jQuery(".chx-login-button").on('click', function() {
        let nameForm = jQuery(this).closest('form').attr('name');
        formSubmit(nameForm);
    });
}
formButtonClick();

jQuery(".chx-process-img").on('click', function() {
    jQuery(".chx-image-bb-prompt").fadeOut(300);
    loadingModal();
    processExtImg();
});
jQuery(".chx-process-link").on('click', function() {
    let a = document.querySelector("input[name='url_to_link']");
    b = document.querySelector("input[name='link_desc']");
    c = a.value;
    d = b.value;
    if (c && d) {
        jQuery('#shoutbox-comment').val('[url=' + c + ']' + d + '[/url]');
        textarea.rows = countRows(textarea.scrollHeight);
        jQuery('.chx-link-bb-prompt').fadeOut(300);
        a.value = "";
        b.value = "";
    }
});

function ajaxFormSubmitted() {

    setRegForm();
    formButtonClick();

    jQuery(".chx-login-form form").on("submit", function(e) {
        jQuery.ajax({
            url: chatx_server + 'client/auth.php',
            type: "POST",
            crossDomain: true,
            dataType: "json",
            data: jQuery(this).closest("form").serialize(),
            xhrFields: {
                withCredentials: true
            },
            success: function(data) {
                jQuery.getScript(chatx_server + "dynamic_js.php");
                if (data.success) {
                    jQuery(".chxicon-refresh").trigger("click");

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
                jQuery(".chxicon-arrow, .chxicon-refresh").trigger("click");
                jQuery(".chx-login-form input").removeAttr("style");
                if (r_e === 1 && jQuery(".chx-signup-form-contents chx_i").length == 0) {
                    jQuery('.chx-signup-form-contents').remove();
                    jQuery('#chx-signup-form').attr('disabled', 'disabled');
                    jQuery('.chx-switch-tab.second').css({
                        "opacity": ".2"
                    });
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
    jQuery('.chatx_logout').removeClass('chatx_logout').addClass('chatx_login').html("<chx_span></chx_span> <i class='chxicon-login'></i>");
    jQuery(".chatx_login").click(function(e) {
        jQuery(".expanded .chx-login-form").fadeIn(300);
    });
    jQuery(".chxicon-plus.chx-close").click(function(e) {
        jQuery(".expanded .chx-login-form").fadeOut(300);
    });
    ajaxFormSubmitted();
    ajaxFormSubmitted = undefined;
}

function publicScenarioLoggingOut() {
    jQuery("#false_shoutbox_name").val(sessionName);
    jQuery("#false_shoutbox_name").prop("disabled", true);
    jQuery(".expanded .chx-login-form").hide();
    jQuery('.chatx_login').removeClass('chatx_login').addClass('chatx_logout').html("<chx_span></chx_span> <chx_i class='chxicon-logout'></chx_i>");
    ajaxLogOutClicked();
}

function loadingModal() {
    let loading_modal = '<chx_div class="loading-modal"><img class="loading-image" src="' + chatx_server + 'assets/img/loading.svg"></chx_div>'
    document.querySelector("#chatx").insertAdjacentHTML('beforeend', loading_modal);
}

function generateImageTagAndSend(res) {
    let data = JSON.parse(res);
    if (res !== '' && data.link !== null) {
        document.querySelector("#shoutbox-comment").value = "";
        jQuery('#shoutbox-comment').val(jQuery('#shoutbox-comment').val() + '[url=' + chatx_server + 'img_viewer.php?url=' + data.link + ']' + openDirectLink + '[/url][img h=' + data.clientHeight + ' d=' + data.link + ']' + data.thumbnail + '[/img] ');
        document.querySelector("input[name='url_to_img']").value = "";
        if (jQuery('#false_shoutbox_name').val() == '') {
            jQuery('#shoutbox-comment').attr('rows', 6);
            errorNameEmpty();

        } else {
            chatSubmit();
        }

    }
    document.querySelector('.loading-modal').remove();
}

function processExtImg() {
    imgLink = {
        'urlToImg': jQuery("input[name='url_to_img']").val()
    };
    let url = chatx_server + "imgur_uploader.php";
    jQuery.ajax({
        url: url,
        type: "POST",
        data: imgLink,
        success: function(res) {
            generateImageTagAndSend(res);
        }
    });
}

let imgur_upload_form = '<form id="imgur_uploader"><chx_i class="chxicon-upload"></chx_i><input id="imgur_uploader_input" type="file" accept="image/*" name="chximg"></form>'
document.querySelector(".chx-imgur-uploader").insertAdjacentHTML('beforeend', imgur_upload_form);

document.querySelector("[name='chximg']").addEventListener("change", event => {

    let file_data = document.querySelector('#imgur_uploader_input').files[0];
    let form_data = new FormData();
    form_data.append('chximg', file_data);

    var request = new XMLHttpRequest();
    request.open('POST', chatx_server + 'imgur_uploader.php', true);

    request.setRequestHeader('Accept', 'multipart/form-data');

    request.send(form_data);
    loadingModal();
    request.onload = function() {

        if (this.status >= 200 && this.status < 400) {

            var form_data = this.response;
            generateImageTagAndSend(form_data);
        } else {
            // We reached our target server, but it returned an error
        }
    };

    request.onerror = function() {};


});

// Checking open browser tabs and working with the relevant one
let loadPaused
getScript(chatx_server + 'assets/js/page-availability.js').then(() => {


    function check_current_window_status(test) {
        //manage_crash(); REMOVED

        if (PV_API) {
            var active_status = "0";
            windows_list = get_main_windows_list();
            active_windows_list = get_active_windows_list();

            if (windows_list.indexOf(localStorage.active_window) < 0) {
                localStorage.active_window = windows_list[windows_list.length - 1];
            }

            if (!document[PV_API.hidden]) {
                localStorage.active_window = current_window_id;
            }

            if (localStorage.active_window == current_window_id) {
                active_status = "1";
            }

            if (active_status == "1") {
                active_windows_list = add_to_active_windows(current_window_id);
            } else {
                active_windows_list = remove_from_active_windows(current_window_id);
            }

            var iconPause = document.querySelector('.chxicon-pause');
            iconPulse = document.querySelector('.chx-pulsating-circle');

            if (active_status == '1') {

                loadPaused = true;

                if (document.getElementById('icd').checked) {
                    iconPulse.style.display = "block";
                }
                iconPause.style.display = "none";
            } else {
                if (windows_list.length > 1) {
                    loadPaused = false;
                    iconPulse.style.display = "none";
                    iconPause.style.display = "block";
                }

            }

        }

        localStorage.last_update = Date.now();
    }
    setInterval(function() {
        check_current_window_status();
    }, time_period);

    check_current_window_status();

});