<!doctype html>
<head>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.2/raphael-min.js"></script>
  <script src="../morris.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/prettify/r224/prettify.min.js"></script>
  <script src="lib/example.js"></script>
  <link rel="stylesheet" href="lib/example.css">
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/prettify/r224/prettify.min.css">
  <link rel="stylesheet" href="../morris.css">
</head>
<body>
<h1>Bar charts</h1>
<div id="graph"></div>
<pre id="code" class="prettyprint linenums">
// Use Morris.Bar

<?php
$host = "127.0.0.1";
$db_name = "e_sep";
$username = "root";
$password = "";
include('dbc.php');
try {
	$con = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
}catch(PDOException $exception){ //to handle connection error
	echo "Connection error: " . $exception->getMessage();	
}
$q1 = mysql_query("select distinct * from shop_dues");	
//$q2 = mysql_query("select signup_date from users");


	//echo $dn1['username'];
	

?>

Morris.Bar({
  element: 'graph',
  axes: false,
  data: [
  
  <?php while($dn1 = mysql_fetch_array($q1)){ ?>
  
    {x: <?php  echo $dn1['emp_id']; ?>, y: <?php  echo $dn1['price']; ?>, z: <?php  echo $dn1['paid']; ?>, a: <?php  echo $dn1['dues']; ?>},
    <?php } ?>
  ],
  xkey: 'x',
  ykeys: ['y', 'z', 'a'],
  labels: ['Y', 'Z', 'A']
});
</pre>
</body>