<?php
session_start();
require("connection.php");
$clgid = $_SESSION['collegeid'];
if (isset($_POST['submit'])) {
    $branch = $_POST['branch'];
    $intake = $_POST['intake'];
    $sql = "INSERT INTO foreignbranch (name,intake,collegeid) VALUES ('$branch',$intake,$clgid)";
    if (mysqli_query($conn, $sql)) {
    } else {
        echo 'Error';
    }
}
$sql = "SELECT * from foreignbranch where collegeid=$clgid";
if (mysqli_query($conn, $sql)) {
    $res = mysqli_query($conn, $sql);
    $branches = mysqli_fetch_all($res, MYSQLI_ASSOC);
} else {
    echo 'Error';
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
<body style="background-image:url(nature.jpg);background-size: cover;">
<nav>
    <div class="nav-wrapper white ">
        <div class="container">
            <a class="brand-logo left black-text"><?php echo $_SESSION['collegename']; ?></a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a class="black-text" href="foreignUniversityHome.php" class="white-text"><i
                                style="font-size: x-large" class="fa fa-home" aria-hidden="true"></i></a></li>
                <li><a class="black-text" href="foreignUniversityBranches.php">Branches</a></li>
                <li><a class="black-text" href="foreignUniversityAmbassadors.php">Ambassadors</a></li>
                <li><a class="black-text" href="foreignUniversitySignout.php">Sign Out</a></li>
            </ul>
        </div>
    </div>
</nav>
<br><br><br>
<div class="container">
    <div class="card-panel" style="background-color: rgba(255,255,255,0.9);">
        <form method="post" action="foreignUniversityBranches.php">
            <div class="input-field">
                <input id="branch" type="text" name="branch">
                <label for="branch">Branch</label>
            </div>
            <div class="input-field">
                <input id="intake" type="number" name="intake">
                <label for="intake">Intake</label>
            </div>
            <div class="center">
                <button class="btn" type="submit" name="submit">
                    Add Branch
                </button>
            </div>
        </form>
    </div>
</div>
<div class="container">
    <div class="card-panel" style="background-color: rgb(255,255,255);">
        <table class="centered striped">
            <thead>
            <tr>
                <th>Branch</th>
                <th>Intake</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($branches as $branch) { ?>
                <tr>
                    <td><?php echo $branch['name']; ?></td>
                    <td> <?php echo $branch['intake']; ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js">


</script>


</body>
</html>

