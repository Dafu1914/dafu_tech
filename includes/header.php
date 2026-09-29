<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITE_NAME; ?></title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/style.css">
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="<?php echo BASE_URL; ?>">
                <img src="<?php echo BASE_URL; ?>assets/images/logo.png" alt="DAFU TECH SOLUTIONS" style="height: 45px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <?php
                    $current_page = basename($_SERVER['PHP_SELF']);
                    $current_page = str_replace('.php', '', $current_page);
                    if(strpos($_SERVER['PHP_SELF'], '/pages/') !== false) {
                        $current_page = basename($_SERVER['PHP_SELF']);
                        $current_page = str_replace('.php', '', $current_page);
                    }
                    if($current_page == 'index' || $current_page == '') {
                        $current_page = 'home';
                    }
                    ?>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($current_page == 'home' || $current_page == 'index') ? 'active' : ''; ?>" href="<?php echo BASE_URL; ?>">
                            <i class="fas fa-home"></i> Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($current_page == 'about') ? 'active' : ''; ?>" href="<?php echo BASE_URL; ?>pages/about.php">
                            <i class="fas fa-info-circle"></i> About
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($current_page == 'services') ? 'active' : ''; ?>" href="<?php echo BASE_URL; ?>pages/services.php">
                            <i class="fas fa-cogs"></i> Services
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($current_page == 'portfolio') ? 'active' : ''; ?>" href="<?php echo BASE_URL; ?>pages/portfolio.php">
                            <i class="fas fa-briefcase"></i> Portfolio
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($current_page == 'contact') ? 'active' : ''; ?>" href="<?php echo BASE_URL; ?>pages/contact.php">
                            <i class="fas fa-envelope"></i> Contact
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>