<?php
session_start();
require_once '../config.php';

if(!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit;
}

// Handle delete
if(isset($_GET['delete']) && !empty($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $sql = "DELETE FROM projects WHERE id = $id";
    mysqli_query($conn, $sql);
    $_SESSION['message'] = 'Project deleted successfully!';
    $_SESSION['message_type'] = 'success';
    header('Location: projects.php');
    exit;
}

// Handle add/update
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $project_name = mysqli_real_escape_string($conn, $_POST['project_name']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $technologies = mysqli_real_escape_string($conn, $_POST['technologies']);
    $image = mysqli_real_escape_string($conn, $_POST['image']);
    $project_url = mysqli_real_escape_string($conn, $_POST['project_url']);
    
    if(isset($_POST['edit_id']) && !empty($_POST['edit_id'])) {
        $edit_id = intval($_POST['edit_id']);
        $sql = "UPDATE projects SET project_name='$project_name', category='$category', description='$description', technologies='$technologies', image='$image', project_url='$project_url' WHERE id=$edit_id";
        mysqli_query($conn, $sql);
        $_SESSION['message'] = 'Project updated successfully!';
        $_SESSION['message_type'] = 'success';
    } else {
        $sql = "INSERT INTO projects (project_name, category, description, technologies, image, project_url) VALUES ('$project_name', '$category', '$description', '$technologies', '$image', '$project_url')";
        mysqli_query($conn, $sql);
        $_SESSION['message'] = 'Project added successfully!';
        $_SESSION['message_type'] = 'success';
    }
    header('Location: projects.php');
    exit;
}

$sql = "SELECT * FROM projects ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projects - DAFU TECH SOLUTIONS</title>
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
        .sidebar a:hover, .sidebar a.active { background-color: rgba(44,196,182,0.2); color: white; }
        .sidebar a i { width: 25px; }
        .sidebar .brand { font-size: 1.3rem; font-weight: 700; padding: 15px 0; border-bottom: 1px solid rgba(255,255,255,0.1); margin-bottom: 20px; }
        .sidebar .brand img { height: 30px; margin-right: 10px; }
        .main-content { margin-left: 250px; padding: 20px; }
        .btn-primary { background-color: #0F335D; border-color: #0F335D; }
        .btn-primary:hover { background-color: #0A2444; border-color: #0A2444; }
        .card-header { background-color: #0F335D; color: white; }
        .table th { background-color: #0F335D; color: white; }
        .project-image { width: 60px; height: 45px; object-fit: cover; border-radius: 4px; }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="brand"><img src="../assets/images/logo.png" alt="DAFU TECH"> DAFU TECH</div>
        <a href="dashboard.php"><i class="fas fa-dashboard"></i> Dashboard</a>
        <a href="messages.php"><i class="fas fa-envelope"></i> Messages</a>
        <a href="services.php"><i class="fas fa-cogs"></i> Services</a>
        <a href="projects.php" class="active"><i class="fas fa-briefcase"></i> Projects</a>
        <a href="testimonials.php"><i class="fas fa-star"></i> Testimonials</a>
        <hr style="border-color: rgba(255,255,255,0.1);">
        <a href="change-password.php"><i class="fas fa-key"></i> Change Password</a>
        <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>
    
    <div class="main-content">
        <h2 class="mb-4">Manage Projects</h2>
        
        <?php if(isset($_SESSION['message'])): ?>
            <div class="alert alert-<?php echo $_SESSION['message_type']; ?> alert-dismissible fade show">
                <?php echo $_SESSION['message']; unset($_SESSION['message']); unset($_SESSION['message_type']); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>
        
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-plus"></i> Add New Project</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Project Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="project_name" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Category <span class="text-danger">*</span></label>
                            <select class="form-select" name="category" required>
                                <option value="Web Development">Web Development</option>
                                <option value="Mobile Development">Mobile Development</option>
                                <option value="System Development">System Development</option>
                                <option value="Desktop Development">Desktop Development</option>
                                <option value="API Integration">API Integration</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description <span class="text-danger">*</span></label>
                        <textarea class="form-control" name="description" rows="2" required></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Technologies</label>
                            <input type="text" class="form-control" name="technologies" placeholder="PHP, MySQL, Bootstrap">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Image Filename</label>
                            <input type="text" class="form-control" name="image" placeholder="project-name.jpg">
                            <small class="text-muted">Upload image to assets/images/</small>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Project URL</label>
                            <input type="url" class="form-control" name="project_url" placeholder="https://example.com">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Add Project</button>
                </form>
            </div>
        </div>
        
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Project</th>
                                <th>Category</th>
                                <th>Technologies</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(mysqli_num_rows($result) > 0): ?>
                                <?php while($row = mysqli_fetch_assoc($result)): ?>
                                    <tr>
                                        <td>
                                            <?php if($row['image']): ?>
                                                <img src="../assets/images/<?php echo $row['image']; ?>" class="project-image" alt="<?php echo $row['project_name']; ?>">
                                            <?php else: ?>
                                                <span class="text-muted">No image</span>
                                            <?php endif; ?>
                                        </td>
                                        <td><strong><?php echo $row['project_name']; ?></strong></td>
                                        <td><?php echo $row['category']; ?></td>
                                        <td><?php echo $row['technologies']; ?></td>
                                        <td>
                                            <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $row['id']; ?>">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <a href="?delete=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete this project?')">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    
                                    <!-- Edit Modal -->
                                    <div class="modal fade" id="editModal<?php echo $row['id']; ?>" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header" style="background-color: #0F335D; color: white;">
                                                    <h5 class="modal-title">Edit Project</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <form method="POST" action="">
                                                    <div class="modal-body">
                                                        <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                                                        <div class="mb-3">
                                                            <label class="form-label">Project Name</label>
                                                            <input type="text" class="form-control" name="project_name" value="<?php echo $row['project_name']; ?>" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Category</label>
                                                            <select class="form-select" name="category">
                                                                <option value="Web Development" <?php echo ($row['category'] == 'Web Development') ? 'selected' : ''; ?>>Web Development</option>
                                                                <option value="Mobile Development" <?php echo ($row['category'] == 'Mobile Development') ? 'selected' : ''; ?>>Mobile Development</option>
                                                                <option value="System Development" <?php echo ($row['category'] == 'System Development') ? 'selected' : ''; ?>>System Development</option>
                                                                <option value="Desktop Development" <?php echo ($row['category'] == 'Desktop Development') ? 'selected' : ''; ?>>Desktop Development</option>
                                                                <option value="API Integration" <?php echo ($row['category'] == 'API Integration') ? 'selected' : ''; ?>>API Integration</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Description</label>
                                                            <textarea class="form-control" name="description" rows="2" required><?php echo $row['description']; ?></textarea>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Technologies</label>
                                                            <input type="text" class="form-control" name="technologies" value="<?php echo $row['technologies']; ?>">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Image Filename</label>
                                                            <input type="text" class="form-control" name="image" value="<?php echo $row['image']; ?>">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Project URL</label>
                                                            <input type="url" class="form-control" name="project_url" value="<?php echo $row['project_url']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-primary">Update Project</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <tr><td colspan="5" class="text-center">No projects found.</td></tr>
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