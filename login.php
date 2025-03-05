<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าสู่ระบบ</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Google Fonts - Itim -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Itim&display=swap" rel="stylesheet">

    <style>
        html, body {
            height: 100%;
            margin: 0;
        }

        body {
            background-color: #f0f4f8;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1000 800' opacity='0.1'%3E%3Cpath fill='%230066cc' d='M436.9 395.5c-39.5-41.8-93.7-67.6-153.7-67.6-117.5 0-212.8 95.3-212.8 212.8 0 117.5 95.3 212.8 212.8 212.8 60 0 114.2-25.8 153.7-67.6 39.5 41.8 93.7 67.6 153.7 67.6 117.5 0 212.8-95.3 212.8-212.8 0-117.5-95.3-212.8-212.8-212.8-60 0-114.2 25.8-153.7 67.6zm153.7 67.6c39.5-41.8 93.7-67.6 153.7-67.6 117.5 0 212.8 95.3 212.8 212.8 0 117.5-95.3 212.8-212.8 212.8-60 0-114.2-25.8-153.7-67.6-39.5 41.8-93.7 67.6-153.7 67.6-117.5 0-212.8-95.3-212.8-212.8 0-117.5 95.3-212.8 212.8-212.8 60 0 114.2 25.8 153.7 67.6z'/%3E%3Cpath fill='%230066cc' d='M436.9 540.8c39.5-41.8 93.7-67.6 153.7-67.6 117.5 0 212.8 95.3 212.8 212.8 0 117.5-95.3 212.8-212.8 212.8-60 0-114.2-25.8-153.7-67.6-39.5 41.8-93.7 67.6-153.7 67.6-117.5 0-212.8-95.3-212.8-212.8 0-117.5 95.3-212.8 212.8-212.8 60 0 114.2 25.8 153.7 67.6z'/%3E%3C/svg%3E");
            background-repeat: repeat;
            font-family: 'Itim', cursive;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
            padding: 40px;
            width: 100%;
            max-width: 450px;
            position: relative;
            z-index: 10;
        }

        .login-header {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .login-header i {
            font-size: 3rem;
            color: #0066cc;
            margin-bottom: 15px;
        }

        .form-label {
            font-weight: 500;
        }

        .form-control {
            padding-left: 35px;
        }

        .input-group-text {
            background-color: transparent;
            border-right: none;
            color: #0066cc;
        }

        .btn-login {
            width: 100%;
            padding: 10px;
            font-size: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #0066cc;
            border-color: #0066cc;
        }

        .btn-login i, .btn-cancel i {
            margin-right: 10px;
        }

        .btn-cancel {
            width: 100%;
            margin-top: 10px;
            background-color: #dc3545;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-cancel:hover {
            background-color: #c82333;
            color: white;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            color: #6c757d;
        }
    </style>
</head>
<body>
    <div class="login-wrapper">
        <div class="login-container">
            <div class="login-header">
                <i class="bi bi-lock-fill"></i>
                <h1>เข้าสู่ระบบ</h1>
            </div>
            <form action="chklogin.php" method="POST">
                <div class="mb-3">
                    <label for="u_id" class="form-label">
                        <i class="bi bi-person"></i> ชื่อผู้ใช้
                    </label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                        <input type="text" class="form-control" id="u_id" name="u_id" maxlength="30" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="u_passwd" class="form-label">
                        <i class="bi bi-lock"></i> รหัสผ่าน
                    </label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                        <input type="password" class="form-control" id="u_passwd" name="u_passwd" maxlength="30" required>
                    </div>
                </div>
                
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary btn-login">
                        <i class="bi bi-box-arrow-in-right"></i> เข้าสู่ระบบ
                    </button>
                    <button type="reset" class="btn btn-cancel">
                        <i class="bi bi-x-circle"></i> ยกเลิก
                    </button>
                </div>
            </form>
            
            <div class="footer mt-3">
                พัฒนาโดย 664485028 นภัสกร กิตติเรืองชัย
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>