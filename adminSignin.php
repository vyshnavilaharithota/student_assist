<?php
session_start();
$loginerror = "";
if (isset($_POST['submit'])) {
    require('connection.php');
    $username = $_POST['username'];
    $password = $_POST['password'];
    if($username=="admin" && $password=="admin")
    {
        $loginerror="";
        $_SESSION['admin']="admin";
        header("Location: adminHome.php");
    }
    else    
        $loginerror="Invalid Credentials";
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
<body style="background-image: url(student.jpg);background-size: cover;">
<nav>
    <div class="nav-wrapper  white">
        <div class="container">
            <a href="#" class="brand-logo black-text" >Admin Portal</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="adminSignin.php" class="black-text">Sign In</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container" style="margin-top: 10%;">
    <div class="container">
        <div class="card-panel" style="background-color: rgba(255,255,255,0.9);">
            <form method="post" action="adminSignin.php">
                <div class="input-field">
                    <input id="username" type="text" name="username">
                    <label for="username">Username</label>
                </div>
                <div class="input-field">
                    <input id="password" type="password" name="password">
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
