<?php
    require('connection.php');
    if(!isset($_POST['submit']))
        header('Location: branchLocal.php');
    $branch=$_POST["branch"];
    $sql = "INSERT INTO localbranch (name)
    VALUES ('$branch')";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
        header("Location: index1.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
