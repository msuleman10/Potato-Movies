<?php include "header.php";?>

    <div class="form-data" >
        <h1>UPDATE MOVIES</h1>
        <?php
            include "config.php";
            if (isset($_GET['mid'])) {
                $mid = $_GET['mid'];
                $sql4 = "SELECT * FROM mpost where mid={$mid}";
                $result4 = mysqli_query($connect,$sql4);
                if (mysqli_num_rows($result4)>0) {
                    while ($row4 = mysqli_fetch_assoc($result4)) {
        ?>
        <form action="save-post.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="mid" value="<?php echo $row4['mid'];?>">
            <div>
                <label>Movie Name</label>
                <input type="text" name="mname" placeholder="Movie Name" required value="<?php echo $row4['mname'];?>">
            </div>
            <div>
                <label>Title</label>
                <input type="text" name="title" placeholder="Movie Title" value="<?php echo $row4['title'];?>" required>
            </div>
            <div>
                <textarea name="discription" rows="5" placeholder="Add Discription" required><?php echo $row4['description'];?></textarea>
            </div>
            <div>
                <label>Category</label>
                <select name="category">

                    <?php
                        include "config.php";
                        $sql3="SELECT * FROM categores";
                        $result3=mysqli_query($connect,$sql3);
                        if (mysqli_num_rows($result3)>0) {
                            while ($row3 = mysqli_fetch_assoc($result3)) {
                                if ($row4["category"] == $row3["category_id"]) {
                                    $select="selected";
                                }else {
                                    $select=" ";
                                }
                                echo "<option {$select} value='{$row3["category_id"]}'>{$row3['category_name']}</option>";
                            };
                        };
                    ?>
                </select>
            </div>
            <div>
                <label>Add Thumbnail</label>
                <input type="file" name="new_imgup" >
                <img src="uploud-img/<?php echo $row4['img_name'];?>" height="50px" width="50px">
                <input type="hidden" value="<?php echo $row4['img_name'];?>" name="old_imgup">
            </div>
            <div>
                <label for="">Add Video</label>
                <input type="file" name="new_vidup">
                <video src="uploud-video/<?php echo $row4['video_name'];?>" height="50px" width="50px"></video>
                <input type="hidden" value="<?php echo $row4['video_name'];?>" name="old_vidup">
            </div>
            <input type="submit" value="Update" class="save" name="save">
        </form>
        <?php
                    };
                };
            };
        ?>
    </div>
<?php include "footer.php";?>
</body>
</html>