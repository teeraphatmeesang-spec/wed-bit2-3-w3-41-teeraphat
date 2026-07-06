<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room List</title>

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Tahoma, sans-serif;
        }

        body{
            background:linear-gradient(135deg,#74ebd5,#9face6);
            padding:40px;
        }

        .container{
            max-width:900px;
            margin:auto;
            background:#fff;
            padding:30px;
            border-radius:15px;
            box-shadow:0 10px 20px rgba(0,0,0,.2);
        }

        h1{
            text-align:center;
            color:#0d6efd;
            margin-bottom:25px;
        }

        table{
            width:100%;
            border-collapse:collapse;
            overflow:hidden;
            border-radius:10px;
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

        .btn{
            display:inline-block;
            margin-top:25px;
            padding:12px 25px;
            background:#198754;
            color:white;
            text-decoration:none;
            border-radius:8px;
            font-size:18px;
            transition:.3s;
        }

        .btn:hover{
            background:#157347;
        }
    </style>

</head>
<body>

<div class="container">

    <h1>ข้อมูลห้องพัก</h1>

    <?php
        include "action/connect.php";
        //       ดึง   ทั้งหมด จาก ตาราง orders
        $sql = "SELECT * FROM rooms";
        //                      db.  คำสั่ง
        $result = mysqli_query($con, $sql);
        // ทดสอบตัวแปร
        // var_dump($result);
    ?>

    <table border="1">
        <thead>
            <th>Room ID</th>
            <th>Smoke</th>
            <th>Bathtub</th>
            <th>Price</th>
        </thead>

        <?php
            foreach($result as $order){
                ?>
                <tr>
                    <td><?= $order["room_id"] ?></td>
                    <td><?= $order["smoke"] ?></td>
                    <td><?= $order["bathtub"] ?></td>
                    <td><?= $order["price"] ?></td>
                </tr>
                <?php
            }
        ?>
    </table>

    <a href="index.php" class="btn">← ไปหน้า Orders</a>

</div>

</body>
</html>
