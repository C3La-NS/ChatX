/*
###################################################################
            CHATX BUILDING MARKUP, UI AND ADDING CSS STYLES
            VERSION 2.5.0
###################################################################
*/

//loading styles
function load_css(cssUrl) {
    var h = document.head;
    var l = document.createElement("link");
    l.type = "text/css";
    l.rel = "stylesheet";
    l.href = cssUrl;
    h.appendChild(l);
}

load_css(chatx_server + 'assets/css/chatx_styles.css');
load_css(chatx_server + 'assets/css/chx-icons.css');
load_css(chatx_server + 'assets/css/color_setup.css');

const markup = `
        <chx_div id="chxwrapper"></chx_div>
        <chx_div id="chatx" class="chat" style="display: none">
            <chx_header>
                <chx_div class="chx-bar">
                    <chx_i class="chxicon-chat"></chx_i>
                    <chx_span></chx_span>
                    <chx_i class="chxicon-user"></chx_i>
                    <chx_div class="chx-pulsating-circle"></chx_div>
                    <chx_i class="chxicon-pause"></chx_i>
                    <input id="false_shoutbox_name" type="name" maxlength="15" placeholder />
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
                                <a class="chx-authentication-link"><chx_span></chx_span> <chx_i></chx_i></a>
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
                            <chx_div></chx_div>
                        </chx_span>
                    </chx_div>
                    <chx_ul class="shoutbox-content"></chx_ul>
                </chx_div>
            </div>
            <chx_div id="resizer">
                <chx_div class="resize-helper"></chx_div>
            </chx_div>
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
                    <chx_div class="chx-hard-wrapper">
                        <chx_div class="chx-scroll-wrapper no-scrollbar">
                            <chx_i class="chxicon-plus"></chx_i>
                            <chx_div id="shoutbox-comment" name="comment" contenteditable="true"></chx_div>
                        </chx_div>
                    </chx_div>
                    <chx_div id="chx-send-message">
                        <chx_i class="chxicon-send"></chx_i>
                    </chx_div>
                    <chx_div class="progress-bar-wrapper">
                        <svg class="progress-bar-svg">
                            <circle class="progress-bar-circle" cx="50%" cy="50%" r="50%"></circle>
                        </svg>
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
const store = {};

var date = new Date();
date.setTime(date.getTime() + (30 * 24 * 60 * 60 * 1000)); // expires in 30 days

// Inserts the jwt to the store object
store.setJWT = function(data) {
    this.JWT = data;
    localStorage.setItem('chx_authentication', data);
};

store.setJWT(localStorage.getItem('chx_authentication'));

// Async loading of external dependencies
const getScript = url => new Promise((resolve, reject) => {
    const script = document.createElement('script');
    script.src = url;
    script.async = true;
    script.onerror = reject;
    script.onload = script.onreadystatechange = function() {
        const loadState = this.readyState;
        if (loadState && loadState !== 'loaded' && loadState !== 'complete') return;
        script.onload = script.onreadystatechange = null;
        resolve();
    };
    document.body.insertAdjacentElement("afterend", script);
});

function makeXHRRequest(url, method) {
    return new Promise(function(resolve, reject) {
        var xhr = new XMLHttpRequest();
        xhr.open(method, url);
        xhr.setRequestHeader('Authorization', `${store.JWT}`);
        xhr.onload = function() {
            if (xhr.status >= 200 && xhr.status < 300) {
                resolve(xhr.response);
            }
        };
        xhr.send();
    });
}

// Storing some elements for a cleaner code base
const refreshButton = document.querySelectorAll(".chxicon-refresh")[0],
    shoutboxForm = document.querySelector('.shoutbox-form'),
    form = shoutboxForm.querySelector('form'),
    nameElement = form.querySelector('#shoutbox-name'),
    falseShoutBoxName = document.querySelector("#false_shoutbox_name"),
    commentElement = form.querySelector('#shoutbox-comment'),
    icd = document.getElementById('icd'),
    chx_resize = 'chx-container',
    container = document.querySelector(".chx-container"),
    chatx = document.querySelector("#chatx"),
    pulsatingCircle = document.querySelector(".chx-pulsating-circle"),
    chxColorBbPrompt = document.querySelector(".chx-color-bb-prompt"),
    chxImageBbPrompt = document.querySelector(".chx-image-bb-prompt"),
    chxLinkBbPrompt = document.querySelector(".chx-link-bb-prompt"),
    progressBarWrapper = document.querySelector('.progress-bar-wrapper'),
    progressBarCircle = document.querySelector('.progress-bar-circle'),
    notificSoundIcon = document.querySelector('.chx-sound-notific chx_i');
let ul = document.querySelector("chx_ul.shoutbox-content"),
    ulHist = document.querySelector('chx_ul.shoutbox-history'),
    signUpFormContents = document.querySelector('.chx-signup-form-contents'),
/*isMobile = window.matchMedia("only screen and (max-width: 760px)").matches;*/
    isMobile = /iPhone|iPad|iPod|Android/.test(navigator.userAgent);

makeXHRRequest(chatx_server + 'dynamic_js.php', 'GET').then(function(response) {
    let parsedResponse = JSON.parse(response);
    let sessionName;
        fastTrack = parsedResponse.fastTrack;
        slowTrack = parsedResponse.slowTrack;
        r_e = parsedResponse.r_e;
        e_o = parsedResponse.e_o;
        m_a = parsedResponse.m_a;
        m_c = parsedResponse.m_c;
        n_s = parsedResponse.n_s;
        l_g = parsedResponse.l_g;
        c_s = parsedResponse.c_s;
        s_o = parsedResponse.s_o;
    let loggingStatus;

    function setDynamicAuthenticationVars() {
        sessionName = parsedResponse.sessionName;
        loggingStatus = parsedResponse.loggingStatus;

        if (loggingStatus == "1_0") {
            loggingOut();
        } else if (loggingStatus == "1_1") {
            loggingIn();
        } else if (loggingStatus == "2_0") {
            publicScenarioLoggingOut();
        } else if (loggingStatus == "2_1") {
            publicScenarioLoggingIn();
        }
    }
    
    setDynamicAuthenticationVars();
    
    // optimize widget for larger screens
    if (s_o === "1") {
        load_css(chatx_server + 'assets/css/screen_optimized.css');
    }
    // loading chat color scheme
    load_css(chatx_server + 'assets/css/scheme/' + c_s + '.css');

    Promise.all([
            getScript(chatx_server + 'assets/js/simplebar.js'),
            e_o === "1" ? getScript('https://cdn.jsdelivr.net/npm/emojione@3.1.2/lib/js/emojione.min.js') : Promise.resolve()
        ])
        .then(() => {
            // Trigger scroll to bottom of chat content
            function scrollBottom() {
                let wrapper = document.querySelector(".simplebar-content-wrapper");
                wrapper.scrollTop = wrapper.scrollHeight - wrapper.clientHeight;
            }
            // Replace text smiles with emoji icons if library is on:
            if (e_o === "1") {
                emojione.ascii = true;
            }
            nameElement.value = localStorage.getItem('nameElement') || "";
            // On form submit, if everything is filled in, publish the shout to the database
            let canPostComment = true;
            form.onsubmit = function(e) {
                e.preventDefault();
                if (!canPostComment) return;
                let name = sessionName === '' ? nameElement.value.trim() : sessionName;
                let comment = commentElement.innerText.trim();
                if (name.length && comment.length && comment.length <= m_c) {
                    publish(name, comment);
                    // Prevent new shouts from being published
                    canPostComment = false;
                    setTimeout(function() {
                        canPostComment = true;
                    }, 500);
                }
            };
            // Clicking on the REPLY button writes the name of the person you want to reply to into the textbox.
            function replySystem() {
                document.querySelectorAll('.chxicon-reply').forEach(function(el) {
                    el.addEventListener('click', function(e) {
                        let replyName = e.target.closest('.shoutbox-comment-reply').dataset.name;
                        commentElement.innerText = '@' + '[b]' + replyName + '[/b]';
                        triggerInputAtKeydown();
                        const lastNode = commentElement.lastChild; 
                        const sel = window.getSelection();
                        setCursorAfterNode(sel, lastNode); 
                        commentElement.focus();
                    });
                });
            }

            function soundMuted() {
                soundMuted = localStorage.getItem('soundMuted');
                if (typeof soundMuted !== 'undefined' && soundMuted) {
                    /*let notificicon = document.querySelector('.chx-sound-notific chx_i');*/
                    notificSoundIcon.classList.remove('chxicon-unmute');
                    notificSoundIcon.classList.add('chxicon-mute');
                }
            }
            // Clicking the refresh button will force the load function
            let canReload = true;
            refreshButton.addEventListener('click', event => {
                if (!canReload) return false;
                secondLoad = false;
                load();
                canReload = false;
                // Allow additional reloads after 500 millisecond
                setTimeout(function() {
                    canReload = true;
                }, 500);
            });
            let loadInt;
            let checkInt = +localStorage.getItem('intLoad');
            checkInt === 1 ? icd.setAttribute('checked', 'true') : null;
            let time = checkInt ? fastTrack : slowTrack;
            loadInt = setInterval(load, time);
            icd.addEventListener('change', function() {
                clearInterval(loadInt);
                loadInt = setInterval(load, (this.checked ? fastTrack : slowTrack));
                localStorage.setItem('intLoad', this.checked ? 1 : 0);
            });
            document.querySelector('.chxicon-expand').addEventListener('click', function() {
                loadInt = setInterval(load, (icd.checked ? fastTrack : slowTrack));
                chatx.classList.remove("minimized");
                if (localStorage.toggled != "expanded") {
                    chatx.classList.add("expanded", true);
                    localStorage.toggled = "expanded";
                }
                localStorage.setItem('chx_id', document.querySelector(".shoutbox-content > chx_li:last-child").getAttribute('class'));
                document.querySelectorAll(".chx-bar").forEach(elem => elem.classList.remove("chx-new"));
                scrollBottom();
            });
            // Managing widget draggable and resizable state when minimized or expanded
            document.querySelector('.chxicon-minimize').addEventListener('click', function() {
                clearInterval(loadInt);
                chatx.classList.add('minimized');
                chatx.classList.remove('expanded');
                localStorage.toggled = "minimized";
            });
            if (localStorage.toggled != "expanded") {
                clearInterval(loadInt);
            }
            // Sending shouts to the database
            function publish(name, comment) {
                let xhr = new XMLHttpRequest();
                xhr.open("POST", chatx_server + "publish.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");
                xhr.setRequestHeader('Authorization', `${store.JWT}`);
                xhr.withCredentials = true;
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        commentElement.innerText = "";
                        secondLoad = false;
                        load();
                        if (sessionName) {
                            let src = chatx_server + 'assets/audio/1_1.ogg';
                            let audio = new Audio(src);
                            audio.play();
                        }
                    } else {
                        console.log('Error: ' + xhr.status);
                    }
                };
                xhr.send('name' + '=' + name + '&' + 'comment' + '=' + comment);
            }
            
            // Visual & audio notifications
            function notification() {
                const shoutboxContent = document.querySelector(".shoutbox-content > chx_li:last-child");
                const lastId = shoutboxContent.getAttribute('class');
                const localId = localStorage.getItem('chx_id');
                const lastName = shoutboxContent.querySelector(".shoutbox-username b").dataset.name;
            
                if (lastId && lastId !== localId && lastId !== 'denied') {
                    if (chatx.classList.contains("minimized")) {
                        document.querySelector(".chx-bar").classList.add("chx-new");
                    } else {
                        const soundMuted = localStorage.getItem('soundMuted');
                        const shouldPlaySound = !soundMuted && lastName !== sessionName && sessionName && n_s !== 'null';
                        const shouldShowNotification = window.Notification && !document.hasFocus() && localStorage.getItem('notificationDisabled') !== '1';
            
                        if (shouldPlaySound) {
                            const src = `${chatx_server}assets/audio/${n_s}.ogg`;
                            new Audio(src).play();
                        }
            
                        if (shouldShowNotification) {
                            const thumbnail = `${chatx_server}assets/img/logo_shutter.png`;
                            const message = [...document.querySelectorAll('.shoutbox-comment-contents')].pop().textContent;
                            new Notification(`${lastName} ${pushNotificationMessageSent}`, { body: message, icon: thumbnail });
                        }
            
                        localStorage.setItem('chx_id', lastId);
                    }
                }
            }
            
            // Highlights user's messages as well as displays user icon at bar
            function highlightMyMsg() {
                const userIcon = document.querySelector(".chx-bar .chxicon-user");
                const loggedInClass = "chxlogged-in";
            
                function updateElementId(element, id) {
                    const closestLi = element.closest("chx_li");
                    if (closestLi) {
                        closestLi.setAttribute("id", id);
                    } else {
                        closestLi.removeAttribute("id");
                    }
                }
            
                if (sessionName !== '') {
                    const elements = document.querySelectorAll(".shoutbox-username b[data-loggedin='true']");
                    elements.forEach(element => {
                        if (element.textContent === sessionName) {
                            updateElementId(element, "chx-my-msg");
                        }
                    });
                    userIcon.classList.add(loggedInClass);
                } else {
                    userIcon.classList.remove(loggedInClass);
                    const elements = document.querySelectorAll(".shoutbox-username b:not([data-loggedin='true'])");
            
                    if (localStorage.nameElement) {
                        elements.forEach(element => {
                            if (element.textContent === localStorage.nameElement) {
                                updateElementId(element, "chx-my-msg");
                            } else {
                                updateElementId(element, null);
                            }
                        });
                    }
            
                    falseShoutBoxName.addEventListener("input", function() {
                        const value = this.value;
                        saveNickname();
                        elements.forEach(element => {
                            if (element.textContent === value) {
                                updateElementId(element, "chx-my-msg");
                            } else {
                                updateElementId(element, null);
                            }
                        });
                    });
                }
            
                // modifying image time stamp
                const imgElements = document.querySelectorAll(".chatx_img");
                imgElements.forEach(imgElement => {
                    const closestLi = imgElement.closest("chx_li");
                    if (closestLi) closestLi.setAttribute("data", "chx-img-msg");
                });
            }

            // Rendering an array of shouts as HTML
            function appendComments(data) {
                ul.innerHTML = "";
                data.forEach(function(d) {
                    var li = document.createElement("chx_li");
                    li.className = d.id;
                    var p = document.createElement("chx_p");
                    p.className = "shoutbox-comment";
                    var span = document.createElement("chx_span");
                    span.className = "shoutbox-username";
                    var b = document.createElement("b");
                    b.setAttribute("data-loggedin", d.loggedIn);
                    b.setAttribute("data-name", d.name);
                    b.textContent = d.name;
                    span.appendChild(b);
                    p.appendChild(span);
                    var div1 = document.createElement("chx_div");
                    div1.className = "shoutbox-comment-contents";
                    div1.innerHTML = (e_o === "1" ? emojione.toImage(d.text) : d.text);
                    p.appendChild(div1);
                    var div2 = document.createElement("chx_div");
                    div2.className = "shoutbox-comment-details";
                    var span2 = document.createElement("chx_span");
                    span2.className = "shoutbox-comment-ago";
                    span2.textContent = d.timeAgo;
                    div2.appendChild(span2);
                    var span3 = document.createElement("chx_span");
                    span3.className = "shoutbox-comment-time";
                    span3.textContent = d.timeStamp;
                    span2.appendChild(span3);
                    var span4 = document.createElement("chx_span");
                    span4.className = "shoutbox-comment-reply";
                    span4.setAttribute("data-name", d.name);
                    var i = document.createElement("chx_i");
                    i.className = "chxicon-reply";
                    span4.appendChild(i);
                    div2.appendChild(span4);
                    p.appendChild(div2);
                    li.appendChild(p);
                    ul.prepend(li);
                });
            }
            // Making bleeping online indicator when fast-track update is on
            icd.addEventListener("click", function() {
                if (this.checked) {
                    pulsatingCircle.style.display = "block";
                    falseShoutBoxName.style.cssText = "padding-right: 15px; transition: 0.3s ease;";
                } else {
                    pulsatingCircle.style.display = "none";
                    falseShoutBoxName.style.cssText = "padding-right: 0; transition: 0.3s ease;";
                }
                if(loggingStatus.startsWith('1') && !sessionName) {
                    falseShoutBoxName.style.visibility = "hidden";
                }
            });
            
            let secondLoad;
            let classesString;
            function load() {
                if (!loadPaused) {
                    return;
                }
                const xhr = new XMLHttpRequest();
                xhr.responseType = "json";
                if(!secondLoad) {
                    xhr.open("GET", chatx_server + 'load.php'); 
                    xhr.setRequestHeader('Authorization', `${store.JWT}`);
                } else {
                    xhr.open("GET", chatx_server + 'data/id/last_items.json');
                    xhr.withCredentials = false;
                }
                /*xhr.setRequestHeader('Authorization', `${store.JWT}`);*/
                xhr.onload = function() {
                    if (xhr.status !== 200) {
                        return;
                    }
                    const wrapper = document.querySelector(".simplebar-content-wrapper");
                    if (!secondLoad) {
                        appendComments(xhr.response);
                        scrollBottom();

                    // Get all chx_li elements
                    var chxLiElements = document.querySelectorAll('chx_li');
                    
                    // Array to store the classes
                    var classesArray = [];
                    
                    // Iterate over the chx_li elements
                    for (var i = chxLiElements.length - 1; i >= 0; i--) {
                      var chxLiElement = chxLiElements[i];
                      var chxLiClass = chxLiElement.getAttribute('class');
                      classesArray.push(chxLiClass);
                    }
                    
                    // Convert the classes array to a string
                    classesString = classesArray.join('.');
                        
                    } else if ((wrapper.scrollHeight - wrapper.scrollTop - 20) <= wrapper.clientHeight /*&& mouseDown !== 1*/ && !document.querySelector(".shoutbox-comment-ago:hover")) {
                        if (ulHist.children.length > 0) {
                            ulHist.innerHTML = "";
                            document.querySelector('.chx-history chx_i').style.display = "block";
                            document.querySelector('.chx-history chx_div').style.display = "none";
                        }
                        let json = xhr.response;
                            values = json.IDs;
                            valuesString = values.join('.');
                        if (classesString == valuesString || classesString == 'denied') {
                            return;
                        } else {
                            secondLoad = false;
                            load();
                            return;
                        }
                        scrollBottom();
                    }
                    secondLoad = true;
                    notification();
                    replySystem();
                    highlightMyMsg();
                    lightBoxInitiation();
                };
                xhr.send();
            }
            
            async function chatHistory() {
                try {
                    const response = await fetch(chatx_server + 'load.php?history', {
                        credentials: 'include',
                        headers: {
                            Authorization: store.JWT
                        }
                    });
                    const data = await response.json();
                    ul = ulHist;
                    appendComments(data);
                    ul = document.querySelector("chx_ul.shoutbox-content"); // do not change this
                    highlightMyMsg();
                    document.querySelector('.chx-history chx_i').style.display = "none";
                    document.querySelector('.chx-history chx_div').style.display = "block";
                    document.querySelector(".chx-history chx_span").scrollIntoView();
                    replySystem();
                    lightBoxInitiation();
                } catch (error) {
                    console.error(error);
                }
            }

            document.querySelector(".chx-history chx_span").onclick = function() {
                if(loggingStatus !== '1_1') {
                    chatHistory();
                } else {
                    if(sessionName !== '') {
                        chatHistory();
                    }
                }
            };
            document.querySelector(".chxicon-help").onclick = function() {
                window.open(chatx_server + 'client/help.php', '_blank');
            }
            var draggable = chatx;
            var el_1 = document.querySelector(".chx-bar");
            var el_2 = document.querySelector(".chx-bar chx_span");
            var el_3 = document.querySelector(".chxicon-user");
            var x = 0;
            var y = 0;
            var pos1 = 0;
            var pos2 = 0;
            var pos3 = 0;
            var pos4 = 0;
            var isDragging = false;
            draggable.addEventListener("mousedown", startDrag);
            draggable.addEventListener("touchstart", startDrag, {passive: true});

            function startDrag(e) {
                if (!chatx.classList.contains('minimized')) {
                    if (e.target === el_1 || e.target === el_2 || e.target === el_3) {
                        isDragging = true;
                        if (e.type === "mousedown") {
                            pos3 = e.clientX;
                            pos4 = e.clientY;
                            document.addEventListener("mousemove", drag);
                        } else {
                            pos3 = e.touches[0].clientX;
                            pos4 = e.touches[0].clientY;
                            document.addEventListener("touchmove", drag);
                        }
                        document.getElementById("chxwrapper").style.display = "block";
                        if (isMobile) {
                            document.body.style.overscrollBehaviorY = "contain";
                        }
                    }
                }
            }
            document.addEventListener("mouseup", stopDrag);
            document.addEventListener("touchend", stopDrag);

            function stopDrag() {
                if (isDragging) {
                    isDragging = false;
                    document.removeEventListener("mousemove", drag);
                    document.removeEventListener("touchmove", drag);
                    var chat_custom_position = {};
                    chat_custom_position[draggable.id] = {
                        top: draggable.offsetTop,
                        left: draggable.offsetLeft
                    };
                    document.getElementById("chxwrapper").style.display = "none";
                    if (isMobile) {
                        document.body.style.overscrollBehaviorY = "inherit";
                    }
                    localStorage.chat_custom_position = JSON.stringify(chat_custom_position);
                }
            }

            function drag(e) {
                if (isDragging) {
                    e.preventDefault();
                    if (e.type === "mousemove") {
                        pos1 = pos3 - e.clientX;
                        pos2 = pos4 - e.clientY;
                        pos3 = e.clientX;
                        pos4 = e.clientY;
                    } else {
                        pos1 = pos3 - e.touches[0].clientX;
                        pos2 = pos4 - e.touches[0].clientY;
                        pos3 = e.touches[0].clientX;
                        pos4 = e.touches[0].clientY;
                    }
                    x = draggable.offsetLeft - pos1;
                    y = draggable.offsetTop - pos2;
                    x = Math.max(0, Math.min(x, window.innerWidth - draggable.offsetWidth - (window.innerWidth - document.documentElement.clientWidth) - .5));
                    y = Math.max(0, Math.min(y, window.innerHeight - draggable.offsetHeight - (window.innerHeight - document.documentElement.clientHeight) - .5));
                    // .5 -> fixing some small occasional issues
                    draggable.style.left = x + "px";
                    draggable.style.top = y + "px";
                }
            }

            // disables scrolling on mobile devices when dragging handler
            el_1.addEventListener('touchmove', function(event) {
                event.preventDefault();
            }, {
                passive: false
            });
            let chx_height = localStorage.getItem(chx_resize);
            if (chx_height === null) chx_height = {};
            else chx_height = JSON.parse(chx_height).height;
            document.querySelector('.' + chx_resize).style.height = chx_height;
            let resizable = container;
            let resizer = document.getElementById("resizer");
            let startY, startHeight;
            resizer.addEventListener("mousedown", initResize);
            resizer.addEventListener("touchstart", initResize);

            function initResize(e) {
                e.preventDefault();
                startY = e.clientY || e.touches[0].clientY;
                startHeight = parseInt(getComputedStyle(resizable).height, 10);
                document.addEventListener("mousemove", resize);
                document.addEventListener("touchmove", resize);
                document.addEventListener("mouseup", stopResize);
                document.addEventListener("touchend", stopResize);
            }

            function resize(e) {
                isDragging = false
                let clientY = e.clientY || e.touches[0].clientY;
                let newHeight = startHeight + clientY - startY;
                let maxHeight = window.innerHeight - chatx.offsetTop - (window.innerHeight - document.documentElement.clientHeight) - shoutboxForm.offsetHeight - 46 /*why?*/;
                if (newHeight > maxHeight) {
                    newHeight = maxHeight;
                }
                resizable.style.height = newHeight + "px";
            }

            function stopResize() {
                document.removeEventListener("mousemove", resize);
                document.removeEventListener("touchmove", resize);
                localStorage.setItem(chx_resize, '{"height":"' + resizable.offsetHeight + 'px"}');
            }
            // Making ChatX appear after scrollbar library loaded as well as some other functions
            setTimeout(() => {
                chatxVisibility();
                load();
                fastTrackIsOn();
                loadNickname();
                soundMuted();
                shoutboxForm.insertAdjacentHTML('beforeend', '<chx_div class="chx_down"><chx_i class="chxicon-arrow"></chx_i></chx_div>');
                var wrapper = document.querySelector(".simplebar-content-wrapper");
                backButton = document.querySelector(".chx_down");
                wrapper.addEventListener('scroll', function(e) {
                    backButton.style.display = "block";
                    backButton.addEventListener('click', function() {
                        scrollBottom();
                    });
                    if ((wrapper.scrollHeight - wrapper.scrollTop - 20) <= wrapper.clientHeight) {
                        backButton.style.display = "none";
                    }
                });
                chatx.style.display = "block";
            }, "0")
        });
    
    // Saving, storing & retreiving nickname in localstorage
    const loadNickname = () => {
      if (!sessionName) {
        falseShoutBoxName.value = localStorage.nameElement || "";
      }
    };
    const saveNickname = () => localStorage.nameElement = falseShoutBoxName.value;
    window.addEventListener("beforeunload", saveNickname);

    function lightBoxInitiation() {
        // Get all images with data-chxFullSize attribute
        let images = document.querySelectorAll('img[data-chxlightbox]');
        // Attach click event listener to each image
        images.forEach(function(image) {
            image.addEventListener('click', function() {
                if (!document.querySelector('.modal')) {
                    openModal(image);
                }
            });
        });
    }

    function setRegForm() {
        if (r_e === "1") {
            if (document.querySelectorAll(".chx-signup-form-contents form").length === 0) {
                let form = document.createElement("form");
                form.name = "chx-signup";
                let input1 = document.createElement("input");
                input1.type = "text";
                input1.name = "reg_u";
                input1.placeholder = "";
                input1.required = true;
                let input2 = document.createElement("input");
                input2.type = "password";
                input2.name = "reg_p";
                input2.placeholder = "";
                input2.setAttribute( "autocomplete", "new-password" );
                input2.required = true;
                let input3 = document.createElement("input");
                input3.type = "password";
                input3.name = "c_reg_p";
                input3.placeholder = "";
                input3.required = true;
                let div = document.createElement("chx_div");
                div.className = "chx-login-button chxicon-login";
                form.appendChild(input1);
                form.appendChild(input2);
                form.appendChild(input3);
                form.appendChild(div);
                signUpFormContents.appendChild(form);
            }
        } else {
            let i = document.createElement("chx_i");
            i.className = "chxicon-lock chx-reg-disabled";
            let p = document.createElement("chx_p");
            p.className = "chx-reg-disabled-caption";
            signUpFormContents.appendChild(i);
            signUpFormContents.appendChild(p);
        }
    }
    
    function ajaxFormSubmitted() {
      setRegForm(); // doubling!
      const forms = document.querySelectorAll(".chx-login-form form");
      forms.forEach(form => {
        form.addEventListener("submit", function(e) {
          let activeForm = this.name;
          let payload = new FormData(document.querySelector(`form[name=${activeForm}]`));
          const xhr = new XMLHttpRequest();
          xhr.open("POST", `${chatx_server}client/auth.php`, true);
          xhr.withCredentials = true;
          xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          xhr.onload = function() {
            if (xhr.status === 200) {
              const data = JSON.parse(xhr.responseText);
              store.setJWT(data.jwt);
              makeXHRRequest(chatx_server + 'dynamic_js.php', 'GET').then(function(response) {
                parsedResponse = JSON.parse(response);
                setDynamicAuthenticationVars();
                if (data.success) {
                  secondLoad = false;
                  refreshButton.click();
                } else {
                  if (!document.querySelector(`form[name=${activeForm}] chx_p`)) {
                    const p = document.createElement("chx_p");
                    p.textContent = data.message;
                    document.querySelector(`form[name=${activeForm}]`).appendChild(p);
                  }
                  setTimeout(function() {
                    document.querySelector(`form[name=${activeForm}] chx_p`).remove();
                  }, 2000);
                }
              });
            }
          };
          xhr.send(new URLSearchParams(payload).toString());
          e.preventDefault();
        });
      });
      ajaxFormSubmitted = undefined;
    }

    function ajaxLogOutClicked() {
        document.querySelector(".chatx_logout").addEventListener("click", function() {
            this.removeEventListener("click", arguments.callee);
            store.setJWT(null);
            let xhr = new XMLHttpRequest();
            xhr.open('GET', `${chatx_server}client/logout.php?ajax`);
            xhr.send();
            xhr.onload = function() {
                makeXHRRequest(chatx_server + 'dynamic_js.php', 'GET').then(function(response) {
                    parsedResponse = JSON.parse(response);
                    setDynamicAuthenticationVars();
                    document.querySelector(".chx_down").click();
                    document.querySelector(".chxicon-refresh").click();
                    document.querySelectorAll(".chx-login-form input").forEach(input => input.removeAttribute("style"));
                });
            }
        });
    }

    function issetSession() {
        const authLink = document.querySelector('.chx-authentication-link');
        if (!authLink) return;
    
        const isLoggedIn = sessionName !== '';
        const actionClass = isLoggedIn ? 'chatx_logout' : 'chatx_login';
        const oppositeClass = isLoggedIn ? 'chatx_login' : 'chatx_logout';
        const iconClass = isLoggedIn ? 'chxicon-logout' : 'chxicon-login';
        const oppositeIconClass = isLoggedIn ? 'chxicon-login' : 'chxicon-logout';
        const spanClass = isLoggedIn ? 'logout' : 'login';
        const oppositeSpanClass = isLoggedIn ? 'login' : 'logout';
    
        authLink.classList.remove(oppositeClass);
        authLink.classList.add(actionClass);
    
        const chxSpan = authLink.querySelector('chx_span');
        const chxI = authLink.querySelector('chx_i');
    
        if (chxSpan) {
            chxSpan.classList.remove(oppositeSpanClass);
            chxSpan.classList.add(spanClass);
        }
    
        if (chxI) {
            chxI.classList.remove(oppositeIconClass);
            chxI.classList.add(iconClass);
        }
    }

    function publicScenarioLoggingOut() {
        issetSession();
        const loginForm = document.querySelector('.chx-login-form');
        falseShoutBoxName.value = sessionName;
        falseShoutBoxName.disabled = true;
        if (loginForm) {
            loginForm.style.display = "none";
        }
        ajaxLogOutClicked();
    }
    
    function publicScenarioLoggingIn() {
        issetSession();
        const loginForm = document.querySelector('.chx-login-form');
        falseShoutBoxName.value = sessionName;
        falseShoutBoxName.disabled = false;
        document.querySelector(".chatx_login").addEventListener("click", () => {
            loginForm.style.display = "block";
        });
        document.querySelector('.chxicon-plus.chx-close').addEventListener('click', () => {
            loginForm.style.display = 'none';
        });
        try {
            ajaxFormSubmitted();
        } catch (error) {
            console.warn(error);
        }
    }
    
    function loggingIn() {
        falseShoutBoxName.style.visibility = "hidden";
        chatx.addEventListener("click", (e) => {
            const target = e.target;
            const loginForm = document.querySelector(".chx-login-form");
            if (target.classList.contains("chx-close")) {
                loginForm.style.display = "none";
            } else if (sessionName === "" && chatx.classList.contains('expanded')) {
                loginForm.style.display = "block";
            }
        });
        try {
            ajaxFormSubmitted();
        } catch (error) {
            console.warn(error);
        }
    }
    
    function loggingOut() {
        issetSession();
        falseShoutBoxName.style.visibility = "visible";
        falseShoutBoxName.value = sessionName;
        falseShoutBoxName.disabled = true;
        document.querySelector(".chx-login-form").style.display = "none";
        ajaxLogOutClicked();
    }

    const transferName = () => document.getElementById("shoutbox-name").value = document.getElementById("false_shoutbox_name").value;
    document.getElementById("false_shoutbox_name").addEventListener("blur", transferName);

    // MyBB integration if option is on
    if (m_a === "1") {
        try {
          if (GroupID !== 3 && BoardID && !sessionName) {
            const xhr = new XMLHttpRequest();
            xhr.withCredentials = true;
            xhr.onreadystatechange = function() {
              if (xhr.readyState === 4) {
                const response = JSON.parse(xhr.responseText);
                if (response.success) {
                  store.setJWT(response.jwt);
                  makeXHRRequest(chatx_server + 'dynamic_js.php', 'GET').then(function(response) {
                    parsedResponse = JSON.parse(response);
                    refreshButton.dispatchEvent(new Event("click"));
                    setDynamicAuthenticationVars();
                    document.querySelector(".chatx_logout").remove();
                  });
                } else {
                    function generateRandomPassword(length) {
                      const charset = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^';
                      let password = '';
                      
                      for (let i = 0; i < length; i++) {
                        const randomIndex = Math.floor(Math.random() * charset.length);
                        password += charset.charAt(randomIndex);
                      }
                      return password;
                    }
                    const setPassword = generateRandomPassword(15);
                    const apiUrl = '/api.php?method=storage.set&user_id=' + UserID + '&value=' + setPassword + '&key=chx_password&token=' + ForumAPITicket;
                    
                    document.querySelector("form[name='chx-signup']").addEventListener('submit', function(event) {
                        fetch(apiUrl)
                          .then(response => response.json())
                          .then(data => {
                            mybbRegPrompt.style.display = 'none';
                            setTimeout(() => {
                                mybbRegPrompt.classList.add('mybb-reload');
                                mybbRegPrompt.style.display = 'block';
                            }, 3000);
                            
                          });
                    });
                    let [reg_u, reg_p, c_reg_p] = document.querySelectorAll("input[name='reg_u'], input[name='reg_p'], input[name='c_reg_p']");
                        mybbRegPrompt = document.createElement("chx_div");
                    reg_u.value = UserLogin;
                    reg_p.value = c_reg_p.value = setPassword;
                    reg_u.readOnly = reg_p.readOnly = c_reg_p.readOnly = true;
                    mybbRegPrompt.classList.add("mybbRegPrompt");
                    document.querySelector("form[name='chx-signup']").appendChild(mybbRegPrompt);
                    
                    document.querySelector(".chx-login-form").style.display = 'block';
                    document.querySelector(".chx-switch-tab.second").click();
                    
                }
              }
            };
            fetch('/api.php?method=storage.get&user_id=' + UserID)
              .then(response => response.json())
              .then(data => {
                const getPassword = data.response.storage.data.chx_password;
                    xhr.open("POST", chatx_server + "client/auth.php");
                    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                    xhr.send(`u=${UserLogin}&p=${getPassword}`);
              });    
          } else {
            if (GroupID !== 3) {
              document.querySelector(".chatx_logout").remove();
            }
            document.querySelector("#navlogout").addEventListener("click", function(e) {
              e.preventDefault();
              store.setJWT(null);
              setTimeout(() => {
                  window.location.href = "/login.php?action=out&id=" + UserID;
              }, 50);
            });
          }
        } catch (e) {}
    }

    function updateProgressBar() {
        const numSymbols = commentElement.innerText.length;

        if (numSymbols > 0) {
            const circ_radius_percentage = parseFloat(progressBarCircle.getAttribute("r"));
            const progressPercentage = (numSymbols / m_c) * 100;
            const circ_circumference = 2 * Math.PI * (circ_radius_percentage / 3.15);
            const dashArrayValue = (progressPercentage / 100) * circ_circumference;
            const stroke = (m_c - numSymbols <= m_c * 0.25) ? 'var(--chx-10-color)' : 'var(--chx-8-color)';

            Object.assign(progressBarCircle.style, {
                strokeDasharray: `${dashArrayValue} ${circ_circumference}`,
                stroke: stroke,
            });

            progressBarWrapper.style.display = 'block';
        } else {
            progressBarWrapper.style.display = 'none';
        }
    }

    updateProgressBar();

    // Submit message by Enter
    commentElement.addEventListener("keypress", function(event) {
        if ((event.key === "Enter" || event.key === "NumpadEnter") && !isMobile) {
            event.preventDefault();
            chatSubmit();
        }
    });

    // Trigger newline on Ctrl+Enter
    commentElement.addEventListener('keydown', function (event) {
        const isEnterPress = event.key === "Enter" && (event.ctrlKey || event.metaKey || isMobile);
    
        // ignore the event if the element is empty
        if (isEnterPress && commentElement.textContent.trim() === "") {
            event.preventDefault();
            return;
        }
    
        if (isEnterPress) {
            event.preventDefault();
    
            // Check if the scroll is close to bottom
            const closeToBottom = scrollCloseToBottom();
    
            // Get the Selection object, if it's available
            const sel = window.getSelection();
            if (sel && sel.rangeCount) {
                let range = sel.getRangeAt(0);
    
                // Create a <br> and insert it into the range
                const br = document.createElement('br');
                range.deleteContents();
                range.insertNode(br);
    
                // Move the cursor to the end of the line
                setCursorAfterNode(sel, br);
            }
    
            triggerInputAtKeydown();
    
            // If we were close to bottom, scroll there
            if (closeToBottom) {
                const scrollWrapper = document.querySelector('.chx-scroll-wrapper.no-scrollbar');
                scrollWrapper.scrollTop = scrollWrapper.scrollHeight;
            }
        }
    });

    commentElement.addEventListener('focus', (e) => {
        if (!e.target.innerText.trim()) {
            e.target.style.transform = 'translateX(24px)';
            e.target.style.textIndent= '0px';
        } else {
            e.target.style.textIndent= '24px';
        }
    });
    
    commentElement.addEventListener('input', (e) => {
        if (e.target.innerText.trim()) {
            e.target.style.textIndent= '24px';
            e.target.style.transform = 'translateX(0px)';
        } else {
            e.target.style.transform = 'translateX(24px)';
            e.target.style.textIndent= '0px';
        }
    });

    var icon2 = form.querySelector('.chxicon-plus'); // SHOULD BE RENAMED
    var iconInitialTop = icon2.offsetTop; // SHOULD BE RENAMED
      document.querySelector(".chx-scroll-wrapper.no-scrollbar").addEventListener('scroll', function() {
        icon2.style.top = (iconInitialTop - this.scrollTop) + 'px';
    });

    // handle placeholder
    commentElement.addEventListener('blur', function() {
        if (this.textContent === '') {
            this.classList.add("empty");
        }
    });
    commentElement.addEventListener('focus', function() {
        this.classList.remove("empty");
    });
    // <br> element must be added in the end of text for smooth new-lines insertion
    function ensureBrAtEnd(element) {
        let lastChild = element.lastChild;
        if (!lastChild || lastChild.nodeName.toLowerCase() !== 'br') {
            const br = document.createElement('br');
            element.appendChild(br);
            if (element.lastChild !== br) {
                element.insertBefore(br, element.lastChild);
            }
        }
    }
    // move cursor to the end of the line
    function setCursorAfterNode(sel, node) {
        const range = document.createRange();
        range.setStartAfter(node);
        range.collapse(true);
        sel.removeAllRanges();
        sel.addRange(range);
    }
    // scroll automatically if close to bottom
    function scrollCloseToBottom() {
        const scrollWrapper = document.querySelector('.chx-scroll-wrapper.no-scrollbar');
        const offset = 20;
        return scrollWrapper.scrollTop + scrollWrapper.clientHeight + offset >= scrollWrapper.scrollHeight;
    }
    // make commentElement plain-text only
    function handleInputAsPlainText(e) {
        e.preventDefault();
        const text = (e.clipboardData || e.dataTransfer).getData('text/plain');
        const sel = window.getSelection();
        if (sel.getRangeAt && sel.rangeCount) {
            var range = sel.getRangeAt(0);
            range.deleteContents();
    
            const textNode = document.createTextNode(text);
            range.insertNode(textNode);
    
            range.setStartAfter(textNode);
            range.collapse(true);
            sel.removeAllRanges();
            sel.addRange(range);
        }
    }
    // set max characters for commentElement
    function processInput() {
        let content = commentElement.innerHTML;
        const maxLength = m_c;
    
        let brCount = (content.match(/<br>/g) || []).length;
    
        // Counting the <br> tag as 1 instead of the actual 4
        let lengthWithoutBrTags = content.length - (brCount * 3);
    
        // If length considering <br> as one character is still less than max length
        if (lengthWithoutBrTags > maxLength) {
            let newLength = maxLength + (brCount * 3);
    
            let cleanedContent = content;
            let strippedContentLength = cleanedContent.replace(/<br>/g, '').length;
    
            // While the content is too long
            while (strippedContentLength > newLength) {
                // Remove the last character
                cleanedContent = cleanedContent.substring(0, cleanedContent.length - 1);
                strippedContentLength = cleanedContent.replace(/<br>/g, '').length;
            }
            commentElement.innerHTML = cleanedContent;
            commentElement.blur();
        }
    }
    // listen to events
    commentElement.addEventListener('input', function() {
        ensureBrAtEnd(commentElement);
        processInput();
        var lastNode = commentElement.lastChild;
        if (lastNode && lastNode.nodeName === 'BR' && commentElement.textContent.trim() === '') {
            commentElement.removeChild(lastNode);
        }
        updateProgressBar();
    });
    commentElement.addEventListener('paste', function(e) {
        handleInputAsPlainText(e);
        processInput();
        triggerInputAtKeydown();
    });
    commentElement.addEventListener('drop', function(e) {
        handleInputAsPlainText(e);
        processInput();
        triggerInputAtKeydown();
    });

    getScript(chatx_server + 'assets/js/img-gallery.js');
    
    Promise.all([
            getScript(chatx_server + 'data/languages/' + l_g + '/app_lang.' + l_g + '.php')
        ])
        .then(() => {
            document.querySelector(".chx-bar chx_span").textContent = chat;
            falseShoutBoxName.placeholder = nameInputValue;
            document.querySelector(".chx-management-link").textContent = management;
            document.querySelector(".name-required").textContent = noNameError;
            document.querySelector(".chx-fast-track").textContent = fastUpdate;
            document.querySelector(".chx-switch-tab.first").textContent = login;
            document.querySelector(".chx-switch-tab.second").textContent = signup;
            let inputUsernames = document.querySelectorAll("input[name='u'], input[name='reg_u']");
            inputUsernames.forEach(function(inputUsername) {
                inputUsername.placeholder = userName;
            });
            let inputPasswords = document.querySelectorAll("input[name='p'], input[name='reg_p']");
            inputPasswords.forEach(function(inputPassword) {
                inputPassword.placeholder = passWord;
            });
            let inputConfirmPassWord = document.querySelector("input[name='c_reg_p']");
            
            if (inputConfirmPassWord) {
              inputConfirmPassWord.placeholder = confirmPassWord;
            }
            let regDisabledCaption = document.querySelector(".chx-reg-disabled-caption");
            if (regDisabledCaption) {
              regDisabledCaption.textContent = regDisabled;
            }
            document.querySelector(".chx-history chx_div").textContent = recentlyInChat;
            commentElement.setAttribute('placeholder', newMessagePlaceholder);
            document.querySelector("input[name='url_to_img']").placeholder = imgUrlPlaceholder;
            document.querySelector("input[name='url_to_link']").placeholder = linkUrlPlaceholder;
            document.querySelector("input[name='link_desc']").placeholder = linkDesc;
            var style = document.createElement("style");
            style.innerHTML = ".chatx_login span {font-size:0 !important}.chatx_login chx_span::after {content: '" + login + "'; font-size: 12px}" +
                ".chatx_logout chx_span::after {content: '" + logout + "'; font-size: 12px} .mybbRegPrompt::after {content: '" + mybbSignup + "'; }" +
                ".mybbRegPrompt.mybb-reload::after {content: 'reload page';}";
            document.querySelector("head").appendChild(style);
        });
        
        setRegForm();
        formButtonClick();
});
/*
###################################################################
            ADDITIONAL COMPONENTS
            
###################################################################
*/
// Setting ChatX in expanded and minimized mode
chatx.classList.add(localStorage.toggled);
document.querySelectorAll('.chxicon-unmute, .chxicon-mute').forEach(el => {
    el.addEventListener('click', function() {
        this.classList.toggle("chxicon-unmute");
        this.classList.toggle("chxicon-mute");
        if (this.classList.contains('chxicon-mute')) {
            localStorage.setItem('soundMuted', '1');
        } else {
            localStorage.removeItem('soundMuted');
        }
    });
});

function triggerInputAtKeydown() {
    var ev = new Event('input', {
        bubbles: true,
        cancelable: true,
    });
    commentElement.dispatchEvent(ev);
}

function pushNotification() {
    if (window.Notification) {
        const icon = document.querySelector(".chx-push-notific chx_i");
        const ntfDisb = 'chxicon-notification-disabled';
        const ntfSubs = 'chxicon-notification-subscribed';
        const permission = Notification.permission;
        const disabled = localStorage.getItem('notificationDisabled');
        if (permission === 'denied' || disabled === '1') {
            icon.className = '';
            icon.classList.add(ntfDisb);
            if (permission !== 'denied') {
                icon.addEventListener('click', () => {
                    icon.classList.contains(ntfSubs) ?
                        (localStorage.setItem('notificationDisabled', '1'), icon.classList.replace(ntfSubs, ntfDisb)) :
                        (localStorage.removeItem('notificationDisabled'), icon.classList.replace(ntfDisb, ntfSubs));
                });
            }
        } else {
            if (permission === 'default') {
                document.querySelector(".chxicon-notification-default").addEventListener('click', () => {
                    Notification.requestPermission();
                });
            } else {
                icon.className = '';
                icon.classList.add(ntfSubs);
                icon.addEventListener('click', () => {
                    icon.classList.contains(ntfSubs) ?
                        (localStorage.setItem('notificationDisabled', '1'), icon.classList.replace(ntfSubs, ntfDisb)) :
                        (localStorage.removeItem('notificationDisabled'), icon.classList.replace(ntfDisb, ntfSubs));
                });
            }
        }
    }
}
pushNotification();

// adding scrollbar to commentElement
commentElement.addEventListener('input', function() {
    const messageForm = document.querySelector('#chx-new-message');
        if (commentElement.clientHeight > 105) {
          messageForm.classList.add("scrollable");
        } else {
          messageForm.classList.remove("scrollable");
        }
    localStorage.setItem('chx_text', commentElement.innerText);
});

// Load text from localstorage
const commentText = localStorage.getItem('chx_text');
if (commentText !== null && commentText.trim() !== '') {
    commentElement.innerText = commentText;
} 

// Shows a warning message if the name input is empty.
function showNameRequiredWarning() {
    if(falseShoutBoxName !== null) {
        const nameRequiredWarning = document.querySelector('.name-required');
        nameRequiredWarning.style.display = 'block';
        setTimeout(() => {
            nameRequiredWarning.style.display = 'none';
        }, 2000);
    }
}
// Submits the chat form if the name input is filled.
function chatSubmit() {
    if (falseShoutBoxName.value.trim() === '') {
        showNameRequiredWarning();
    }
    const preTextarea = document.querySelector('.chx-scroll-wrapper'); // rename and probably move to the top the const
    const messageForm = document.querySelector('#chx-new-message');
    preTextarea.classList.remove("scrollable");
    messageForm.classList.remove("scrollable");
    container.scrollTop = ul.scrollHeight;
    if (!isFirefox()) {
        messageForm.dispatchEvent(new SubmitEvent('submit'));
    } else {
        messageForm.requestSubmit();
    }
    localStorage.removeItem('chx_text');
    progressBarWrapper.style.display = 'none';
}
// invoke chatsubmit() when clicked on submit button
const sendMessageBtn = document.querySelector('#chx-send-message');
sendMessageBtn.addEventListener('click', chatSubmit);

const chatPopoverLinks = document.querySelectorAll('.chat_popover_parent a');
for (let link of chatPopoverLinks) {
    link.addEventListener('click', function() {
        const chatPopoverParents = document.querySelectorAll('.chat_popover_parent');
        for (let parent of chatPopoverParents) {
            if (parent !== this.parentNode) {
                parent.classList.remove('active');
            }
        }
        this.parentNode.classList.toggle('active');
    });
}
// Hide settings widnow when clicked off
document.addEventListener('click', function(event) {
    const chatPopoverParent = event.target.closest('.chat_popover_parent');
    const chatPopover = document.querySelector(".chat_popover");
    const displayValue = window.getComputedStyle(chatPopover).getPropertyValue("display");
    if (!chatPopoverParent && displayValue === "block") {
        let activeChatPopoverParent = document.querySelector('.chat_popover_parent.active');
        activeChatPopoverParent.classList.remove('active');
    }
});
// Working with position of chat
const sPositions = localStorage.getItem("chat_custom_position") || "{}";
const chat_custom_position = JSON.parse(sPositions);
for (const [id, pos] of Object.entries(chat_custom_position)) {
    const element = document.querySelector(`#${id}`);
    Object.entries(pos).forEach(([property, value]) => {
        element.style[property] = typeof value === "number" ? `${value}px` : value;
    });
}
if (!localStorage.getItem("chat_custom_position")) {
    chatx.style.top = "15px";
    chatx.style.left = "15px";
}

