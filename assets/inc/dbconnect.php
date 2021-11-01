<?php 
$ip = $_SERVER['REMOTE_ADDR'];
$localip = '127.0.0.1';
if($ip = $localip)
{
    $host = "localhost";
    $dbname = "job_werkurenv2";
    $username = "root";
    $password = "";
    
} else
{
    $host = "localhost:3307";
    $dbname = "job_werkurenv2";
    $username = "root";
    $password = "220953ed";
}

$connectstr = 'mysql:host=' . $host . ';dbname=' . $dbname . ';charset=utf8';
$db = new PDO($connectstr, $username, $password);

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


function directoryCheck() {
    $ip = $_SERVER['REMOTE_ADDR'];
    $localip = '127.0.0.1';
    
    if($ip = $localip) {
        $link = "";
    } else 
    {
        $link = "/job";
    }
    echo $link;
}
?>