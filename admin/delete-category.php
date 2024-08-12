<?php
    include "config.php";
    if (isset($_GET["cid"])) {
        $category_id = $_GET["cid"];
        $sql = "DELETE FROM categores WHERE category_id = {$category_id}";
        if (mysqli_query($connect,$sql)) {
            header("location: http://localhost/movies-site/admin/category.php");
        };
    }
?>