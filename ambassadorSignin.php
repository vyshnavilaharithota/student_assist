<?php
session_start();
$loginerror = "";
if (isset($_POST['submit'])) {
    require('connection.php');
    $email = $_POST['email'];
    $phone = $_POST['password'];
    $sql = "SELECT * from ambassador where email='$email' and phone=$phone ";
    if (mysqli_query($conn, $sql)) {
        $res = mysqli_query($conn, $sql);
        $ambassador = mysqli_fetch_all($res, MYSQLI_ASSOC);
        if (count($ambassador) == 1) {

            $_SESSION['email'] = $email;
            $_SESSION['course'] = $ambassador[0]['course'];
            $_SESSION['collegeid'] = $ambassador[0]['collegeid'];


            header('Location: ambassadorHome.php');
//                    echo "login successful";

        } else {
            $loginerror = "Invalid Credentials";
        }
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <title>Document</title>
</head>
<body style="background-image: url(ambassador.jpg);background-size: cover;">
<nav>
    <div class="nav-wrapper  white">
        <div class="container">
            <a href="#" class="brand-logo black-text">Ambassador Portal</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="ambassadorSignin.php" class="black-text">Login</a></li>
                <!--                <li><a href="am" class="black-text">Sign Up</a></li>-->

            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <div class="container" style="margin-top: 15%;">
        <div class="card-panel blue-grey darken-4">
            <form method="post" action="ambassadorSignin.php">
                <div class="input-field">
                    <input id="email" type="email" class="white-text" name="email">
                    <label for="email">Email ID</label>
                </div>
                <div class="input-field">
                    <input id="password" type="password" class="white-text" name="password">
                    <label for="password">Password</label>
                </div>
                <div class="center">
                    <button class="btn" type="submit" name="submit">
                        Sign in
                    </button>
                    <p class="red-text"><?php echo $loginerror; ?></p>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js">
</script>

</body>
</html>