function fastTrackIsOn() {
    if (icd.checked) {
        pulsatingCircle.style.display = "block";
        falseShoutBoxName.style.paddingRight = "15px";
    }
}

function chatxVisibility() {
    let options = {
        root: null,
        rootMargin: "0px",
        threshold: 1.0 
    }
    let observer = new IntersectionObserver(handleIntersect, options);
        chx_container = document.querySelector('#chatx .chx-container');
        style = window.getComputedStyle(commentElement);
        lineHeight = style.getPropertyValue('line-height');
        lineHeight = parseFloat(lineHeight);
    let shouldObserveForm = true;
    function handleIntersect(entries, observer) {
        entries.forEach(entry => {
            let expanded = chatx.classList.contains('expanded');
            if (entry.target == form && !entry.isIntersecting && expanded) {
                if (shouldObserveForm) {
                    if (chx_container.clientHeight > 360) {
                        let calcFormHeight = chx_container.clientHeight - lineHeight /*18*/;
                        chx_container.style.height = calcFormHeight + "px";
                        localStorage.setItem(chx_resize, '{"height":"' + calcFormHeight + 'px"}');
                    } else {
                        let top = parseInt(chatx.style.top, 10);
                        chatx.style.top = top - lineHeight /*18*/ + 'px';
                    }
                    let positionData = JSON.parse(localStorage.getItem('chat_custom_position'));
                        positionData.chatx.top = parseInt(chatx.style.top, 10);
                    localStorage.setItem('chat_custom_position', JSON.stringify(positionData));
                }
            }
            else if (entry.target == chx_container && !entry.isIntersecting && expanded) {
                shouldObserveForm = false;
                let keysToRemove = ["chx-container", "chat_custom_position"];
                for (key of keysToRemove) {
                    localStorage.removeItem(key);
                }
                chatx.style.top = "15px";
                chatx.style.left = "15px";
                chx_container.style.height = "360px";
            } else if (entry.target == chx_container && entry.isIntersecting && expanded) {
                shouldObserveForm = true;
            }
        });
    }
    observer.observe(chx_container);
    observer.observe(form);
}

