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

	
if (isset($_POST['updatesettings'])) {
	$pref['newsmailer_timeframe'] = $_POST['timeframe'];
	$pref['newsmailer_subject'] = $_POST['subject'];
	$pref['newsmailer_dateformat'] = $_POST['dateformat'];
	$pref['newsmailer_datetypes'] = $_POST['datetypes'];
	save_prefs();
	$message = NMCONFIG_LAN001;
}

if (isset($message)) {
	$ns->tablerender("", "<div style='text-align:center'><b>".$message."</b></div>");
}

$datetypes = explode(";", $pref['newsmailer_datetypes']);

$text = "
<div style='text-align:center'>
<form method='post' action='".e_SELF."'>
<table style='width:75%' class='fborder'>
<tr>
<td style='width:50%' class='forumheader3'>".NMCONFIG_LAN002."</td>
<td style='width:50%; text-align:right' class='forumheader3'>
<select name='timeframe' class='tbox'>
".($pref['newsmailer_timeframe'] == "bymonth" ? "<option value='bymonth' selected>".NMCONFIG_LAN003."</option>\n" : "<option value='bymonth'>".NMCONFIG_LAN003."</option>\n")."
".($pref['newsmailer_timeframe'] == "bydate" ? "<option value='bydate' selected>".NMCONFIG_LAN004."</option>\n" : "<option value='bydate'>".NMCONFIG_LAN004."</option>\n")."
</select>
</td>
</tr>
<tr>
<td style='width:50%' class='forumheader3'>".NMCONFIG_LAN005."</td>
<td style='width:50%; text-align:right' class='forumheader3'>
<select name='newssort' class='tbox'>
<option value='newold'".($pref['newsmailer_newssort'] == "newold" ? " selected" : "").">".NMCONFIG_LAN006."</option>
<option value='oldnew'".($pref['newsmailer_newssort'] == "oldnew" ? " selected" : "").">".NMCONFIG_LAN007."</option>
</select>
</td>
</tr>
<tr>
<td style='width:50%' class='forumheader3'>".NMCONFIG_LAN008."<br /><span class='smalltext'>".NMCONFIG_LAN009."</span></td>
<td style='width:50%; text-align:right' class='forumheader3'>
<select name='dateformat' class='tbox'>";

foreach($datetypes as $date){
	$text .= ($pref['newsmailer_dateformat'] == $date ? "<option value='".$date."' selected>".date($date)."</option>" : "<option value='".$date."'>".date($date)."</option>");
}

$text .= "</select>
</td>
</tr>
<tr>
<td style='width:50%' class='forumheader3'>".NMCONFIG_LAN010."<br /><span class='smalltext'>".NMCONFIG_LAN011."</span></td>
<td style='width:50%; text-align:right' class='forumheader3'>
<input  size='40' class='tbox' type='text' name='datetypes' value='".$pref['newsmailer_datetypes']."'>
</td>
</tr>
<tr>
<td style='width:50%' class='forumheader3'>".NMCONFIG_LAN012."<br /><span class='smalltext'>".NMCONFIG_LAN013."</span></td>
<td style='width:50%; text-align:right' class='forumheader3'>
<input  size='40' class='tbox' type='text' name='subject' value='".$pref['newsmailer_subject']."'>
</td>
</tr>
<tr>
<td colspan='2' style='text-align:center' class='forumheader'>
<input class='button' type='submit' name='updatesettings' value='".NMCONFIG_LAN014."' />
</td>
</tr>
</table>
</form>
</div>
";

$ns->tablerender(NMCONFIG_LAN015, $text);
require_once(e_ADMIN."footer.php");
?>
