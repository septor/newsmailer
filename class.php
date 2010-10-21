<?php

function get_username($userid) {
    $sql = new db;
    $sql->db_Select("user", "user_name", "user_id='".$userid."'");
    while ($row = $sql->db_Fetch()) {
        $user_name = stripslashes($row['user_name']);
    }
    return $user_name;
}


// This function was pulled from the PM plugin, I take no credit in writing it!
function get_users_inclass($class)
{
	global $sql, $tp;
	if($class == e_UC_MEMBER)
	{
		$qry = "SELECT user_id, user_name, user_email, user_class FROM #user WHERE 1";
	}
	elseif($class == e_UC_ADMIN)
	{
		$qry = "SELECT user_id, user_name, user_email, user_class FROM #user WHERE user_admin = 1";
	}
	elseif($class)
	{
		$regex = "(^|,)(".$tp -> toDB($class).")(,|$)";
		$qry = "SELECT user_id, user_name, user_email, user_class FROM #user WHERE user_class REGEXP '{$regex}'";
	}
	if($sql->db_Select_gen($qry))
	{
		$ret = $sql->db_getList();
		return $ret;
	}
	return FALSE;
}

?>