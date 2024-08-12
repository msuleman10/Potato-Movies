<?php
    include "config.php";

    $post_id = $_GET["mid"];
    $cat_id = $_GET["cid"];

    $sql = "SELECT * FROM mpost WHERE mid = {$post_id}";
    $result = mysqli_query($connect,$sql);
    $row = mysqli_fetch_assoc($result);
    unlink("uploud-img/".$row["img_name"]);
    unlink("uploud-video/".$row["video_name"]);

    $sql2 = "DELETE FROM mpost WHERE mid = {$post_id};";
    $sql2.= "UPDATE categores SET movies_post = movies_post - 1 WHERE category_id = {$cat_id}";

    if (mysqli_multi_query($connect,$sql2)) {
        header("location: http://localhost/movies-site/admin/movie-post.php");
    }else {
        echo "query faild";
    };
?>