<?php
$server = 'db403-mysql';
$username = 'root';
$password = 'P@ssw0rd';
$db = 'northwind';
$conn = new mysqli($server, $username , $password , $db);
if ($conn->connect_errno) {
    die($conn->connect_error);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MYSQL First Contact</title>
</head>
<body>
    <?php
    $sql = 'SELECT * FROM categories' ;//From คือเอามาทั้งหมด
    $result = $conn->query($sql);
    echo '<h3>แสดงข้อมูลทั้งหมดจากตาราง categories</h3>';
    echo '<table>';
    echo '<tr><th>CategoryID</th><th>Category</th><tr>';
    while ($row = $result ->fetch_assoc()) {
        echo'<tr>';
        echo "<td> {$row['CategoryID']}</td>";
        echo "<td>{$row['CategoryName']}</td>";
        echo '</tr>';
    }
      //loop while
      echo '</table>';
    ?>
    <!-- โจทย์ DB304 -->
     <h3>1. แสดงข้อมูลชื่อสินค้า (ProductName) และราคาต่อหน่วย (UnitPrice) ของสินค้าที่มีราคามากกว่า 50 บาท จากนั้นจัดเรียงตามราคาจากสูงไปต่ำ</h3>
     <table>
        <tr>
            <th>ProductName</th>
            <th>UnitPrice</th>
        </tr>
        <?php
        $sql = 'select ProductName, UnitPrice
                from products
                where UnitPrice > 50
                order by UnitPrice desc';
                $result = $conn->query($sql);
                while ($row = $result ->fetch_assoc()) {
                    echo'<tr>';
                    echo "<td>{$row['ProductName']} </td>";
                    echo "<td>{$row['UnitPrice']}</td>";
                    echo '</tr>';
                }
                ?>
     </table>
     <h3>2.	นับจำนวนสินค้าที่มีในแต่ละหมวดหมู่ (CategoryID) โดยไม่รวมสินค้าที่มีสถานะการเลิกผลิต (Discontinued) และจัดเรียงผลลัพธ์ตาม (CategoryID)</h3>
     <table>
        <tr>
            <th>CategoryID </th>
            <th>ProductsCount</th>
        </tr>
        <?php
        $sql = 'SELECT CategoryID , COUNT(*) as ProductsCount
                FROM products
                WHERE Discontinued = 0
                GROUP BY CategoryID
                 ';
                $result = $conn->query($sql);
                while ($row = $result ->fetch_assoc()) {
                    echo'<tr>';
                    echo "<td>{$row['CategoryID']} </td>";
                    echo "<td>{$row['ProductsCount']}</td>";
                    echo '</tr>';
                }
                ?>
     </table>

     <h3>3.	แสดงรหัสผู้จำหน่าย (SupplierID) และราคาเฉลี่ยของสินค้าต่อหน่วย (UnitPrice) ของสินค้าที่มียอดสินค้าในสต็อก (UnitsInStock) มากกว่า 100 หน่วย</h3>
     <table>
        <tr>
            <th>SupplierID</th>
            <th>UnitPrice</th>
        </tr>
        <?php
        $sql = 'SELECT SupplierID , AVG(UnitPrice) AS UniPrice
                FROM products
                WHERE UnitsInStock>100
                GROUP By supplierID
                 ';
                $result = $conn->query($sql);
                while ($row = $result ->fetch_assoc()) {
                    echo'<tr>';
                    echo "<td>{$row['SupplierID']} </td>";
                    echo "<td>{$row['UniPrice']}</td>";
                    echo '</tr>';
                }
                ?>
     </table>
     
     <h3>4.	แสดงข้อมูลรหัสหมวดหมู่สินค้า (CategoryID) และจำนวนสินค้า (ProductCount) 
        ในแต่ละหมวดหมู่ โดยให้แสดงเฉพาะหมวดหมู่ที่มีจำนวนสินค้ามากกว่า 5 ชิ้น และเฉพาะสินค้าที่มีสถานะการเลิกผลิต (Discontinued) 
        เป็น 0 จากนั้นจัดเรียงผลลัพธ์ตามจำนวนสินค้าจากมากไปน้อย</h3>
     <table>
        <tr>
            <th>CategoryID </th>
            <th>Productcount</th>
        </tr>
        <?php
        $sql = 'SELECT CategoryID , COUNT(ProductID) AS Productcount
                FROM products
                WHERE Discontinued=0
                GROUP By CategoryID
                HAVING productcount>5 
                ORDER BY productcount DESC
                 ';
                $result = $conn->query($sql);
                while ($row = $result ->fetch_assoc()) {
                    echo'<tr>';
                    echo "<td>{$row['CategoryID']} </td>";
                    echo "<td>{$row['Productcount']} </td>";
                    echo '</tr>';
                }
                ?>
     </table>

     <h3>5.	ดึงข้อมูลชื่อบริษัท (CompanyName), เมือง (City), และประเทศ 
        (Country) ของผู้จำหน่ายที่อยู่ในประเทศสหรัฐอเมริกา (Country = 'USA') และจัดเรียงตามชื่อบริษัทในลำดับตัวอักษรจาก A ไป Z</h3>
     <table>
        <tr>
            <th>CompanyName </th>
            <th>City</th>
            <th>country</th>
        </tr>
        <?php
        $sql = 'SELECT CompanyName , City , country
                FROM suppliers 
                WHERE country = "USA"
                ORDER BY CompanyName
                 ';
                $result = $conn->query($sql);
                while ($row = $result ->fetch_assoc()) {
                    echo'<tr>';
                    echo "<td>{$row['CompanyName']} </td>";
                    echo "<td>{$row['City']} </td>";
                    echo "<td>{$row['country']} </td>";
                    echo '</tr>';
                }
                ?>
     </table>
</body>
</html>