<?php 
include "connect.php"; 
session_start();

$stmt = $pdo->prepare("SELECT * FROM employee WHERE employee_id = ? AND emp_tel = ?");
$stmt->bindParam(1,$_POST["employee_id"]);
$stmt->bindParam(2,$_POST["emp_tel"]);
$stmt->execute();
$row = $stmt->fetch();

if(!empty($row)){
    session_regenerate_id();
    $_SESSION["fullname"]=$row["emp_name"];
    $_SESSION["username"]=$row["emp_tel"];

    echo "เข้าสู่ระบบสำเร็จ<br>";
    echo "<a href='search.php'>ไปยังหน้าหลัก</a><br>";
}
else{
    echo "ไม่สำเร็จ ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง";
    echo "<a href='login-form.php'> เข้าสู่ระบบอีกครั้ง</a>";
}
?>