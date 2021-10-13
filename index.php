<?php
    $title = "Index";
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL); 
    include 'assets/inc/dbconnect.php'; 
    include 'assets/inc/header.php'; 
    include 'assets/inc/nav.php'; 

  

    session_start();
    if(!isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] != true ) 
    {
        header("Location: login.php");
        exit;
    }
    /*
    $sql = "SELECT * FROM uren";
    $sth = $db->prepare($sql);
    $sth->execute(); */
?>
<main id="index-main">
    <div id="top-container">
        <div id="urenklokker-container">
            <div id="urenklokker-inner">
                <?php include 'uren-klokker/list-uren-preview.php'; ?>
            </div>
        </div>
    </div>
    <div id="mid-container">
        <div id="charts-container">
            <div id="charts-inner">
                <?php include 'charts/charts-preview.php'; ?>
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