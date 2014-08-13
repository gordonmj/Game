<!DOCTYPE html>
<html>
<head>
<title>Start the game</title>
</head>
<body>
<?php
session_start();
$suits = array (
    " of Spades", " of Hearts", " of Clubs", " of Diamonds"
);

$faces = array (
    2, 3, 4, 5, 6, 7, 8, 9, 10, "Jack", "Queen", "King", "Ace"
);

$deck = array();

foreach ($suits as $suit) {
    foreach ($faces as $face) {
        $deck[] = array ("face"=>$face, "suit"=>$suit);
    }
}
$Joker = array("face"=>"Joker", "suit"=>"");
$deck[] = $Joker;
$deck[] = $Joker;
shuffle($deck);

$_SESSION['deck'] = $deck;
/*
foreach($deck as $card){
  echo $card['face'] . $card['suit'] . '<br>';
}
*/
?>
<p>You start with $100.</p>
<form action="Bet.php" method="post">
<input type="hidden" name="cash" value=100>
<input type="submit" value="Play!">
</form>
</body>
</html>
