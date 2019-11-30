<html>
<head>
<TITLE>Simple Web Page for Viewing HTTP Requests</TITLE>

<meta http-equiv="pragma" content="no-cache" />

</head>


<BODY bgColor="FFFFFF">

<h2><font face=Arial>Simple HTTP Request Page</font></h2>
<p><font face=Arial>Virtual server address:</font>&nbsp;<font face=Arial size=4><? echo $_SERVER['HTTP_HOST']; ?></font><br>
<font face=Arial>Pool member address/port:</font>&nbsp;<font face=Arial size=4><? echo $_SERVER['SERVER_ADDR']; ?>:<b><? echo $_SERVER['SERVER_PORT']; ?></b></font><br>
<?php
echo "<font face=Arial>Client IP address/port: ".$_SERVER['REMOTE_ADDR'].":".$_SERVER['REMOTE_PORT']."<br>"; 
echo "Requested URI: ".$_SERVER['REQUEST_URI']." </font><br>&nbsp;</p>"; 
?>

<p><font face=Arial>Use this page to view a single HTTP request going through the BIG-IP virtual server.</font></p>





</body>
</html>
