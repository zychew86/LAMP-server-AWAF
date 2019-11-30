<html>
<head>
<TITLE>BASIC Authentication Successful!</TITLE>

<meta http-equiv="pragma" content="no-cache" />

</head>
<BODY bgColor="FFFFFF">
<div id="wrap">
<p><a href='/'><img src="../images/TopBar.png" alt="Header Bar" border='0'></a></p>
<h2><font face=Arial>Welcome  <?php echo $_SERVER['REMOTE_USER']; ?></font></h2>
<p><font face=Arial>Virtual server address:</font>&nbsp;<font face=Arial size=4><? echo $_SERVER['HTTP_HOST']; ?></font><br>
<font face=Arial>Pool member address/port:</font>&nbsp;<font face=Arial size=4><? echo $_SERVER['SERVER_ADDR']; ?>:<b><? echo $_SERVER['SERVER_PORT']; ?></b></font><br>
<?php
echo "<font face=Arial>Client IP address/port: ".$_SERVER['REMOTE_ADDR'].":".$_SERVER['REMOTE_PORT']."<br>"; 
echo "Requested URI: ".$_SERVER['REQUEST_URI']." </font><br>&nbsp;</p>"; 
?>


<p><font face=Arial>This page is authenticated via BASIC authentication.  Your BASIC Authorization header looks like:
<p>

	<?php 
		$headers = getallheaders();
		
		echo wordwrap($headers['Authorization'],75,"<br/>",true);
	?>
	
</p>
<p>
Don't BASE64 decode this if you don't want to see your password!
</p>
</div>
<p><a href='/'><img src="../images/BottomBar.png" alt="Header Bar" border='0'></a></p>
</body>
</html>
