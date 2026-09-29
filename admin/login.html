<?php
session_start();
require_once '../config.php';

// If already logged in, redirect to dashboard
if(isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header('Location: dashboard.php');
    exit;
}

$error = '';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];
    
    $sql = "SELECT * FROM admin_users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result) == 1) {
        $admin = mysqli_fetch_assoc($result);
        // Verify password
        if(password_verify($password, $admin['password'])) {
            $_SESSION['admin_logged_in'] = true;
            $_SESSION['admin_id'] = $admin['id'];
            $_SESSION['admin_name'] = $admin['full_name'];
            $_SESSION['admin_role'] = $admin['role'];
            header('Location: dashboard.php');
            exit;
        } else {
            $error = 'Invalid username or password!';
        }
    } else {
        $error = 'Invalid username or password!';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - DAFU TECH SOLUTIONS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #0F335D 0%, #0A2444 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-box {
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 15px 50px rgba(0,0,0,0.3);
            max-width: 450px;
            width: 100%;
        }
        .login-box h3 {
            color: #0F335D;
            font-weight: 700;
        }
        .login-box .logo {
            text-align: center;
            margin-bottom: 30px;
        }
        .login-box .logo img {
            max-height: 80px;
            width: auto;
            margin-bottom: 10px;
        }
        .btn-primary {
            background-color: #0F335D;
            border-color: #0F335D;
        }
        .btn-primary:hover {
            background-color: #0A2444;
            border-color: #0A2444;
        }
    </style>
</head>
<body>
    <div class="login-box">
        <div class="logo">
            <img src="../assets/images/logo.png" alt="DAFU TECH SOLUTIONS">
            <h3 class="mt-2">DAFU TECH</h3>
            <p class="text-muted">Admin Panel</p>
        </div>
        
        <?php if($error): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>
        
        <form method="POST" action="">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
        <p class="text-center mt-3 text-muted small">
            Default: admin / admin123
        </p>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
</body>
</html>