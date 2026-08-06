<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขรายการจอง</title>

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
            width:500px;
            margin:40px auto;
            background:white;
            padding:30px;
            border-radius:12px;
            box-shadow:0 5px 15px rgba(0,0,0,.08);
        }

        h3{
            color:#3399ff;
            margin-bottom:25px;
            text-align:center;
        }

        label{
            display:block;
            margin-top:15px;
            margin-bottom:6px;
            font-weight:600;
        }

        input,
        select{
            width:100%;
            padding:10px;
            border:1px solid #ccc;
            border-radius:8px;
            font-size:15px;
        }

        input:focus,
        select:focus{
            outline:none;
            border-color:#4da6ff;
        }

        button{
            width:100%;
            margin-top:25px;
            padding:12px;
            background:#4da6ff;
            color:white;
            border:none;
            border-radius:8px;
            font-size:16px;
            cursor:pointer;
            transition:.3s;
        }

        button:hover{
            background:#3399ff;
        }

        .back{
            display:inline-block;
            margin-bottom:20px;
            text-decoration:none;
            color:white;
            background:#6c757d;
            padding:10px 18px;
            border-radius:8px;
        }

        .back:hover{
            background:#5a6268;
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
    $id = $_GET["id"];

    include "action/connect.php";

    $sql = "SELECT * FROM orders WHERE order_id = '$id' ";
    $result = mysqli_query($con, $sql);
    $order = mysqli_fetch_assoc($result);
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

    <a href="manage_order.php" class="back">← กลับ</a>

    <h3>แก้ไขรายการจอง</h3>

    <form action="action/update_order.php" method="post">

        <label>ชื่อผู้เข้าพัก</label>
        <input type="text" name="name" value="<?= $order["name"] ?>">

        <label>การจ่ายเงิน</label>
        <input type="text" name="payment" value="<?= $order["payment"] ?>">

        <label>ประเภทการใช้งาน</label>
        <input type="text" name="usage_type" value="<?= $order["usage_type"] ?>">

        <label>ภาพผู้เข้าพัก</label>
        <input type="text" name="image" value="<?= $order["image"] ?>">

        <?php
            include "action/connect.php";

            $sql = "SELECT * FROM rooms";
            $result = mysqli_query($con, $sql);
        ?>

        <label>เลือกห้องพัก</label>

        <select name="room_id">

            <?php
                foreach($result as $room){
            ?>

                <option
                    value="<?= $room["room_id"] ?>"
                    <?= $order['room_id'] == $room['room_id'] ? 'selected' : '' ?>>

                    <?= $room["room_id"] . " - " . $room["price"] . " บาท" ?>

                </option>

            <?php
                }
            ?>

        </select>

        <input
            type="hidden"
            name="order_id"
            value="<?= $order['order_id'] ?>">

        <button type="submit">บันทึกข้อมูล</button>

    </form>

</div>

<!-- ================= FOOTER ================= -->

<footer>
    © 2026 ระบบจัดการการจองห้องพัก | Hotel Management System
</footer>

</body>
</html>