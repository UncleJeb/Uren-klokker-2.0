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
                <div class="logo-name">Test</div>
            </div>
            <i class='bx bx-menu' id="btn"></i>
        </div>
        <ul class="nav_list">
            <li>
                    <input type="text" placeholder="search">
            </li>
            <li>
                <a href="">
                    <i class='bx bxs-home' ></i>
                    <span class="links_name">Home</span>
                </a>
                <span class="tooltip">Home</span>
            </li>
            <li>
                <a href="">
                    <i class="fas fa-code"></i>
                    <span class="links_name">Projects</span>
                </a>
                <span class="tooltip">Projects</span>
            </li>
            <li>
                <a href="">
                    <i class="fas fa-chart-pie"></i>
                    <span class="links_name">Charts</span>
                </a>
                <span class="tooltip">Charts</span>
            </li>
        </ul>
        <!--
        <div class="profile_content">
            <div class="profile">
                <div class="profile_details">
                    <img src="" alt="img">
                    <div class="name_job">
                        <div class="name">Test User</div>
                        <div class="job">Test Job</div>
                    </div>
                </div>
                <a href="logout.php"><i class="fas fa-power-off social-icons"></i></a>
            </div>
        </div>
        -->
    </div>