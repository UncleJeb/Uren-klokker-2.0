<?php
    $title = "Index";
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL); 
    include '../dbconnect.php'; 
    include '../header.php'; 
    include '../nav-2.php'; 

    $sql = "SELECT * FROM projects";
    $sth = $db->prepare($sql);
    $sth->execute();
?>

<main class="page-main">
    <div class="container">
        <div class="row">
            <?php
                while($row = $sth->fetch()) {
            ?>
            <div class="three columns">
                <div class="card">
                    <div class="card-content">
                        <h2 class="card-title"><?php echo $row['project_name']; ?></h2>
                        <p class="card-body">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        </p>
                        <a href="#" class="btn button">Go To</a>
                    </div>
                </div>
                <div class="six columns"></div>
            </div>
            <?php } ?>
        </div>
    </div>
</main>
<!--
    <main id="projects-main">
        <div id="title">
            <h2 id="project-title">Projects</h2>
        </div>
        <div id="projects-container">
            <div id="projects-inner">
                <?php
                    while($row = $sth->fetch()) {
                ?>
                    <div class="project-item">
                        <div class="project-image">
                            <a href="<?php echo $row['project_link']; ?>"><img src="<?php echo $row['project_image']; ?>" alt="<?php $row['project_name']; ?>"></a>
                        </div>
                        <div class="project-info">
                            <div class="project-name">
                                <h5><?php echo $row['project_name']; ?></h5>
                            </div>
                            <div class="project-desc">
                                <p><?php echo $row['project_desc']; ?></p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </main>  
                    -->  
<?php include '../footer.php'; ?>