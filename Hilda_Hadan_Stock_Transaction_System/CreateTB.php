<?php  
 $server = "localhost";   
 $username = "root";   
 $password = "XcuT8b46urir";  
 
 // Create connection   
 $conn = new mysqli($server, $username, $password);  
  
  // Check connection   
  if ($conn->connect_error) {     
  die("Connection failed: " . $conn->connect_error);   } 
	echo "Connected successfully";  
	
	$sql = "CREATE DATABASE " . "project_II" ;
echo "<br/>";
echo "Create db sql: " . $sql;
if ($conn->query($sql) === TRUE) {
     echo "<br/>";
     echo "Database created successfully";
}   else {
     echo "<br/>";
     die("Die - Create DB failed: " . $conn->error);
}

// Close connection then reopen with $db
$conn->close();
 $conn = new mysqli($server, $username, $password, "project_II");
if ($conn->connect_error) {
   echo "<br/>";
   die("Connection with db failed: " . $conn->connect_error);
}  else {
     echo "<br/>";
     echo "Connection with db: $db succeeded";
}


$sql = "CREATE TABLE mystock (" .
 "id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, " .
 "TransactionDate VARCHAR(30) NOT NULL, " .
 "StockTickerSymbol VARCHAR(30) NOT NULL,".
 "PriceperShare INT(10) NOT NULL,".
 "NumberofShares INT(10) NOT NULL,".
 "Currency VARCHAR(30) NOT NULL,".
 "Comments VARCHAR(200) NOT NULL)";

echo "<br/>";
echo "sql for create table: " . $sql;

if ($conn->query($sql) === TRUE) {
    echo "<br/>";
    echo "Table created successfully";

} else {
    echo "<br/>";
    echo "Error creating table: " . $conn->error;

}

echo "<br/>";
echo "Connected successfully";


$sql = "Show DATABASE";
$result = $conn->query($sql);
while ($row = $result ->fetch_assoc()) {
	echo $row["Database"]."\n";
}
?>