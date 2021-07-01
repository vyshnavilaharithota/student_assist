<?php
require("connection.php");
$sql = "SELECT * FROM foreignuniversity";
if (mysqli_query($conn, $sql)) {
    $res = mysqli_query($conn, $sql);
    $colleges = mysqli_fetch_all($res, MYSQLI_ASSOC);
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

    <div class="nav-wrapper white">
        <div class="container">
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="userHome.php" class="black-text"><i style="font-size: x-large" class="fa fa-home"
                                                                 aria-hidden="true"></i></a></li>
                <li><a href="userForeignUniversities.php" class="black-text">Foreign Universities</a></li>
                <!--                <li><a href="foreignUniversityAmbassadors.php">Ambassadors</a></li>-->
                <li><a href="userSignout.php" class="black-text">Sign Out</a></li>
            </ul>
        </div>
    </div>
</nav>

<br><br>
<div class="container">
    <div class="row">
        <?php foreach ($colleges as $college) { ?>
            <div class="col m4">
                <div class="card">
                    <div class="card-image">
                        <img style="width: 100%;height: 300px;"
                             src="data:image/jpeg;base64,<?php echo base64_encode($college['picture']); ?>">
                        <span class="card-title"><?php echo $college['name']; ?></span>
                    </div>
                    <div class="card-action">
                        <a href="viewForeignUniversity.php?id=<?php echo $college['id'] ?>">Visit</a><br>
                    </div>
                </div>
            </div>

        <?php } ?>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>