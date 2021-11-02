<?php
    $username = $password = "";
    $usernameErr = $emailErr = $passwordErr = $LoginErr = "";
    
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(empty(trim($_POST["username"] ?? null)))
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

            if(!isset($_POST[""]))
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

                                setcookie("type", $row["password"], time()+3600);

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
    header("Location: ".directoryCheck()."/job/Uren-klokker-2.0/index.php");
}
?>