function bbtags(element, a, i) {
    commentElement.focus();
    var sel, range, html;
    if (window.getSelection) {
        sel = window.getSelection();
        if (sel.getRangeAt && sel.rangeCount) {
            range = sel.getRangeAt(0);
            if (!commentElement.contains(range.commonAncestorContainer)) { // if the selection is part of element
                return;
            }
            var selectedText = range.toString();
            if (selectedText !== '') { // if there's a selection
                html = a + selectedText + i;
                var newNode = document.createTextNode(html);
                range.deleteContents();
                range.insertNode(newNode);
            } else { // if no selection
                var startNode = document.createTextNode(i);
                var endNode = document.createTextNode(a);
                var middleNode = document.createTextNode('');
                range.deleteContents();
                range.insertNode(startNode);
                range.insertNode(middleNode);
                range.insertNode(endNode);
                range.setStart(middleNode, 0);
                range.collapse(true);
                sel.removeAllRanges();
                sel.addRange(range);
            }
            triggerInputAtKeydown();
        }
    } else if (document.selection && document.selection.createRange) {
        document.selection.createRange().text = a + selectedText + i;
    }
}

document.addEventListener('keydown', function(e) {
    let a = e.metaKey || e.altKey;
    let b = String.fromCharCode(e.which).toLowerCase();
    let c = e.metaKey || e.ctrlKey;
    let d = commentElement.matches(':focus');
    if ((a) && (b === 'q')) {
        e.preventDefault();
        [...document.querySelectorAll(".bb-popup")].forEach(function(element) {
            element.style.display = (element.style.display === 'none') ? 'block' : 'none';
        });
        return false;
    }
    if ((a) && (b === 'w')) {
        e.preventDefault();
        icd.click();
        return false;
    }
    if ((c) && (b === 'b') && d) {
        e.preventDefault();
        bbtags(commentElement, "[b]", "[/b]");
        return false;
    }
    if ((c) && (b === 'i') && d) {
        e.preventDefault();
        bbtags(commentElement, "[i]", "[/i]");
        return false;
    }
    if ((c) && (b === 'u') && d) {
        e.preventDefault();
        bbtags(commentElement, "[u]", "[/u]");
        return false;
    }
});

