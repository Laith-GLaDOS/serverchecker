<?php
$_hosts = array("142.250.186.174", "172.217.23.110", "3.212.128.153");
function ping($host, $port, $timeout) 
{ 
	$tB = microtime(true); 
	$fP = @fSockOpen($host, $port, $errno, $errstr, $timeout); 
	if (!$fP) { return "Down"; } 
	$tA = microtime(true); 
	return round((($tA - $tB) * 1000), 0)."ms"; 
}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Server Checker</title>
	</head>
	<body style="background-color: rgb(56,60,60);" >
		<img src="http://serverchecker.rf.gd/cdn/static/logo.png" align="center" alt="Server Checker"/>
		<?php
		$_server1_ping = ping($_hosts[0], 80, 5);
		$_server2_ping = ping($_hosts[1], 80, 5);
		$_server3_ping = ping($_hosts[2], 80, 5);
		if ($_server1_ping != "Down") {
			echo "<h3>YouTube status: ", $_server1_ping, " ping</h3>";
		}
		else {
			echo "<h3>YouTube status: Down";
		}
		if ($_server2_ping != "Down") {
			echo "<h3>Google status: ", $_server2_ping, " ping</h3>";
		}
		else {
			echo "<h3>Google status: Down";
		}
		if ($_server3_ping != "Down") {
			echo "<h3>Instagram status: ", $_server3_ping, " ping</h3>";
		}
		else {
			echo "<h3>Instagram status: Down";
		}
		?>
		<a href="check_own_server.php" ><img src="http://serverchecker.rf.gd/cdn/static/design-assets/checkserver_button.png" /></a>
	</body>
</html>