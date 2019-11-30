<html>
<head>
<TITLE>Using virtual server <? echo $_SERVER['HTTP_HOST']; ?> and pool member <? echo $_SERVER['SERVER_ADDR']; ?> (Node #2)</TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=us-ascii" />
 <script language="javascript">
  function showCookieLink() {
    var ele = document.getElementById("CookieLink");
    ele.style.display = "block";
  } 
 </script>

<meta http-equiv="pragma" content="no-cache" />
<script language="JavaScript" type="text/javascript">
<!--
function loadInfo() {
	var http;
	if(window.ActiveXObject){
		http = new ActiveXObject("Microsoft.XMLHTTP");
	}else if(window.XMLHttpRequest){
		http = new XMLHttpRequest();
	}
	// display headers of current document:
	http.open('HEAD', location.href, false);
	http.send();

	var hstring = '<p><font face=Arial size=2 color=black>';
	var headerarray = http.getAllResponseHeaders().split("\n");
	for(i = 0; i < headerarray.length; i++){
	   hstring = hstring+"-&nbsp;"+headerarray[i]+"<br>"; 
	}
	hstring = hstring+'</p>';
	var rhdiv = document.getElementById('responseheaders');
	rhdiv.innerHTML = hstring;
}

</script>

</head>
<body onload='loadInfo()'>

<BODY bgColor="F5F8F9" onload="javascript:if (document.cookie) showCookieLink()">

<p><img src="images/TopBar.png" alt="Header Bar"></p>
<table width=690>
<tr>
<td width=70%><p><font face=Arial><a href="/welcome.php"><br>Welcome</a> to F5 Networks and the FSE vLab Test Web Site. This Web site is designed to be used with F5 vLab (virtual environment) hands-on exercises and customer demonstrations.<br>&nbsp;</p>
</td>
<td width=30% align=right><img width=200 src="images/wwfr.png"></td>
</tr></table>

<h2><font face=Arial>Request Details</font></h2>
<p><font face=Arial>The <i>index.php</i> page is from <font color="003399"><b>Node #2</font></b><br>
<font face=Arial>Virtual server address:</font>&nbsp;<font face=Arial size=4><? echo $_SERVER['HTTP_HOST']; ?></font><br>
<font face=Arial>Pool member address/port:</font>&nbsp;<font face=Arial size=4 color="003399"><b><? echo $_SERVER['SERVER_ADDR']; ?>:<? echo $_SERVER['SERVER_PORT']; ?></b></font><br>
<?php
echo "Client IP address/port: ".$_SERVER['REMOTE_ADDR'].":".$_SERVER['REMOTE_PORT']."<br>"; 
echo "Requested URI: ".$_SERVER['REQUEST_URI']." </font><br>&nbsp;</p>"; 
?>

<h2><font face=Arial>F5 Platform List</font></h2>
<p><img src="images/viprion4800.jpg" alt="VIPRION 4800">&nbsp;&nbsp;<img src="images/viprion4480.jpg" alt="VIPRION 4480"><br><br>
<img src="images/viprion2400.jpg" alt="VIPRION 2400">&nbsp;&nbsp;<img src="images/bigip11000.jpg" alt="BIG-IP 11000"><br><br>
<img src="images/bigip10200.jpg" alt="BIG-IP 10200">&nbsp;&nbsp;<img src="images/bigip4200.jpg" alt="BIG-IP 4200"></p>

<h2><font face=Arial>HTTP Request and Response Information</font></h2>
<p><font face=Arial><a href='/headers.php'>Request and Response Headers</a><br>
<a href="index.php" onclick="alert('Cookie = ' + document.cookie); return false;">Display Cookie</a>

<h2><font face=Arial>Content Examples on This Host</font></h2>
<p><font face=Arial><a href='/bigtext.html'>HTTP Compress Example</a><br>
<a href='/exercise_guide.txt'>Plaintext Compress Example</a><br>
<a href='/lorax.php'>Stream Profile Example</a><br>
<a href='/badlinks.html'>Multiple Stream Example</a><br>
<a href='/privatedata.html'>Mask Sensitive Content Example</a><br>
<a href='/httprequest.php'>Simple HTTP Request</a><br>
<a href='/sessioncookiecontrol.php'>Web Session Example</a><br>

<h2><font face=Arial>Authentication Examples</font></h2>
<p><a href='/basic/'>Basic Authentication</a><br>
<a href='/ldapauth.php'>LDAP bind authentication</a> (against f5demo.com domain)</a><br>

<h2><font face=Arial>Advanced Acceleration Examples</font></h2>
<p><a href='/acceleration/acceleration.html'>Application Acceleration Examples</a><br>

<p><img src="images/BottomBar.png" alt="Header Bar"></p>
<table width=690 border=0>
<tr>
<td width=550><font face=Arial size=2> Copyright 2013 - Proprietary and Confidential Information of F5 Networks<br>Security Level Classification - Disabled</font></td>
<td width=100 align=center><img src="images/f5logo.gif" alt="F5 Networks"></td>
</tr>
</table>	

</body>
</html>
