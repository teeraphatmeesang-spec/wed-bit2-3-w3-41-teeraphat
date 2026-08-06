<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายการจองห้องพัก</title>

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:"Segoe UI",sans-serif;
        }

        body{
            background:#eef8ff;
            color:#333;
        }

        /* ================= NAVBAR ================= */

        nav{
            background:#4da6ff;
            color:white;
            display:flex;
            justify-content:space-between;
            align-items:center;
            padding:15px 50px;
            box-shadow:0 3px 10px rgba(0,0,0,.1);
        }

        nav h2{
            font-weight:600;
        }

        nav .menu a{
            color:white;
            text-decoration:none;
            margin-left:15px;
            padding:8px 15px;
            border-radius:6px;
            transition:.3s;
        }

        nav .menu a:hover{
            background:white;
            color:#4da6ff;
        }

        /* ================= CONTENT ================= */

        .container{
            width:90%;
            margin:40px auto;
            background:white;
            padding:25px;
            border-radius:12px;
            box-shadow:0 5px 15px rgba(0,0,0,.08);
        }

        h3{
            color:#3399ff;
            margin-bottom:20px;
        }

        table{
            width:100%;
            border-collapse:collapse;
        }

        table th{
            background:#66b3ff;
            color:white;
            padding:12px;
        }

        table td{
            padding:12px;
            text-align:center;
            border-bottom:1px solid #ddd;
        }

        table tr:hover{
            background:#f2f9ff;
        }

        img{
            width:140px;
            border-radius:8px;
        }

        /* ================= BUTTON ================= */

        .btn{
            display:inline-block;
            text-decoration:none;
            background:#4da6ff;
            color:white;
            padding:10px 18px;
            border-radius:8px;
            margin-bottom:20px;
            transition:.3s;
        }

        .btn:hover{
            background:#3399ff;
        }

        .edit{
            background:#ffc107;
            color:black;
            padding:8px 12px;
            border-radius:6px;
            text-decoration:none;
            margin-right:5px;
        }

        .edit:hover{
            background:#e0a800;
        }

        .delete{
            background:#dc3545;
            color:white;
            padding:8px 12px;
            border-radius:6px;
            text-decoration:none;
        }

        .delete:hover{
            background:#bb2d3b;
        }

        /* ================= FOOTER ================= */

        footer{
            margin-top:50px;
            background:#4da6ff;
            color:white;
            text-align:center;
            padding:18px;
        }
    </style>
</head>

<body>

<?php
    include "action/connect.php";
    $sql = "SELECT * FROM orders";
    $result = mysqli_query($con, $sql);
?>

<!-- ================= NAVBAR ================= -->

<nav>
    <h2>🏨 ระบบจองห้องพัก</h2>

    <div class="menu">
        <a href="index.php">หน้าหลัก</a>
        <a href="room.php">ข้อมูลห้องพัก</a>
        <a href="add_order.php">เพิ่มรายการ</a>
        <a href="manage_order.php">จัดการรายการ</a>
    </div>
</nav>

<!-- ================= CONTENT ================= -->

<div class="container">

    <h3>รายการการจอง</h3>

    <a href="add_order.php" class="btn">+ เพิ่มรายการ</a>

    <table>

        <thead>
            <tr>
                <th>รหัสรายการ</th>
                <th>ชื่อผู้เข้าพัก</th>
                <th>ชำระเงิน</th>
                <th>ประเภท</th>
                <th>ห้อง</th>
                <th>ภาพ</th>
                <th>จัดการ</th>
            </tr>
        </thead>

        <tbody>

        <?php
            foreach($result as $order){
        ?>

            <tr>
                <td><?= $order["order_id"] ?></td>
                <td><?= $order["name"] ?></td>
                <td><?= $order["payment"] ?></td>
                <td><?= $order["usage_type"] ?></td>
                <td><?= $order["room_id"] ?></td>

                <td>
                    <img src="<?= $order["image"] ?>">
                </td>

                <td>
                    <a class="edit"
                       href="edit_order.php?id=<?= $order["order_id"] ?>">
                        แก้ไข
                    </a>

                    <a class="delete"
                       href="action/delete_order.php?id=<?= $order["order_id"] ?>"
                       onclick="return confirm('ต้องการลบรายการนี้หรือไม่?')">
                        ลบ
                    </a>
                </td>
            </tr>

        <?php
            }
        ?>

        </tbody>

    </table>

</div>

<!-- ================= FOOTER ================= -->

<footer>
    © 2026 ระบบจัดการการจองห้องพัก | Hotel Management System
</footer>

</body>
</html>