<?php
include 'header.php';
$sql = "select a.*,
          if(r.activityID is null, 0, 1) registed
        from activity a left join
        (
          select *
          from register
          where studentID='{$_SESSION['user']['studentID']}'
        ) r on a.activityID=r.activityID
        where a.activityDate > curdate()
        and (r.activityID is not null or available > 0)
        and NOT EXISTS (
          select 1
          from activity _a
          join register _r on _a.activityID=_r.activityID
          where a.activityID!=_a.activityID
          and a.activityDate=_a.activityDate
          and a.startTime < _a.endTime
          and a.endTime > _a.startTime
        )";
$result = $con->query($sql);
?>
<table class="table table-striped">
    <tr class="table-dark">
        <th>activityID</th>
        <th>activityName</th>
        <th>activityDate</th>
        <th>startTime</th>
        <th>endTime</th>
        <th>available</th>
        <th>action</th>
    </tr>
<?php
while ($sor = $result->fetch_assoc()) {
    echo '<tr>';
    echo "<td>{row['activityID']}</td>";
    echo "<td>{row['activityName']}</td>";
    echo "<td>{row['activityDate']}</td>";
    echo "<td>{row['startTime']}</td>";
    echo "<td>{row['endTime']}</td>";
    echo "<td>{row['available']}</td>";
    echo "<td>
              <a herf='register.php?id={row['activityID']}' class='btn btn-sm btn-success ".
              ($row['registed'] ? 'disable' : '')."'>+</a>
              <a herf='cancael.php?id={row['activityID']}' class='btn btn-sm btn-danger ".
              ($row['registed'] ? '' : 'disable')."'>-</a>
         </td>";
    echo '</tr>';
}
?>
</table>
<?php
include 'footer.php';
?>