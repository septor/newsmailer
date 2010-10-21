<?php

if (!defined('e107_INIT')) { exit; }
include_lan(e_PLUGIN."newsmailer/languages/".e_LANGUAGE.".php");


// Plugin info -------------------------------------------------------------------------------------------------------
$eplug_name = NMPLUGIN_LAN001;
$eplug_version = '0.04';
$eplug_author = 'septor';
$eplug_url = 'http://painswitch.com/';
$eplug_email = 'patrickweaver@gmail.com';
$eplug_description = NMPLUGIN_LAN002;
$eplug_compatible = 'e107 v0.7.*';
$eplug_readme = '';

// Name of the plugin's folder -------------------------------------------------------------------------------------
$eplug_folder = "newsmailer";

// Name of menu item for plugin ----------------------------------------------------------------------------------
$eplug_menu_name = "";

// Name of the admin configuration file --------------------------------------------------------------------------
$eplug_conffile = "admin_config.php";

// Icon image and caption text ------------------------------------------------------------------------------------
$eplug_icon = $eplug_folder."/images/32.png";
$eplug_icon_small = $eplug_folder."/images/16.png";
$eplug_caption = $eplug_name;

// List of preferences -----------------------------------------------------------------------------------------------
$eplug_prefs = array(
	"newsmailer_timeframe" => "bymonth",
	"newsmailer_subject" => "",
	"newsmailer_dateformat" => "m/d/Y",
	"newsmailer_datetypes" => "m/d/Y;F j Y;d/m/Y;j F Y",
	"newsmailer_template" => "<a href='%news_url%'>%news_title%</a><br />",
	"newsmailer_newssort" => "newold",
	"newsmailer_email" => "<h1>%email_header%</h1>\n%email_body%\n<br />\n<i>%email_footer%</i>"
 );

// List of table names -----------------------------------------------------------------------------------------------
$eplug_table_names = "";

// List of sql requests to create tables -----------------------------------------------------------------------------
$eplug_tables = "";

// Create a link in main menu (yes=TRUE, no=FALSE) -------------------------------------------------------------
$eplug_link = FALSE;
$eplug_link_name = "";
$eplug_link_url = "";

// Text to display after plugin successfully installed ------------------------------------------------------------------
$eplug_done = NMPLUGIN_LAN003;
$eplug_upgrade_done = NMPLUGIN_LAN004;

$upgrade_alter_tables = "";

$upgrade_add_prefs = "";

$upgrade_remove_prefs = "";

?>