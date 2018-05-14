 <!DOCTYPE html>
<html>

<head lang="en">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width" />
	<title>NewRecordPage</title>
	<link href="css/NewRecordPage-desktop.css" rel="stylesheet" media="screen and (min-width:845px)">
	<link href="css/NewRecordPage-mobile.css" rel="stylesheet" media="screen and (max-width:844px)">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/evil-icons/1.9.0/evil-icons.min.css">
	<script src="https://cdn.jsdelivr.net/evil-icons/1.9.0/evil-icons.min.js"></script>
	<script type="text/javascript" src="js/NewRecordPage.js"></script> 
</head>

<body>

<?php


$DateErr = $SymbolErr = $PriceperShareErr = $NumberofSharesErr = "";
$TransactionDate = $StockTickerSymbol = $PriceperShare = $NumberofShares = $currency = $comments = "";

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

  $hn = 'localhost';
$db = 'project_ii';
$un = 'root';
$pw = 'XcuT8b46urir';

$conn = new mysqli($hn, $un, $pw, $db);

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
		$query    = "INSERT INTO mystock (TransactionDate, StockTickerSymbol, PriceperShare, NumberofShares, currency, comments)  VALUES" .
		"('$TransactionDate', '$StockTickerSymbol', '$PriceperShare', '$NumberofShares', '$currency','$comments')";

		$result   = $conn->query($query);
		if($result) {echo "<script>alert('Insert Successful!');</script>";}
		if (!$result) echo "INSERT failed: $query<br>" .
		$conn->error . "<br><br>";
  }
}

?>

	<div class="topnav">
		<ul>
			<li>
				<div class="logo">
					<img src="images/logo.png" alt="Logo" title="Stock Transaction System" style="width:100px;">
				</div>		
			</li>
			<li><a href="HomePage.html" target="_self">Home</a></li>
			<li  class="active"><a href="NewRecordPage.php">New</a></li>
			<li><a href="AllRecordsPage.html" target="_self">History</a></li>
			<li><a href="#">Search</a></li>
			<li><a href="#">Commodities</a></li>
			<li><a href="#">Futures</a></li>
			<li class="right"><a href="#">About Us</a></li>
		</ul>
		<div class="mobilehead">
			<div class="mob-sidnav-open">
				<span id="mob-sidnav-open">
					<div data-icon="ei-navicon" class="open-icon" id="open-icon"></div>
				</span>
				<div class="mob-hd-container">
					<img src="images/logo.png" alt="Logo" title="Stock Transaction System" style="width:100px;">
				</div>
			</div>
		</div>
		<div id="mob-sidnav-container" class="mob-sidnav-container">
			<a href="javascript:void(0)" id="closebtn">&times;</a>
			<a href="HomePage.html" target="_self">Home</a>
			<a href="NewRecordPage.html" target="_self" id="active">New</a>
			<a href="AllRecordsPage.html" target="_self">History</a>
			<a href="#">Search</a>
			<a href="#">Commodities</a>
			<a href="#">Futures</a>
			<a href="#">About Us</a>
		</div>
	</div>
	<div class="sidenav" id="sidenav">
		<nav>
		<div class="bh3">
			<h3>Stocks</h3>
		 </div>
         <div class="stocknews">
			<article class="artic1">
				<time>
					<img src="images/clock.PNG" style="width:15px;height=15px;"> 3/2/2017
				</time>
				<div class="news1">
					<a href="#"> Libya's Biggest Oil Port Seized in Blow to Production Surge</a>
				</div>
			</article>
			<article class="artc2">
				<time>
					<img src="images/clock.PNG" style="width:15px;height=15px;"> 3/2/2017
				</time>
				<div class="news2">
					<a href="#">Caterpillar Goes From White House Kudos to Multi-Agnecy Raid</a>
				</div>
			</article>
			<article class="artc3">
				<time>
					<img src="images/clock.PNG" style="width:15px;height=15px;"> 3/2/2017
				</time>
				<div class="news3">
					<a href="#">Bitcoin Is Now Worth More Than Gold</a>
				</div>
			</article>
			</div>
		</nav>
	</div>
	<div class="main" id="main">
		<h1>Input a New Record</h1>
		<div class="choice">
			<form name="newrecord" id="mainForm" method="post"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				<fieldset>
					<legend>Please input the following information:</legend>
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
						<textarea rows="6" cols="40" placeholder="Optional" name="comments"></textarea>
					</p>
						<input type="submit" value="submit" id="submit">&nbsp;
						<input type="reset" value="reset">
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
	</div>
	<div class="bottomnav">
		<nav>
		<a href="#"><img src="images/question-mark.png" style="width:18px;height:18px;">&nbsp;Help</a>
		</nav>
	</div>

	<footer id="footer">
	<br>
		<ul>
			<div class="f1">
				<a href="#" style="float:left;">Term of Service</a>&nbsp;|&nbsp;<a href="#">Trademarks</a>&nbsp;|&nbsp;<a href="#">Privacy Policy</a>
				<div style="float:right;"><a href="#">Careers</a>&nbsp;|&nbsp;<a href="#">Advertise</a></div>
			</div>
			<br>
			<div class="f2">	
				<em>&copy; 2017 XXXXXXXXX. All Right Reserved</em>
				<div style="float:right;"><a href="#">Website Feedback</a></div>
			</div>
		</ul>
</body>

</html>