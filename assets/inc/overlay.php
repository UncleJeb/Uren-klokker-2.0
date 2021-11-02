<div class='overlay'>
    <div class='popup'>
        <div class='close'>&#10006;</div>
            <h2 class="popup_title">Profile Picture</h2> 

            <form enctype="multipart/form-data" method="post">
                <input type="file" name="pfp_file" class="form-input"><br>
                <button class="btn" type="submit" name="upload_btn">Upload Image</button>
            </form>      
            <?php 
                if(isset($_POST['upload_btn']))
                {
                    $_username = $_SESSION["username"];
                    $name = $_FILES['pfp_file']['name'];
                    echo $name;
                    $target_dir= "assets/upload/";
                    $target_file = $target_dir . basename($_FILES["pfp_file"]["name"]);

                    echo $target_file;

                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                    echo $imageFileType;

                    $extensions_arr = array("jpg","jpeg","png","gif");

                    if(in_array($imageFileType,$extensions_arr)) 
                    {

                        if(move_uploaded_file($_FILES['pfp_file']['tmp_name'], $target_dir.$name))
                        {
                            
                            $pfp_upload_sql = "UPDATE users SET pfpname = '$name' WHERE username = '$_username'";
                            $sth = $db->prepare($pfp_upload_sql);
                            $sth->execute();  
                            
                        }
                    }
                }
            
            ?>
        </div>
    </div>
</div>