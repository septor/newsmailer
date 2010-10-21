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

	
if (isset($_POST['updatesettings'])) {
	$pref['newsmailer_timeframe'] = $_POST['timeframe'];
	$pref['newsmailer_subject'] = $_POST['subject'];
	$pref['newsmailer_dateformat'] = $_POST['dateformat'];
	$pref['newsmailer_datetypes'] = $_POST['datetypes'];
	save_prefs();
	$message = "Settings saved successfully!";
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
<td style='width:50%' class='forumheader3'>Select the method for news item collection:</td>
<td style='width:50%; text-align:right' class='forumheader3'>
<select name='timeframe' class='tbox'>
".($pref['newsmailer_timeframe'] == "bymonth" ? "<option value='bymonth' selected>Monthly</option>\n" : "<option value='bymonth'>Monthly</option>\n")."
".($pref['newsmailer_timeframe'] == "bydate" ? "<option value='bydate' selected>Date Specific</option>\n" : "<option value='bydate'>Date Specific</option>\n")."
</select>
</td>
</tr>
<tr>
<td style='width:50%' class='forumheader3'>News Item Sorting:</td>
<td style='width:50%; text-align:right' class='forumheader3'>
<select name='newssort' class='tbox'>
<option value='newold'".($pref['newsmailer_newssort'] == "newold" ? " selected" : "").">Newest to Oldest</option>
<option value='oldnew'".($pref['newsmailer_newssort'] == "oldnew" ? " selected" : "").">Oldest to Newest</option>
</select>
</td>
</tr>
<tr>
<td style='width:50%' class='forumheader3'>Date Format:<br /><span class='smalltext'>If the \"Date Specific\" option is selected, which date format do you prefer.</span></td>
<td style='width:50%; text-align:right' class='forumheader3'>
<select name='dateformat' class='tbox'>";

foreach($datetypes as $date){
	$text .= ($pref['newsmailer_dateformat'] == $date ? "<option value='".$date."' selected>".date($date)."</option>" : "<option value='".$date."'>".date($date)."</option>");
}

$text .= "</select>
</td>
</tr>
<tr>
<td style='width:50%' class='forumheader3'>Date Types:<br /><span class='smalltext'>Refer to the PHP <a href='http://www.php.net/manual/en/function.date.php'>date()</a> function. Separate types with a semicolon (;).</span></td>
<td style='width:50%; text-align:right' class='forumheader3'>
<input  size='40' class='tbox' type='text' name='datetypes' value='".$pref['newsmailer_datetypes']."'>
</td>
</tr>
<tr>
<td style='width:50%' class='forumheader3'>Default Email Subject:<br /><span class='smalltext'>Used if no subject is set before sending the email. The %date% tag will be converted to whatever date is used in the sending.</span></td>
<td style='width:50%; text-align:right' class='forumheader3'>
<input  size='40' class='tbox' type='text' name='subject' value='".$pref['newsmailer_subject']."'>
</td>
</tr>
<tr>
<td colspan='2' style='text-align:center' class='forumheader'>
<input class='button' type='submit' name='updatesettings' value='Save Settings' />
</td>
</tr>
</table>
</form>
</div>
";

$ns->tablerender("Configure News Mailer", $text);
require_once(e_ADMIN."footer.php");
?>
