<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>
<style>
        :root {
            --ink: #2b2924;
            --paper: #faf7f2;
            --line: #e2ddd2;
            --accent: #8a6d3b;
            --accent-soft: #f1e6d3;
            --ok: #4c6b4f;
        }
 
        * { box-sizing: border-box; }
 
        body {
            margin: 0;
            padding: 40px 24px;
            background: var(--paper);
            color: var(--ink);
            font-family: "Segoe UI", "Sarabun", system-ui, sans-serif;
            line-height: 1.5;
        }
 
        .page {
            max-width: 1080px;
            margin: 0 auto;
        }
 
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            border-bottom: 2px solid var(--ink);
            padding-bottom: 16px;
            margin-bottom: 24px;
        }
 
        .page-header h1 {
            font-size: 22px;
            font-weight: 600;
            margin: 0;
            letter-spacing: 0.5px;
        }
 
        .actions {
            display: flex;
            gap: 10px;
        }
 
        .actions a {
            text-decoration: none;
            font-size: 14px;
            padding: 8px 16px;
            border: 1px solid var(--ink);
            border-radius: 3px;
            color: var(--ink);
            transition: background 0.15s ease, color 0.15s ease;
        }
 
        .actions a:hover {
            background: var(--ink);
            color: var(--paper);
        }
 
        .actions a.primary {
            background: var(--accent);
            border-color: var(--accent);
            color: #fff;
        }
 
        .actions a.primary:hover {
            background: #6f5730;
            border-color: #6f5730;
        }
 
        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            border: 1px solid var(--line);
        }
 
        thead th {
            text-align: left;
            font-size: 13px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.6px;
            color: #6b6455;
            background: var(--accent-soft);
            padding: 12px 14px;
            border-bottom: 1px solid var(--line);
        }
 
        tbody td {
            padding: 12px 14px;
            border-bottom: 1px solid var(--line);
            font-size: 14px;
            vertical-align: middle;
        }
 
        tbody tr:last-child td {
            border-bottom: none;
        }
 
        tbody tr:hover {
            background: #fbf9f4;
        }
 
        td img {
            width: 90px;
            height: 60px;
            object-fit: cover;
            border-radius: 4px;
            border: 1px solid var(--line);
            display: block;
        }
 
        .back-link {
            display: inline-block;
            margin-top: 20px;
            font-size: 14px;
            color: #6b6455;
            text-decoration: none;
        }
 
        .back-link:hover {
            color: var(--ink);
            text-decoration: underline;
        }
 
        .empty {
            padding: 40px;
            text-align: center;
            color: #a39a86;
            font-size: 14px;
        }
    </style>

</head>
<body>

    <?php
        include "action/connect.php";
        $sql = "SELECT * FROM orders";
        $result = mysqli_query($con, $sql);
    ?>
        <a href="add_order.php">เพิ่ม</a>
        <table border=1>
            <thead>
            <th>รหัสรายการ</th>
            <th>ชื่อผู้เข้าพัก</th>
            <th>ชำระเงิน</th>
            <th>ประเภท</th>
            <th>ห้อง</th>
            <th>ภาพ</th>
            <th?>จัดการ</th>
        </thead>

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
<img
src="<?= $order["image"] ?>"
style="width:200px"
>
</td>
<td>
 <a href="edit_order.php?id=<?= $order["order_id"] ?>">แก้ไข</a>

 <a href="action/delete_order.php?id=<?= $order["order_id"]?>">ลบ</a>
</td>
</tr>
<?php
}
?>
</table>

</body>
</html>