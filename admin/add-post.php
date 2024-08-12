<?php include "header.php";?>
<?php  
    include "config.php";

    if (isset($_FILES["imgup"])) {
        $file_name = $_FILES['imgup']['name'];
        $file_size = $_FILES['imgup']['size'];
        $file_tmp = $_FILES['imgup']['tmp_name'];
        $file_type = $_FILES['imgup']['type'];
        $file_ext = explode('.',$file_name);
    
        if (empty($error) == true) {
            move_uploaded_file($file_tmp,"./uploud-img/".$file_name);
        }else {
            print_r($error); 
            die();
        };
    };
    if (isset($_FILES["vidup"])) {
        $file_name2 = $_FILES['vidup']['name'];
        $file_size2 = $_FILES['vidup']['size'];
        $file_tmp2 = $_FILES['vidup']['tmp_name'];
        $file_type2 = $_FILES['vidup']['type'];
        $file_ext2 = explode('.',$file_name2);

        if (empty($error) == true) {
            move_uploaded_file($file_tmp2,"./uploud-video/".$file_name2);
        }else {
            print_r($error); 
            die();
        };
    };
    
    if (isset($_POST["save"])) {

        $mname = mysqli_real_escape_string($connect,$_POST["mname"]);
        $title = mysqli_real_escape_string($connect,$_POST["title"]);
        $dis = mysqli_real_escape_string($connect,$_POST["discription"]);
        $category = mysqli_real_escape_string($connect,$_POST["category"]);

        $sql2 = "INSERT INTO mpost(mname , title , category , description , img_name , video_name) VALUES ('{$mname}' , '{$title}' , '{$category}' , '{$dis}' , '{$file_name}' , '{$file_name2}');";
        $sql2.="UPDATE categores SET movies_post = movies_post + 1 WHERE category_id = {$category}";
    
        if (mysqli_multi_query($connect,$sql2)) {
            header("location: http://localhost/movies-site/admin/movie-post.php"); 
        }else {
            echo "query faild";
        };
    }

?>
    <div class="form-data" >
        <h1>ADD MOVIES</h1>
        <form action="<?php $_SERVER['PHP_SELF']?>" method="POST" enctype="multipart/form-data">
            <div>
                <label>Movie Name</label>
                <input type="text" name="mname" placeholder="Movie Name" required>
            </div>
            <div>
                <label>Title</label>
                <input type="text" name="title" placeholder="Movie Title" required>
            </div>
            <div>
                <textarea name="discription" rows="5" placeholder="Add Discription" required></textarea>
            </div>
            <div>
                <label>Category</label>
                <select name="category">
                    <option value="" selected disabled>Select Category</option>
                    <?php
                        include "config.php";
                        $sql3="SELECT * FROM categores";
                        $result3=mysqli_query($connect,$sql3);
                        if (mysqli_num_rows($result3)>0) {
                            while ($row3 = mysqli_fetch_assoc($result3)) {
                                echo "<option value='{$row3["category_id"]}'>{$row3['category_name']}</option>";
                            };
                        };
                    ?>
                </select>
            </div>
            <div>
                <label for="">Add Thumbnail</label>
                <input type="file" name="imgup" required>
            </div>
            <div>
                <label for="">Add Video</label>
                <input type="file" name="vidup" required>
            </div>
            <input type="submit" value="Add" class="save" name="save">
        </form>
    </div>
<?php include "footer.php";?>
</body>
</html>