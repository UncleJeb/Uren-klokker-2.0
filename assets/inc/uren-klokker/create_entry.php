<?php
session_start();
$title = 'Create Entry';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
setlocale(LC_ALL, 'nl_utf8', 'Dutch', 'nl_NL.UTF-8', 'Dutch_Netherlands.1252', 'WINDOWS-1252');

    if(isset($_SESSION['loggedIn']) && $_SESSION["loggedIn"] === false) {
        header("Location: login.php");
    }
    include "../db/dbconnect.php";
	include "../header.php"; 

    $sql = "SELECT username FROM users";
    $sth = $db->prepare($sql);
    $sth->execute();

    $username = $uren = $datum = $beschrijving = "";
    $usernameErr = $urenERR = $datumErr = $beschrijvingErr = "";
?>
<main id="create-entry-main" class="main">
    <div id="create-entry-container" class="main-container">
        <div id="create-entry-inner" class="main-inner">
            <div id="page-title" class="page-title">
                <h3 id="login-title" class="title">Create Entry</h3>
            </div>
            <form method="POST">
                <div class="form-group">
                    <label for="">Gebruiker</label>
                    <input type="text" readonly="readonly" value="<?php echo $_SESSION["username"]; ?>" name="username"class="form-input" id="username" readonly>
                    <span class="error"><?php echo $usernameErr ?></span>
                </div>
                <div class="form-group">
                    <label for="">Tijd Begonnen</label>
                    <input type="time" value="08:30" name="tijdbegin" class="form-input" id="tijdbegin">
                </div>
                <div class="form-group">
                    <label for="">Tijd Geëndigd</label>
                    <input type="time" value="16:30" name="tijdeind" class="form-input" id="tijdeind">
                </div>
                <div class="form-group">
                    <label for="">Datum</label>
                    <input type="date" name="datum" class="form-input" id="datum" value="<?php echo date("Y-m-d")?>" required>
                    <span class="error"><?php echo $datumErr ?></span>
                </div>
                <div class="form-group">
                    <label for="">Beschrijving</label>
                    <textarea name="beschrijving" placeholder="schrijf hier wat je vandaag hebt gedaan.." class="form-input"  cols="30" rows="10"></textarea>
                </div>
                <button type="submit" name="submit">Create</button><br>
                <p class="form-text"><a class="form-links" href="/job/Uren-klokker-2.0/index.php"><i class='bx bx-arrow-back'></i> Back</a></p>
            </form>
<?php

                $username = $_POST["username"] ?? null;
                $tijdbegin = $_POST["tijdbegin"] ?? null;
                $tijdeind = $_POST["tijdeind"] ?? null;
                $tijdsec = strtotime($tijdeind) - strtotime($tijdbegin);
                $uren = ($tijdsec / 3600) - 1;
                $datum = $_POST["datum"] ?? null;
                $beschrijving = $_POST["beschrijving"] ?? null;

                
                if(isset($_POST["submit"]))
                {
                            
                            $sql = "INSERT INTO uren (username, uren, datum, beschrijving) 
                            VALUES (:username, :uren, :datum, :beschrijving)";
                            $params = array(":username" => $username, ":uren" => $uren, ":datum" => $datum, ":beschrijving" => $beschrijving);
                            $sth = $db->prepare($sql);
                            $sth->execute($params);  
                            
                            header("Location: ".directoryCheck()."/job/Uren-klokker-2.0/index.php");
                }
                
?>
        </div>
    </div>
</main>
