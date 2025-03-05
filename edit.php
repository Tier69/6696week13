<!DOCTYPE html>
<html lang="en">
<?php
include("conn.php");
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Itim&display=swap" rel="stylesheet">

    <style>
        html, body {
            height: 100%;
            margin: 0;
            font-family: 'Itim', cursive;
        }
        body {
            background-image: url('https://images.unsplash.com/photo-1583337130417-3346a1be7dee');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }
        .edit-container {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 20px;
            box-shadow: 0 15px 30px rgba(0,0,0,0.2);
            padding: 30px;
            max-width: 800px; /* Increased width for two columns */
            width: 100%;
            position: relative;
            overflow: hidden;
        }
        .frenchie-overlay {
            position: absolute;
            bottom: -20px;
            right: -20px;
            opacity: 0.2;
            width: 200px;
            height: 200px;
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="%23B0E0E6" d="M256 48C141.1 48 48 141.1 48 256s93.1 208 208 208 208-93.1 208-208S370.9 48 256 48zm-28 239c-30.9 0-56-25.1-56-56s25.1-56 56-56 56 25.1 56 56-25.1 56-56 56zm112 0c-30.9 0-56-25.1-56-56s25.1-56 56-56 56 25.1 56 56-25.1 56-56 56z"/></svg>');
            background-size: contain;
            transform: rotate(20deg);
        }
        .form-label {
            font-weight: bold;
            color: #4A90E2;
        }
        .form-control, .form-select {
            border-radius: 10px;
        }
        .btn-custom {
            border-radius: 10px;
            font-family: 'Itim', cursive;
        }
        .header-section {
            background: linear-gradient(to right, #4A90E2, #50C9C3);
            color: white;
            padding: 20px;
            border-radius: 10px 10px 0 0;
            margin-bottom: 20px;
            text-align: center;
            position: relative;
        }
        .header-section .fa-dog {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 2rem;
            color: #FFD700;
        }
        .footer-section {
            margin-top: 20px;
            text-align: center;
            color: #6c757d;
        }
        .two-column-form {
            display: flex;
            flex-wrap: wrap;
        }
        .form-column {
            flex: 0 0 50%;
            padding: 0 10px;
        }
        @media (max-width: 768px) {
            .form-column {
                flex: 0 0 100%;
            }
            .two-column-form {
                flex-direction: column;
            }
            .edit-container {
                margin: 20px;
                padding: 20px;
            }
        }
    </style>

    <title>แก้ไขข้อมูลพนักงาน</title>
</head>

<body>
    <div class="container">
        <div class="edit-container">
            <div class="frenchie-overlay"></div>
            <div class="header-section">
                <i class="fas fa-dog"></i>
                <h1 class="mb-0">
                    <i class="fas fa-user-edit me-2"></i>แก้ไขข้อมูลพนักงาน
                </h1>
            </div>

            <?php
            if(isset($_GET['action_even'])=='edit'){
                $employee_id=$_GET['employee_id'];
                $sql="SELECT * FROM employees WHERE employee_id=$employee_id";
                $result=$conn->query($sql);
                if($result->num_rows>0){
                    $row=$result->fetch_assoc();
                }else{
                    echo "<div class='alert alert-danger'>ไม่พบข้อมูลที่ต้องการแก้ไข กรุณาตรวจสอบ</div>";
                }
            }
            ?>

            <form action="edit_1.php" method="POST">
                <input type="hidden" name="employee_id" value="<?php echo $row['employee_id']; ?>">
                
                <div class="two-column-form">
                    <div class="form-column">
                        <div class="row mb-3">
                            <label class="col-sm-4 col-form-label">
                                <i class="fas fa-id-badge me-2"></i>รหัสพนักงาน
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="<?php echo $row['employee_id']; ?>" readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-4 col-form-label">
                                <i class="fas fa-user me-2"></i>ชื่อพนักงาน
                            </label>
                            <div class="col-sm-8">
                                <input type="text" name="first_name" class="form-control" maxlength="10" 
                                       value="<?php echo $row['first_name']; ?>" required>
                            </div>
                        </div>
        
                        <div class="row mb-3">
                            <label class="col-sm-4 col-form-label">
                                <i class="fas fa-user-friends me-2"></i>นามสกุล
                            </label>
                            <div class="col-sm-8">
                                <input type="text" name="last_name" class="form-control" maxlength="10" 
                                       value="<?php echo $row['last_name']; ?>" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-4 col-form-label">
                                <i class="fas fa-building me-2"></i>แผนก
                            </label>
                            <div class="col-sm-8">
                                <select name="department" class="form-select" required>
                                    <option value="">กรุณาเลือกแผนก</option>
                                    <?php 
                                    $departments = [
                                        'ฝ่ายบุคคล', 
                                        'ฝ่ายการตลาด', 
                                        'ฝ่ายผลิต', 
                                        'ฝ่ายบัญชี', 
                                        'ฝ่ายไอที'
                                    ];
                                    foreach ($departments as $dept) {
                                        $selected = ($row['department'] == $dept) ? 'selected' : '';
                                        echo "<option value='$dept' $selected>$dept</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-column">
                        <div class="row mb-3">
                            <label class="col-sm-4 col-form-label">
                                <i class="fas fa-venus-mars me-2"></i>เพศ
                            </label>
                            <div class="col-sm-8">
                                <select name="gender" class="form-select" required>
                                    <option value="">กรุณาเลือกเพศ</option>
                                    <?php 
                                    $genders = ['ชาย', 'หญิง', 'LGBTQ+'];
                                    foreach ($genders as $gender) {
                                        $selected = ($row['gender'] == $gender) ? 'selected' : '';
                                        echo "<option value='$gender' $selected>$gender</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-4 col-form-label">
                                <i class="fas fa-birthday-cake me-2"></i>อายุ
                            </label>
                            <div class="col-sm-8">
                                <input type="number" name="age" class="form-control" min="18" max="100" 
                                       value="<?php echo $row['age']; ?>" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-4 col-form-label">
                                <i class="fas fa-money-bill-wave me-2"></i>เงินเดือน
                            </label>
                            <div class="col-sm-8">
                                <input type="number" name="salary" class="form-control" min="0" step="0.01" 
                                       value="<?php echo $row['salary']; ?>" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-center gap-3 mt-4">
                    <button type="submit" class="btn btn-primary btn-custom">
                        <i class="fas fa-save me-2"></i>บันทึกข้อมูล
                    </button>
                    <button type="reset" class="btn btn-danger btn-custom">
                        <i class="fas fa-times me-2"></i>ยกเลิก
                    </button>
                </div>
            </form>

            <div class="footer-section mt-4">
                <p>
                    <i class="fas fa-code me-2"></i>
                    พัฒนาโดย 664485028 นภัสกร กิตติเรืองชัย
                </p>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>