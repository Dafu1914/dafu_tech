<?php
require_once '../config.php';

// New password
$password = 'admin123';

// Create hash
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

echo "Password: " . $password . "<br>";
echo "Hash: " . $hashed_password . "<br><br>";

// Check if admin exists
$check_sql = "SELECT * FROM admin_users WHERE username = 'admin'";
$check_result = mysqli_query($conn, $check_sql);

if(mysqli_num_rows($check_result) > 0) {
    // Update existing admin
    $sql = "UPDATE admin_users SET password = '$hashed_password' WHERE username = 'admin'";
    if(mysqli_query($conn, $sql)) {
        echo "✅ Password updated successfully!<br>";
        echo "<a href='login.php'>Go to Login Page</a><br>";
        echo "Username: <strong>admin</strong><br>";
        echo "Password: <strong>admin123</strong>";
    } else {
        echo "❌ Error: " . mysqli_error($conn);
    }
} else {
    // Insert new admin
    $sql = "INSERT INTO admin_users (username, password, full_name, email, role) 
            VALUES ('admin', '$hashed_password', 'Administrator', 'admin@dafutech.com', 'super_admin')";
    if(mysqli_query($conn, $sql)) {
        echo "✅ Admin user created successfully!<br>";
        echo "<a href='login.php'>Go to Login Page</a><br>";
        echo "Username: <strong>admin</strong><br>";
        echo "Password: <strong>admin123</strong>";
    } else {
        echo "❌ Error: " . mysqli_error($conn);
    }
}
?>