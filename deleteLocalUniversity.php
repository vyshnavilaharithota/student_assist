<?php
session_start();
require ("connection.php");
$collegeid=$_GET["id"];
echo $collegeid;
$sql="DELETE FROM localuniversity WHERE id=$collegeid";
if(mysqli_query($conn,$sql))
{
    $res=mysqli_query($conn,$sql);
    header("Location: adminHome.php");
}
else
{
    echo "Error deleting record: " . mysqli_error($conn);
}
?>