<?php
    $title = "List Uren";
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL); 
    setlocale(LC_ALL, 'nl_utf8', 'Dutch', 'nl_NL.UTF-8', 'Dutch_Netherlands.1252', 'WINDOWS-1252');
    include '../dbconnect.php'; 
    include '../header.php'; 
    include '../nav-2.php'; 
?>

<main class="page-main">
    <div class="row">
        <div class="container">
            <div class="six columns">
                <?php include "../charts/charts-preview.php"; ?>
            </div>
            <div class="six columns"></div>
        </div>
    </div>
</main>