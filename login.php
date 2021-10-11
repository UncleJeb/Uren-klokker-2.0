<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $title = "Login";
    require 'assets/inc/header.php';
    require 'assets/inc/dbconnect.php';

    $username = $password = "";
    $usernameErr = $emailErr = $passwordErr = $LoginErr = "";

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(empty(trim($_POST["username"])))
        {
            $usernameErr = "Please enter a username";
        }
        else
        {
            $username = trim($_POST["username"]);
        }

        if(empty(trim($_POST["password"])))
        {
            $passwordErr = "Please enter a password";
        }
        else
        {
            $password = trim($_POST["password"]);
        }

        if(empty($usernameErr) && empty($passwordErr))
        {
            $sql = "SELECT id, username, password FROM users WHERE username = :username";

            if($stmt = $db->prepare($sql))
            {
                $stmt->bindparam(":username", $param_username, PDO::PARAM_STR);

                $param_username = trim($_POST["username"]);

                if($stmt->execute())
                {
                    if($stmt->rowCOUNT() == 1) 
                    {
                        if($row = $stmt->fetch()) 
                        {
                            $id = $row["id"];
                            $username = $row["username"];
                            $hashed_password = $row["password"];

                            if(password_verify($password, $hashed_password))
                            {
                                session_start();

                                $_SESSION["loggedIn"] = true;
                                $_SESSION["id"] = $id;
                                $_SESSION["username"] = $username;

                                header("Location: index.php");
                            }
                            else
                            {
                                $LoginErr = "Invalid username or password."; 
                            }
                        }
                    }
                    else
                    {
                        $LoginErr = "Invalid username or password";
                    }
                }
                else 
                {
                    $LoginErr = "Invalid username or password";
                }

                unset($stmt);
            }
        }

        unset($db);

    }

session_start();
if(isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] === true ) 
{
    header("Locatio: index.php");
    exit;
}
?>
<main id="login-main">
    <div id="login-container">
        <div id="login-inner">
            <div id="page-title">
                <h3 id="login-title">Account Login</h3>
            </div>
            <form method="POST">
                <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" name="" id="" class="form-input">
                    <span><?php echo $usernameErr ?></span>
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="text" name="" id="" class="form-input">
                    <span><?php $passwordErr?></span>
                </div>
                <button type="submit">Submit</button>
                <span><?php echo $LoginErr?></span>
            </form>
            <div id="register-container">
                <p id="register-text">Don't have an account? Register <a href="register.php" id="register-link">here</a>.</p>
            </div>
        </div>
    </div>
</main>
<?php 
    include 'assets/inc/footer.php';
?>  

