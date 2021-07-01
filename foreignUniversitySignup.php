<?php


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

<body style="background-image:url(univ.jpg);background-size: cover;">
<nav>
    <div class="nav-wrapper  white">
        <div class="container">
            <a href="#" class="brand-logo black-text">Foreign University Portal</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="foreignUniversitySignin.php" class="black-text">Login</a></li>
                <li><a href="foreignUniversitySignup.php" class="black-text">Sign Up</a></li>

            </ul>
        </div>
    </div>
</nav>
<div class="container" style="padding-top: 12%">
    <div class="container">
        <div class="card-panel" style="background-color: rgba(255,255,255,0.7);">
            <form method="post" action="foreignUniversity.php">
                <div class="input-field">
                    <input id="username" type="text" name="username" required>
                    <label for="username">College Username</label>
                </div>
                <div class="input-field">
                    <input id="password" type="password" name="password" required>
                    <label for="password">Password</label>
                </div>
                <div class="center">
                    <button class="btn" type="submit" name="submit">
                        Next
                    </button>
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