document.addEventListener("click", function(event) {
    if (!event.target.closest('.bb-popup, .chx-color-bb-prompt, .chx-image-bb-prompt, .chx-link-bb-prompt, .chxicon-plus') && window.getSelection().toString() == "") {
        let elements = document.querySelectorAll('.bb-popup, .chx-color-bb-prompt, .chx-image-bb-prompt, .chx-link-bb-prompt');
        elements.forEach(function(element) {
            element.style.display = "none";
        });
    }
})
const plusIcons = document.querySelectorAll('.shoutbox-form .chxicon-plus');
plusIcons.forEach(function(plusIcon) {
    plusIcon.addEventListener('click', function() {
        const bbPopup = document.querySelector('.bb-popup');
        bbPopup.style.display = 'block';
    });
});

document.querySelector('.bb-popup').addEventListener('click', function(event) {
  const shoutboxComment = "shoutbox-comment";
  if (event.target.matches('#bb1')) {
    bbtags(shoutboxComment, "[b]", "[/b]");
  } else if (event.target.matches('#bb2')) {
    bbtags(shoutboxComment, "[u]", "[/u]");
  } else if (event.target.matches('#bb3')) {
    bbtags(shoutboxComment, "[i]", "[/i]");
  } else if (event.target.matches('#bb4, #bb4 chx_i')) {
    chxColorBbPrompt.style.height = shoutboxForm.offsetHeight - 3 + 'px';
    [chxImageBbPrompt, chxLinkBbPrompt].forEach(function(el) {
      if (el) el.style.display = 'none';
    });
    chxColorBbPrompt.style.display = 'block';
  } else if (event.target.matches('#bb5, #bb6, #bb5 chx_i, #bb6 chx_i')) {
    const heightFormBB = shoutboxForm.offsetHeight;
    [chxImageBbPrompt, chxLinkBbPrompt].forEach(function(el) {
      if (el) el.style.height = heightFormBB - 3 + 'px';
    });
  }
});

