<?php include "header.php";?>
    <div class="movie_content">
        <?php
            if (isset($_GET["pageid"])) {
                include "admin/config.php";
                $mid = $_GET["pageid"];
                $sql = "SELECT * FROM mpost WHERE mid={$mid}";
                $result = mysqli_query($connect,$sql);
                if (mysqli_num_rows($result)>0) {
                    while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <h1><?php echo $row['mname'];?></h1>
        <div>
            <video src="admin/uploud-video/<?php echo $row['video_name'];?>" controls poster="admin\uploud-img\<?php echo $row['img_name'];?>" preload></video>
        </div>
        <h3><?php echo $row['title'];?></h3>
        <p><?php echo $row['description'];?></p>
        <?php
                };
            };
        };
        ?>
    </div>
<?php include "admin/footer.php"?>
</body>
</html>