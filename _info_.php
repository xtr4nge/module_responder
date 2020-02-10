<?
$mod_name="responder";
$mod_version="2.b";
$mod_path="/usr/share/fruitywifi/www/modules/$mod_name";
$mod_logs="$log_path/$mod_name.log"; 
$mod_logs_history="$mod_path/includes/logs/";
$mod_logs_panel="enabled";
$mod_panel="show";
$mod_type="service";
$mod_isup="ps auxww | grep Responder.py | grep -v -e 'grep'";
$mod_alias="Responder";

# EXEC
$bin_sudo = "/usr/bin/sudo";
$bin_responder = "includes/Responder-master/Responder.py";
$bin_sh = "/bin/sh";
$bin_echo = "/bin/echo";
$bin_grep = "/usr/bin/ngrep";
$bin_killall = "/usr/bin/killall";
$bin_cp = "/bin/cp";
$bin_chmod = "/bin/chmod";
$bin_sed = "/bin/sed";
$bin_rm = "/bin/rm";
$bin_route = "/sbin/route";
?>