const bb5 = document.querySelector("#bb5");
const bb6 = document.querySelector("#bb6");

bb5.onclick = showImagePrompt;
bb6.onclick = showLinkPrompt;

function showImagePrompt() {
  togglePrompts(chxImageBbPrompt, chxLinkBbPrompt);
}

function showLinkPrompt() {
  togglePrompts(chxLinkBbPrompt, chxImageBbPrompt);
}

function togglePrompts(showPrompt, hidePrompt) {
  hidePrompt.style.display = "none";
  showPrompt.style.display = "block";
}

const colors = ["red", "orange", "yellow", "green", "lightblue", "blue", "purple"];

for (let i = 0; i < colors.length; i++) {
  const bb = document.getElementById(`bb4_${i+1}`);
  bb.onclick = function() {
    bbtags("shoutbox-comment", `[color=${colors[i]}]`, "[/color]");
    chxColorBbPrompt.style.display = "none";
  };
}

var signUpForm = document.querySelector('.chx-signup-form-contents');
var tabs = document.querySelectorAll('.chx-switch-tab');
if (window.getComputedStyle(signUpForm).display !== 'initial') {
    tabs[0].classList.add('active');
}
tabs.forEach(function(tab) {
    tab.addEventListener('click', function() {
        tabs.forEach(function(tab) {
            tab.classList.remove('active');
        });
        this.classList.add('active');
    });
});

