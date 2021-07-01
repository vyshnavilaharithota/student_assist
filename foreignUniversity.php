<?php
if(!isset($_POST['submit']))
    header("Location: foreignUniversitySignup.php");
?>
<!DOCTYPE html>
<html>
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
    <div class="container" >
        <a href="#" class="brand-logo black-text">Foreign University Portal</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="foreignUniversitySignin.php" class="black-text">Login</a></li>
            <li><a href="foreignUniversitySignup.php" class="black-text">Sign Up</a></li>

        </ul>
    </div>
</div>
</nav>
<div class="container" style="padding-top: 50px;">
    <div class="card-panel">
        <form action="addForeignUniversity.php" method="post" enctype="multipart/form-data">
            <input value="<?php echo $_POST['username'] ?>" name="username" type="hidden">
            <input value="<?php echo $_POST['password'] ?>" name="password" type="hidden">
            <div class="input-field">
                <input id="name" type="text" name="name" required>
                <label for="name">Name</label>
            </div>
            <div class="input-field">
                <textarea class="materialize-textarea" id="area" type="text" name="area" required></textarea>
                <label for="area">Location</label>
            </div>
            <div class="file-field input-field">
                <div class="btn">
                    <span>File</span>
                    <input type="file" name="picture" required>
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text" placeholder="Picture"  >
                </div>
            </div>
            <div class="input-field">
                <input id="phone" type="tel" name="phone" required>
                <label for="phone">Contact Number</label>
            </div>
            <div class="input-field">
                <input id="email" type="email" name="email" required>
                <label for="email">Email</label>
            </div>
            <div class="input-field">
                <textarea class="materialize-textarea" id="description" type="text" name="description" required></textarea>
                <label for="description">Description</label>
            </div>


            <div class="center">
                <button class="btn" type="submit" name="submit">
                    Sign Up University
                </button>
            </div>

        </form>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js">


</script>
<script>
    $(document).ready(function () {
        $('select').formSelect();
    });
</script>
</body>
</html>
