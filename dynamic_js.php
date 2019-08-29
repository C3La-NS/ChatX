<?php
header("Content-type: application/javascript; charset=utf-8");
include 'settings.php';
$a = $_SESSION['username'];
$b = '000';
?>

var sessionName = '<?php echo $a ?>';
var fastTrack = '<?php echo $f_t . $b ?>';
var slowTrack = '<?php echo $s_t . $b ?>';
var r_e = <?php echo $r_e ?>;
var e_o = <?php echo $e_o ?>;
var f_g = <?php echo $f_g ?>;
var m_a = <?php echo $m_a ?>;
var m_c = '<?php echo $m_c ?>';
var l_g = '<?php echo $l_g ?>';

<?php
if ( $r_a === '1' ) {
     if( !isset($_SESSION[$sesPrefix . "loggedin"]) && !isset($_SESSION[$sesPrefix . 'mod_loggedin']) ) {
        echo '
         loggingIn();
        '; 
     } else {
        echo '
         loggingOut();
        ';
     }
     
} else {
    if( isset($_SESSION[$sesPrefix . "loggedin"]) || isset($_SESSION[$sesPrefix . 'mod_loggedin']) ) {
        echo '
         publicScenarioLoggingOut();
        ';
    } else {
        echo '
         publicScenarioLoggingIn();
        ';
    }
}  
?>