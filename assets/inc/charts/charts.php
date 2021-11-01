<?php
    $title = "List Uren";
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL); 
    setlocale(LC_ALL, 'nl_utf8', 'Dutch', 'nl_NL.UTF-8', 'Dutch_Netherlands.1252', 'WINDOWS-1252');
    include '../dbconnect.php'; 
    include '../header.php'; 
    include '../nav-2.php'; 

    $_username = $_SESSION["username"];

    $sqlsum = "SELECT SUM(uren) AS sumuren FROM uren WHERE username = '$_username'";
    $stmtSum = $db->prepare($sqlsum);
    $stmtSum->execute();
    $rowsum = $stmtSum->fetch(PDO::FETCH_ASSOC);
?>

<main class="page-main">
    <div class="row first">
        <div class="container chart_spacer">
            <div class="six columns">
                <?php include "../charts/pie_chart.php"; ?>
            </div>
            <div class="six columns">
                <?php include "../charts/line_chart.php"; ?>
            </div>
        </div>
    </div>
</main>
<?php
$path_footer = $_SERVER['DOCUMENT_ROOT'];
$path_footer .= "/job/Uren-klokker-2.0/assets/inc/footer.php";
include_once $path_footer; 
?>