<?php
session_start();
require("connection.php");
$userid=$_SESSION['id'];
$course=$_GET['course'];
$collegeid=$_GET['collegeid'];
$q=$_GET['q'];

$sql="INSERT INTO chat(question, userid, collegeid, course) VALUES('$q',$userid,$collegeid,'$course')";
if(mysqli_query($conn, $sql))
{
    echo "Query has been submitted successfully";
}
else{
    echo "Error in submitting please try again";
}

?>