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
	
	// submit by ENTER
	    $(document).ready(function() {
    $("#shoutbox-comment").on("keypress", function(event) {
        if ((event.keyCode == 10 || event.keyCode == 13)) {
            event.preventDefault();
            chatSubmit();
        }
    });
        });
        
        function chatSubmit() {
        $("#NewMessage").submit();
        }

    // disable new lines by enter
    $('#shoutbox-comment').keydown(function(e){
 var s = $('#shoutbox-comment').val();
 while (s.indexOf("\n") > -1)
  s = s.replace("\n","");
 $('#shoutbox-comment').val(s);
    });
    
    // Autoresize textarea
    jQuery.each(jQuery('textarea[data-autoresize]'), function() {
        var offset = this.offsetHeight - this.clientHeight;
 
        var resizeTextarea = function(el) {
        jQuery(el).css('height', 'auto').css('height', el.scrollHeight + offset);
        };
        jQuery(this).on('keyup input', function() { resizeTextarea(this); }).removeAttr('data-autoresize');
    });
    
        $('.chat_popover_parent a').on('click', function() {
        $('.chat_popover_parent > a').not(this).parent().removeClass('active');
        $(this).parent().toggleClass('active');
    });

    // Hide the dropdown when clicked off
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
            $("#chatx").css({ "position":"fixed", "top": "15px", "left": "15px" });
        }
        else {
            $("#chatx").css({ "position":"fixed" });
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
    