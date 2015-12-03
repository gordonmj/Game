<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<link type="text/css" rel="stylesheet" href="stylesheet.css"/>
<title>Start the game</title>
</head>
<body>
<h1>Welcome!</h1>
<p>This is a simple betting game involving a deck of 54 cards (2 jokers).<br>
Four cards will be dealt and you will place bets on the qualities of the fifth card (face and suit).<br>
Payouts for the bets are (roughly) proportional to the probability.</p>
<p>Creator: Michael Gordon, Adjunct Lecturer, Queens College, CUNY</p>
<p>You start with $100.</p>
<?php
$suits = array ("Spade", "Heart", "Diamond", "Club");

$faces = array ("Ace", "Two","Three","Four","Five","Six","Seven","Eight","Nine","Ten", "Jack", "Queen", "King");

$deck = array();
$imgnum = 127137;
$imgcode = "&#".$imgnum;
foreach ($suits as $suit) {
    foreach ($faces as $face) {
        $deck[] = array ("face"=>$face, "suit"=>$suit, "img"=>$imgcode);
        $imgcode = "&#".++$imgnum;
    }
}
$Joker = array("face"=>"Joker", "suit"=>"Joker");
$deck[] = $Joker;
$deck[] = $Joker;
/*
foreach($deck as $card){
  $str = $card['face'] . " of " . $card['suit'] . "s " . $card['img'];
  echo "<p style="font-family:Symbola"> $str </p>";
}
*/
shuffle($deck);

$_SESSION['deck'] = $deck;
$_SESSION['cash'] = 100;



?>
<form action="Bet.php" method="post">
<input type="submit" value="Play!">
</form>
<p>
<b>Future Improvements:</b></p>
<ul>
<li>Enhanced appearance with CSS</li>
<li>Quicker and more detailed betting options</li>
<li>List of high scores</li>
<li>Removal of deprecating HTML tags, if any</li>
</ul>
</p>
<p>The next version will probably be in JavaScript</li></p>
<p>Feedback is welcome. If you're viewing this, you should already have my contact info. :) </p>
</body>
</html>
