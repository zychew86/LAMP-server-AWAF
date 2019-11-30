<?php

function ldap_getconnection (){
	$dcs = array("localhost");
	$ldap_user  = "CN=Directory Manager";
	$ldap_pass = "default";
	$ldap_port = "1389";
	foreach ($dcs as $dc) {
		if(!$ldap_connection){
			$ldap_connection = ldap_connect( $dc, $ldap_port);
			ldap_set_option($ldap_connection, LDAP_OPT_PROTOCOL_VERSION, 3);
			ldap_set_option($ldap_connection, LDAP_OPT_REFERRALS, 0);
			ldap_set_option($ldap_connection, LDAP_OPT_SIZELIMIT , 90000);
			$bind = ldap_bind($ldap_connection, $ldap_user, $ldap_pass) or next;
		}
		return $ldap_connection;
	}
	exit(">>Could not connect to any Global Catalog server<<");
};


function ldap_disconnect ($ldap_connection){
	ldap_close($ldap_connection);
};

function local_ldap_search ($filter){
	$base_dn = "DC=f5demo,DC=com";

	$ldap_connection = ldap_getconnection();
	$read = ldap_search($ldap_connection, $base_dn, $filter) or exit(">>Unable to search ldap server<<");
	$info = ldap_get_entries($ldap_connection, $read);
	return $info;
	ldap_disconnect($ldap_connection);
};


function local_ldap_search_with_attributes ($filter, $attributes, $sortby){
	$base_dn = "DC=f5demo,DC=com";

	$ldap_connection = ldap_getconnection();
	$read = ldap_search($ldap_connection, $base_dn, $filter, $attributes) or exit(">>Unable to search ldap server with '$filter' <<");
	if($sortby){
		ldap_sort($ldap_connection, $read, 'givenName');
		ldap_sort($ldap_connection, $read, 'sn');
		ldap_sort($ldap_connection, $read, $sortby);
	}
	$info = ldap_get_entries($ldap_connection, $read);
	return $info;
	ldap_disconnect($ldap_connection);
};

function local_ldap_search_with_attributes_and_basedn ($filter, $attributes, $sortby, $base_dn){
	$ldap_connection = ldap_getconnection();
	$read = ldap_search($ldap_connection, $base_dn, $filter, $attributes) or exit(">>Unable to search ldap server with '$filter' <<");
	if($sortby){
		ldap_sort($ldap_connection, $read, 'givenName');
		ldap_sort($ldap_connection, $read, 'sn');
		ldap_sort($ldap_connection, $read, $sortby);
	}
	$info = ldap_get_entries($ldap_connection, $read);
	return $info;
	ldap_disconnect($ldap_connection);
};

function get_group_list($username){
    $filter = "(&(&(objectCategory=user)(!(objectClass=contact))(cn=$username)))";
	$info = local_ldap_search($filter);
	if($info["count"] == 0)
	{
		return;
	}
	if($info["count"] > 1)
	{
		return;
	}

	return $info[0]["memberof"]; 
}

function ldap_authenticate($username, $password){
	
	if($password == ""){
		authfailedlog($username, '', "BLANK PASSWORD");
		return "blank password";
	}	
	
#	$filter = "(&(&(objectCategory=user)(!(objectClass=contact))(cn=$username)))";
 	$filter = "(&(&(objectClass=person)(!(objectClass=contact))(uid=$username)))";
#	$filter = "(&(objectClass=inetOrgPerson)(cn=$username)))";
	$info = local_ldap_search($filter);
	if($info["count"] == 0)
	{
		return "account not found $username: $password<br/>\n";
		return 0;
	}
	if($info["count"] > 1)
	{
		return "account not unique";
	}
	$user_dn = $info[0]["dn"];
	$locked_out_struct = $info[0]["lockouttime"];
	$locked = $locked_out_struct[0];	
	if($locked > 1) 
	{
		return "account locked out";
	}	

	$ldap_connection = ldap_getconnection();
	$bind = @ldap_bind($ldap_connection,$user_dn,$password);
	if(!$bind)
	{
		return "bad password";
	}else{
		
		$response = "<h3>LDAP bind authentication successfull</h3></h4><h3>Attributes defined on $username</h4>\n<p>\n";

		for ($i=0; $i<=$info["count"];$i++) {
			for ($j=0;$j<=$info[$i]["count"];$j++){
				$attribute_name = $info[$i][$j];
				$attribute_values = $info[$i][$info[$i][$j]];
				for($k=0;$k<$info[$i][$info[$i][$j]]["count"]; $k++) {
					$response =  $response.$attribute_name.": ".$attribute_values[$k]."<br/>\n";
				}
			}
		}		
		return $response."</p>\n";
	}
};

function passwordExpired(){
	$msmonthago = ((time() - 2592000) + 11644473600);
	$msmonthago = $msmonthago."0000000";
	$base_dn = "DC=f5demo,DC=com";
	$ldap_connection = ldap_getconnection();	
	$attributes = array("sn","givenName","displayname","telephonenumber","mail","cn","info","streetaddress","l","st","postalcode","memberof");
	$filter="(&(objectCategory=user)(!(objectClass=contact))(pwdLastSet<=$msmonthago))";
	$read = ldap_search($ldap_connection, $base_dn, $filter,$attributes) or exit(">>Unable to search ldap server with $filter for $attributes<<");
	$info = ldap_get_entries($ldap_connection, $read);
	return $info;
	ldap_disconnect($ldap_connection);		
}


function passwordExpiresIn($pwdlastset){
	$unixtimestamp = win_filetime_to_timestamp ($pwdlastset);
	// seconds since now minus when you set your password last
	$howlonginunix = (time() - $unixtimestamp);
	// 30 days is 2592000 seconds
	// take how long it has been in seconds and subtract a 30 days
	// which is our password change policy = How many seconds you have
	// to change your password!
	$diffformonth = 2592000 - $howlonginunix;
	// seconds in day is 86400 - return rounded down days and count down one
	// to beat the clock.
	return (floor($diffformonth/86400));
}

function win_filetime_to_timestamp ($filetime) {
  $win_secs = substr($filetime,0,strlen($filetime)-7); // divide by 10 000 000 to get seconds
  $unix_timestamp = ($win_secs - 11644473600); // 1.1.1600 -> 1.1.1970 difference in seconds
  return $unix_timestamp;
}

?>
