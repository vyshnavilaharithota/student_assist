<?php
require("connection.php");
if (!isset($_POST['submit'])) {
    header("Location: localUniversity.php");
}
//$branch = $_POST["branch"];
$name = $_POST["name"];
$area = $_POST["area"];
$file = $_FILES['picture']['tmp_name'];
$phone = $_POST["phone"];
$email = $_POST["email"];
$description = htmlspecialchars($_POST["description"],ENT_QUOTES);
$branch = implode(',', $_POST['branch']);
$imgData = addslashes(file_get_contents($_FILES['picture']['tmp_name']));

$sql = "INSERT INTO localuniversity (name,area,picture,branches,phone,email,description)
    VALUES ('$name','$area','$imgData','$branch','$phone','$email','$description')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
    header("Location: index1.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


mysqli_close($conn);
?>