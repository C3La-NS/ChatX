<?php
include '../settings.php';
include '../data/languages/' . $l_g . '/lang.' . $l_g . '.php';
?>

<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title><?php echo $lang['TITLE_HISTORY']; ?></title>
      <link href="css/history.css" rel="stylesheet">
      <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
   </head>
   <body>
      <div class="box">
         <div class="new-messages-above">
            <center><?php echo $lang['NEW_MESSAGES_ABOVE']; ?></center>
         </div>
         <chx_ul class="shoutbox-content"></chx_ul>
      </div>
      <script>
         var ul = jQuery('chx_ul.shoutbox-content');
         $.getJSON( "./array_history_general.php", function( data ) {
                 data.forEach(function(d) {
                     ul.append('<chx_li>' +
                         '<chx_p class="shoutbox-comment"><chx_span class="shoutbox-username"><b data-loggedin="' + d.loggedIn + '">' + d.name + '</b></chx_span>' +  d.text + '</chx_p>' +
                         '<chx_div class="shoutbox-comment-details"><chx_span class="shoutbox-comment-ago">' + d.timeAgo + '</chx_span></chx_div>' +
                         '</chx_li>');
                 });
         });
      </script>
   </body>
</html>