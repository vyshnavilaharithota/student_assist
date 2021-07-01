<?php
require("getLocalColleges.php");
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
<body style="background-image: url(study.jpg);background-size: cover;">
<nav>
    <div class="nav-wrapper  white">
        <div class="container">
            <a href="#" class="brand-logo black-text">Student Portal</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="userSignin.php" class="black-text">Login</a></li>
                <li><a href="userSignup.php" class="black-text">Sign Up</a></li>

            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <div class="container">
        <div class="card-panel">
            <form action="addUser.php" method="post" enctype="multipart/form-data">
                <div class="input-field">
                    <input id="name" type="text" name="name">
                    <label for="first_name">Name</label>
                </div>
                <div class="input-field">
                    <input id="email" type="email" name="email">
                    <label for="first_name">Email</label>
                </div>
                <br>
                <div class="input-field">
                    <select class="icons" name="college" onchange="getBranchesbyCollege()" id="clg">
                        <option value="college1" disabled selected>Choose your option</option>
                        <?php foreach ($colleges as $college) { ?>
                            <option value="<?php echo $college['name']; ?>"
                                    data-icon="data:image/jpeg;base64,<?php echo base64_encode($college['picture']) ?>"
                                    class="left"><?php echo $college['name']; ?></option>
                        <?php } ?>
                    </select>
                    <label>College</label>
                </div>
                <br>
                <div class="input-field">
                    <select class="icons" id="txtHint" name="branch">

                    </select>
                    <label>Branch</label>
                </div>

                <br>
                <div class="input-field">
                    <input id="phone" type="tel" name="phone">
                    <label for="first_name">Phone NUmber</label>
                </div>
                <div class="input-field">
                    <input id="score" type="text" name="score">
                    <label for="first_name">Score</label>
                </div>
                <div class="file-field input-field">
                    <div class="btn">
                        <span>File</span>
                        <input type="file" name="picture">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" placeholder="Picture">
                    </div>
                </div>
                <div class="input-field">
                    <input id="password" type="password" name="password">
                    <label for="password">Password</label>
                </div>
                <div class="center">
                    <button class="btn" type="submit" name="submit">
                        Sign Up
                    </button>
                </div>
            </form>
            <!--        <div id="txtHint">-->
            <!---->
            <!--        </div>-->
        </div>
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
<script>
    function getBranchesbyCollege() {
        let str = document.getElementById('clg').value;
        // let str=e.target.value;
        if (str.length == 0) {
            document.getElementById("txtHint").innerHTML = "";
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("txtHint").innerHTML = this.responseText;
                    $('select').formSelect();
                }
            }
            xmlhttp.open("GET", "getBranchesbyCollege.php?q=" + str, true);
            xmlhttp.send();
        }
    }

    // getBranchesbyCollege('Pandi');
</script>
</body>
</html>
