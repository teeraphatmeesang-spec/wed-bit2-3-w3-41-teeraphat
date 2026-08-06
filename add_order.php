<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มรายการจอง</title>

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

        /* ================= CONTENT & FORM ================= */
        .container{
            width:90%;
            max-width: 600px;
            margin:40px auto;
            background:white;
            padding:30px;
            border-radius:12px;
            box-shadow:0 5px 15px rgba(0,0,0,.08);
        }

        h3{
            margin-bottom:25px;
            color:#3399ff;
            text-align: center;
        }

        form label{
            display: block;
            font-weight: 600;
            margin-bottom: 8px;
            color: #444;
        }

        form input[type="text"],
        form select{
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 14px;
            outline: none;
            transition: .3s;
            background: #fdfdfd;
        }

        form input[type="text"]:focus,
        form select:focus{
            border-color: #4da6ff;
            box-shadow: 0 0 5px rgba(77, 166, 255, 0.4);
            background: #fff;
        }

        /* จัดระยะห่างแท็ก br เดิมให้ดูสวยงามขึ้น */
        form br {
            display: block;
            margin-bottom: 18px;
            content: "";
        }

        /* ================= BUTTON ================= */
        button{
            width: 100%;
            border: none;
            cursor: pointer;
            display:inline-block;
            text-decoration:none;
            background:#4da6ff;
            color:white;
            padding:12px 18px;
            border-radius:8px;
            font-size: 16px;
            font-weight: 600;
            transition:.3s;
        }

        button:hover{
            background:#3399ff;
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
        <h3>เพิ่มรายการจองห้องพัก</h3>

        <form action="action/insert_order.php" method="post">

            <label for="">ชื่อผู้เข้าพัก</label>
            <input type="text" name="name"> <br>

            <label for="">การจ่ายเงิน</label>
            <input type="text" name="payment"> <br>

            <label for="">ประเภทการใช้งาน</label>
            <input type="text" name="usage_type"> <br>

            <label for="">ภาพผู้เข้าพัก</label>
            <input type="text" name="image"> <br>

            <?php
                include "action/connect.php";

                $sql = "SELECT * FROM rooms";

                $result = mysqli_query($con, $sql);
            ?>

            <label for="">เลือกห้องพัก</label>
            <select name="room_id" id="">
                <?php
                    foreach($result as $room){
                        ?>
                            <option value="<?= $room["room_id"] ?>"> 
                                <?= $room["room_id"] . " - " . $room["price"] . " บาท" ?> 
                            </option>
                        <?php
                    }
                ?>
            </select>

            <br>
            <button>บันทึก</button>

        </form>
    </div>

    <!-- ================= FOOTER ================= -->
    <footer>
        <p>
            © 2026 ระบบจัดการการจองห้องพัก | Hotel Management System
        </p>
    </footer>

</body>
</html>