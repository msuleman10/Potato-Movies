<?php include "header.php";?>
    <div class="table-data">
        <div class="page-name">
            <h1>POST</h1>
            <a href="add-post.php">ADD MOVIES</a>
        </div>
        <?php
            include "config.php";
            $sql = "SELECT * FROM mpost LEFT JOIN categores ON categores.category_id = mpost.category";
            $result = mysqli_query($connect,$sql);
            if (mysqli_num_rows($result)>0) {
        ?>
        <table cellspacing="0px" cellpadding="0px">
            <thead>
                <th>P.ID</th>
                <th>MOVIE NAME</th>
                <th>TITLE</th>
                <th>CATEGORY</th>
                <th>EDIT</th>
                <th>DELETE</th>
            </thead>
            <tbody>
                <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td class="data"><?php echo $row["mid"];?></td>
                    <td class="data"><?php echo $row["mname"];?></td>
                    <td class="data"><?php echo $row["title"];?></td>
                    <td class="data"><?php echo $row["category_name"];?></td>
                    <td class="data"><a href="update-post.php?mid=<?php echo $row["mid"];?>"><i class="fa-regular fa-pen-to-square"></i></a></td>
                    <td class="data"><a href="delete-post.php?mid=<?php echo $row["mid"];?>&cid=<?php echo $row["category"];?>"><i class="fa-solid fa-trash"></i></a></td>
                </tr> 
                <?php
                    };
                ?>
            </tbody>
        </table>
        <?php
            }else {
                echo "<h2>No Record Found</h2>";
            };
        ?>
    </div>
    
<?php include "footer.php";?>
</body>
</html>