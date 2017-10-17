$(function(){
 
    // Storing some elements in variables for a cleaner code base
 
    var refreshButton = $('h1 .icon-refresh'),
        shoutboxForm = $('.shoutbox-form'),
        form = shoutboxForm.find('form'),
        closeForm = shoutboxForm.find('h2 span'),
        nameElement = form.find('#shoutbox-name'),
        commentElement = form.find('#shoutbox-comment'),
        ul = $('ul.shoutbox-content'),
        icd = $('#icd'),
        siteurl = '.'; // Replace dot with the ChatX URL if you gonna use chat on other pages
 
 
    // Replace :) with emoji icons:
    emojione.ascii = true;
 
    // Load the comments.
    load();
 
    nameElement.val(localStorage.getItem('nameElement') || "");
    
    // On form submit, if everything is filled in, publish the shout to the database
    
    var canPostComment = true;
 
    form.submit(function(e){
        e.preventDefault();
 
        if(!canPostComment) return;
        
        var name = nameElement.val().trim();
        var comment = commentElement.val().trim();
 
        if(name.length && comment.length && comment.length <= 240) {
        
            publish(name, comment);
 
            // Prevent new shouts from being published
 
            canPostComment = false;
 
            // Allow a new comment to be posted after 0.5 seconds
 
            setTimeout(function(){
                canPostComment = true;
            }, 500);
 
        }
 
    });
    
    // Clicking on the REPLY button writes the name of the person you want to reply to into the textbox.
    
    ul.on('click', '.shoutbox-comment-reply', function(e){
        
        var replyName = $(this).data('name');
        
        formOpen();
        commentElement.val('@'+'[b]'+replyName+'[/b] ').focus();
 
    });
    
    // Clicking the refresh button will force the load function
    
    var canReload = true;
 
    refreshButton.click(function(){
 
        if(!canReload) return false;
        
        load();
        canReload = false;
 
        // Allow additional reloads after 500 millisecond
        setTimeout(function(){
            canReload = true;
        }, 500);
    });
 
    var loadInt;
    var checkInt = +localStorage.getItem('intLoad');
    icd.prop('checked',!!checkInt);
    var time = checkInt ? 3000 : 15000;    
 
    // Automatically refresh the shouts every 15 seconds
    loadInt = setInterval(load,time);
 
    icd.on('change', function(){
        clearInterval(loadInt);
        loadInt = setInterval(load,($(this).prop('checked') ? 3000 : 15000));
        localStorage.setItem('intLoad',$(this).prop('checked')*1);
    });    
 
    function formOpen(){
        
        if(form.is(':visible')) return;
 
        form.slideDown();
        closeForm.fadeIn();
    }
 
    function formClose(){
 
        if(!form.is(':visible')) return;
 
        form.slideUp();
        closeForm.fadeOut();
    }
 
    // Store the shout in the database
    
    function publish(name,comment){
    
        $.post(siteurl +'/publish.php', {name: name, comment: comment}, function(){
            localStorage.setItem('nameElement',nameElement.val());
            commentElement.val("");
            load();
        });
 
    }
    
    // Fetch the latest shouts
    
    function load(){
        $.getJSON(siteurl +'/load.php', function(data) {
            appendComments(data);
        });
    }
    
    // Render an array of shouts as HTML
    
    function appendComments(data) {
 
        ul.empty();
 
        data.forEach(function(d){
            ul.append('<li>'+
                '<span class="shoutbox-username"><b>' + d.name + '</b></span>'+
                '<p class="shoutbox-comment">' + emojione.toImage(d.text) + '</p>'+
                '<div class="shoutbox-comment-details"><span class="shoutbox-comment-reply" data-name="' + d.name + '">Reply<i class="icon-reply"></i></span>'+
                '<span class="shoutbox-comment-ago">' + d.timeAgo + '</span></div>'+
            '</li>');
        });
 
    }
 
});

