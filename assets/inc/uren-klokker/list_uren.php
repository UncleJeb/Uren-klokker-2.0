<?php
    $title = "List Uren";
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL); 
    setlocale(LC_ALL, 'nl_utf8', 'Dutch', 'nl_NL.UTF-8', 'Dutch_Netherlands.1252', 'WINDOWS-1252');
    include '../dbconnect.php'; 
    include '../header.php'; 
    include '../nav-2.php'; 
?>
<main class="page-main">
    <div class="row">
        <div class="container">
            <table class="table u-full-width table-custom">
                <thead>
                    <tr>
                        <th>Create New</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><a href="/job/Uren-klokker-2.0/assets/inc/uren-klokker/create_entry.php">Create New</a></td>
                    </tr>
                </tbody>
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Datum</th>
                        <th>Uren</th>
                        <th>Beschrijving</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $_username = $_SESSION["username"];

                        $sqlsum = "SELECT SUM(uren) AS sumuren FROM uren WHERE username = '$_username'";
                        $stmtSum = $db->prepare($sqlsum);
                        $stmtSum->execute();
                        $rowsum = $stmtSum->fetch(PDO::FETCH_ASSOC);

                        $sql = "SELECT * FROM uren WHERE username = '$_username' ORDER BY datum ASC";
                        $stmt = $db->prepare($sql);
                        $stmt->execute();

                        while($row = $stmt->fetch())
                        {
                    ?>
                    <tr>
                        <td><?php echo $row["username"] ?></td>
                        <td><?php echo strftime("%A %e %B %Y", strtotime($row["datum"]))?></td>
                        <td><?php echo $row["uren"] ?></td>
                        <td><div class="text"><?php echo $row["beschrijving"] ?></div></td>
                        
                        <td><a href="/job/Uren-klokker-2.0/assets/inc/uren-klokker/update_entry.php?id=<?php echo $row["id"]?>">Update</a></td>
                        <td><a onclick="return confirm('Are you sure you want to delete this item')" href="/job/Uren-klokker-2.0/assets/inc/uren-klokker/delete_entry.php?id=<?php echo $row["id"]?>">Delete</a></td>
                    </tr>
                    <?php } ?>
                </tbody>
                <thead>
                    <tr>
                      <th scope="col">User</th>
                      <th scope="col"></th>
                      <th scope="col">Totaal Uren</th>
                      <th scope="col"></th>
                      <th class="action" scope="col"></th>
                      <th class="action" scope="col"></th>
                    </tr>
                  </thead>
                  <tbody class="tbody-dark">
                    <td><?php echo $_SESSION["username"] ?? null ?></td>
                    <td></td>
                    <td><?php echo $rowsum["sumuren"] ?? null?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tbody>
            </table>
                        



        </div>
    </div>
</main>

