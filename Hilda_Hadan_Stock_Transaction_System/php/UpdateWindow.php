<!DOCTYPE html>
<html>
<head>
</head>
<body>


<?php
/*error_reporting(E_ALL);
ini_set('display_errors',1);*/

$DateErr = $SymbolErr = $PriceperShareErr = $NumberofSharesErr = "";
$TransactionDate = $StockTickerSymbol = $PriceperShare = $NumberofShares = $currency = $comments = "";


$hn = 'localhost';
$db = 'project_ii';
$un = 'root';
$pw = 'XcuT8b46urir';

  $conn = new mysqli($hn, $un, $pw, $db);
  
  if ($conn->connect_error) die($conn->connect_error);
  
session_start();
$update_id=$_SESSION['update_id'];
/*echo $update_id;*/

$query  = "SELECT * FROM mystock WHERE id=$update_id";
$result = $conn->query($query);
if (!$result) die ("Database access failed: " . $conn->error);

$row = $result->fetch_assoc();

$TransactionDate = $row["TransactionDate"];
$StockTickerSymbol = $row["StockTickerSymbol"];
$PriceperShare = $row["PriceperShare"];
$NumberofShares = $row["NumberofShares"];
$currency = $row["Currency"];
$comments = $row["Comments"];

/*echo $comments;*/

if ($_SERVER["REQUEST_METHOD"] == "POST") {	
$validation=TRUE;
	if (empty($_POST["TransactionDate"])) {
		$DateErr = "Transaction Date is required";
		$validation=FALSE;
	} else {
		$TransactionDate = test_input($_POST["TransactionDate"]);
		if (!preg_match("/^(\d{2})-(\d{2})-(\d{4})$/",$TransactionDate)) {
			$DateErr = "Date format: mm-dd-yyyy";
			$validation=FALSE;
		}
	}
	
	if (empty($_POST["StockTickerSymbol"])) {
		$SymbolErr = "Stock Ticker Symbol is required";
		$validation=FALSE;
	} else {
		$StockTickerSymbol = test_input($_POST["StockTickerSymbol"]);
	}
	
	if (empty($_POST["PriceperShare"])) {
		$PriceperShareErr = "Price per Share is required";
		$validation=FALSE;
	} else {
		$PriceperShare = test_input($_POST["PriceperShare"]);
		if (!preg_match("/^[0-9]*$/",$PriceperShare)) {
			$PriceperShareErr = "Only numbers allowed";
			$validation=FALSE;
		}
	}
	
	if (empty($_POST["NumberofShares"])) {
		$NumberofSharesErr = "Number of Shares is required";
		$validation=FALSE;
	} else {
		$NumberofShares = test_input($_POST["NumberofShares"]);
		if (!preg_match("/^[0-9]*$/",$NumberofShares)) {
			$NumberofSharesErr = "Only numbers allowed";
			$validation=FALSE;
		}
	}

	$currency = test_input($_POST["currency"]);
	$comments = test_input($_POST["comments"]);
	
}	
	function test_input($data) {
		$data = trim($data);
		$data = stripcslashes($data);
		$data = htmlspecialchars($data);
		return $data;
}

function get_post($conn, $var)
  {
    return $conn->real_escape_string($_POST[$var]);
  }
  
  if ($validation==TRUE){
	if (isset($_POST['TransactionDate']) && isset($_POST['StockTickerSymbol']) && isset($_POST['PriceperShare']) && isset($_POST['NumberofShares']) && isset($_POST['currency']))
	{
		$TransactionDate   = get_post($conn, 'TransactionDate');
		$StockTickerSymbol = get_post($conn, 'StockTickerSymbol');
		$PriceperShare = get_post($conn, 'PriceperShare');
		$NumberofShares = get_post($conn, 'NumberofShares');
		$currency = get_post($conn, 'currency');
		$comments = get_post($conn, 'comments');
		$query    = "UPDATE mystock SET TransactionDate='$TransactionDate', StockTickerSymbol='$StockTickerSymbol', PriceperShare='$PriceperShare', NumberofShares='$NumberofShares', currency='$currency', comments='$comments' WHERE id=$update_id";
		$result   = $conn->query($query);
		if($result) {echo "<script>alert('Update Successful!');</script>";}
		if (!$result) echo "UPDATE failed: $query<br>" .
		$conn->error . "<br><br>";
		echo "<script>window.close();</script>";
  }
}

?>

<h1>Update a Record</h1>
		<div class="choice">
			<form name="newrecord" id="mainForm" method="post"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				<fieldset>
					<legend>Please update the following information:</legend>
					<div class="newrecordform">
					<p>
						<label>Transaction Date:</label>
						<input type="text" name="TransactionDate" class="required" id="Transaction-Date" value="<?php echo $TransactionDate;?>"> <sup>*</sup>
						<span id="demo1"><?php echo $DateErr;?></span>
					</p>
					<p>
						<label>Stock Ticker Symbol:</label>
						<input type="text" name="StockTickerSymbol" id="Stock-Ticker-Symbol" list="symbol" class="required" value="<?php echo $StockTickerSymbol;?>"> <sup>*</sup>
							<datalist id="symbol">
								<option>NASDAQ:AAPL</option>
								<option>NYSE:XOM</option>
								<option>NASDAQ:GOOG</option>
								<option>NYSE:BUD</option>
								<option>NYSE:HOG</option>
							</datalist>
						<span id="demo2"><?php echo $SymbolErr;?></span>
					</p>
					<p>
						<label>Price per Share:</label>
						<input type="number" min="0" name="PriceperShare" id="Price-per-Share" class="required" value="<?php echo $PriceperShare;?>"> <sup>*</sup>
						<span id="demo3"><?php echo $PriceperShareErr;?></span>
					</p>
					<p>
						<label>Number of Shares:</label>
						<input type="number" min="0" name="NumberofShares" class="required" id="Number-of-Shares" value="<?php echo $NumberofShares;?>"> <sup>*</sup>
						<span id="demo4"><?php echo $NumberofSharesErr;?></span>
					</p>
					<p>
						<label>Currency:</label>
						<select name="currency" class="required" value="<?php $currency;?>"> 
							<option>AUD - Australian Dollar</option>
							<option>CAD - Canadian Dollar</option>
							<option>EUR - Euro</option>
							<option>HKD - Hong Kong Dollar</option>
							<option selected>USD - US Dollar</option>
						</select> <sup>*</sup>
						<span id="demo5"></span>
					</p>
					<p>
						<label>Comments:</label><br>
						<textarea rows="6" cols="40" name="comments"><?php echo $comments;?></textarea>
					</p>
						<input type="submit" value="UPDATE" id="update">&nbsp;
					</div>
					
					<?php
/*echo "<h2>Your Inputs:</h2>";
echo $TransactionDate;

echo $StockTickerSymbol;

echo $PriceperShare;

echo $NumberofShares;

echo $currency;

echo $comments;*/

?>
				</fieldset>
			</form> 
		</div>
</body>
</html>