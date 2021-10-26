<?php
    $title = "Index";
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL); 
    include 'assets/inc/dbconnect.php'; 
    include 'assets/inc/header.php'; 
    include 'assets/inc/nav-2.php'; 
?>
<script src="assets/js/main.js" async></script>
<main id="index-main">
    <div class="row">
        <div id="top-container" class="container">
            <div id="urenklokker-container" >
                <div id="urenklokker-inner" class="table-resposive-md">
                    <?php include 'assets/inc/uren-klokker/list-uren-preview.php'; ?>
                </div>
            </div>
        </div>
    </div>
    <div id="mid-container" class="container">
        <div class="row">
            <div class="six columns">
                <div id="charts-container">
                    <div id="charts-inner">
                        <?php include 'assets/inc/charts/charts-preview.php'; ?>
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


<div class='overlay'>
    <div class='popup'>
        <div class='close'>&#10006;</div>
            <h2>Update</h2> 
            <?php 
                $id = $_GET["id"];

                echo $id;
                
                $sql = "SELECT * FROM uren WHERE id=:id";
                $params = array(":id" => $id);


                    $sth = $db->prepare($sql);
                    $sth->execute($params);
                    $entry = $sth->fetch(PDO::FETCH_ASSOC);
                
                
            ?>
            <div class="form">
                <form class="update-form" action="" method="post">
                    <div class="form-group">
                        <input type="hidden" value="<?php echo $entry["id"]?>" name="id"id="id">
                    </div>
                    <div class="form-group">
                        <label for="">Username</label><br>
                        <input type="text" value="<?php echo $entry["username"] ?>" name="username" id="username" readonly>
                    </div> 
                    <div class="form-group">
                        <label for="">Total aantal uren</label><br>
                        <input type="text" value="<?php echo $entry["uren"]?>" name="uren" id="uren">
                    </div>
                    <div class="form-group">
                        <label for="">Datum</label><br>
                        <input type="date" value="<?php echo $entry["datum"]?>" name="datum" id="datum">
                    </div>
                    <div class="form-group">
                        <label for="">Beschrijving</label><br>
                        <input type="text" value="<?php echo $entry["beschrijving"]?>" name="beschrijving" id="beschrijving"> 
                    </div>
                    <div class="form-group">
                        <input type="submit" value="submit" class="btn btn-primary" name="submit"> 
                    </div>
                </form>
            </div>
    </div>
</div>

<?php include 'assets/inc/footer.php'; ?>

