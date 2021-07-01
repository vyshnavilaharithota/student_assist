<?php
session_start();
$branches = null;
require("connection.php");
$clgid = $_SESSION['collegeid'];
$sql = "SELECT name from foreignbranch where collegeid=$clgid AND foreignbranch.name NOT IN (SELECT course from ambassador )";
if (mysqli_query($conn, $sql)) {
    $res = mysqli_query($conn, $sql);
    $branches = mysqli_fetch_all($res, MYSQLI_ASSOC);
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
$sql = "SELECT * FROM ambassador where collegeid=$clgid";
if (mysqli_query($conn, $sql)) {
    $res = mysqli_query($conn, $sql);
    $ambassadors = mysqli_fetch_all($res, MYSQLI_ASSOC);
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
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
<body style="background-image: url(nature.jpg);background-size: cover;">
<nav>
    <div class="nav-wrapper white">
        <div class="container">
            <a class="brand-logo left black-text"><?php echo $_SESSION['collegename']; ?></a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="foreignUniversityHome.php" class="black-text"><i style="font-size: x-large"
                                                                              class="fa fa-home" aria-hidden="true"></i></a>
                </li>
                <li><a class="black-text" href="foreignUniversityBranches.php">Branches</a></li>
                <li><a class="black-text" href="foreignUniversityAmbassadors.php">Ambassadors</a></li>
                <li><a class="black-text" href="foreignUniversitySignout.php">Sign Out</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <div class="card-panel">
        <form method="post" action="addAmbassador.php">
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
                <select class="icons" id="txtHint" name="branch">
                    <option value="" disabled selected>Choose your option</option>
                    <?php foreach ($branches as $branch) { ?>
                        <option value="<?php echo $branch['name']; ?>"
                                class="left"><?php echo $branch['name']; ?></option>
                    <?php } ?>
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
            <div class="center">
                <button class="btn" type="submit" name="submit">
                    Add Ambassador
                </button>
            </div>
        </form>
        <!--        <div id="txtHint">-->
        <!---->
        <!--        </div>-->
    </div>
</div>
<div class="container">
    <div class="card-panel">
        <table class="centered striped">
            <thead>
            <tr>
                <th>Ambassador</th>
                <th>Branch</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($ambassadors as $ambassador) { ?>
                <tr>
                    <td> <?php echo $ambassador['name']; ?> </td>
                    <td> <?php echo $ambassador['course']; ?> </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
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

