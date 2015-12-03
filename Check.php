<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<title>Place your bets!</title>
</head>
<body>
<?php
$cash = intval($_SESSION["cash"]);
$facebets = array ("Ace"=>0,"Two"=>0,"Three"=>0,"Four"=>0,"Five"=>0,"Six"=>0,"Seven"=>0,"Eight"=>0, "Nine"=>0,"Ten"=>0,"Jack"=>0,"Queen"=>0,"King"=>0);
$suitbets = array("Spade"=>0,"Club"=>0,"Heart"=>0,"Diamond"=>0);
$totalbet = 0;
foreach($facebets as $face=>$bet){
  $totalbet += intval($_POST[$face]);
  
}


foreach($suitbets as $suit=>$bet){
  $totalbet += intval($_POST[$suit]);
}

if($cash - $totalbet < 0){
  echo "You bet too much. Try again.<br>";
  Header("http://venus.cs.qc.edu/~mgordon/Game2/Bet.php");
}
else {
  echo "You have $" . $cash-$totalbet . " left.<br>";
  Header("http://venus.cs.qc.edu/~mgordon/Game2/Deal.php");
}
?>
</body>
</html>
