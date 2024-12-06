<?php
session_start(); //เป็นการเชื่อมให้ทำงานร่วมกัน ต้องใส่บรรทัดแรก
if (!isset($_SESSION['user'])){
    header('location: signin.html');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Activity</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
</head>
<body class= "p-3">
<div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 link-body-emphasis text-decoration-none">
        <img src="images/LOGO.png" alt="logo" style= "height:32px;">
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="#" class="nav-link px-2 link-secondary">Overview</a></li>
          <li><a href="#" class="nav-link px-2 link-body-emphasis">Inventory</a></li>
          <li><a href="#" class="nav-link px-2 link-body-emphasis">Customers</a></li>
          <li><a href="#" class="nav-link px-2 link-body-emphasis">Products</a></li>
        </ul>

        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
          <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
        </form>

        <?php
        require 'db.php';
        $sql = "select image from student
        where studentID='{$_SESSION['user']['studentID']}'";
        $student = $conn-> query ($sql)-> fetch_assoc();
        ?>

        <div class="dropdown text-end">
          <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
          <img src= "Images/profile/<?php echo $student['image']; ?>" alt="mdo" width = "32" height = "32" class="rouded-circle">
          </a>
          <ul class="dropdown-menu text-small" style="">
            <li><a class="dropdown-item" href="profile.php">Profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#" onclick= "signout()">Sign out</a></li>
          </ul>
        </div>
      </div>