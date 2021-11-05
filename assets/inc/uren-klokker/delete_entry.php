<?php 
    include "../db/dbconnect.php";
    $id = $_GET['id'];
    $sql = "DELETE FROM uren WHERE id = :id";
    $params = array(":id" => $id);

    $stmt = $db->prepare($sql);
    $stmt->execute($params);
    header("Location: ".directoryCheck()."/Uren-klokker-2.0/index.php");
?>