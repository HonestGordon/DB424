<?php
session_start();
require 'db.php';
$image = null;
if ($_FILES['image']['name']) {
    $target_file = $_SESSION['user']['studentID'].'.'
    .pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
    if (move_uploaded_file($_FILES["image"]["tmp_name"],
     "Images/profile/$target_file")) {
        $image = $target_file;
        }    
}
$sql = "UPDATE student
SET firstName='{$_POST['firstName']}',
 lastName='{$_POST['lastName']}',
  majorID='{$_POST['majorID']}'"
.($image?", image='$image'":'')

." WHERE studentID='{$_SESSION['user']['studentID']}'";
$conn->query($sql);
$conn-> close();
clearstatcache();
header('location:/lab7/index.php');