function formSubmit(nameForm) {
    let form = document.querySelector(`form[name=${nameForm}]`);
    let inputs = form.querySelectorAll("input");
    let emptyInputs = [...inputs].filter(input => input.value === "");
    if (emptyInputs.length) {
        emptyInputs.forEach(input => input.style.boxShadow = "inset 0px 0px 0px 1px var(--chx-11-color)");
    } else {
        if (!isFirefox()) {
            form.dispatchEvent(new SubmitEvent('submit'));
        } else {
            form.requestSubmit();
        }
        return false;
    }
}
document.querySelectorAll('.chx-login-form-contents, .chx-signup-form-contents').forEach(function(element) {
    element.addEventListener('keydown', function(event) {
        if (event.which === 13) {
            let nameForm = element.querySelector('form').getAttribute('name');
            formSubmit(nameForm);
        }
    });
});

function formButtonClick() {
    const buttons = document.querySelectorAll('.chx-login-button');
    buttons.forEach(function(button) {
        button.addEventListener('click', function() {
            let form = this.closest('form');
            let nameForm = form ? form.getAttribute('name') : '';
            formSubmit(nameForm);
        });
    });
}

document.querySelector(".chx-process-img").addEventListener("click", function() {
    chxImageBbPrompt.style.display = "none";
    loadingModal();
    processExtImg();
});
document.querySelector(".chx-process-link").addEventListener("click", function() {
    let a = document.querySelector("input[name='url_to_link']");
    let b = document.querySelector("input[name='link_desc']");
    let c = a.value;
    let d = b.value;
    if (c && d) {
        commentElement.innerText = '[url=' + c + ']' + d + '[/url]';
        triggerInputAtKeydown();
        a.value = "";
        b.value = "";
    }
    if((!c && !d) || (c && d)) {
        chxLinkBbPrompt.style.display = "none";
    }

});
var managementLink = document.querySelector(".chx-management-link");
managementLink.setAttribute("href", chatx_server + "client/index.php");

