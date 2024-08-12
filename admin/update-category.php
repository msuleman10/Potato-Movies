<?php include "header.php";?>
<?php
    
    if (isset($_POST["save"])) {
        include "config.php";
        $cid = mysqli_real_escape_string($connect,$_POST["cid"]);
        $cname = mysqli_real_escape_string($connect,$_POST["cname"]);
        $sql = "SELECT category_name FROM categores WHERE category_name = '{$cname}'";
        $result = mysqli_query($connect,$sql) or die("query wtf");
        if (mysqli_num_rows($result)>0) {
            echo "category is alredy exist";
        }else {
            $sql2 = "UPDATE categores SET category_name='{$cname}' WHERE category_id={$cid}";
            if (mysqli_query($connect,$sql2)) {
                header("location: http://localhost/movies-site/admin/category.php"); 
            };
        };
    };
?>
    <div class="form-data" >
        <h1>UPDATE CATEGORY</h1>
        <?php
            include "config.php";
            $categoryid=$_GET['cid'];
            $sql3 = "SELECT * FROM categores WHERE category_id = {$categoryid}";
            $result2=mysqli_query($connect,$sql3);
            if (mysqli_num_rows($result2)>0) {
                while ($row2 = mysqli_fetch_assoc($result2)) {

        ?>
        <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
            <input type="hidden" name="cid" value="<?php echo $row2['category_id'];?>">
            <div>
                <label>Category Name</label>
                <input type="text" name="cname" placeholder="Category" required value="<?php echo $row2['category_name'];?>">
            </div>
            <input type="submit" value="Update" class="save" name="save">
        </form>
        <?php
                };
            };
        ?>
    </div>
<?php include "footer.php";?>
</body>
</html>