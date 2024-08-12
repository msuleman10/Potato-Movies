<?php include "header.php";?>
    <div class="table-data">
        <div class="page-name">
            <h1>Category</h1>
            <a href="add-category.php">ADD CATEGORY</a>
        </div>
        <?php
            include "config.php";
            $sql = "SELECT * FROM categores";
            $result = mysqli_query($connect,$sql);
            if (mysqli_num_rows($result)>0) {
        ?>
        <table cellspacing="0px" cellpadding="0px">
            <thead>
                <th>C.ID</th>
                <th>CATEGORY NAME</th>
                <th>NOUMBER OF MOVIES</th>
                <th>EDIT</th>
                <th>DELETE</th>
            </thead>
            <tbody>
                <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td class="data"><?php echo $row["category_id"];?></td>
                    <td class="data"><?php echo $row["category_name"];?></td>
                    <td class="data"><?php echo $row["movies_post"];?></td>
                    <td class="data"><a href="update-category.php?cid=<?php echo $row["category_id"];?>"><i class="fa-regular fa-pen-to-square"></i></a></td>
                    <td class="data"><a href="delete-category.php?cid=<?php echo $row["category_id"];?>"><i class="fa-solid fa-trash"></i></a></td>
                </tr> 
                <?php
                    }
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