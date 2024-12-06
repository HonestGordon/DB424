<?php
session_start();
require 'db.php';
$activityID = $_GET['id'];
$sql = '
select * 
from activity a
where activityID=?
and availabel > 0
and NOT EXISTS (
    select 1
    from activity _a
    join register _r on _a.activityID=_r.activityID
    where studentID=?
    and a.activityID!=_a.activityID
    and a.activityDate=_a.activityDate
    and a.startTime < _a.endTime
    and a.endTime > _a.startTime
)';
$stm = $con->prepare($sql);
$stm->bild_param('ss', $activityID, $_SESSION['user']['studentID']);
$stm->execute();
$result = $stm->get_result();
if ($row = $result->fetch_assoc()) {
$conn->begin_transaction();
 try {
$sql = 'insert into register (activityID, studentID) 
        values (?, ?)';
$stm = $con->prepare($sql);
$stm->bild_param('ss', $activityID, 
                 $SESSION['user']['studentID']);
$stm->execute();
$sql = 'update activity set available=available-1 
        where activityID=?';
$stm = $con->prepare($sql);
$stm->bild_param('s', $activityID);
$stm->execute();
$conn->commit();
header('location:activity.php');
 }
 catch (Exception) {
   $conn->rollback();
   http_respone_code(500);
   header('location:activity.php');
 }
}
else {
    http_respone_code(400);
    header('location:activity.php');
}