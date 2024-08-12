<?php  
    include "config.php";
    if (empty($_FILES["new_imgup"]["name"])) {
        $file_name = $_POST["old_imgup"];
    }else {
        $error = array();

        $file_name = $_FILES['new_imgup']['name'];
        $file_size = $_FILES['new_imgup']['size'];
        $file_tmp = $_FILES['new_imgup']['tmp_name'];
        $file_type = $_FILES['new_imgup']['type'];
        $file_ext = explode('.',$file_name);
        
        if (empty($error) == true) {
            move_uploaded_file($file_tmp,"./uploud-img/".$file_name);
        }else {
            print_r($error); 
            die();
        };
    };

    if (empty($_FILES["new_vidup"]["name"])) {
        $file_name2 = $_POST['old_vidup'];
    }else {
        $error = array();

        $file_name2 = $_FILES['new_vidup']['name'];
        $file_size2 = $_FILES['new_vidup']['size'];
        $file_tmp2 = $_FILES['new_vidup']['tmp_name'];
        $file_type2 = $_FILES['new_vidup']['type'];
        $file_ext2 = explode('.',$file_name2);

        if (empty($error) == true) {
            move_uploaded_file($file_tmp2,"./uploud-video/".$file_name2);
        }else {
            print_r($error); 
            die();
        };
    };
    if (isset($_POST["save"])) {

        $mname = mysqli_real_escape_string($connect,$_POST["mname"]);
        $title = mysqli_real_escape_string($connect,$_POST["title"]);
        $dis = mysqli_real_escape_string($connect,$_POST["discription"]);
        $category = mysqli_real_escape_string($connect,$_POST["category"]);

        $sql2 = "UPDATE mpost SET mname='{$mname}' , title='{$title}' , description='{$dis}' , category='{$category}' , img_name='{$file_name}' , video_name='{$file_name2}' WHERE mid={$_POST['mid']}";
    
        if (mysqli_query($connect,$sql2)) {
            header("location: http://localhost/movies-site/admin/movie-post.php"); 
        }else {
            echo "query faild";
        };
    };

?>