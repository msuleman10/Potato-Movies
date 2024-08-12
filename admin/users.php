<?php include "header.php";?>
    <div class="table-data">
        <div class="page-name">
            <h1>USERS</h1>
            <a href="add-user.php">ADD USER</a>
        </div>
        <?php
            include "config.php";
            $sql = "SELECT * FROM users";
            $result = mysqli_query($connect,$sql);
            if (mysqli_num_rows($result)>0) {
        ?>
        <table cellspacing="0px" cellpadding="0px">
            <thead>
                <th>U.ID</th>
                <th>FULL NAME</th>
                <th>USER NAME</th>
                <th>EDIT</th>
                <th>DELETE</th>
            </thead>
            <tbody>
                <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td class="data"><?php echo $row["user_id"];?></td>
                    <td class="data"><?php echo $row["fname"]." ".$row["lname"];?></td>
                    <td class="data"><?php echo $row["username"];?></td>
                    <td class="data"><a href="update-user.php?uid=<?php echo $row["user_id"];?>"><i class="fa-regular fa-pen-to-square"></i></a></td>
                    <td class="data"><a href="delete-user.php?uid=<?php echo $row["user_id"];?>"><i class="fa-solid fa-trash"></i></a></td>
                </tr> 
                <?php
                    };
                ?>
            </tbody>
        </table>
        <?php
            };
        ?>
    </div>
    
<?php include "footer.php";?>
</body>
</html>