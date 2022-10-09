<?php
$pdo = new PDO("mysql:host=localhost;dbname=telephone;charset=utf8", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); ?>
<html>
    <head>
        <meta charset="utf-8">
        <title>ลงทะเบียนข้อมูลลูกค้า</title>
    </head>
    <body>
    <form action="insert-new-customer.php" method="post">
    
    ชื่อ-สกุล:
        <select name="cus_prefix">
            <option value='นาย'>นาย</option>
            <option value='นาง'>นาง</option>
            <option value='นางสาว'>นางสาว</option>
        </select>
        <input type='text' name="cus_name"><br>
        เบอร์โทรศัพท์: <input type='tel' name="cus_tel"><br>
        <input type='submit' value = 'ลงทะเบียน'>
        </form>

    </body>
</html>
