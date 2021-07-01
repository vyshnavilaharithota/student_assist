<?php
session_start();
require("connection.php");
$collegeid = $_GET['id'];
$sql = "SELECT * FROM ambassador WHERE collegeid=$collegeid";
if (mysqli_query($conn, $sql)) {
    $res = mysqli_query($conn, $sql);
    $ambassadors = mysqli_fetch_all($res, MYSQLI_ASSOC);
//    print_r($ambassadors);
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
    <div class="nav-wrapper white ">
        <div class="container">
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="userHome.php" class="black-text"><i style="font-size: x-large" class="fa fa-home"
                                                                 aria-hidden="true"></i></a></li>
                <li><a class="black-text" href="userForeignUniversities.php">Foreign Universities</a></li>
                <li><a class="black-text" href="userAmbassadors.php?id=<?php echo $collegeid; ?>">Ambassadors</a></li>
                <li><a class="black-text" href="userSignout.php">Sign Out</a></li>
            </ul>
        </div>
    </div>
</nav>
<br><br>
<br><br>
<!--<div class="container">-->
<table class="centered striped">
    <thead>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Phone Number</th>
        <th>Course</th>
        <th>Score</th>
        <th>Contact</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($ambassadors as $ambassador) { ?>
        <tr>
            <td><?php echo $ambassador['name']; ?></td>
            <td> <?php echo $ambassador['email']; ?></td>
            <td> <?php echo $ambassador['phone']; ?></td>
            <td> <?php echo $ambassador['course']; ?></td>
            <td> <?php echo $ambassador['gpa']; ?></td>
            <td>
                <a href="contactAmbassador.php?id=<?php echo $collegeid; ?>&course=<?php echo $ambassador['course']; ?>">Chat</a>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>
<!--</div>-->

<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>

