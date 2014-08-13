<!DOCTYPE html>
<html>
<head>
<title>Place your bets!</title>
</head>
<body>
<?php
session_start();
$cash = intval($_SESSION["cash"]);
$deck = $_SESSION["deck"];
$odd = intval($_POST["odd"]);
$even = intval($_POST["even"]);
$black = intval($_POST["black"]);
$red = intval($_POST["red"]);
$cash = $cash - ($odd + $even + $black + $red);
echo "You bet:<br>";
echo $odd . " on odd.<br>";
echo $even . " on even.<br>";
echo $black . " on black.<br>";
echo $red . " on red.<br>";
echo "You have $";
echo $cash . "<br>";

$_SESSION["cash"] = $cash;
?>
<form action="Bet.php" method="post">
<input type="submit" value="Bet again!">
</body>
</html>
