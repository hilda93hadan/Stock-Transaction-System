<?php
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

  if (isset($_POST['TransactionDate'])   && isset($_POST['StockTickerSymbol']) && isset($_POST['PriceperShare']) && isset($_POST['NumberofShares']) && isset($_POST['currency']) )
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
    if (!$result) echo "INSERT failed: $query<br>" .
      $conn->error . "<br><br>";
  }
  echo <<<_END
  <form name="newrecord" id="mainForm" method="post">
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
						<input type="number" min="0" step="20" name="NumberofShares" class="required" id="Number-of-Shares" value="<?php echo $NumberofShares;?>"> <sup>*</sup>
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
					</div></fieldset></form>
_END;

  $query  = "SELECT * FROM mystock";
  $result = $conn->query($query);
  if (!$result) die ("Database access failed: " . $conn->error);

  $rows = $result->num_rows;

  for ($j = 0 ; $j < $rows ; ++$j)
  {
    $result->data_seek($j);
    $row = $result->fetch_array(MYSQLI_NUM);
    echo <<<_END
  <pre>
        id $row[0]
    Transaction Date $row[1]
    Stock Ticker Symbol $row[2]
	Price per Share $row[3]
	Number of Shares $row[4]
	Currency $row[5]
	Commnets $row[6]
  </pre>
  <form action="lab9-exercise03.php" method="post">
  <input type="hidden" name="delete" value="yes">
  <input type="hidden" name="id" value="$row[0]">
  <input type="submit" value="DELETE RECORD"></form>
_END;
  }

  $result->close();
  $conn->close();

  function get_post($conn, $var)
  {
    return $conn->real_escape_string($_POST[$var]);
  }
?>

