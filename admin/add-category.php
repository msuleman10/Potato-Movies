<?php include "header.php";?>
<?php
    
    if (isset($_POST["save"])) {
        include "config.php";
        $cname = mysqli_real_escape_string($connect,$_POST["cname"]);
        $sql = "SELECT category_name FROM categores WHERE category_name = '{$cname}'";
        $result = mysqli_query($connect,$sql) or die("query wtf");
        if (mysqli_num_rows($result)>0) {
            echo "category is alredy exist";
        }else {
            $sql2 = "INSERT INTO categores(category_name) VALUES ('{$cname}')" or die("query faild");
            if (mysqli_query($connect,$sql2)) {
                header("location: http://localhost/movies-site/admin/category.php"); 
            };
        };
    }
?>
    <div class="form-data" >
        <h1>ADD CATEGORY</h1>
        <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
            <div>
                <label>Category Name</label>
                <input type="text" name="cname" placeholder="Category" required>
            </div>
            <input type="submit" value="Add" class="save" name="save">
        </form>
    </div>
<?php include "footer.php";?>
</body>
</html>