<?php

$menutitle  = NMMENU_LAN001;

$butname[]  = NMMENU_LAN002;
$butlink[]  = "admin_config.php";
$butid[]    = "config";

$butname[]  = NMMENU_LAN003;
$butlink[]  = "admin_mailer.php";
$butid[]    = "mailer";

$butname[]  = NMMENU_LAN004;
$butlink[]  = "admin_template.php";
$butid[]    = "template"; 

global $pageid;
for ($i=0; $i<count($butname); $i++) {
	$var[$butid[$i]]['text'] = $butname[$i];
	$var[$butid[$i]]['link'] = $butlink[$i];
};

show_admin_menu($menutitle, $pageid, $var);

?>