function loadingModal() {
    let loading_modal = '<chx_div class="loading-modal"><chx_div class="lds-dual-ring"></chx_div></chx_div>';
    chatx.insertAdjacentHTML('beforeend', loading_modal);
}

function generateImageTagAndSend(res) {
    let data = JSON.parse(res);
    if (!data.error && data.link !== 'null') {
        commentElement.innerText = "[img h=" + data.clientHeight + " d=" + data.link + "]" + data.thumbnail + "[/img] ";
        document.querySelector("input[name='url_to_img']").value = "";
        if (falseShoutBoxName.value === "") {
            showNameRequiredWarning();
        } else {
            chatSubmit();
        }
    } else {
        console.error(data.error);
    }
    document.querySelector('.loading-modal').remove();
}

function processExtImg() {
    var imgLink = document.querySelector("input[name='url_to_img']").value;
    var url = chatx_server + "imgur_uploader.php";
    var xhr = new XMLHttpRequest();
    xhr.open("POST", url, true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            generateImageTagAndSend(xhr.responseText);
        }
    };
    xhr.send('urlToImg' + '=' + imgLink);
}
let imgur_upload_form = '<form id="imgur_uploader"><chx_i class="chxicon-upload"></chx_i><input id="imgur_uploader_input" type="file" accept="image/*" name="chximg"></form>';
document.querySelector(".chx-imgur-uploader").insertAdjacentHTML('beforeend', imgur_upload_form);

