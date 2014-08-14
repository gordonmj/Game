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
for($i=1;$i<=4;$i++){
$card = array_shift($deck);
echo "Card " . $i . " is " . $card['face'] . ' of ' . $card['suit'] . "s<br>";
}
echo "Bet on what the fifth card will be. (Careful, there are 2 jokers!)<br>"; 
echo "You have $";
echo $cash . "<br>";
$_SESSION['deck'] = $deck;
?>
<p>How would you like to place your bets?</p>
<form action="Deal.php" method="post">
<table>
<tr>
<td>Ace (13:1 odds): <input type="text" name="Ace"><br></td>
<td>Two (13:1 odds): <input type="text" name="Two"><br></td>
<td>Three (13:1 odds): <input type="text" name="Three"></td>
</tr>
<tr>
<td>Four (13:1 odds): <input type="text" name="Four"></td>
<td>Five (13:1 odds): <input type="text" name="Five"></td>
<td>Six (13:1 odds): <input type="text" name="Six"></td>
</tr>
<tr>
<td>Seven (13:1 odds): <input type="text" name="Seven">  </td>
<td>Eight (13:1 odds): <input type="text" name="Eight"></td>
<td>Nine (13:1 odds): <input type="text" name="Nine"></td>
</tr>
<tr>
<td>Ten (13:1 odds): <input type="text" name="Ten"></td>
<td>Jack (13:1 odds): <input type="text" name="Jack"></td>
<td>Queen (13:1 odds): <input type="text" name="Queen"></td>
</tr>
<tr>
<td>King (13:1 odds): <input type="text" name="King"></td>
<td>

</td>
<td>

</td>
</tr>  
<tr>
<td>Spade (4:1 odds): <input type="text" name="Spade"></td>
<td>Heart (4:1 odds): <input type="text" name="Heart"></td>
<td>Club (4:1 odds): <input type="text" name="Club"></td>
</tr>
<tr>
<td>Diamond (4:1 odds): <input type="text" name="Diamond"></td>
<td></td>
<td></td>
</tr> 
</table>
<input type="submit" value="Bet!">
</body>
</html>
