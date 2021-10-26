<?php
    $title = "Index";
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL); 
    include 'assets/inc/dbconnect.php'; 
    include 'assets/inc/header.php'; 
    include 'assets/inc/nav-2.php'; 
?>

<main id="index-main">
<div id="urenklokker-container" >
            <div id="urenklokker-inner" class="table-resposive-md">
                <?php include 'assets/inc/uren-klokker/list-uren-preview.php'; ?>
            </div>
        </div>
</main>
<?php include 'assets/inc/footer.php'; ?>