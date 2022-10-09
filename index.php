<?php
$pdo = new PDO("mysql:host=localhost;dbname=telephone;charset=utf8", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); ?>
<html>
    <head><meta charset="utf-8"></head>
    <body style="padding:10px; line-height: 30px;">
        <?php
        $stmt = $pdo->prepare("
            update repair_detail
            set repair_status = 'repaired'
            where repair_id = (select repairing from repairman where repairman_id = 'r001');
            
            SELECT * FROM repair_detail WHERE repairman_id='r001';
            
            update repairman 
            set repairing = NULL 
            where repairman.repairman_id = 'r001';
        ");
        $stmt->execute(); ?>
        
        <?php while($row = $stmt->fetch()){ ?>
            รหัสช่าง: <?=$row["repairman"]?><br>
            เลขคำร้อง: <?=$row["request_id"]?><br>
            สถานะการซ่อม: <?=$row["repair_status"]?><br>
        <hr>
        <?php } ?>
    </body>
</html>