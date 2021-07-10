<?php
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
	<body style="background-color: rgb(56, 60, 60);" >
		<img src="http://serverchecker.rf.gd/cdn/static/logo.png" align="center" alt="Server Checker"/>
		<p style="font-size: 1px;" >&nbsp;</p>
		<img src="http://serverchecker.rf.gd/cdn/static/design-assets/checkownserver_textdesign.png" />
		<form action="" method="post">
			<p style="color: rgb(50, 140, 100);" >Server hostname or IP: <input type="text" name="server" ></p>
			<p style="color: rgb(50, 140, 100);" >Server port: <input type="number" name="port" placeholder="80" ></p>
			<button type="submit" name="check" >Check server now</button>
		</form>
		<?php
		if (isset($_POST["check"])) {
			if ($_POST["port"] == "") {
				$_server_port = 80;
			}
			else {
				$_server_port = $_POST["port"];
			}
			$_server_ping = ping($_POST["server"], $_server_port, 5);
			if ($_server_ping != "Down") {
				echo '<p style="font-size: 3px" >&nbsp;</p>';
				echo '<p style="color: green;" >Server status: Up</p>';
				echo '<p style="color: green;" >Server ping: ', $_server_ping, "</p>";
			}
			else {
				echo '<p style="font-size: 3px" >&nbsp;</p>';
				echo '<p style="color: red;" >Server status: Down</p>';
				echo '<p style="color: red;" >Server ping: N/A</p>';
			}
		}
		?>
	</body>
</html>