<?php
/*
+ ----------------------------------------------------------------------------+
|     e107 website system
|
|     ©Steve Dunstan 2001-2002
|     http://e107.org
|     jalist@e107.org
|
|     Released under the terms and conditions of the
|     GNU General Public License (http://gnu.org).
+----------------------------------------------------------------------------+
*/
if(!defined("e107_INIT")) {
	require_once("../../class2.php");
}
require_once(e_HANDLER."userclass_class.php");
if(!getperms("P")){ header("location:".e_BASE."index.php"); exit;}
require_once(e_ADMIN."auth.php");
include_lan(e_PLUGIN."newsmailer/languages/".e_LANGUAGE.".php");

	
if (isset($_POST['updatenewstemplate'])) {
	$pref['newsmailer_template'] = $_POST['newstemplate'];
	save_prefs();
	$message = NMTEMPLATE_LAN001;
}

if(isset($_POST['updateemailtemplate'])){
	$pref['newsmailer_email'] = $_POST['emailtemplate'];
	save_prefs();
	$message = NMTEMPLATE_LAN002;
}

if (isset($message)) {
	$ns->tablerender("", "<div style='text-align:center'><b>".$message."</b></div>");
}

$text = "
<div style='text-align:center'>
<form method='post' action='".e_SELF."'>
<table style='width:75%' class='fborder'>
<tr>
<td colspan='2' style='text-align:center' class='forumheader3'>
".NMTEMPLATE_LAN003."
</td>
</tr>
<tr>
<td style='width:40%; text-align:left' class='forumheader3'>
".NMTEMPLATE_LAN004."<br /><br />
<b>%news_title%</b> - ".NMTEMPLATE_LAN005."<br /><br />
<b>%news_author%</b> - ".NMTEMPLATE_LAN006."<br /><br />
<b>%news_summary%</b> - ".NMTEMPLATE_LAN007."<br /><br />
<b>%news_body%</b> - ".NMTEMPLATE_LAN008."<br /><br />
<b>%news_url%</b> - ".NMTEMPLATE_LAN009."
</td>
<td style='width:60%; text-align:center' class='forumheader3'>
<textarea name='newstemplate' class='tbox' cols='90' rows='10'>".$pref['newsmailer_template']."</textarea>
</td>
</tr>
<tr>
<td colspan='2' style='text-align:center' class='forumheader'>
<input class='button' type='submit' name='updatenewstemplate' value='".NMTEMPLATE_LAN010."' />
</td>
</tr>
</table>
</form>

<br /><br />

<form method='post' action='".e_SELF."'>
<table style='width:75%' class='fborder'>
<tr>
<td colspan='2' style='text-align:center' class='forumheader3'>
".NMTEMPLATE_LAN011."
</td>
</tr>
<tr>
<td style='width:40%; text-align:left' class='forumheader3'>
".NMTEMPLATE_LAN004."<br /><br />
<b>%site_name%</b> - ".NMTEMPLATE_LAN012." (".SITENAME.")<br /><br />
<b>%site_url%</b> - ".NMTEMPLATE_LAN013." (".SITEURL.")<br /><br />
<b>%email_header%</b> - ".NMTEMPLATE_LAN014."<br /><br />
<b>%email_body%</b> - ".NMTEMPLATE_LAN015."<br /><br />
<b>%email_footer%</b> - ".NMTEMPLATE_LAN016."
</td>
<td style='width:60%; text-align:center' class='forumheader3'>
<textarea name='emailtemplate' class='tbox' cols='90' rows='10'>".$pref['newsmailer_email']."</textarea>
</td>
</tr>
<tr>
<td colspan='2' style='text-align:center' class='forumheader'>
<input class='button' type='submit' name='updateemailtemplate' value='".NMTEMPLATE_LAN017."' />
</td>
</tr>
</table>
</form>
</div>
";

$ns->tablerender(NMTEMPLATE_LAN018, $text);
require_once(e_ADMIN."footer.php");
?>
