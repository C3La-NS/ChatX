<?php
header("Content-type: application/javascript; charset=utf-8");
include 'settings.php';
$a = $_SESSION['username'];
$b = '000';
?>

var sessionName = '<?php echo $a ?>';
fastTrack = '<?php echo $f_t . $b ?>';
slowTrack = '<?php echo $s_t . $b ?>';
r_e = <?php echo $r_e ?>;
e_o = <?php echo $e_o ?>;
f_g = <?php echo $f_g ?>;
m_a = <?php echo $m_a ?>;
m_c = '<?php echo $m_c ?>';
n_s = '<?php echo $n_s ?>';
l_g = '<?php echo $l_g ?>';

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