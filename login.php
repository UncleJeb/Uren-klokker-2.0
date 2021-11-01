<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $title = "Login";
    include 'assets/inc/dbconnect.php';
    include 'assets/inc/header.php';
    include 'assets/inc/loginscript.php';
?>
<main id="login-main">
    <div id="login-container" class="container">
        <div id="login-inner">
            <div id="page-title">
                <h3 id="login-title">Account Login</h3>
            </div>
            <form method="POST">
                <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" placeholder="<?php echo $usernameErr; ?>" name="username" id="username" class="form-input">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" placeholder="<?php echo $passwordErr; ?>" name="password" id="password" class="form-input">
                </div>
                <div class="form-group" id="rememberme-container">
                <label id="rememberme-label" for="">Remember Me</label>
                    <input type="checkbox" name="rememberme" id="rememberme">
                </div>
                <button type="submit">Login</button>
                <span><?php echo $LoginErr?></span>
            </form>
            <div id="register-container">
                <p id="register-text">Don't have an account? <a href="register.php" id="register-link">Register here</a>.</p>
            </div>
            <div id="forgot-container2">
                <p id="forgot-text">Forgot your password? <a href="forgot.php" id="forgot-link">Click here</a>.</p>
            </div>
        </div>
    </div>
</main>
<?php 
    include 'assets/inc/footer.php';
?>  

