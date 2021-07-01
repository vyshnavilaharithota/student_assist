<?php
session_start();
require("connection.php");
$userid = $_SESSION['id'];
$course = $_GET['course'];
$collegeid = $_GET['collegeid'];
$sql = "SELECT * FROM chat WHERE userid=$userid AND course='$course' AND collegeid=$collegeid";
if (mysqli_query($conn, $sql)) {
    $res = mysqli_query($conn, $sql);
    $allqueries = mysqli_fetch_all($res, MYSQLI_ASSOC);
    echo "<table class='centered striped'>
        <thead>
        <tr>
            <th>Question</th>
            <th>Answer</th>
            
        </tr>
        </thead><tbody>";
    foreach ($allqueries as $query) {
        echo "<tr><td> ". $query['question'] . "</td> <td>". $query['answer'] . "</td></tr>";
    }
    echo "</tbody></table>";
} else {
    echo "Error fetching queries...Please try again later";
}
?>
