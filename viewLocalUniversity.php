<?php
session_start();
require("connection.php");
$collegeid = $_GET['id'];
$sql = "SELECT * FROM localuniversity WHERE id='$collegeid'";
if (mysqli_query($conn, $sql)) {
    $res = mysqli_query($conn, $sql);
    $college = mysqli_fetch_all($res, MYSQLI_ASSOC);
} else {
    echo "error";
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
</head>
<body>
<nav>
    <div class="nav-wrapper  white">
        <div class="container">
            <a href="localUniversity.php" class="brand-logo black-text" >Admin Portal</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="adminHome.php" class="black-text"><i style="font-size: x-large" class="fa fa-home"
                                                       aria-hidden="true"></i></a></li>
            <li><a href="localUniversity.php" class="black-text">Add Universities</a></li>
            <li><a href="branchLocal.php" class="black-text">Add Branches</a></li>
                <li><a href="adminSignout.php" class="black-text">Sign Out</a></li>
            </ul>
        </div>
    </div>
</nav>
<br><br>
<br><br>
<div class="center">
    <img src="data:image/jpeg;base64,<?php echo base64_encode($college[0]['picture']) ?>"
         style="width: 700px;height: 500px">
</div>
<div class="container">
    <p><?php echo $college[0]['description'] ?></p>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
