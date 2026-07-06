
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายการการจอง</title>

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Tahoma,sans-serif;
        }

        body{
            background:#f4f6f9;
            padding:40px;
        }

        h1{
            text-align:center;
            color:#0d6efd;
            margin-bottom:25px;
        }

        table{
            width:100%;
            border-collapse:collapse;
            background:white;
            box-shadow:0 5px 15px rgba(0,0,0,.15);
            border-radius:10px;
            overflow:hidden;
        }

        thead{
            background:#0d6efd;
            color:white;
        }

        thead th{
            padding:15px;
            font-size:18px;
        }

        td{
            padding:15px;
            text-align:center;
            border-bottom:1px solid #ddd;
        }

        tr:nth-child(even){
            background:#f8f9fa;
        }

        tr:hover{
            background:#dbeafe;
            transition:.3s;
        }

        img{
            width:200px;
            border-radius:10px;
            border:3px solid #0d6efd;
        }

        .btn{
            display:inline-block;
            margin-top:25px;
            padding:12px 25px;
            background:#198754;
            color:white;
            text-decoration:none;
            border-radius:8px;
            font-size:18px;
        }

        .btn:hover{
            background:#157347;
        }
    </style>

</head>
<body>

    <h1>รายการการจองห้องพัก</h1>

    <?php
        include "action/connect.php";
        //       ดึง   ทั้งหมด จาก ตาราง orders
        $sql = "SELECT * FROM orders";
        //                      db.  คำสั่ง
        $result = mysqli_query($con, $sql);
        // ทดสอบตัวแปร
        // var_dump($result);
    ?>

    <table border="1">
        <thead>
            <th>รหัสรายการ</th>
            <th>ชื่อผู้เข้าพัก</th>
            <th>ชำระเงิน</th>
            <th>ประเภท</th>
            <th>ห้อง</th>
            <th>ภาพ</th>
        </thead>

        <?php
            foreach($result as $order){
                ?>
                <tr>
                    <td><?= $order["orders_id"] ?></td>
                    <td><?= $order["name"] ?></td>
                    <td><?= $order["payment"] ?></td>
                    <td><?= $order["usage_type"] ?></td>
                    <td><?= $order["room_id"] ?></td>
                    <td>
                        <img 
                            src="<?= $order["image"] ?>"
                            style="width:200px"
                        >
                    </td>
                </tr>
                <?php
            }
        ?>
    </table>

    <a href="room.php" class="btn">← ไปหน้า Room</a>

</body>
</html>
