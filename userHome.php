<?php
session_start();
$college = null;
if (!isset($_SESSION['email'])) {
    header("Location: userSignin.php");
}
require('connection.php');
$email = $_SESSION['email'];
$sql = "SELECT * from users where email='$email'";
if (mysqli_query($conn, $sql)) {
    $res = mysqli_query($conn, $sql);
    $user = mysqli_fetch_all($res, MYSQLI_ASSOC);
    $_SESSION['name'] = $user[0]['name'];
} else {
    echo 'SERVER ERROR';
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<nav>
    <div class="nav-wrapper white ">
        <div class="container">
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="userHome.php" class="black-text"><i style="font-size: x-large" class="fa fa-home"
                                                       aria-hidden="true"></i></a></li>
                <li><a href="userForeignUniversities.php" class="black-text">Foreign Universities</a></li>
                <!--            <li><a href="foreignUniversityAmbassadors.php">Ambassadors</a></li>-->
                <li><a href="userSignout.php" class="black-text">Sign Out</a></li>
            </ul>
        </div>
    </div>
</nav>
<br><br>
<div class="center">
    <img src="data:image/jpeg;base64,<?php echo base64_encode($user[0]['picture']); ?>"
         style="width: 400px;height: 500px">
    <p>Welcome <?php echo $user[0]['name'] ?> :)</p>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
