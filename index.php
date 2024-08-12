<?php include "header.php";?>
    <div class="movies_box">
    <?php
        include "admin/config.php";
        $sql="SELECT * FROM mpost LEFT JOIN categores ON mpost.category=categores.category_id ORDER BY mid DESC";
        $result=mysqli_query($connect,$sql);
        if (mysqli_num_rows($result)>0) {
            while ($row = mysqli_fetch_assoc($result)) {
    ?>
        <div class="movie_box">
            <a href="show-movie.php?pageid=<?php echo $row["mid"];?>">
                <h2><?php echo strtoupper(substr($row["mname"],0,15))."...";?></h2>
                <div>
                    <img src="admin/uploud-img/<?php echo $row["img_name"];?>">
                </div>
                <span><?php echo $row["category_name"];?></span>
                <p><?php echo $row["title"];?></p>
            </a>
        </div>
        <?php
                };
            };
        ?>
    </div>
<?php include "admin/footer.php";?>
</body>
</html>