<?php
    $title = "Projects";
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL); 
    include '../db/dbconnect.php'; 
    include '../header.php'; 
    include '../nav-2.php'; 

    $sql = "SELECT * FROM projects";
    $sth = $db->prepare($sql);
    $sth->execute();
?>


<main class="page-main" id="projects-main">
    <div class="container" id="projects-container">
        <div class="row" id="projects-row">
            <div class="twelve columns btn-column">
                <button class="btn project_button" href="#">Add project</button>
            </div>
        </div>
        <div class="row" id="projects-row">
            <?php
                while($row = $sth->fetch()) {

            ?>
            <style>
                .card {
                    background-image: url(<?php if($row['project_image'] == null) { echo 'https://via.placeholder.com/300'; } else {echo $row['project_image'];} ?>);
                }
            </style>
            <div class="three columns">
                <div class="card">
                    <div class="card-content">
                        <h2 class="card-title"><?php echo $row['project_name']; ?></h2>
                        <p class="card-body"><?php echo $row['project_desc']; ?></p>
                        <a href="<?php echo directoryCheck().$row['project_link']; ?>" class="button">Go To</a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</main>
<div class='overlay_project'>
    <div class='popup'>
        <div class='close'>&#10006;</div>
            <h2 class="popup_title">Add Project</h2> 

            <form enctype="multipart/form-data" method="post">
                <label for="">Enter Project Name</label>
                <input type="text" name="project_name" class="form-input">
                <label for="">Enter Project Description</label>
                <textarea name="project_desc" class="form-input" cols="30" rows="10"></textarea>
                <label for="">Enter Project Link</label>
                <input type="text" name="project_link"  class="form-input">
                <label for="">Upload Image</label>
                <input type="file" name="project_file"><br>
                <button class="btn upload_btn" type="submit" name="add_btn">Add project</button>
            </form>      
            <?php 
                if(isset($_POST['add_btn']))
                {

                    $project_name = $_POST['project_name'] ?? null;
                    $project_desc = $_POST['project_desc'] ?? null;
                    $project_link = directoryCheck().'/'.$_POST['project_link'] ?? null;


                    $name = $_FILES['project_file']['name'];
                    $target_dir= "project_upload/";
                    $target_file = $target_dir . basename($_FILES["project_file"]["name"]);

                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                    $extensions_arr = array("jpg","jpeg","png","gif");

                    if(in_array($imageFileType,$extensions_arr)) 
                    {
                        
                        if(move_uploaded_file($_FILES['project_file']['tmp_name'], $target_dir.$name))
                        {

                            $project_stmt = "INSERT INTO projects (project_link, project_image, project_name, project_desc) VALUES (:project_link, :project_image, :project_name, :project_desc)";
                            $param = array(':project_link' => $project_link, ':project_image' => $name, ':project_name' => $project_name, ':project_desc' => $project_desc);


                            $sth_stmt = $db->prepare($project_stmt);
                            $sth_stmt->execute($param);

                            
                        }
                        
                    }
                }
            
            ?>
        </div>
    </div>
</div>
<?php include '../footer.php'; ?>