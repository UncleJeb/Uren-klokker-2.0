<?php
session_start();
    if(!isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] != true ) 
    {
        header("Location: login.php");
        exit;
    }
?>
    <div class="sidebar">
        <div class="logo-content">
            <div class="logo">
                <i class='bx bx-time-five'></i>
                <div class="logo-name">Uren Klokker</div>
            </div>
            <i class='bx bx-menu' id="btn"></i>
        </div>
        <ul class="nav_list">
            <li>
                <a>
                <i class='bx bx-search'></i>
                <input type="text" placeholder="search">
                <span class="sidebar_tooltip">Search</span>
                </a>
            </li>
            <li>
                <a href="">
                    <i class='bx bxs-home' ></i>
                    <span class="links_name">Home</span>
                </a>
                <span class="sidebar_tooltip">Home</span>
            </li>
            <li>
                <a href="">
                    <i class="fas fa-code"></i>
                    <span class="links_name">Projects</span>
                </a>
                <span class="sidebar_tooltip">Projects</span>
            </li>
            <li>
                <a href="">
                    <i class="fas fa-chart-pie"></i>
                    <span class="links_name">Charts</span>
                </a>
                <span class="sidebar_tooltip">Charts</span>
            </li>
        </ul>
        <div class="profile_content">
            <div class="profile">
                <div class="profile_details">
                    <img src="https://via.placeholder.com/150" alt="img">
                    <div class="name_job">
                        <div class="name"><?php echo $_SESSION['username']; ?></div>
                        <div class="job"><?php echo $_SESSION['occupation'] ?? null; ?></div>
                    </div>
                </div>
                <a href="logout.php"><i id="logout" class="fas fa-power-off"></i></a>
            </div>
        </div>
    </div>