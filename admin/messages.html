<?php
session_start();
require_once '../config.php';

if(!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit;
}

// Mark as read
if(isset($_GET['read']) && !empty($_GET['read'])) {
    $id = intval($_GET['read']);
    $sql = "UPDATE contact_messages SET status = 'read' WHERE id = $id";
    mysqli_query($conn, $sql);
    header('Location: messages.php');
    exit;
}

// Mark all as read
if(isset($_GET['read_all'])) {
    $sql = "UPDATE contact_messages SET status = 'read' WHERE status = 'unread'";
    mysqli_query($conn, $sql);
    header('Location: messages.php');
    exit;
}

// Delete message
if(isset($_GET['delete']) && !empty($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $sql = "DELETE FROM contact_messages WHERE id = $id";
    mysqli_query($conn, $sql);
    $_SESSION['message'] = 'Message deleted successfully!';
    $_SESSION['message_type'] = 'success';
    header('Location: messages.php');
    exit;
}

// Fetch all messages
$sql = "SELECT * FROM contact_messages ORDER BY 
        CASE WHEN status = 'unread' THEN 0 ELSE 1 END, 
        created_at DESC";
$result = mysqli_query($conn, $sql);
$unread_count = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM contact_messages WHERE status = 'unread'"));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages - DAFU TECH SOLUTIONS</title>
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
        .sidebar .badge-notification {
            background-color: #dc3545;
            color: white;
            border-radius: 50%;
            padding: 2px 8px;
            font-size: 0.7rem;
            float: right;
            margin-top: 2px;
        }
        .main-content { margin-left: 250px; padding: 20px; }
        .btn-primary { background-color: #0F335D; border-color: #0F335D; }
        .btn-primary:hover { background-color: #0A2444; border-color: #0A2444; }
        .btn-success { background-color: #2CC4B6; border-color: #2CC4B6; }
        .btn-success:hover { background-color: #239E92; border-color: #239E92; }
        .message-unread { background-color: #fff3cd !important; font-weight: 600; }
        .message-read { background-color: #fff !important; }
        .status-badge-unread { background-color: #dc3545; color: white; padding: 3px 10px; border-radius: 20px; font-size: 0.7rem; }
        .status-badge-read { background-color: #28a745; color: white; padding: 3px 10px; border-radius: 20px; font-size: 0.7rem; }
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
        <a href="messages.php" class="active">
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
            <h2>Contact Messages</h2>
            <div>
                <?php if($unread_count > 0): ?>
                    <a href="?read_all=1" class="btn btn-success btn-sm">
                        <i class="fas fa-check-double"></i> Mark All as Read
                    </a>
                <?php endif; ?>
                <span class="badge bg-danger ms-2"><?php echo $unread_count; ?> Unread</span>
            </div>
        </div>
        
        <?php if(isset($_SESSION['message'])): ?>
            <div class="alert alert-<?php echo $_SESSION['message_type']; ?> alert-dismissible fade show">
                <?php echo $_SESSION['message']; unset($_SESSION['message']); unset($_SESSION['message_type']); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>
        
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Service</th>
                                <th>Status</th>
                                <th>Received</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(mysqli_num_rows($result) > 0): ?>
                                <?php while($row = mysqli_fetch_assoc($result)): ?>
                                    <tr class="<?php echo $row['status'] == 'unread' ? 'message-unread' : 'message-read'; ?>">
                                        <td><?php echo $row['id']; ?></td>
                                        <td><strong><?php echo $row['full_name']; ?></strong></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td><?php echo $row['subject']; ?></td>
                                        <td><?php echo $row['service_interest'] ? $row['service_interest'] : 'N/A'; ?></td>
                                        <td>
                                            <?php if($row['status'] == 'unread'): ?>
                                                <span class="status-badge-unread"><i class="fas fa-circle"></i> Unread</span>
                                            <?php else: ?>
                                                <span class="status-badge-read"><i class="fas fa-check-circle"></i> Read</span>
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo date('M d, Y H:i', strtotime($row['created_at'])); ?></td>
                                        <td>
                                            <div class="btn-group btn-group-sm">
                                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#viewModal<?php echo $row['id']; ?>">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                                <?php if($row['status'] == 'unread'): ?>
                                                    <a href="?read=<?php echo $row['id']; ?>" class="btn btn-success">
                                                        <i class="fas fa-check"></i>
                                                    </a>
                                                <?php endif; ?>
                                                <a href="?delete=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Delete this message?')">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    
                                    <!-- View Modal -->
                                    <div class="modal fade" id="viewModal<?php echo $row['id']; ?>" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header" style="background-color: #0F335D; color: white;">
                                                    <h5 class="modal-title">Message from <?php echo $row['full_name']; ?></h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="mb-2"><strong>Name:</strong> <?php echo $row['full_name']; ?></div>
                                                    <div class="mb-2"><strong>Email:</strong> <?php echo $row['email']; ?></div>
                                                    <div class="mb-2"><strong>Phone:</strong> <?php echo $row['phone'] ? $row['phone'] : 'Not provided'; ?></div>
                                                    <div class="mb-2"><strong>Subject:</strong> <?php echo $row['subject']; ?></div>
                                                    <div class="mb-2"><strong>Service Interest:</strong> <?php echo $row['service_interest'] ? $row['service_interest'] : 'Not specified'; ?></div>
                                                    <hr>
                                                    <div class="mb-2"><strong>Message:</strong></div>
                                                    <p><?php echo nl2br($row['message']); ?></p>
                                                    <hr>
                                                    <div class="mb-2"><strong>Received:</strong> <?php echo date('F d, Y H:i:s', strtotime($row['created_at'])); ?></div>
                                                    <div class="mb-2"><strong>Status:</strong> <?php echo ucfirst($row['status']); ?></div>
                                                </div>
                                                <div class="modal-footer">
                                                    <?php if($row['status'] == 'unread'): ?>
                                                        <a href="?read=<?php echo $row['id']; ?>" class="btn btn-success">Mark as Read</a>
                                                    <?php endif; ?>
                                                    <a href="mailto:<?php echo $row['email']; ?>" class="btn btn-primary">Reply</a>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="8" class="text-center py-4">
                                        <i class="fas fa-envelope-open fa-3x text-muted"></i>
                                        <p class="mt-2">No messages yet.</p>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>