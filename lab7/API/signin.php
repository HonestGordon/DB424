<?php
session_start();
require '../db.php';

if (isset($_POST['signin'])) {
    $username = $_POST ['username'];
$password = $_POST['password'];
try {
$sql = 
'SELECT * FROM users 
JOIN student  
ON username = studentID
WHERE username =? '; //คำสั่งDatabase
$stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $username);
        $stmt ->execute();
        $result = $stmt ->get_result();
        if ($row = $result -> fetch_assoc()){
        if (password_verify($password, $row['password'])) {
            $_SESSION['user'] = [
                'studentID'=>$row['studentID'],
                'firstName'=>$row['firstName'],
                'lastName'=>$row['lastName'],
            ];

            //$_SESSION['studentID'] = $row ['studentID'];
            //$_SESSION['firstName'] = $row['firstName'];
            //$_SESSION['lastName'] = $row['lastName'];
            //header('Location: index.php'); //เชื่อมว่าถ้าถูกต้องให้ย้ายไปที่หน้าไหน
            //exit(); //เป็นคำสั่งจบเลิก เพราะเปลี่ยนหน้าไปแล้ว
           http_response_code(200);
           echo 'Success';
        }

        else {
            http_response_code(401);
            echo 'Password ไม่ถูกต้อง';
        }
    }
    else {
        http_response_code(401);
        echo 'Username ไม่ถูกต้อง';
    }
}
catch (Exception) {
    http_response_code(500);
    echo 'Sever error.';
}
}
else {
    http_response_code(401);
    echo "Unauthorized.";
}
?>