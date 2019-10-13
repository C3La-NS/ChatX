$.getJSON( "./array_history_moderator.php", function( data ) {
  var items = [];
  $.each( data, function() {
    items.push( "<article><div class=first-box><input class=magic-checkbox type=checkbox name=deleteShout[] form=deleteShout value=" + this.id + "><label class=magic-label></label></div>" + "<div class=third-box><chx_li><chx_p class=shoutbox-comment><chx_span class=shoutbox-username><b data-loggedin=" + this.loggedIn + ">" + this.name + "</b></chx_span>" +  this.text + "</chx_p><chx_div class=shoutbox-comment-details><chx_span class=shoutbox-comment-ago>" + this.timeAgo + "</chx_span></chx_div></chx_li></div></article>" );
  });
 
  $( "<main/>", {
    "class": "list",
    html: items.join( "" )
  }).appendTo( ".shoutbox-content" );

    $(".magic-checkbox").each(function(i) {
     $(this).attr("id", (i+1));
    });
    $(".magic-label").each(function(i) {
     $(this).attr("for", (i+1));
    });
    
});

var url = document.location.href.replace('client/index.php',''),
    appendUrlTo = document.getElementsByClassName('document-url')[0];
    appendUrlTo.insertAdjacentHTML( 'afterbegin', url );
    
    
    
