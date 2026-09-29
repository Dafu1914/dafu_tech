<?php
session_start();
require_once '../config.php';

if(!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit;
}

// Get counts
$service_count = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM services"));
$project_count = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM projects"));
$testimonial_count = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM testimonials"));
$message_count = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM contact_messages"));
$unread_count = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM contact_messages WHERE status = 'unread'"));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - DAFU TECH SOLUTIONS</title>
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
            position: relative;
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
        .sidebar .brand img {
            height: 30px;
            margin-right: 10px;
        }
        .sidebar .badge-notification {
            background-color: #dc3545;
            color: white;
            border-radius: 50%;
            padding: 2px 8px;
            font-size: 0.7rem;
            float: right;
            margin-top: 2px;
        }
        .main-content {
            margin-left: 250px;
            padding: 20px;
        }
        .stat-card {
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
            transition: all 0.3s;
        }
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(0,0,0,0.12);
        }
        .stat-card .icon {
            font-size: 2.5rem;
            color: #2CC4B6;
        }
        .stat-card .number {
            font-size: 2rem;
            font-weight: 700;
            color: #0F335D;
        }
        .stat-card .badge-pending {
            background-color: #dc3545;
            color: white;
            padding: 3px 10px;
            border-radius: 20px;
            font-size: 0.75rem;
        }
        .btn-primary {
            background-color: #0F335D;
            border-color: #0F335D;
        }
        .btn-primary:hover {
            background-color: #0A2444;
            border-color: #0A2444;
        }
        .btn-success {
            background-color: #2CC4B6;
            border-color: #2CC4B6;
        }
        .btn-success:hover {
            background-color: #239E92;
            border-color: #239E92;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="brand">
            <img src="../assets/images/logo.png" alt="DAFU TECH">
            DAFU TECH
        </div>
        <a href="dashboard.php" class="active"><i class="fas fa-dashboard"></i> Dashboard</a>
        <a href="messages.php">
            <i class="fas fa-envelope"></i> Messages
            <?php if($unread_count > 0): ?>
                <span class="badge-notification"><?php echo $unread_count; ?></span>
            <?php endif; ?>
        </a>
        <a href="services.php"><i class="fas fa-cogs"></i> Services</a>
        <a href="projects.php"><i class="fas fa-briefcase"></i> Projects</a>
        <a href="testimonials.php"><i class="fas fa-star"></i> Testimonials</a>
        <hr style="border-color: rgba(255,255,255,0.1);">
        <a href="change-password.php"><i class="fas fa-key"></i> Change Password</a>
        <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>
    
    <div class="main-content">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Welcome, <?php echo $_SESSION['admin_name']; ?>!</h2>
            <div>
                <span class="badge bg-success"><?php echo $_SESSION['admin_role']; ?></span>
                <span class="badge bg-primary ms-2"><?php echo date('F d, Y'); ?></span>
            </div>
        </div>
        
        <div class="row g-4">
            <div class="col-md-3">
                <div class="stat-card text-center">
                    <div class="icon"><i class="fas fa-cogs"></i></div>
                    <div class="number"><?php echo $service_count; ?></div>
                    <p class="text-muted">Services</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card text-center">
                    <div class="icon"><i class="fas fa-briefcase"></i></div>
                    <div class="number"><?php echo $project_count; ?></div>
                    <p class="text-muted">Projects</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card text-center">
                    <div class="icon"><i class="fas fa-star"></i></div>
                    <div class="number"><?php echo $testimonial_count; ?></div>
                    <p class="text-muted">Testimonials</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card text-center">
                    <div class="icon"><i class="fas fa-envelope"></i></div>
                    <div class="number"><?php echo $message_count; ?></div>
                    <p class="text-muted">Messages</p>
                    <?php if($unread_count > 0): ?>
                        <span class="badge-pending"><?php echo $unread_count; ?> Unread</span>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Quick Actions</h5>
                        <div class="d-flex gap-3 flex-wrap">
                            <a href="messages.php" class="btn btn-success">
                                <i class="fas fa-envelope"></i> View Messages
                                <?php if($unread_count > 0): ?>
                                    <span class="badge bg-danger ms-1"><?php echo $unread_count; ?></span>
                                <?php endif; ?>
                            </a>
                            <a href="services.php?action=add" class="btn btn-primary">
                                <i class="fas fa-plus"></i> Add Service
                            </a>
                            <a href="projects.php?action=add" class="btn btn-primary">
                                <i class="fas fa-plus"></i> Add Project
                            </a>
                            <a href="testimonials.php?action=add" class="btn btn-primary">
                                <i class="fas fa-plus"></i> Add Testimonial
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="background-color: #0F335D; color: white;">
                        <h5 class="mb-0"><i class="fas fa-clock"></i> Recent Messages</h5>
                    </div>
                    <div class="card-body">
                        <?php
                        $recent_sql = "SELECT * FROM contact_messages ORDER BY created_at DESC LIMIT 5";
                        $recent_result = mysqli_query($conn, $recent_sql);
                        ?>
                        <?php if(mysqli_num_rows($recent_result) > 0): ?>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>From</th>
                                            <th>Subject</th>
                                            <th>Status</th>
                                            <th>Received</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while($row = mysqli_fetch_assoc($recent_result)): ?>
                                            <tr>
                                                <td><?php echo $row['full_name']; ?></td>
                                                <td><?php echo $row['subject']; ?></td>
                                                <td>
                                                    <span class="badge bg-<?php echo $row['status'] == 'unread' ? 'danger' : 'success'; ?>">
                                                        <?php echo ucfirst($row['status']); ?>
                                                    </span>
                                                </td>
                                                <td><?php echo date('M d, Y H:i', strtotime($row['created_at'])); ?></td>
                                            </tr>
                                        <?php endwhile; ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php else: ?>
                            <p class="text-muted text-center mb-0">No messages yet.</p>
                        <?php endif; ?>
                        <a href="messages.php" class="btn btn-sm btn-primary mt-2">View All</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>