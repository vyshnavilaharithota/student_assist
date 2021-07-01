<?php
session_start();
$loginerror = "";
if (!isset($_SESSION['admin'])){
    header("Location: adminSignin.php");
}

require("Connection.php");
$sql="SELECT * from localuniversity";

if(mysqli_query($conn, $sql))
{
    $res=mysqli_query($conn, $sql);
    $colleges= mysqli_fetch_all($res, MYSQLI_ASSOC);
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
<body style="background-image: url(student.jpg);background-size: cover;">
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
                        <a href="viewLocalUniversity.php?id=<?php echo $college['id'] ?>">Visit</a>
                        <a  onclick="if(!confirm('are u sure.'))return;window.location.href='deleteLocalUniversity.php?id=<?php echo $college['id'] ?>';"><i class="fa fa-trash" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>

        <?php } ?>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js">
</script>

</body>
</html>
