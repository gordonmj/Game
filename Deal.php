<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<link type="text/css" rel="stylesheet" href="stylesheet.css"/>
<title>Place your bets!</title>
</head>
<body>
<?php
$cash = intval($_SESSION["cash"]);
$deck = $_SESSION["deck"];
$card = array_shift($deck);
echo $card['face'] . ' of ' . $card['suit'] . "s<br>";
$facebets = array ("Ace"=>0,"Two"=>0,"Three"=>0,"Four"=>0,"Five"=>0,"Six"=>0,"Seven"=>0,"Eight"=>0, "Nine"=>0,"Ten"=>0,"Jack"=>0,"Queen"=>0,"King"=>0);
$suitbets = array("Spade"=>0,"Club"=>0,"Heart"=>0,"Diamond"=>0);
$totalbet = 0;
$allbetsvalid = true;
foreach($facebets as $face=>$bet){
  $facebets[$face] = intval($_POST[$face]);
  if($facebets[$face] < 0) {
  echo "You placed an invalid bet of " . $facebets[$face] . " on " . $face . ".<br>";
  $allbetsvalid = false;
  break;
  }
  $totalbet += intval($_POST[$face]); 
}


foreach($suitbets as $suit=>$bet){
  $suitbets[$suit] = intval($_POST[$suit]);
 if($suitbets[$suit] < 0) {
  echo "You placed an invalid bet of " . $suitbets[$suit] . " on " . $suit . ".<br>";
  $allbetsvalid = false;
  break;
  }
  $totalbet += intval($_POST[$suit]); 
}

if($cash - $totalbet >= 0 && $allbetsvalid){
foreach($facebets as $face => $bet){
  if($facebets[$face]!=0){
   $bets = $facebets[$face];
   if($card['face']==$face){
      $cash+=(13*$bets);
      echo "You won $" . 13*$bets . " with your bet on " . $face . ".<br>"; 
   }//card match
   else{
  	$cash -=$bets; 
	echo "You lost $" . $bets . " with your bet on " . $face . ".<br>";
   }//card not match
}//if bet wasn't zero
}//foreach

foreach($suitbets as $suit=>$bet){
  if($suitbets[$suit]!=0){
  $bets = $suitbets[$suit];
  if($card['suit']==$suit){
	 $cash +=(4*$bets);
	echo "You won $" . 4*$bets . " with your bet on " . $suit . ".<br>";	
}//card match
  else{ 
	$cash -=$bets;
	echo "You lost $" . $bets . " with your bet on " . $suit . ".<br>";
}//card not match
}//if bet wasn't zero
}//foreach

echo "You have $";
echo $cash . "<br>";
$_SESSION["cash"] = $cash;
if($cash==0){
  echo "You lost. Sorry.<br>";
}

if(count($deck)<5){

echo "Deck is being reshuffled.<br>";
$suits = array ("Spade", "Heart", "Club", "Diamond");

$faces = array ("Two","Three","Four","Five","Six","Seven","Eight","Nine","Ten", "Jack", "Queen", "King", "Ace");


foreach ($suits as $suit) {
    foreach ($faces as $face) {
        $deck[] = array ("face"=>$face, "suit"=>$suit);
    }
}
$Joker = array("face"=>"Joker", "suit"=>"Wild");
$deck[] = $Joker;
$deck[] = $Joker;
shuffle($deck);

}
$_SESSION["deck"] = $deck;
}
else {
  echo "Your bet was invalid. Do not bet more than you have. Do not bet a negative amount.<br>";
}
?>
<form action="Bet.php" method="post">
<input type="submit" value="Continue."></form><p>
<form action="Start.php" method="link">
<input type="submit" value="Play a new game."></form>
</body>
</html>
