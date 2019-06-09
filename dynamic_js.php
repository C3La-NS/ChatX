<?php
header("Content-type: application/javascript");
include 'settings.php';


$a = $_SESSION['username'];
$b = '000';
?>

var sessionName = '<?php echo $a ?>';
var fastTrack = '<?php echo $f_t . $b ?>';
var slowTrack = '<?php echo $s_t . $b ?>';
var e_o = <?php echo $e_o ?>;
var f_g = <?php echo $f_g ?>;
var l_g = '<?php echo $l_g ?>';

<?php
if ( $r_a === '1' ) {
     if( !isset($_SESSION["loggedin"]) && !isset($_SESSION['mod_loggedin']) ) {
        echo '
         loggingIn();
        '; 
     } else {
        echo '
         loggingOut();
        ';
     }
     
} else {
    if( isset($_SESSION["loggedin"]) || isset($_SESSION['mod_loggedin']) ) {
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