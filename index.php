<?php
    $title = "Index";
    include 'assets/inc/header.php'; 
    include 'assets/inc/nav.php';    

    session_start();
    if(!isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] != true ) 
    {
        header("Location: login.php");
        exit;
    }
?>
<main>

</main>
<?php include 'assets/inc/footer.php'; ?>