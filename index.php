<?php
    $title = "Overview";
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL); 
    setlocale(LC_ALL, 'nl_utf8', 'Dutch', 'nl_NL.UTF-8', 'Dutch_Netherlands.1252', 'WINDOWS-1252');
    include 'assets/inc/dbconnect.php'; 
    include 'assets/inc/header.php'; 
    include 'assets/inc/nav-2.php'; 
?>

<main id="index-main">
    <div class="row">
        <div id="top-container" class="container">
            <div id="urenklokker-container" >
                <div id="urenklokker-inner" class="table-resposive-md">
                    <?php include 'assets/inc/uren-klokker/list-uren.php'; ?>
                </div>
            </div>
        </div>
    </div>
    <div id="mid-container" class="container">
        <div class="row">
            <div class="six columns">
                <div id="charts-container">
                    <div id="charts-inner">
                        <?php include 'assets/inc/charts/pie_chart.php'; ?>
                    </div>
                </div>
            </div>
            <div class="six columns">
                <div id="to-do_container">
                    <div id="to-do_inner">
                        <?php include "assets/inc/to-do-list/to-do.php"; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="bottom-container">
        <div id="agenda-container">
        </div>
        <div id="text-editor-container">

        </div>
    </div>
</main>
<?php include 'assets/inc/footer.php'; ?>


