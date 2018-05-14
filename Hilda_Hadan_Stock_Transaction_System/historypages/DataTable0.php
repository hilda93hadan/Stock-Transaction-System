<!DOCTYPE html>
<html>
<head leng="en">
	<link href="../css/DataTableFull.css" rel="stylesheet">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width" />
	
</head>
<body>
<?php
error_reporting(E_ALL);
ini_set('display_errors',1);

  $hn = 'localhost';
$db = 'project_ii';
$un = 'root';
$pw = 'XcuT8b46urir';

  $conn = new mysqli($hn, $un, $pw, $db);
  
  if ($conn->connect_error) die($conn->connect_error);
  
    if (isset($_POST['delete']) && isset($_POST['id']))
  {
    $id   = get_post($conn, 'id');
    $query  = "DELETE FROM mystock WHERE id='$id'";
    $result = $conn->query($query);
    if (!$result) echo "DELETE failed: $query<br>" .
      $conn->error . "<br><br>";
  }
  
      if (isset($_POST['update']) && isset($_POST['update_id']))
  {
    $update_id   = get_post($conn, 'update_id');
	session_start();
	$_SESSION['update_id']=$update_id; 
	echo "<script>window.open('../php/UpdateWindow.php','width=320,height=320')</script>";
    
  }

  function get_post($conn, $var)
  {
    return $conn->real_escape_string($_POST[$var]);
  }
  
  $query  = "SELECT * FROM mystock";
  $result = $conn->query($query);
  if (!$result) die ("Database access failed: " . $conn->error);

  $rows = $result->num_rows;
  echo "
  <table>
  <tr>
  <th>Transaction Date</th>
  <th>Stock Ticker Symbol</th>
  <th>Price per Share</th>
  <th>Number of Shares</th>
  <th>Currency</th>
  <th>Comments</th>
  <th>DELETE</th>
  <th>UPDATE</th>
  </tr>";
  for ($j = 0 ; $j < $rows ; ++$j)
  {
    $result->data_seek($j);
    $row = $result->fetch_array(MYSQLI_NUM);
  echo"<tr>";
  echo"<td>".$row[1]."</td>";
  echo"<td>".$row[2]."</td>";
  echo"<td>".$row[3]."</td>";
  echo"<td>".$row[4]."</td>";
  echo"<td>".$row[5]."</td>";
  echo"<td>".$row[6]."</td>";
  echo"<td><form action='DataTable0.php' method='post'><input type='hidden' name='delete' value='yes'><input type='hidden' name='id' value='$row[0]'><input type='submit' value='DELETE'></form></td>";
  echo"<td><form action='DataTable0.php' method='post'><input type='hidden' name='update' value='yes'><input type='hidden' name='update_id' value='$row[0]'><input type='submit' value='UPDATE'></form></td>";
  echo"</tr>";

}
  echo "</table>";
  

?>
</body>
</html>
		