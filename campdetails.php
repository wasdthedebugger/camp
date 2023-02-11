<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
}

include("global/conn.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="global/logo.png">
    <title>Camp Details</title>
</head>

<body>

    <?php include("header.php"); ?>
    <div class="content">
        <?php

        $sql = "SELECT * FROM camps";

        if ($result = mysqli_query($conn, $sql)) {
            if (mysqli_num_rows($result) > 0) {
        ?>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Username</th>
                            <th scope="col">Title</th>
                            <th scope="col">Content</th>
                            <th scope="col">Date</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <tr>
                                <td><b><?php echo ($row['id']); ?></b></td>
                                <td><?php echo ($row['username']); ?></td>
                                <td><?php echo ($row['title']); ?></td>
                                <td><?php echo ($row['content']); ?></td>
                                <td><?php echo ($row['date']); ?></td>
                                <td><a class="btn btn-danger" href="deletecamp.php?id=<?php echo ($row['id']); ?>">Delete</a></td>
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