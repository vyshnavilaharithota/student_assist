<?php
session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body style="background-image: url(ambassador.jpg);background-size: cover;" >

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
    <div class="container center">
    <div class="card-panel blue-grey darken-4">
    <table class="centered">
        <thead>
            <tr>
                <th class="yellow-text">Question</th>
                <th class="yellow-text">Answer</th>
                <th class="yellow-text">Action</th>
            </tr>
        </thead>
        <tbody id="tab">

        </tbody>
    </table>
    </div>
    </div>
    <!-- <div id="tab">

    </div> -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        function getQueries() {
            let xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById('tab').innerHTML = this.responseText;
                }
            }
            xmlhttp.open("GET", "ambassadorGetQueries.php", true);
            xmlhttp.send();
        };

        function submitAnswer(id)
        {
            let answer=document.getElementById('q'+id).value;
            let xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    alert(this.responseText);
                }
            }
            xmlhttp.open("GET", "ambassadorSubmitAnswer.php?answer="+answer+"&id="+id, true);
            xmlhttp.send();
            getQueries();
        }
        getQueries();
    </script>
</body>

</html>