/*
###################################################################

            ADDITIONAL COMPONENTS
            
###################################################################
*/

    // Keep nickname input in localstorage
    $(document).ready(function() {
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


    

    // submit by Enter
    $(document).ready(function() {
        $("#shoutbox-comment").on("keypress", function(event) {
            if ((event.keyCode == 10 || event.keyCode == 13)) {
                event.preventDefault();
                chatSubmit();
            }
        });
    });


    // submit form if name field is filled, otherwise show warning
    function chatSubmit() {
        if ($('#false_shoutbox_name').val() === '') {
            $('.name-required').css({
                'display': 'block'
            });
            setTimeout(function() {
                $('.name-required').fadeOut(500)
            }, 2000);
        } else {
            $("#NewMessage").submit();

        }
    }
    
    // resizing textarea to initial height on submit
    $("#NewMessage").submit(function( event ) {
      event.preventDefault();
      $('#shoutbox-comment').attr('rows', 2);
    });

    // disable new lines by enter
    $('#shoutbox-comment').keydown(function(e) {
        var s = $('#shoutbox-comment').val();
        while (s.indexOf("\n") > -1)
            s = s.replace("\n", "");
        $('#shoutbox-comment').val(s);
    });


    $('.chat_popover_parent a').on('click', function() {
        $('.chat_popover_parent > a').not(this).parent().removeClass('active');
        $(this).parent().toggleClass('active');
    });



    // Hide settings widnow when clicked off
    $(document).on('click touchstart', function(event) {
        if (!$(event.target).closest('.chat_popover_parent').length) {
            // Hide the menus.
            $('.chat_popover_parent.active').removeClass('active');
        }
    });

    // Working with positions of chat
    var sPositions = localStorage.chat_custom_position || "{}",
        chat_custom_position = JSON.parse(sPositions);
    $.each(chat_custom_position, function(id, pos) {
        $("#" + id).css(pos)
    })

    if (localStorage.getItem("chat_custom_position") === null) {
        $("#chatx").css({
            "position": "fixed",
            "top": "15px",
            "left": "15px"
        });
    } else {
        $("#chatx").css({
            "position": "fixed"
        });
    }

    $("#chatx").draggable({
        containment: "window",
        handle: 'header',
        scroll: false,
        stop: function(event, ui) {
            chat_custom_position[this.id] = ui.position
            localStorage.chat_custom_position = JSON.stringify(chat_custom_position)
        }
    });

    // making ChatX appear after pageload complete
    $(document).ready(function() {
        $("#chatx").fadeIn(500);
    });




    /*! imgur 2.0.4 | (c) 2016 Pedro RogГ©rio | MIT License */
    ! function(a, b) {
        "use strict";
        "function" == typeof define && define.amd ? define([], b) : "object" == typeof exports ? module.exports = b() : a.Imgur = b()
    }(this, function() {
        "use strict";
        var a = function(b) {
            if (!(this && this instanceof a)) return new a(b);
            if (b || (b = {}), !b.clientid) throw "Provide a valid Client Id here: http://api.imgur.com/";
            this.clientid = b.clientid, this.endpoint = "https://api.imgur.com/3/image", this.callback = b.callback || void 0, this.dropzone = document.querySelectorAll(".dropzone"), this.run()
        };
        return a.prototype = {
            createEls: function(a, b, c) {
                var d, e = document.createElement(a);
                for (d in b) b.hasOwnProperty(d) && (e[d] = b[d]);
                return c && e.appendChild(document.createTextNode(c)), e
            },
            insertAfter: function(a, b) {
                a.parentNode.insertBefore(b, a.nextSibling)
            },
            post: function(a, b, c) {
                var d = new XMLHttpRequest;
                d.open("POST", a, !0), d.setRequestHeader("Authorization", "Client-ID " + this.clientid), d.onreadystatechange = function() {
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
            createDragZone: function() {
                var a, b;
                a = this.createEls("i", {
                    className: "icon-upload"
                }), b = this.createEls("input", {
                    type: "file",
                    accept: "image/*"
                }), Array.prototype.forEach.call(this.dropzone, function(c) {
                    c.appendChild(a), c.appendChild(b), this.status(c), this.upload(c)
                }.bind(this))
            },
            loading: function() {
                var a, b;
                a = this.createEls("div", {
                    className: "loading-modal"
                }), b = this.createEls("img", {
                    className: "loading-image",
                    src: "http://svgshare.com/i/33b.svg"
                }), a.appendChild(b), document.getElementById('chatx').appendChild(a)
            },
            status: function(a) {
                var b = this.createEls("div", {
                    className: "status"
                });
                this.insertAfter(a, b)
            },
            matchFiles: function(a, b) {
                var c = b.nextSibling;
                if (a.type.match(/image/) && "image/svg+xml" !== a.type) {
                    document.getElementById('chatx').classList.add("busy"), c.classList.remove("bg-success", "bg-danger"), c.innerHTML = "";
                    var d = new FormData;
                    d.append("image", a), this.post(this.endpoint, d, function(a) {
                        document.getElementById('chatx').classList.remove("busy"), "function" == typeof this.callback && this.callback.call(this, a)
                    }.bind(this))
                } else c.classList.remove("bg-success"), c.classList.add("bg-danger"), c.innerHTML = "Invalid archive"
            },
            upload: function(a) {
                var b, c, d, e, f = ["dragenter", "dragleave", "dragover", "drop"];
                a.addEventListener("change", function(f) {
                    if (f.target && "INPUT" === f.target.nodeName && "file" === f.target.type)
                        for (c = f.target.files, d = 0, e = c.length; e > d; d += 1) b = c[d], this.matchFiles(b, a)
                }.bind(this), !1), f.map(function(b) {
                    a.addEventListener(b, function(a) {
                        a.target && "INPUT" === a.target.nodeName && "file" === a.target.type && ("dragleave" === b || "drop" === b ? a.target.parentNode.classList.remove("dropzone-dragging") : a.target.parentNode.classList.add("dropzone-dragging"))
                    }, !1)
                })
            },
            run: function() {
                var a = document.querySelector(".loading-modal");
                a || this.loading(), this.createDragZone()
            }
        }, a
    });



    // clearing textarea then getting image link from Imgur and auto-submitting it  
    var feedback = function(res) {
        if (res.success === true) {
            $('#shoutbox-comment').val('');
            $('#shoutbox-comment').val($('#shoutbox-comment').val() + '[url=' + res.data.link + '][img]' + res.data.link + '[/img][/url] ');
            chatSubmit();
        }
    };

    // imgur variables
    new Imgur({
        clientid: 'b12794161e11f2b',
        callback: feedback
    });