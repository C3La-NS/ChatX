<?php
header("Content-type: application/javascript");

include 'settings.php';
session_start();


$phpVar = $_SESSION['username'];
?>

var sessionName = '<?php echo $phpVar; ?>';

<?php
if ( $restrictedAccess === true ) {
     if( !isset($_SESSION["loggedin"]) && !isset($_SESSION['mod_loggedin']) ) {
        echo '
        $( "#false_shoutbox_name" ).css({"visibility":"hidden"});
        $(\'#chatx\').append(\'<div class="chx-login-form"><form name="login" method="post" target="_blank"><input name="u" placeholder="Username"><input type="password" name="p" placeholder="Password"><button type="submit" name="s" class="icon-login"></button></form></div>\');
        $(\'#chatx\').click(function() { 
            $(\'.chx-login-form\').fadeIn(500);
        });
        $(\'.chx-login-form form\').attr(\'action\', chatx_server + \'client/login.php\');


$(".chx-login-form form").submit(function() {
$.ajax({
    type: \'POST\',
    url: chatx_server + \'client/login.php\',
    data: $(".chx-login-form form").serialize(),
    success: function(data) {
                $.getScript( chatx_server + "dynamic_js.php" );
                
             }
});
});    


        '; 
     } else {
         echo '
         $( "#false_shoutbox_name" ).css({"visibility":"visible"});
         $( "#false_shoutbox_name" ).val(sessionName);$("#false_shoutbox_name").prop("disabled", true);
         valName();
         $( ".chx-login-form" ).remove();
         ';
     }
     
} else {
    echo '$(\'.chatx_management\').text( "ChatX account" )';
    if( isset($_SESSION["loggedin"]) || isset($_SESSION['mod_loggedin']) ) {
        echo '
            $( "#false_shoutbox_name" ).val(sessionName);$("#false_shoutbox_name").prop("disabled", true);
        ';
    }
}  
?>


