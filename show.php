<?php
include("conn.php");
include("clogin.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Itim&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Itim', cursive;
            background-image: url('https://images.unsplash.com/photo-1560743573-d6bf4041a9c4');
            background-size: cover;
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
        }
        .container-custom {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            box-shadow: 0 8px 15px rgba(0,0,0,0.2);
            padding: 30px;
            margin-top: 30px;
            backdrop-filter: blur(5px);
        }
        .header-section {
            background-color: #5A9BD5;
            color: white;
            padding: 20px;
            border-radius: 10px 10px 0 0;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
        }
        .header-section h1 {
            margin-bottom: 0;
            font-size: 2.5rem;
            display: flex;
            align-items: center;
        }
        .header-section .fa-dog {
            margin-right: 15px;
            font-size: 2.5rem;
        }
        .btn-custom {
            font-family: 'Itim', cursive;
            display: flex;
            align-items: center;
            gap: 5px;
        }
        .table-custom thead {
            background-color: #5A9BD5;
            color: white;
        }
        .footer-section {
            margin-top: 20px;
            text-align: center;
            color: #333;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 10px;
            border-radius: 10px;
        }
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            padding: 5px 10px;
            margin: 0 5px;
            border-radius: 5px;
        }
    </style>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบจัดการข้อมูลพนักงาน</title>
</head>

<body>
    <div class="container container-custom">
        <div class="header-section">
            <i class="fas fa-dog"></i>
            <div>
                <h1>ระบบจัดการข้อมูลพนักงาน</h1>
                <p class="mb-0">
                    <i class="fas fa-user"></i> ผู้เข้าสู่ระบบ: <?php echo $_SESSION["u_name"]; ?> 
                    | <i class="fas fa-building"></i> หน่วยงาน: <?php echo $_SESSION["u_department"]; ?>
                </p>
            </div>
            <div class="col-md-4 text-end">
                    <a href="add.php" class="btn btn-success"><i class="fas fa-plus-circle me-2"></i>เพิ่มข้อมูลพนักงาน</a>
                </div>
        </div>

        <?php
        if (isset($_GET['action_even']) == 'delete') {
            $employee_id = $_GET['employee_id'];
            $sql = "SELECT * FROM employees WHERE employee_id=$employee_id";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                $sql = "DELETE FROM employees WHERE employee_id=$employee_id";

                if ($conn->query($sql) === TRUE) {
                    echo "<div class='alert alert-success'><i class='fas fa-check-circle'></i> ลบข้อมูลสำเร็จ</div>";
                } else {
                    echo "<div class='alert alert-danger'><i class='fas fa-exclamation-triangle'></i> ลบข้อมูลมีข้อผิดพลาด กรุณาตรวจสอบ!!! </div>" . $conn->error;
                }
            } else {
                echo '<div class="alert alert-warning"><i class="fas fa-info-circle"></i> ไม่พบข้อมูล กรุณาตรวจสอบ</div>';
            }
        }
        ?>

        <div class="table-responsive">
            <table id="example" class="table table-striped table-hover table-custom">
                <thead>
                    <tr>
                        <th><i class="fas fa-id-badge"></i> รหัส</th>
                        <th><i class="fas fa-user"></i> ชื่อพนักงาน</th>
                        <th><i class="fas fa-user-friends"></i> นามสกุล</th>
                        <th><i class="fas fa-briefcase"></i> ตำแหน่ง</th>
                        <th><i class="fas fa-venus-mars"></i> เพศ</th>
                        <th><i class="fas fa-birthday-cake"></i> อายุ</th>
                        <th><i class="fas fa-money-bill-wave"></i> เงินเดือน</th>
                        <th><i class="fas fa-cogs"></i> จัดการข้อมูล</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM employees";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["employee_id"] . "</td>";
                            echo "<td>" . $row["first_name"] . "</td>";
                            echo "<td>" . $row["last_name"] . "</td>";
                            echo "<td>" . $row["department"] . "</td>";
                            echo "<td>" . $row["gender"] . "</td>";
                            echo "<td>" . $row["age"] . "</td>";
                            echo "<td>" . number_format($row["salary"], 2) . "</td>";

                            echo '<td>
                                <div class="btn-group" role="group">
                                    <a href="show.php?action_even=del&employee_id=' . $row['employee_id'] . '" 
                                       class="btn btn-danger btn-sm btn-custom" 
                                       onclick="return confirm(\'ต้องการจะลบข้อมูลรายชื่อ ' . $row['employee_id'] . ' ' . $row['first_name'] . ' ' . $row['last_name'] . '?\')">
                                        <i class="fas fa-trash-alt"></i> ลบข้อมูล
                                    </a>
                                    <a href="edit.php?action_even=edit&employee_id=' . $row['employee_id'] . '" 
                                       class="btn btn-primary btn-sm btn-custom" 
                                       onclick="return confirm(\'ต้องการจะแก้ไขข้อมูลรายชื่อ ' . $row['employee_id'] . ' ' . $row['first_name'] . ' ' . $row['last_name'] . '?\')">
                                        <i class="fas fa-edit"></i> แก้ไขข้อมูล
                                    </a>
                                </div>
                            </td>';

                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8' class='text-center'>ไม่พบข้อมูล</td></tr>";
                    }
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>

        <div class="footer-section">
            <p><i class="fas fa-paw"></i> พัฒนาโดย 664485028 นภัสกร กิตติเรืองชัย <i class="fas fa-paw"></i></p>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- jQuery and DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

    <script>
        new DataTable('#example', {
            language: {
                search: 'ค้นหา',
                lengthMenu: 'แสดง _MENU_ รายการ',
                info: 'หน้า _PAGE_ จาก _PAGES_',
                paginate: {
                    previous: 'ก่อนหน้า',
                    next: 'ถัดไป'
                }
            }
        });
    </script>
</body>
</html>