function uploadImage(file) {
    let form_data = new FormData();
    form_data.append('chximg', file);
    let request = new XMLHttpRequest();
    request.open('POST', chatx_server + 'imgur_uploader.php', true);
    request.setRequestHeader('Accept', 'multipart/form-data');
    request.send(form_data);
    loadingModal();
    request.onload = function() {
        if (this.status >= 200 && this.status < 400) {
            generateImageTagAndSend(this.response);
        }
    };
    request.onerror = function() {};
}
document.querySelector("[name='chximg']").addEventListener("change", event => {
    let file_data = document.querySelector('#imgur_uploader_input').files[0];
    uploadImage(file_data);
});
document.getElementById("shoutbox-comment").addEventListener("paste", function(event) {
    let items = event.clipboardData.items;
    if (items) {
        for (let i = 0; i < items.length; i++) {
            if (items[i].type.indexOf("image") !== -1) {
                let blob = items[i].getAsFile();
                uploadImage(blob);
                break;
            }
        }
    }
});
// temorary needed for submitting chat forms in FireFox with requestSubmit()
function isFirefox() {
  return navigator.userAgent.indexOf("Firefox") !== -1;
}
// Checking open browser tabs and working with the relevant one
let loadPaused
getScript(chatx_server + 'assets/js/page-availability.js').then(() => {
    function check_current_window_status(test) {
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
            if (active_status == '1') {
                loadPaused = true;
                if (icd.checked) {
                    pulsatingCircle.style.display = "block";
                }
                iconPause.style.display = "none";
            } else {
                if (windows_list.length > 1) {
                    loadPaused = false;
                    pulsatingCircle.style.display = "none";
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