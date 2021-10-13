<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $email = "";
    $emailErr = "";


    $title = "Login";
    require 'assets/inc/header.php';
    require 'assets/inc/dbconnect.php';

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {

        if(empty(trim($_POST["email"])))
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
    }

    if(empty($emailErr))
    {
        $subject = "Forgot Password";
        $message = "Forgot password link";

        mail($email, $subject, $message);
    }
    
?>
<main id="forgot-main">
    <div id="forgot-container">
        <div id="forgot-inner">
            <div id="page-title">
                <h3 id="forgot-title">Forget password</h3>
            </div>
            <form method="POST">
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" placeholder="<?php echo $emailErr; ?>" name="email" id="email">
                </div>
                <button type="submit">Submit</button>
            </form>
            <div id="back-container">
                <p>Back to <a href="login.php" id="back-link">Login</a>.</p>
            </div>
        </div>
    </div>
</main>
<?php
    include 'assets/inc/footer.php'
?>