<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Fundamental 1 </title>
</head>
<body>
    <!
<?php
$a = 100;
$b = 255;
$c = 'Hello';
$d = 'World';
?>
<h3>ผลการทำงานใน PHP</h3>
<pre> 
$a = <?php echo $a;?>;
$b = <?php echo $b;?>;
$c = <?php echo $c?>;
$d = <?php echo $d?>;
##########
$a + $b จะมีค่าเป็น <?php echo $float5 = $a + $b?>;

$c.' '.$d จะมีค่าเป็น Hello World
 <?php echo "$c $d" ?>
</pre>

<?php
 $words ='apple banana orange';
 $space1 = strpos($words,' ');
 $space2 = strpos($words,' ',$space1+1)
?>

<pre>
##########
$words คำที่ 1 คือ <?php echo substr($words,0, $space1);?> 
$words คำที่ 2 คือ <?php echo substr($words, $space1+1, $space2-$space1-1); ?> 
$words คำที่ 3 คือ <?php echo substr($words , $space2+1); ?> 
ตัวอักษรที่สุ่มได้จาก $words คือ "<?php echo substr($words,rand(0, strlen($words)-1),1); ?>"
</pre>

</body>
</html>