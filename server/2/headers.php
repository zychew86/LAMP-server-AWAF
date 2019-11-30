<?php
header('X-Injected: TestInjected1',false);
header('X-Injected: TestInjected2',false);
header('X-Injected: TestInjected3',false);
header('X-Sensitive-Data: AMEX378282246310005',false);
header('X-Sensitive-Data: MC5105105105105100',false);
header('X-Sensitive-Data: Visa4012888888881881',false);
header('X-Powered-By: ASP.NET-PleaseHackMeWithMicrosoftHackingTools',false);
?>
<html>
<head>
<TITLE>View Request and Response Headers</TITLE>

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

	var hstring = '';
	var headerarray = http.getAllResponseHeaders().split("\n");
	for(i = 0; i < headerarray.length; i++){
	   hstring = hstring+"-&nbsp;"+headerarray[i]+"<br>"; 
	}
	hstring = hstring+'';
	var rhdiv = document.getElementById('responseheaders');
	rhdiv.innerHTML = hstring;
}

</script>


</head>


<body onload='loadInfo()'>

<p><a href='/'><img src="images/TopBar.png" alt="Header Bar" border='0'></a></p>
<h2><font face=Arial>View Request and Response Headers</font></h2>
<p><font face=Arial>Virtual server address:</font>&nbsp;<font face=Arial size=4><? echo $_SERVER['HTTP_HOST']; ?></font><br>
<font face=Arial>Pool member address/port:</font>&nbsp;<font face=Arial size=4><? echo $_SERVER['SERVER_ADDR']; ?>:<b><? echo $_SERVER['SERVER_PORT']; ?></b></font><br>
<?php
echo "<font face=Arial>Client IP address/port: ".$_SERVER['REMOTE_ADDR'].":".$_SERVER['REMOTE_PORT']."<br>"; 
echo "Requested URI: ".$_SERVER['REQUEST_URI']." </font><br>&nbsp;</p>"; 
?>


<h2><font face=Arial color=black>Request Headers Received at the Server</font></h2>
<div id='requestheaders'>
<p><font face=Arial size=2 color=black>
<?php
foreach (getallheaders() as $name => $value) {
	echo "-&nbsp;$name: $value<br>\n";
}
?>	
</table>
</div>
<h2><font face=Arial color=black>Response Headers delivered to the Client</font></h2>
<p><font face=Arial size=2>
<div id='responseheaders'>
</div>
</font></p>
<p><a href='/'><img src="images/BottomBar.png" alt="Header Bar" border='0'></a></p>
</body>
</html>
