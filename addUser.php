<?php
    require('connection.php');
    if(!isset($_POST['submit']))
        header('Location: branchLocal.php');
    $branch=$_POST["branch"];
    $name=$_POST["name"];
    $email=$_POST["email"];
    $college=$_POST["college"];
    $phone=$_POST["phone"];
    $score=$_POST["score"];
    $password=password_hash($_POST["password"],PASSWORD_BCRYPT);
    $imgData = addslashes(file_get_contents($_FILES['picture']['tmp_name']));
    $sql="SELECT id from localuniversity where name='$college'";
    $collegeid=null;
    if(mysqli_query($conn, $sql))
    {
        $res=mysqli_query($conn,$sql);
        $collegeid=mysqli_fetch_all($res,MYSQLI_ASSOC);
        $collegeid=$collegeid[0]['id'];
    }

    $sql = "INSERT INTO users (branch,name,email,college,collegeid,phone,score,password,picture)
        VALUES ('$branch','$name','$email','$college',$collegeid,$phone,'$score','$password','$imgData')";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
//        header("Location: index1.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
?>
