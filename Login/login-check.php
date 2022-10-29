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
    $value=$_POST["employee_id"];
    $check="select * from repairman where employee_id = '$value'";
    $stmt2 = $pdo->prepare($check);
    $stmt2->execute();
    $row2 = $stmt2->fetch();
    //$_SESSION["username"]=$row["emp_tel"];
    
    //$result=mysql_query($check) or die(mysql_error());
    //$num=mysql_num_rows($result);
    if(empty($row2)){
        echo "<a href='search.php'>ไปยังหน้าหลัก</a><br>";
    }
    else{
        echo "<a href='search_repairman.php'>ไปยังหน้าหลัก</a><br>";
    }
}
else{
    echo "ไม่สำเร็จ ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง";
    echo "<a href='login-form.php'> เข้าสู่ระบบอีกครั้ง</a>";
}
?>