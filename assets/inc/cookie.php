
<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

    function encryptCookie($value) 
    {

        $key = hex2bin(openssl_random_pseudo_bytes(4));

        $cipher = "aes-256-cbc";
        $ivlen = openssl_cipher_iv_length($cipher);
        $iv = openssl_random_pseudo_bytes($ivlen);

        $ciphertext = openssl_encrypt($value, $cipher, $key, 0, $iv);

        return(base64_encode($ciphertext. '::'. $iv. '::'. $key ));
    }

    function decryptCookie($ciphertext)
    {
        $cipher = "aes-256-cbc";

        list($encrypted_data, $iv,$key) = explode('::', base64_decode($ciphertext));
        return openssl_decrypt($encrypted_data, $cipher, $key, 0, $iv);
    }

    if(isset($_SESSION["id"]))
    {
        header("Location: index.php");
        exit;
    }
    elseif(isset($_COOKIE["rememberme"]))
    {
        $userid = decryptCookie($_POST["rememberme"] ?? null);

        $sql = "SELECT count(*) FROM users WHERE id=:id";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':id', (int)$id, PDO::PARAM_INT);
        $stmt->execute();
        $count = $stmt->fetchColumn();

        if($count > 0)
        {
            $_SESSION['id'] = $id;
            header("Location: index.php");
            exit();
        }
    }

?>