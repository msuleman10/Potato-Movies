<?php include "header.php";?>
<?php
    
    if (isset($_POST["save"])) {
        include "config.php";
        $fname = mysqli_real_escape_string($connect,$_POST["fname"]);
        $lname = mysqli_real_escape_string($connect,$_POST["lname"]);
        $uname = mysqli_real_escape_string($connect,$_POST["username"]);
        $password = md5($_POST["password"]) ;
        $sql = "SELECT username FROM users WHERE username = '{$uname}'";
        $result = mysqli_query($connect,$sql) or die("query wtf");
        if (mysqli_num_rows($result)>0) {
            echo "name is alredy exist";
        }else {
            $sql2 = "INSERT INTO users(fname , lname , username ,password) VALUES ('{$fname}' , '{$lname}' , '{$uname}' , '{$password}')";
            if (mysqli_query($connect,$sql2)) {
                header("location: http://localhost/movies-site/admin/users.php"); 
            };
        };
    };

?>
    <div class="form-data" >
        <h1>ADD USER</h1>
        <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
            <div>
                <label>First Name</label>
                <input type="text" name="fname" placeholder="First name" required>
            </div>
            <div>
                <label>Last Name</label>
                <input type="text" name="lname" placeholder="Last Name" required>
            </div>
            <div>
                <label>User Name</label>
                <input type="text" name="username" placeholder="User Name" required>
            </div>
            <div>
                <label>Password</label>
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <input type="submit" value="Add" class="save" name="save">
        </form>
    </div>
<?php include "footer.php";?>
</body>
</html>