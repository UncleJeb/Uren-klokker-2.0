<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $title = "Login";
    require 'assets/inc/header.php';
    require 'assets/inc/dbconnect.php';

    $username = $email = $password = "";
    $usernameErr = $emailErr = $passwordErr = "";

    // USERNAME CHECK //

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(empty(trim($_POST["username"] ?? null))) 
        {
            $usernameErr = "Please enter a username.";
        }
        elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"])))
        {
            $usernameErr = "Username can only contain letters, numbers and underscores.";
        }
        else
        {
            $sql = "SELECT id FROM users WHERE username = :username";

            if($stmt = $db->prepare($sql)) 
            {
                $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);

                $param_username = trim($_POST["username"]);

                if($stmt->execute()) 
                {
                    if($stmt->rowCount() == 1)
                    {
                        $usernameErr = "This username is already taken.";
                    }
                    else
                    {
                        $username = trim($_POST["username"]);
                    }
                }
                else
                {
                    echo "Something went wrong please try again later.";
                }

            
            }
        }

        // EMAIL CHECK //

        if(empty(trim($_POST["email"] ?? null)))
        {
            $emailErr = "Please enter an email.";
        }
        elseif(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))
        {
            $emailErr = "Invalid email Format";
        }
        else
        {
            $email = trim($_POST["email"]);
        }


        // PASSWORD CHECK //

        if(empty(trim($_POST["password"] ?? null)))
        {
            $passwordErr = "Please enter a password.";
        }
        elseif(strlen(trim($_POST["password"])) < 6)
        {
            $passwordErr = "A password has to have more than 6 characters.";
        }
        else 
        {
            $password = trim($_POST["password"]);
        }

        if(empty($usernameErr) && empty($passwordErr) && empty($emailErr))
        {
            $sql = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";

            if($stmt = $db->prepare($sql))
            {
                $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
                $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);
                $stmt->bindParam(":password", $param_password, PDO::PARAM_STR);

                $param_username = $username;
                $param_email = $email;
                $param_password = password_hash($password, PASSWORD_DEFAULT);

                echo $param_username;
                echo $param_email;
                echo $param_password;
                
                if($stmt->execute())
                {
                    header("Location: login.php");
                }
                else 
                {
                    echo "Something went wrong please try again later.";
                }

                unset($stmt);
            }
        }

        unset($db);
    }

?>
<main id="register-main">
    <div id="register-container2">
        <div id="register-inner">
            <div id="page-title">
                <h3 id="register-title">Account Register</h3>
            </div>
            <form method="POST">
                <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" placeholder="<?php echo $usernameErr; ?>" name="username" id="username" class="form-input">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" placeholder="<?php echo $emailErr; ?>" name="email" id="email" class="form-input">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" placeholder="<?php echo $passwordErr; ?>" name="password" id="password" class="form-input">
                </div>
                <button type="submit">Register</button>
                <span><?php echo $LoginErr ?? null ?></span>
            </form>
            <div id="register-container">
                <p id="login-text">Already have an account? <a href="login.php" id="login-link">Login here</a>.</p>
            </div>
        </div>
    </div>
</main>
<?php
    include 'assets/inc/footer.php';
?>