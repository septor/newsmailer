<?php

$menutitle  = "News Mailer Navigation";

$butname[]  = "Settings";
$butlink[]  = "admin_config.php";
$butid[]    = "config";

$butname[]  = "Send News Items";
$butlink[]  = "admin_mailer.php";
$butid[]    = "mailer";

$butname[]  = "Configure Templates";
$butlink[]  = "admin_template.php";
$butid[]    = "template"; 

global $pageid;
for ($i=0; $i<count($butname); $i++) {
	$var[$butid[$i]]['text'] = $butname[$i];
	$var[$butid[$i]]['link'] = $butlink[$i];
};

show_admin_menu($menutitle, $pageid, $var);

?>
