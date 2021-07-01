<?php
session_start();
$college = null;
if (!isset($_SESSION['username'])) {
    header("Location: foreignUniversitySignin.php");
}
require('connection.php');
$clgid = $_SESSION['collegeid'];
$sql = "SELECT * from foreignuniversity where id=$clgid";
if (mysqli_query($conn, $sql)) {
    $res = mysqli_query($conn, $sql);
    $college = mysqli_fetch_all($res, MYSQLI_ASSOC);
    $_SESSION['collegename'] = $college[0]['name'];
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
<body style="background-image:url(nature.jpg);background-size: cover;">
<nav>
    <div class="nav-wrapper white">
        <div class="container">
            <a href="#" class="brand-logo left black-text"><?php echo $college[0]['name']; ?></a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="foreignUniversityHome.php" class="black-text"><i style="font-size: x-large"
                                                                              class="fa fa-home"
                                                                              aria-hidden="true"></i></a></li>
                <li><a href="foreignUniversityBranches.php" class="black-text">Branches</a></li>
                <li><a href="foreignUniversityAmbassadors.php" class="black-text">Ambassadors</a></li>
                <li><a href="foreignUniversitySignout.php" class="black-text">Sign Out</a></li>
            </ul>
        </div>
    </div>
</nav>
<br><br>
<div class="container">
    <div class="card-panel " style="background-color: rgba(255,255,255,0.8);">
        <div class="center">
            <img src="data:image/jpeg;base64,<?php echo base64_encode($college[0]['picture']) ?>"
                 style="width: 700px;height: 500px">
        </div>
        <p><?php echo $college[0]['description'] ?></p>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
