<?php
    include "config.php";
    if (isset($_GET["uid"])) {
        $user_id=$_GET["uid"];
        $sql="DELETE FROM users WHERE user_id={$user_id}";
        if (mysqli_query($connect,$sql)) {
            header("location: http://localhost/movies-site/admin/users.php");
        };
    };
?>