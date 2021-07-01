<?php
    session_start();
    require('connection.php');
    if(!isset($_POST['submit']))
        header('Location: foreignUniversityAmbassadors.php');
    $clgid=$_SESSION['collegeid'];
    $name=$_POST["name"];
    $email=$_POST["email"];
    $branch=$_POST["branch"];
    $phone=$_POST["phone"];
    $gpa=$_POST["score"];
    $sql = "INSERT INTO ambassador (name,phone,collegeid,email,course,gpa)
            VALUES ('$name',$phone,$clgid,'$email','$branch','$gpa')";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    //        header("Location: index1.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
?>
