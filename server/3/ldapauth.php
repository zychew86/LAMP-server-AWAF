<html>
<head>
<title>Testing LDAP Credentials OpenLDAP</title>
<link rel="stylesheet" type="text/css" href="/styles/basic.css" />
</head>
<body>
<?php
if( $_POST["action"] ) {
    include("connect_ldap.php");
	$response = ldap_authenticate($_POST['username'],$_POST['password']);	
}
?>

<div id='wrap'>
<div id='content'>
<h2>Testing LDAP on f5demo.com domain</h2>
<p>
This simple HTTP POST form will test the LDAP bind authentication against the f5demo.com domain.
</p>
<p>
f5demo.com is run on a local OpenLDAP server which will takes LDAP queries on TCP port 1389 or 389. This example runs on TCP port 1389. You can use the service account bind credentials:
<p>
<pre>
bind account: CN=Directory Manager
password: default
</pre>
</p>
<p>
This POST form uses the subtree scope and filter (&(&(objectCategory=user)(!(objectClass=contact))(uid=<?php if($_POST['username']) { echo $_POST['username']; } else { echo "corpuser"; } ?>)))
</p>

<form method="POST">
<input type='hidden' name='action' value='authenticate'>
Username: <input type='text' name='username' value='<?php if($_POST['username']) { echo $_POST['username']; } else { echo "corpuser"; } ?>'></br>
Password: &nbsp;<input type='password' name='password' value='<?php if($_POST['password']) { echo $_POST['password']; } else { echo "password"; } ?>'></br>
</br>
<input type='submit' value='Authenticate'>
</form>
<?php
if( $_POST["action"]) {
	echo "<h2>LDAP Response:</h2>";
	echo "$response";
}
?>
</div>
</div>
</body>
</html>
