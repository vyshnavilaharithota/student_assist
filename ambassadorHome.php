<?php
session_start();
$college = null;
if (!isset($_SESSION['email'])) {
    header("Location: ambassadorSignin.php");
}
$collegeid = $_SESSION['collegeid'];
$course = $_SESSION['course'];
$email = $_SESSION['email'];

require('connection.php');


$sql = "SELECT * from ambassador where collegeid=$collegeid and course='$course'";
if (mysqli_query($conn, $sql)) {
    $res = mysqli_query($conn, $sql);
    $ambassador = mysqli_fetch_all($res, MYSQLI_ASSOC);
    $_SESSION['name'] = $ambassador[0]['name'];
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
<body style="background-image: url(ambassador.jpg);background-size: cover;">
<nav>
    <div class="nav-wrapper blue-grey darken-4">
        <div class="container">
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="ambassadorHome.php" class="white-text"><i style="font-size: x-large" class="fa fa-home"
                                                                       aria-hidden="true"></i></a></li>
                <li><a class="white-text" href="usersQueries.php">Queries </a></li>
                <!--            <li><a href="foreignUniversityAmbassadors.php">Ambassadors</a></li>-->
                <li><a class="white-text" href="ambassadorSignout.php">Sign Out</a></li>
            </ul>
        </div>
    </div>
</nav>
<br><br>
<div class="container" style="margin-top:30vh">
    <div class="container center">
        <div class="card-panel blue-grey darken-4">
            <!-- <img src="data:image/jpeg;base64,<?php echo base64_encode($user[0]['picture']) ?>"
                 style="width: 400px;height: 500px"> -->
            <h5 class="yellow-text">Welcome <?php echo $ambassador[0]['name'] ?> :)</h5>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
