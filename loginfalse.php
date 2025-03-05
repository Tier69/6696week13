<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Error</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Google Fonts - Itim -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Itim&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Itim', cursive;
            background-color: #e6f2ff;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 800 600'%3E%3Cpath fill='%23rgba(0,102,204,0.05)' d='M400 300 C350 200, 250 150, 200 250 C150 350, 250 400, 400 300 Z' opacity='0.1'/%3E%3Cpath fill='%23rgba(0,102,204,0.05)' d='M400 300 C450 200, 550 150, 600 250 C650 350, 550 400, 400 300 Z' opacity='0.1'/%3E%3Cpath fill='%23rgba(0,102,204,0.05)' d='M400 350 C350 450, 250 500, 200 400 C150 300, 250 250, 400 350 Z' opacity='0.1'/%3E%3Cpath fill='%23rgba(0,102,204,0.05)' d='M400 350 C450 450, 550 500, 600 400 C650 300, 550 250, 400 350 Z' opacity='0.1'/%3E%3C/svg%3E");
            background-repeat: repeat;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .error-container {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0,102,204,0.2);
            padding: 40px;
            text-align: center;
            max-width: 500px;
            width: 100%;
            border: 2px solid #4a90e2;
            position: relative;
            z-index: 10;
        }

        .error-icon {
            font-size: 5rem;
            color: #0066cc;
            margin-bottom: 20px;
        }

        .error-title {
            color: #0066cc;
            margin-bottom: 20px;
        }

        .error-message {
            color: #2c7bd4;
            margin-bottom: 30px;
        }

        .btn-back {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            background-color: #0066cc;
            border-color: #0066cc;
        }

        .btn-back:hover {
            background-color: #004c99;
            border-color: #004c99;
        }

        .footer {
            margin-top: 20px;
            color: #2c7bd4;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <div class="error-container">
        <i class="bi bi-x-circle error-icon"></i>
        <h1 class="error-title">Login ผิดพลาด</h1>
        <h2 class="error-message">กรุณาตรวจสอบ ชื่อผู้ใช้และรหัสผ่าน</h2>
        
        <a href="login.php" class="btn btn-primary btn-back">
            <i class="bi bi-arrow-left"></i> กลับสู่หน้าจอ Login
        </a>

        <div class="footer">
            พัฒนาโดย 664485028 นภัสกร กิตติเรืองชัย
        </div>
    </div>

    <!-- Bootstrap 5 JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>