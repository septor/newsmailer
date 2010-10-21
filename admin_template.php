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
//include_lan(e_PLUGIN."newsmailer/languages/".e_LANGUAGE.".php");

	
if (isset($_POST['updatenewstemplate'])) {
	$pref['newsmailer_template'] = $_POST['newstemplate'];
	save_prefs();
	$message = "News Items Template updated successfully!";
}

if(isset($_POST['updateemailtemplate'])){
	$pref['newsmailer_email'] = $_POST['emailtemplate'];
	save_prefs();
	$message = "Total Email Template updated successfully!";
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
The below box allows you to configure how the news items are presented. Keep in mind that this is <b>not</b> a template for the whole email.
</td>
</tr>
<tr>
<td style='width:40%; text-align:left' class='forumheader3'>
The following tags will be converted to their respective values:<br /><br />
<b>%news_title%</b> - Title of the news item.<br /><br />
<b>%news_author%</b> - Author of the news item.<br /><br />
<b>%news_summary%</b> - Text inside the summary field.<br /><br />
<b>%news_body%</b> - The body of the news item.<br /><br />
<b>%news_url%</b> - The absolute URL to the news item.
</td>
<td style='width:60%; text-align:center' class='forumheader3'>
<textarea name='newstemplate' class='tbox' cols='90' rows='10'>".$pref['newsmailer_template']."</textarea>
</td>
</tr>
<tr>
<td colspan='2' style='text-align:center' class='forumheader'>
<input class='button' type='submit' name='updatenewstemplate' value='Update News Item Template' />
</td>
</tr>
</table>
</form>

<br /><br />

<form method='post' action='".e_SELF."'>
<table style='width:75%' class='fborder'>
<tr>
<td colspan='2' style='text-align:center' class='forumheader3'>
The below box allows you to configure how the total email is presented.
</td>
</tr>
<tr>
<td style='width:40%; text-align:left' class='forumheader3'>
The following tags will be converted to their respective values:<br /><br />
<b>%site_name%</b> - This will display your website's name. (".SITENAME.")<br /><br />
<b>%site_url%</b> - This is the absolute URL to your website. (".SITEURL.")<br /><br />
<b>%email_header%</b> - The content you enter in the header field before sending the email.<br /><br />
<b>%email_body%</b> - The above template will be inserted here.<br /><br />
<b>%email_footer%</b> - The content you enter in the footer field before sending the email.
</td>
<td style='width:60%; text-align:center' class='forumheader3'>
<textarea name='emailtemplate' class='tbox' cols='90' rows='10'>".$pref['newsmailer_email']."</textarea>
</td>
</tr>
<tr>
<td colspan='2' style='text-align:center' class='forumheader'>
<input class='button' type='submit' name='updateemailtemplate' value='Update Total Email Template' />
</td>
</tr>
</table>
</form>
</div>
";

$ns->tablerender("Configure Templates", $text);
require_once(e_ADMIN."footer.php");
?>
