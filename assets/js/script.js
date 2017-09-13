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
        commentElement.val('@'+replyName+' ').focus();
 
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