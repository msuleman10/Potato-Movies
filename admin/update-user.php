<?php include "header.php";?>
<?php
    
    if (isset($_POST["save"])) {
        include "config.php";
        $userid = mysqli_real_escape_string($connect,$_POST["uid"]);
        $fname = mysqli_real_escape_string($connect,$_POST["fname"]);
        $lname = mysqli_real_escape_string($connect,$_POST["lname"]);
        $uname = mysqli_real_escape_string($connect,$_POST["username"]);
        $sql = "SELECT username FROM users WHERE username = '{$uname}'";
        $result = mysqli_query($connect,$sql) or die("query wtf");
        if (mysqli_num_rows($result)>0) {
            echo "name is alredy exist";
        }else {
            $sql2 = "UPDATE users SET fname='{$fname}' , lname='{$lname}' , username='{$uname}' WHERE user_id={$userid}";
            if (mysqli_query($connect,$sql2)) {
                header("location: http://localhost/movies-site/admin/users.php"); 
            };
        };
    };

?>
    <div class="form-data" >
        <h1>UPDATE USER</h1>
        <?php
            include "config.php";
            $user_id=$_GET['uid'];
            $sql3="SELECT * FROM users WHERE user_id={$user_id}";
            $result2= mysqli_query($connect,$sql3);
            if (mysqli_num_rows($result2)>0) {
                while ($row2 = mysqli_fetch_assoc($result2)) {
        ?>
        <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
            <input type="hidden" name="uid" value="<?php echo $row2['user_id'];?>">
            <div>
                <label>First Name</label>
                <input type="text" name="fname" value="<?php echo $row2['fname'];?>" placeholder="First name" required>
            </div>
            <div>
                <label>Last Name</label>
                <input type="text" name="lname" value="<?php echo $row2['lname'];?>" placeholder="Last Name" required>
            </div>
            <div>
                <label>User Name</label>
                <input type="text" name="username" value="<?php echo $row2['username'];?>" placeholder="User Name" required>
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