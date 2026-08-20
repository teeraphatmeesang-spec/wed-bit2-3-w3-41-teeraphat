<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rooms List</title>
    <!-- Google Font - Prompt ให้ดูสะอาด อ่านง่าย ธีมเดียวกับ index -->
    
    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family: "Segoe UI", sans-serif;
        }

        body{
            background:#eef8ff;
            color:#333;
        }

        /* ================= NAVBAR ================= */
        .navbar{
            background:#4da6ff;
            color:white;
            display:flex;
            justify-content:space-between;
            align-items:center;
            padding:15px 50px;
            box-shadow:0 3px 10px rgba(0,0,0,.1);
        }

        .navbar .brand{
            font-size: 20px;
            font-weight:600;
            color: white;
            text-decoration: none;
        }

        .nav-links{
            display: flex;
            list-style: none;
        }

        .nav-links li a{
            color:white;
            text-decoration:none;
            margin-left:15px;
            padding:8px 15px;
            border-radius:6px;
            transition:.3s;
        }

        .nav-links li a:hover,
        .nav-links li a.active{
            background:white;
            color:#4da6ff;
        }

        /* ================= CONTENT ================= */
        .container{
            width:90%;
            max-width: 1200px;
            margin:40px auto;
            background:white;
            padding:25px;
            border-radius:12px;
            box-shadow:0 5px 15px rgba(0,0,0,.08);
        }

        .page-title{
            margin-bottom:20px;
            color:#3399ff;
        }

        /* ================= TABLE ================= */
        table{
            width:100%;
            border-collapse:collapse;
        }

        table th{
            background:#66b3ff;
            color:white;
            padding:12px;
            text-transform: uppercase;
            font-size: 14px;
        }

        table td{
            padding:12px;
            text-align:center;
            border-bottom:1px solid #ddd;
        }

        table tr:hover{
            background:#f2f9ff;
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


    <nav class="navbar">
        <a href="index.php" class="brand">MANROOD67</a>
        <ul class="nav-links">
            <li><a href="index.php">ข้อมูลการเข้าพัก</a></li>
            <li><a href="room.php" class="active">ข้อมูลห้องพัก</a></li>
            <li><a href="manage_order.php">จัดการการเข้าพัก</a></li>
            <li><a href="add_order.php">เพิ่มข้อมูลการเข้าพัก</a></li>

        </ul>
    </nav>

    <div class="container">
        <h2 class="page-title">รายการข้อมูลห้องพัก</h2>

        <?php
            include "action/connect.php";

            //      ดึง    ทั้งหมด จาก  ตารางorders
            $sql = "SELECT * FROM rooms";
                    //              db.   คำสั่ง
            $result = mysqli_query($con, $sql);
            //ทดสอบ
            //var_dump($result);
        ?>

        <table>
            <thead>
                <tr>
                    <th>room id</th>
                    <th>smoke</th>
                    <th>ประเภทอ่าง</th>
                    <th>ราคา</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($result as $rooms){
                        ?>  
                            <tr>
                                <td><?=$rooms["room_id"] ?></td>
                                <td><?=$rooms["smoke"] ?></td>
                                <td><?=$rooms["bathtub"] ?></td>
                                <td><?=$rooms["price"] ?></td>
                            </tr>
                        <?php
                    }
                ?>
            </tbody>
        </table>    
    </div>

    <!-- Footer -->
    <footer>
        &copy; <?php echo date("Y"); ?> © 2026 ระบบจัดการการจองห้องพัก | Hotel Management System
    </footer>

</body>
</html>