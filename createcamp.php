<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
}

include("global/conn.php");

// handle the form submission and add the data to the database and upload the image to the images folder
if (isset($_POST['title'])) {
    //strip image name and replace spaces with underscore
    $title = $_POST['title'];
    $content = $_POST['content'];
    $map = $_POST['map'];
    $image = str_replace(' ', '_', $_FILES['image']['name']);
    $username = $_SESSION['username'];
    $date = date("Y-m-d");
    $sql = "INSERT INTO camps (title, content, image, username, date, map) VALUES ('$title', '$content', '$image', '$username', '$date', '$map')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        move_uploaded_file($_FILES['image']['tmp_name'], "images/" . $image);
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Camp</title>
</head>

<body>
    <?php include("header.php"); ?>

    <div class="container">

        <!-- a bootstrap form to enter campaign title, content and a image -->
        <form action="createcamp.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title">
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" id="content" name="content" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input class="form-control" type="file" id="image" name="image">
            </div>
            <div class="mb-3">
                <label for="map" class="form-label">Map</label>
                <input class="form-control" type="text" id="map" name="map" placeholder="Paste the embed HTML">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <?php
        // if the form is submitted
        if (isset($_POST['title'])) {
            // get the title, content and image from the form
            $title = $_POST['title'];
            $content = $_POST['content'];
            $image = $_FILES['image']['name'];
            // get the user id from the session
            $user_id = $_SESSION['user_id'];
            // get the current date
            $date = date("Y-m-d");
            // insert the data into the database
            $sql = "INSERT INTO camps (title, content, image, user_id, date) VALUES ('$title', '$content', '$image', '$user_id', '$date')";
            $result = mysqli_query($conn, $sql);
            // if the data is inserted successfully then move the image to the images folder
            if ($result) {
                move_uploaded_file($_FILES['image']['tmp_name'], "images/" . $_FILES['image']['name']);
                echo "<div class='alert alert-success' role='alert'>
                Camp Created Successfully!
              </div>";
            } else {
                echo "<div class='alert alert-danger' role='alert'>
                Error Creating Camp!
              </div>";
            }
        }
        ?>
    </div>
    <?php include("footer.php"); ?>
</body>

</html>