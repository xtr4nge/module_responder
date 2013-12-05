<?

include "../_info_.php";
include "../../../config/config.php";
include "../../../functions.php";

include "options_config.php";

// Checking POST & GET variables...
if ($regex == 1) {
	regex_standard($_POST['type'], "../../../msg.php", $regex_extra);
	regex_standard($_POST['tempname'], "../../../msg.php", $regex_extra);
	regex_standard($_POST['action'], "../../../msg.php", $regex_extra);
	regex_standard($_GET['mod_action'], "../../../msg.php", $regex_extra);
	regex_standard($_GET['mod_service'], "../../../msg.php", $regex_extra);
	regex_standard($_POST['new_rename'], "../../../msg.php", $regex_extra);
	regex_standard($_POST['new_rename_file'], "../../../msg.php", $regex_extra);
}

$type = $_POST['type'];
$tempname = $_POST['tempname'];
$action = $_POST['action'];
$mod_action = $_GET['mod_action'];
$mod_service = $_GET['mod_service'];
$newdata = html_entity_decode(trim($_POST["newdata"]));
$newdata = base64_encode($newdata);
$new_rename = $_POST["new_rename"];
$new_rename_file = $_POST["new_rename_file"];

// ngrep options
if ($type == "opt_responder") {

    $tmp = array_keys($opt_responder);
    for ($i=0; $i< count($tmp); $i++) {
        
        $exec = "/bin/sed -i 's/opt_responder\\[\\\"".$tmp[$i]."\\\"\\]\\[0\\].*/opt_responder\\[\\\"".$tmp[$i]."\\\"\\]\\[0\\] = 0;/g' options_config.php";
        exec("/usr/share/FruityWifi/bin/danger \"" . $exec . "\"", $output);
        
        $exec = "/bin/sed -i 's/^".$tmp[$i].".*/".$tmp[$i]." = Off/g' Responder-master/Responder.conf";
        exec("/usr/share/FruityWifi/bin/danger \"" . $exec . "\"", $output);
        
    }

    $tmp = $_POST["options"];
    for ($i=0; $i< count($tmp); $i++) {
        
        $exec = "/bin/sed -i 's/opt_responder\\[\\\"".$tmp[$i]."\\\"\\]\\[0\\].*/opt_responder\\[\\\"".$tmp[$i]."\\\"\\]\\[0\\] = 1;/g' options_config.php";
        exec("/usr/share/FruityWifi/bin/danger \"" . $exec . "\"", $output);
        
        $exec = "/bin/sed -i 's/^".$tmp[$i].".*/".$tmp[$i]." = On/g' Responder-master/Responder.conf";
        exec("/usr/share/FruityWifi/bin/danger \"" . $exec . "\"", $output);
        
    }

    header('Location: ../index.php?tab=1');
    exit;

}

header('Location: ../index.php');

?>