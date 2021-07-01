<?php
session_start();
require('connection.php');
$answer =$_GET['answer'];
$id = $_GET['id'];
$sql = "UPDATE chat SET answer='$answer' WHERE id=$id";
if (mysqli_query($conn, $sql)) {
    $res = mysqli_query($conn, $sql);
    echo 'Updated Successfully...';
}
else
{
    echo 'Error submitting answer... Please try again';
}
?>