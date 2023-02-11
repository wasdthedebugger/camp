<?php
session_start();

include("global/conn.php");
include("global/functions.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

<body>
    <?php include("header.php"); ?>

    <div class="content">
        <?php

        //get no of blogs
        $sql = "SELECT * FROM camps";
        $totalBlogs = mysqli_num_rows(mysqli_query($conn, $sql));

        //get no of users
        $sql = "SELECT * FROM users";
        $totalUsers = mysqli_num_rows(mysqli_query($conn, $sql));

        ?>

        <div class="dashboardElements">
            <?php
            //if role is 0 then show
            if (isset($_SESSION['role'])) {
                if ($_SESSION['role'] == 0) {
            ?>
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="https://img.freepik.com/free-photo/online-message-blog-chat-communication-envelop-graphic-icon-concept_53876-139717.jpg?w=2000" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Campaings</h5>
                            <p class="card-text">Total Campaings: <?php echo $totalBlogs; ?></p>
                            <a href="campdetails.php" class="btn btn-primary">See Details</a>
                        </div>
                    </div>

                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="https://ak.picdn.net/offset/photos/5baba7b6daee26d9e8c7b49e/medium/photo.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Users</h5>
                            <p class="card-text">Total Users: <?php echo $totalUsers; ?></p>
                            <a href="users.php" class="btn btn-primary">See Details</a>
                        </div>
                    </div>
            <?php
                }
            }
            ?>

            <?php

            //fetch all blogs from database and display them in cards, add a see details button to each card

            $sql = "SELECT * FROM camps ORDER BY votes DESC";
            //display all blogs
            $result = mysqli_query($conn, $sql);
            $i = 0;
            //loop through all blogs
            while ($row = mysqli_fetch_assoc($result)) {
                //display the blog
                displayCamps($row, $i);
                $i++;
                //for first iteration add a unique class
            }

            ?>

            <div class="row">
                <?php
                function displayCamps($row, $i)
                {
                    if (!($i == 0)) {
                        //incase we want something else between every blog
                    }
                ?>

                    <div class="col-md-12">
                        <div class="card">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="<?php echo "images/" . $row["image"]; ?>" class="card-img-top" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <?php

                                        if ($i == 0) {
                                            echo ("Popular");
                                        }

                                        ?>
                                        <h5 class="card-title"><?php echo ($row["title"]); ?></h5>
                                        <p class="card-text"><?php echo (displayLimited($row["content"], 100)); ?></p>
                                        <a href="view.php?id=<?php echo($row["id"]); ?>" class="btn btn-primary">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php
                }
                ?>

            </div>

        </div>

    </div>

    <?php include("footer.php"); ?>
</body>

</html>