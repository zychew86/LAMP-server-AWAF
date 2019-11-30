<html>
<head>
<TITLE>Welcome to F5!</TITLE>

<meta http-equiv="pragma" content="no-cache" />

</head>


<BODY bgColor="FFFFFF">
<div id="wrap">
<p><a href='/'><img src="images/TopBar.png" alt="Header Bar" border='0'></a></p>
<h2><font face=Arial>Welcome to F5 Networks!</font></h2>
<p><font face=Arial>As the global leader in Application Delivery Networking, F5 makes the connected world run better. In fact, you’ve probably relied on F5 products dozens of times today and didn’t even know it. F5 helps organizations meet the demands that come with the relentless growth of voice, data, and video traffic, mobile workers, and applications—in the data center and the cloud</p>
<font face=Arial>Pool member address/port:</font>&nbsp;<font face=Arial size=4><? echo $_SERVER['SERVER_ADDR']; ?>:<b><? echo $_SERVER['SERVER_PORT']; ?></b></font><br>
<?php
echo "<font face=Arial>Requested URI: ".$_SERVER['REQUEST_URI']." </font></p>"; 
?>

<p><img src="images/F5_building.jpg" alt="F5 Corporate Office"><br><br>
<p><a href='/'><img src="images/BottomBar.png" alt="Header Bar" border='0'></a></p>
</div>	
</body>
</html>
