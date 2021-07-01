<?php
    require("getLocalBranches.php");

?>
<!DOCTYPE html>
<html>
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
    <div class="card-panel">
        <form action="addLocalUniversity.php" method="post" enctype="multipart/form-data">
            <div class="input-field">
                <input id="name" type="text" name="name">
                <label for="name">Name</label>
            </div>
            <div class="input-field">
                <textarea class="materialize-textarea" id="area" type="text" name="area"></textarea>
                <label for="area">Location</label>
            </div>
            <div class="file-field input-field">
                <div class="btn">
                    <span>File</span>
                    <input type="file" name="picture">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text" placeholder="Picture" >
                </div>
            </div>
            <div class="input-field">
                <input id="phone" type="tel" name="phone">
                <label for="phone">Contact Number</label>
            </div>
            <div class="input-field">
                <input id="email" type="email" name="email">
                <label for="email">Email</label>
            </div>
            <div class="input-field">
                <textarea class="materialize-textarea" id="description" type="text" name="description"></textarea>
                <label for="description">Description</label>
            </div>

            <div class="input-field">
                <select class="icons" multiple name="branch[]">
                    <option value="college1" disabled selected>Choose your option</option>
                    <?php foreach ($branches as $branch) { ?>
                        <option value="<?php echo $branch['name']; ?>" data-icon="images/sample-1.jpg"
                                class="left"><?php echo $branch['name']; ?></option>
                    <?php } ?>
                </select>
                <label>Branch</label>
            </div>
            <div class="center">
                <button class="btn" type="submit" name="submit">
                    Add a University
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
