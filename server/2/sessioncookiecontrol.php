<head>
<title>Control a Web Session</title>
</head>
<body>
<?php
if($_POST['submit'] == 'start web session') {
   session_start();
   header("location:./sessioncookiecontrol.php");
}
if($_POST['submit'] == 'stop web session') {
   session_start();
   $_SESSION = array(); // destroy all $_SESSION data
   setcookie(session_name(), "", time() - 3600, "/");
   session_destroy();
   header("location:./sessioncookiecontrol.php");
}
?>
<div id='wrap'>
<div id='content'>
<H1>Web Session Example</H1>
<table width='640px'>
	<tr>
		<td> This example lets you start and start web sessions.  It mimics the 
			JSESSIONID cookie found in J2EE servers.  It can be used to demonstrate
			universal persistence.
		</td>
	</tr>
</table>
<?php
echo "<h2>JSESSIONID is: ".$_COOKIE['JSESSIONID']."</h2>";
if(strlen($_COOKIE['JSESSIONID']) < 1) {
?>
<form id='start_session' method='POST' action='./sessioncookiecontrol.php'>
<input type='submit' name='submit' value='start web session'>
</form>
<?php
}else{
?>
<form id='stop_session' method='POST' action='./sessioncookiecontrol.php'>
<input type='submit' name='submit' value='stop web session'>
</form>
<?php
}
?>
</div>
</div>
</body>
</html>
