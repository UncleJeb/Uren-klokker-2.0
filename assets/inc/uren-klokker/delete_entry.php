<?php 
    include "../dbconnect.php";
    $id = $_GET['id'];
    $sql = "DELETE FROM uren WHERE id = :id";
    $params = array(":id" => $id);

    $stmt = $db->prepare($sql);
    $stmt->execute($params);
    header("Location: ../../../index.php");
?>