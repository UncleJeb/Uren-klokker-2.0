<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "/job/Uren-klokker-2.0/assets/inc/header.php";
	include_once $path; 
    include "../dbconnect.php";


    $id = empty($_GET["id"]) ?null : $_GET["id"];

    $sql = "SELECT * FROM uren WHERE id=:id";
    $params = array(":id" => $id);


    try {
        $sth = $db->prepare($sql);
        $sth->execute($params);
        $entry = $sth->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
?>
<main class="main">
    <div class="main-container">
        <div class="main-inner">
            <div class="page-title">
                <h3 class="title">Update Entry</h3>
            </div>
            <form class="update-form" action="" method="post">
                <div class="form-group">
                    <input type="hidden" value="<?php echo $entry["id"]?>" name="id" class="form-input">
                </div>
                <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" value="<?php echo $entry["username"] ?>" name="username" class="form-input" readonly>
                </div> 
                <div class="form-group">
                    <label for="">Total aantal uren</label>
                    <input type="text" value="<?php echo $entry["uren"]?>" name="uren"class="form-input">
                </div>
                <div class="form-group">
                    <label for="">Datum</label>
                    <input type="date" value="<?php echo $entry["datum"]?>" name="datum" class="form-input">
                </div>
                <div class="form-group">
                    <label for="">Beschrijving</label><br>
                    <input type="text" value="<?php echo $entry["beschrijving"]?>" name="beschrijving" class="form-input"> 
                </div>
                <button type="submit" name="submit">Update</button>
               <p class="form-text"><a class="form-links" href="/job/Uren-klokker-2.0/index.php"><i class='bx bx-arrow-back'></i> Back</a></p>
            </form>
            <?php 
                if(isset($_POST["submit"])) {
                
                    $id = $_POST["id"];
                    $username = $_POST["username"] ?? null;
                    $uren = $_POST["uren"] ?? null;
                    $datum = $_POST["datum"] ?? null;
                    $beschrijving = $_POST["beschrijving"] ?? null;
                
                    $sql = "UPDATE uren SET username = :username, uren = :uren, datum = :datum, beschrijving = :beschrijving WHERE id = :id";
                    $params = array(":username" => $username, ":uren" => $uren, ":datum" => $datum, ":beschrijving" => $beschrijving, ":id" => $id);
                
                    $sth = $db->prepare($sql);
                    $sth->execute($params);
                
                    header("Location: /job/Uren-klokker-2.0/index.php");
                }
            ?>
        </div>
    </div>
</main>