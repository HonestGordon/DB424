<?php
$dok = explode(',','spades,hearts,clubs,diams');
$tam = explode(',','A,2,3,4,5,6,7,8,9,10,J,Q,K');
$deck = [];
foreach($tam as $t) {
    foreach($dok as $d) {
$deck[] = ['tam'=>$t,'dok'=>$d];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poker</title> 
    <style>
        .spades,.clubs {
            color : black ;
        }
        .hearts,.diams {
            color : red ;
        } 
    </style>
</head>
<body>
    <h1>ไพ่ที่ได้</h1>
    <?php
    $index1 = rand(1, count($deck)) - 1; //นับใบว่ามีกี่ใบ ส่วน style ข้างบนคื่อการกำหนดค่าสีของindexต่างๆตาม
    $card1 = $deck[$index1]; 
    unset($deck[$index1]); //เอาออกไป1ใบ
    sort($deck); //เลียงลำดับตัวเลขใหม่เมื่อเอาไพ่ออกไปแล้ว1ใบ
    $index2 = rand(1, count($deck)) - 1; //สุ่มเลขตั้งแต่1ถึงเท่าไหร่$deckคือแล้วแต่ว่ามีกี่ใบในindex
    $card2= $deck[$index2];

    //print_r($card1);
    //. คือการนำมาต่อกัน
    //print_r($card2);  //print_r($card2)
    //
    ?>
  <span class= "<?php echo $card1['dok']; ?>">
    <?php echo $card1['tam'].'&'.$card1['dok'].';'; ?>
  </span>
  +
  <span class = "<?php echo $card2['dok']; ?>">
  <?php echo "{$card2['tam']}&{$card2['dok']};"; ?>
</span>
   </h1>
</body>
</html>