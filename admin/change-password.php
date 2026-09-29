<?php
session_start();
require_once '../config.php';

if(!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit;
}

$error = '';
$success = '';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    
    if(empty($current_password) || empty($new_password) || empty($confirm_password)) {
        $error = 'Please fill in all fields.';
    } elseif($new_password !== $confirm_password) {
        $error = 'New passwords do not match.';
    } elseif(strlen($new_password) < 6) {
        $error = 'New password must be at least 6 characters long.';
    } else {
        $admin_id = $_SESSION['admin_id'];
        $sql = "SELECT password FROM admin_users WHERE id = $admin_id";
        $result = mysqli_query($conn, $sql);
        $admin = mysqli_fetch_assoc($result);
        
        if(password_verify($current_password, $admin['password'])) {
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
            $update_sql = "UPDATE admin_users SET password = '$hashed_password' WHERE id = $admin_id";
            if(mysqli_query($conn, $update_sql)) {
                $success = '✅ Password changed successfully!';
            } else {
                $error = '❌ Error changing password. Please try again.';
            }
        } else {
            $error = '❌ Current password is incorrect.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password - DAFU TECH SOLUTIONS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background-color: #f5f5f5; }
        .sidebar {
            background-color: #0F335D;
            min-height: 100vh;
            padding: 20px;
            color: white;
            position: fixed;
            width: 250px;
            left: 0;
            top: 0;
            overflow-y: auto;
        }
        .sidebar a {
            color: rgba(255,255,255,0.8);
            text-decoration: none;
            padding: 10px 15px;
            display: block;
            border-radius: 8px;
            transition: all 0.3s;
        }
        .sidebar a:hover, .sidebar a.active {
            background-color: rgba(44,196,182,0.2);
            color: white;
        }
        .sidebar a i { width: 25px; }
        .sidebar .brand {
            font-size: 1.3rem;
            font-weight: 700;
            padding: 15px 0;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            margin-bottom: 20px;
        }
        .sidebar .brand img { height: 30px; margin-right: 10px; }
        .main-content { margin-left: 250px; padding: 20px; }
        .btn-primary {
            background-color: #0F335D;
            border-color: #0F335D;
        }
        .btn-primary:hover {
            background-color: #0A2444;
            border-color: #0A2444;
        }
        .card-header { background-color: #0F335D; color: white; }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="brand">
            <img src="../assets/images/logo.png" alt="DAFU TECH">
            DAFU TECH
        </div>
        <a href="dashboard.php"><i class="fas fa-dashboard"></i> Dashboard</a>
        <a href="messages.php"><i class="fas fa-envelope"></i> Messages</a>
        <a href="services.php"><i class="fas fa-cogs"></i> Services</a>
        <a href="projects.php"><i class="fas fa-briefcase"></i> Projects</a>
        <a href="testimonials.php"><i class="fas fa-star"></i> Testimonials</a>
        <hr style="border-color: rgba(255,255,255,0.1);">
        <a href="change-password.php" class="active"><i class="fas fa-key"></i> Change Password</a>
        <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>
    
    <div class="main-content">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Change Password</h2>
            <span class="badge bg-primary"><?php echo $_SESSION['admin_name']; ?></span>
        </div>
        
        <?php if($error): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>
        
        <?php if($success): ?>
            <div class="alert alert-success"><?php echo $success; ?></div>
        <?php endif; ?>
        
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0"><i class="fas fa-key me-2"></i> Update Your Password</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="">
                            <div class="mb-3">
                                <label for="current_password" class="form-label">Current Password <span class="text-danger">*</span></label>
                                <input type="password" class="form-control" id="current_password" name="current_password" required>
                            </div>
                            <div class="mb-3">
                                <label for="new_password" class="form-label">New Password <span class="text-danger">*</span></label>
                                <input type="password" class="form-control" id="new_password" name="new_password" required minlength="6">
                                <small class="text-muted">Minimum 6 characters</small>
                            </div>
                            <div class="mb-3">
                                <label for="confirm_password" class="form-label">Confirm New Password <span class="text-danger">*</span></label>
                                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                            </div>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update Password</button>
                            <a href="dashboard.php" class="btn btn-secondary">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>