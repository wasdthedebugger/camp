<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("global/conn.php"); ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
</head>

<body>

    <?php include("header.php"); ?>
    <div class="content">
        <?php

        $sql = "SELECT * FROM users";

        if ($result = mysqli_query($conn, $sql)) {
            if (mysqli_num_rows($result) > 0) {
        ?>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Username</th>
                            <th scope="col">Role</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($result)) {
                            $username = $row['username'];
                        ?>
                            <tr>
                                <td><b><?php echo ($row['username']); ?></b></td>
                                <td><?php if($row['role']==0){echo("Admin");}else{echo("User");}?></td>
                                <td><a class="btn btn-danger" href="deleteuser.php?id=<?php echo($username); ?>">Deactivate</a></td>
                            </tr>

                        <?php
                        }
                        ?>
                    </tbody>
                </table>
        <?php
                mysqli_free_result($result);
            }
        }

        ?>

    </div>

    <?php
    include("footer.php");
    ?>

</body>

</html>