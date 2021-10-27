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
                <a href="/job/Uren-klokker-2.0/index.php">
                    <i class='bx bxs-home' ></i>
                    <span class="links_name">Home</span>
                </a>
                <span class="sidebar_tooltip">Home</span>
            </li>
            <li>
                <a href="/job/Uren-klokker-2.0/assets/inc/uren-klokker/list_uren.php">
                    <i class='bx bxs-calendar'></i>
                    <span class="links_name">Uren</span>
                </a>
                <span class="sidebar_tooltip">Uren</span>
            </li>
            <li>
                <a href="/job/Uren-klokker-2.0/assets/inc/charts/charts.php">
                    <i class="fas fa-chart-pie"></i>
                    <span class="links_name">Charts</span>
                </a>
                <span class="sidebar_tooltip">Charts</span>
            </li>
            <li>
                <a href="/job/Uremn-klokker-2.0/assets/inc/to-do-list/to-do.php">
                    <i class='bx bx-task'></i>
                    <span class="links_name">Tasks</span>
                </a>
                <span class="sidebar_tooltip">Tasks</span>
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
                    <i class="fas fa-file-excel"></i>
                    <span class="links_name">export</span>
                </a>
                <span class="sidebar_tooltip">Export</span>
            </li>
            <li>
                <a href="">
                    <i class='bx bxs-edit-alt' ></i>
                    <span class="links_name">Editor</span>
                </a>
                <span class="sidebar_tooltip">Editor</span>
            </li>
            <li>
                <a href="">
                    <i class="fas fa-cog"></i>
                    <span class="links_name">Settings</span>
                </a>
                <span class="sidebar_tooltip">Settings</span>
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