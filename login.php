<?php
session_start();

include("global/conn.php");
//check if user is already logged in, if not and if the login button is clicked, then check if the email and password are correct and start a session
if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
} else {
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $pwd = $_POST['pwd'];
        $sql = "SELECT * FROM users WHERE username='$username' AND password='$pwd'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['username'] = $row['username'];
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['role'] = $row['role'];
            //0 = admin, 1 = teacher, 2 = student
            if ($_SESSION['role'] == 0) {
                $_SESSION['admin'] = true;
            } else if ($_SESSION['role'] == 1) {
                $_SESSION['teacher'] = true;
            } else if ($_SESSION['role'] == 2) {
                $_SESSION['student'] = true;
            }

            header("Location: index.php");
        } else {
            $invalid = true;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("global/conn.php"); ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
</head>

<body>

    <?php include("header.php"); ?>

    <!-- login form -->
    <div class="container">
        <?php
        if (isset($invalid)) {
            echo "<div class='alert alert-danger' role='alert'>
            Invalid username or password!
          </div>";
        }
        ?>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <form action="#" method="post" class="form-control">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Enter username" id="username" name="username">
                    </div><br>
                    <div class="form-group">

                        <input type="password" class="form-control" placeholder="Enter password" id="pwd" name="pwd">
                    </div><br>
                    <button type="submit" class="btn btn-primary" name="login">Login</button>
                </form>
            </div>
        </div>
    </div>

    <?php include("footer.php"); ?>

</body>

</html>