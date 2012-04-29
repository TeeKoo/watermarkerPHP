<?php
$servername = "kalorikulutus.fi";
$username = "USERNAME";
$password = "PASSWORD";
include 'indexi.html';


function connectionSQL(){
$con = mysql_connect($GLOBALS['servername'],$GLOBALS['username'],$GLOBALS['password']);

	if(!$con){
	die('could not connect: ' . mysql_error());
		echo "Could not connect to SQL database" + $GLOBALS['servername'] + $GLOBALS['username'] + $GLOBALS['tulppat'];
	}
	mysql_select_db("kaloriku_PICS", $con);
	$result = mysql_query("SELECT * FROM watermark ORDER BY idwatermark DESC LIMIT 10");
	  echo '<script> $("#sqlpre").html("';
	  echo "<table width='400' style='table-layout: fixed' cellpadding='3'> <th align='left' >Last 10 watermarked pictures</th>";
	while($row = mysql_fetch_array($result))
  {
  echo "<tr><td><a href='" . $row['pic_url'] . "'> ". $row['pic_url'] ."</a></td></tr>";

  }
  echo "</table>";
  echo '"); </script>';
	mysql_close($con);
}

connectionSQL();

?>
