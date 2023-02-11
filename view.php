<?php

session_start();

include("global/conn.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/x-icon" href="/global/logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogs</title>
</head>

<body>
    <?php include("header.php"); ?>
    <div id="content">

        <!-- retrieve from database according to the ID and show it beautifully along with image, use bootstrap-->
        <?php
        $id = $_GET['id'];
        $sql = "SELECT * FROM camps WHERE id = $id";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        ?>


        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <img src="<?php echo "images/" . $row['image']; ?>" alt="" class="img-fluid rounded">
                </div>
                <div class="col-md-8 border border-left-0 rounded">
                    <h1 class="pt-4 pl-2 text-center"><?php echo $row['title']; ?></h1>

                    <p class="pl-2" style="text-align: justify; margin: 20px;"><?php echo $row['content']; ?><p>

                    <div style="text-align:center;">
                        <?php echo $row['map']; ?>
                    </div>
                    </p>
                    <p class="pl-2 b" align="right">- <?php echo $row['username']; ?></p>
                </div>
            </div>

        </div>


    </div>
    <?php include("footer.php"); ?>
</body>

</html>