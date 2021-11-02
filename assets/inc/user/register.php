<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $title = "Register";
    require '../db/dbconnect.php';
    require '../header.php';
    require 'registerscript.php';
?>
<main id="register-main">
    <div id="register-container2" class="container">
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