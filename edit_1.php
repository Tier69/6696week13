<!DOCTYPE html>
<html lang="en">
<?php
//เชื่อมต่อฐานข้อมูล
include("conn.php");
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Itim&display=swap" rel="stylesheet">
    
    <!-- Fontawesome for cute icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Itim', cursive;
            background: linear-gradient(135deg, #e0f2fe, #93c5fd);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .card {
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            border: none;
            background-color: rgba(255,255,255,0.9);
        }

        .card-header {
            background-color: #3b82f6;
            color: white;
            text-align: center;
        }

        .btn-custom {
            background-color: #2563eb;
            color: white;
        }

        .btn-custom:hover {
            background-color: #1d4ed8;
            color: white;
        }

        .french-bulldog-bg {
            position: fixed;
            bottom: 20px;
            right: 20px;
            opacity: 0.3;
            width: 200px;
            z-index: -1;
        }
    </style>

    <title>แก้ไขข้อมูลพนักงาน</title>
</head>

<body>
    <!-- French Bulldog Background Image -->
    <img src="https://static.vecteezy.com/system/resources/previews/027/146/217/non_2x/cute-french-bulldog-cartoon-illustration-free-png.png" alt="French Bulldog" class="french-bulldog-bg">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1 class="mb-0">
                            <i class="fas fa-user-edit me-2"></i>แก้ไขข้อมูลพนักงาน
                        </h1>
                    </div>
                    <div class="card-body">
                        <?php
                        //เริ่มเก็บข้อมูล
                        $employee_id = $_POST['employee_id'];
                        $first_name = $_POST['first_name'];
                        $last_name = $_POST['last_name'];
                        $department = $_POST['department'];
                        $gender = $_POST['gender'];
                        $age = $_POST['age'];
                        $salary = $_POST['salary'];

                        //เขียนคำสั่ง SQL
                        $sql = "UPDATE employees SET first_name='$first_name',last_name='$last_name',department='$department',gender='$gender',age='$age',salary='$salary'  WHERE employee_id=$employee_id ";

                        // รับคำสั่ง sql
                        if ($conn->query($sql) === TRUE) {
                            echo '<div class="alert alert-success d-flex align-items-center" role="alert">
                                    <i class="fas fa-check-circle me-2"></i>
                                    <div>ยินดีด้วยครับ คุณได้ทำการแก้ไขข้อมูลเรียบร้อย !!!</div>
                                  </div>';

                            echo '<div class="text-center">
                                    <a href="show.php" class="btn btn-custom btn-sm">
                                        <i class="fas fa-arrow-left me-2"></i>กลับหน้าแสดงข้อมูล
                                    </a>
                                  </div>';
                        } else {
                            echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
                                    <i class="fas fa-exclamation-triangle me-2"></i>
                                    <div>มีข้อผิดพลาด: ' . $conn->error . '</div>
                                  </div>';
                        }
                        // ปิดการเชื่อมต่อ
                        $conn->close();
                        ?>
                    </div>
                    <div class="card-footer text-center text-muted">
                        <small>
                            <i class="fas fa-code me-2"></i>
                            พัฒนาโดย 664485028 นภัสกร กิตติเรืองชัย หมู่เรียน 66/96
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>