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
include_once(e_PLUGIN."newsmailer/class.php");
require_once(e_HANDLER."mail.php");
require_once(e_HANDLER."e_parse_class.php");
include_lan(e_PLUGIN."newsmailer/languages/".e_LANGUAGE.".php");
	
if(isset($_POST['senditems'])){

	$emailbody = "";
	$sql->db_Select("news", "*", "ORDER BY news_id".($pref['newsmailer_newssort'] == "newold" ? " DESC" : ""), "no-where");

	while($row = $sql->db_Fetch()){

		$static_tags = array('%news_title%', '%news_author%', '%news_summary%', '%news_body%', '%news_url%');
		$db_tags = array($row['news_title'], get_username($row['news_author']), $row['news_summary'], $row['news_body'], SITEURL."news.php?item.".$row['news_id']);
		$email_template = ($pref['newsmailer_template'] != "" ? html_entity_decode($pref['newsmailer_template']) : "<a href='%news_url%'>%news_title%</a><br />");
		
		if($pref['newsmailer_timeframe'] == "bymonth"){
			if(date("F", $row['news_datestamp']) == $_POST['timeframe'] && date("Y", $row['news_datestamp']) == $_POST['year']){
				$emailbody .= str_replace($static_tags, $db_tags, $email_template);
			}
		}else{
			if(date($pref['newsmailer_dateformat'], $row['news_datestamp']) == $_POST['timeframe']){
				$emailbody .= str_replace($static_tags, $db_tags, $email_template);
			}
		}
	}

	if($_POST['subject'] != ""){
		$subject = $_POST['subject'];
	}else{
		$dSubject = str_replace("%date%", $_POST['timeframe'], $pref['newsmailer_subject']);
		if($pref['newsmailer_timeframe'] == "bymonth"){
			$dSubject = $dSubject.", ".$_POST['year'];
		}
		$subject = $dSubject;
	}

	$mailmessage = str_replace(array('%site_name%', '%site_url%', '%email_header%', '%email_body%', '%email_footer%'), array(SITENAME, SITEURL, (($_POST['headermsg']) ? $_POST['headermsg'] : ""), $emailbody, (($_POST['footermsg']) ? $_POST['footermsg'] : "")), $pref['newsmailer_email']);
	
	$tolist = get_users_inclass($_POST['recipients']);

	$mailmessage = $tp->toHTML($mailmessage, true);

	$numsent = 0;
	foreach($tolist as $user){
		if(sendemail($user['user_email'], $subject, $mailmessage)){
			$numsent++;
		}
	}

	$message = NMMAIL_LAN001.$numsent." ".($numsent == 1 ? NMMAIL_LAN002 : NMMAIL_LAN003).NMMAIL_LAN004;
}

if (isset($message)) {
	$ns->tablerender("", "<div style='text-align:center'><b>".$message."</b></div>");
}

$text = "
<div style='text-align:center'>
<form method='post' action='".e_SELF."'>
<table style='width:75%' class='fborder'>
<tr>
<td style='width:50%' class='forumheader3'>".NMMAIL_LAN005."</td>
<td style='width:50%; text-align:right' class='forumheader3'>
".r_userclass('recipients', 0, 'off', 'member,admin,classes')."
</td>
</tr>";

if($pref['newsmailer_timeframe'] == "bydate"){
	$text .= "
	<tr>
	<td style='width:50%' class='forumheader3'>".NMMAIL_LAN006."</td>
	<td style='width:50%; text-align:right' class='forumheader3'>
	<input size='15' class='tbox' type='text' name='timeframe' value='".$pref['newsmailer_dateformat']."'>
	</td>
	</tr>";
}else if($pref['newsmailer_timeframe'] == "bymonth"){
	$text .= "
	<tr>
	<td style='width:50%' class='forumheader3'>".NMMAIL_LAN007."</td>
	<td style='width:50%; text-align:right' class='forumheader3'>
	<select name='timeframe' class='tbox'>";

	$thismonth = date("n");
	for($i = 1; $i<=12; $i++){
		if($i == $thismonth){
			$text .= "<option value='".date("F",mktime(0, 0, 0, $i, 11, 1978))."' selected>".date("F",mktime(0, 0, 0, $i, 11, 1978))."</option>";
		}else{
			$text .= "<option value='".date("F",mktime(0, 0, 0, $i, 11, 1978))."'>".date("F",mktime(0, 0, 0, $i, 11, 1978))."</option>";
		}
	}

	$text .= "</select>
	<select name='year' class='tbox'>";
	for($i = 2002; $i <= date("Y"); $i++){
		if($i == date("Y")){
			$text .= "<option value='".$i."' selected>".$i."</option>";
		}else{
			$text .= "<option value='".$i."'>".$i."</option>";
		}
	}
	$text .= "</td>
	</tr>";
}

$text .= "<tr>
<td style='width:50%' class='forumheader3'>".NMMAIL_LAN008."</td>
<td style='width:50%; text-align:right' class='forumheader3'>
<input size='40' class='tbox' type='text' name='subject'>
</td>
</tr>
<tr>
<td style='width:50%' class='forumheader3'>".NMMAIL_LAN009."</td>
<td style='width:50%; text-align:right' class='forumheader3'>
<input size='40' class='tbox' type='text' name='headermsg'>
</td>
</tr>
<tr>
<td style='width:50%' class='forumheader3'>".NMMAIL_LAN010."</td>
<td style='width:50%; text-align:right' class='forumheader3'>
<input size='40' class='tbox' type='text' name='footermsg'>
</td>
</tr>
<tr>
<td colspan='2' style='text-align:center' class='forumheader'>
<input class='button' type='submit' name='senditems' value='".NMMAIL_LAN011."' />
</td>
</tr>
</table>
</form>
</div>
";

$ns->tablerender(NMMAIL_LAN012, $text);
require_once(e_ADMIN."footer.php");
?>