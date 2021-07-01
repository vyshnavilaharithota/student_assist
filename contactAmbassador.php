<?php
session_start();
require('connection.php');
$collegeid = $_GET['id'];
$course = $_GET['course'];
$ambassador = null;
$sql = "SELECT * FROM ambassador WHERE collegeid=$collegeid AND course='$course'";
if (mysqli_query($conn, $sql)) {
    $res = mysqli_query($conn, $sql);
    $ambassador = mysqli_fetch_all($res, MYSQLI_ASSOC);
//        print_r($ambassador);
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
<nav class="white">
<!-- <div class="white"> -->
    <div class="nav-wrapper container">
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="userHome.php" class="black-text"><i style="font-size: x-large" class="fa fa-home"
                                                             aria-hidden="true"></i></a></li>
            <li><a href="userForeignUniversities.php" class="black-text">Foreign Universities</a></li>
            <li><a href="userAmbassadors.php?id=<?php echo $collegeid; ?>" class="black-text">Ambassadors</a></li>
            <li><a href="userSignout.php" class="black-text">Sign Out</a></li>
        </ul>
    </div>
    <!-- </div> -->
</nav>
<br><br>
<div class="container">
    <pre>Name         : <?php echo $ambassador[0]['name'] ?></pre>
    <pre>Phone Number : <?php echo $ambassador[0]['phone'] ?></pre>
    <pre>Course       : <?php echo $ambassador[0]['course'] ?></pre>
    <pre>Score        : <?php echo $ambassador[0]['gpa'] ?></pre>
    <pre>Email ID     : <?php echo $ambassador[0]['email'] ?></pre>
    <div class="input-field">

        <input type="text" id="question" name="question">

        <label for="question">Post a query?</label>
    </div>
    <div class="center" >
        <button class="btn" id="post">Post</button>
    </div>
    <div class="center" >
        <button class="btn" id="all">Queries Posted</button>
    </div>
    <div id="allquestions">

    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script>
    document.getElementById('post').addEventListener('click',()=>{
        let question=document.getElementById('question').value;
        if(!question) {
            alert("Enter a valid question");
            return;
        }
        let xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                alert(this.responseText);

            }
        }
        xmlhttp.open("GET", "postQuery.php?<?php echo "course=$course&collegeid=$collegeid&"; ?>q="+question, true);
        xmlhttp.send();
    });

</script>
<script>
    document.getElementById('all').addEventListener('click',()=>{
        let xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById('allquestions').innerHTML=this.responseText;
            }
        }
        xmlhttp.open("GET", "getQueries.php?<?php echo "course=$course&collegeid=$collegeid&"; ?>", true);
        xmlhttp.send();
    });

</script>
</body>
</html>


