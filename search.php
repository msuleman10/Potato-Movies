<?php include "header.php";
    if (isset($_GET['search'])) {
        $search_term= strtoupper($_GET['search']);
    };
    include "admin/config.php";
    echo "<u><h2>Search: <i>'{$search_term}'</i></h2></u>";
    $sql="SELECT * FROM mpost LEFT JOIN categores ON mpost.category=categores.category_id WHERE mname LIKE '%{$search_term}%'";
    $result=mysqli_query($connect,$sql);
?>

    <div class="movies_box">
    <?php
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
            }else {
                echo "<h1><i>Result Not Found..·´¯`(>▂<)´¯`·. </i></h1>";
            };
        ?>
    </div>
    
<?php include "admin/footer.php";?>
</body>
</html>