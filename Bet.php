<!DOCTYPE html>
<html>
<head>
<title>Place your bets!</title>
</head>
<body>
<?php
session_start();
$cash = intval($_SESSION['cash']);
$deck = $_SESSION['deck'];
echo "You have $";
echo $cash . "<br>";
echo "<p>How would you like to place your bets?</p>";
echo "<form action="Deal.php" method="post">";
echo "Odd: <input type="text" name="odd"><br>";
echo "Even: <input type="text" name="even"><br>";
echo "Red: <input type="text" name="red"><br>";
echo "Black: <input type="text" name="black"><br>";
echo "<input type="hidden" value="$cash" name="cash">";
echo "<input type="submit" value="Bet!">";
?>
</body>
</html>
