<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', 'Sarabun', Tahoma, sans-serif;
            background-color: #f2f2f2;
            color: #333333;
            padding: 40px 20px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            max-width: 1100px;
            margin: 0 auto 30px auto;
            background-color: #ffffff;
            border: 1px solid #dddddd !important;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.08);
        }

        thead th {
            background-color: #4a4a4a;
            color: #ffffff;
            padding: 12px 15px;
            text-align: left;
            font-weight: 500;
            border: 1px solid #dddddd !important;
        }

        tbody td {
            padding: 10px 15px;
            border: 1px solid #e0e0e0 !important;
            font-size: 14px;
            color: #444444;
        }

        tbody tr:nth-child(even) {
            background-color: #fafafa;
        }

        tbody tr:hover {
            background-color: #eeeeee;
            transition: background-color 0.2s ease;
        }

        tbody td img {
            border-radius: 4px;
            display: block;
        }

        a {
            display: inline-block;
            max-width: 1100px;
            margin: 0 auto;
            text-decoration: none;
            color: #ffffff;
            background-color: #6b6b6b;
            padding: 10px 20px;
            border-radius: 4px;
            font-size: 14px;
            transition: background-color 0.2s ease;
        }

        a:hover {
            background-color: #4a4a4a;
        }
    </style>
</head>
<body>
    
    <?php
        include "action/connect.php";
        //       ดึง   ทั้งหมด จาก ตาราง orders
        $sql = "SELECT * FROM orders";
        //                      db.  คำสั่ง
        $result = mysqli_query($con, $sql);
        // ทดสอบตัวแปร
        // var_dump($result);
    ?>

    <table border=1>
        <thead>
            <th>รหัสรายการ</th>
            <th>ชื่อผู้เข้าพัก</th>
            <th>ชำระเงิน</th>
            <th>ประเภท</th>
            <th>ห้อง</th>
            <th>ภาพ</th>
        </thead>

        <?php
            foreach($result as $orders){
                ?>
                <tr>
                    <td><?= $orders["order_id"] ?></td>
                    <td><?= $orders["name"] ?></td>
                    <td><?= $orders["payment"] ?></td>
                    <td><?= $orders["usage_type"] ?></td>
                    <td><?= $orders["room_id"] ?></td>
                    <td>
                        <img 
                            src="<?= $orders["image"] ?>"
                            style="width:200px"
                        >
                    </td>
                </tr>
                <?php
            }
        ?>
    </table>
        <a href="room.php">กลับหน้าroom</a>

</body>
</html>