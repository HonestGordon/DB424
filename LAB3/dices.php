<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dice Roller</title>
</head>
<body>
    <?php
    function roll($score = true) {
        $dice1 = rand (1, 6);
        $dice2 = rand (1, 6);
        return "2 Dice roll ". ($score? "=> $dice1 + $dice2 " : '')
        . ("=> ผลรวมคือ ". $dice1+$dice2);
    }
    ?>
    <h3>without score</h3>
    <?php echo roll(false); ?>
    <h3>without score</h3>
    <?php echo roll(); ?>
</body>
</html>