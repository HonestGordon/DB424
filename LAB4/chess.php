<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chess Board</title>
    <style>
        td {
            border: 1px solid;
            width: 50px;
            height: 50px;
        }
        table {
            border-spacing : 0;
            border: 1px solid;
        }
.white {
    background-color: white;
}
        .black {
            background-color: black;
        }
    </style>
</head>
<table>
    <tr>
       <!-- <td class="white"></td>
        <td class="black"></td>

    </tr>
    <tr>
        <td class="black"></td>
        <td class= "white"></td> -->

     
    </tr>
    <?php
    for ($i = 0; $i < 8; $i++) {
        echo '<tr>' ;
        for($j = 0; $j <8; $j++){
            $class = ($i + $j) % 2 == 0 ? 'black': 'white';
            echo "<td class='{$class}'></td>";
        }
        echo '</tr>' ;
        
    }
    ?>
</table>
<body>
    
</body>
</html>