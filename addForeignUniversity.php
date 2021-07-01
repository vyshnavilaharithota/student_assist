<?php
require("connection.php");
if (!isset($_POST['submit'])) {
    header("Location: foreignUniversity.php");
}
//$branch = $_POST["branch"];
$name = $_POST["name"];
$area = $_POST["area"];
$file = $_FILES['picture']['tmp_name'];
$phone = $_POST["phone"];
$email = $_POST["email"];
$description = htmlspecialchars($_POST["description"],ENT_QUOTES);
$imgData = addslashes(file_get_contents($_FILES['picture']['tmp_name']));
$sql = "INSERT INTO foreignuniversity (name,area,picture,phone,email,description)
    VALUES ('$name','$area','$imgData','$phone','$email','$description')";

if (mysqli_query($conn, $sql)) {
//    echo "New record created successfully";
    $sql="SELECT id from foreignuniversity where name='$name'";
    if (mysqli_query($conn, $sql)) {
        $res=mysqli_query($conn, $sql);
        $clg=mysqli_fetch_all($res,MYSQLI_ASSOC);
        $clgid=$clg[0]['id'];
        $username=$_POST["username"];
        $password=password_hash($_POST['password'], PASSWORD_BCRYPT);
        $sql = "INSERT INTO foreignuniversitylogin (username,password,collegeid)
        VALUES ('$username','$password',$clgid)";
        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
        }
        else
        {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    else
    {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


mysqli_close($conn);
?>