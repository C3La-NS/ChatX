$.getJSON( "./shout_history.php", function( data ) {
  var items = [];
  $.each( data, function() {
    items.push( "<article><div class=first-box><input class=shoutsId readonly type=text value=" + this.id + "></div>" + "<div class=second-box><div class=name>" + this.name + "</div></div><div class=third-box><div class=text>" + this.text + "</div></div></article>" );
  });
 
  $( "<main/>", {
    "class": "list",
    html: items.join( "" )
  }).appendTo( ".shoutbox-content" );
  
  	$('.shoutsId').click(function() {
	    restoreStyles();
	    $(this).focus();
	    $(this).select();
	    $(this).css({"background": "#88adc7", "color": "#fff"});
	    $("#shoutID").val($(this).val());
	    $(".copied").text("Added to input").show().fadeOut(1200);
    });
  
  
});

function restoreStyles() {
    var ele = document.getElementsByClassName('shoutsId');
    for (var i = 0; i < ele.length; i++ ) {
        ele[i].style.background = "#efefef";
        ele[i].style.color = "#717c87";
    }
}

var url = document.location.href.replace('client/index.php',''),
    appendUrlTo = document.getElementsByClassName('document-url')[0];
    appendUrlTo.insertAdjacentHTML( 'afterbegin', url );
    

$( ".password-alert" ).appendTo( ".alert-box" );

