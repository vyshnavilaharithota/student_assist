<?php
session_start();
require('connection.php');
$collegeid = $_SESSION['collegeid'];
$course = $_SESSION['course'];
$sql = "SELECT * from chat where answer is null and collegeid=$collegeid and course='$course'";
if (mysqli_query($conn, $sql)) {
    $res = mysqli_query($conn, $sql);
    $questions = mysqli_fetch_all($res, MYSQLI_ASSOC);
}
foreach ($questions as $question) {
    echo '<tr class="yellow-text"><td>'. $question['question'].'</td><td><input type="text" id="'.'q'.$question['id'].'"></td> <td><button class="btn black white-text" onclick="submitAnswer('. $question['id'].')">Submit</button> </td></tr>';
}

?>