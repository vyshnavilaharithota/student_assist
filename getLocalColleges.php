<?php

require("connection.php");
$sql = "SELECT * FROM localuniversity";
$result = mysqli_query($conn, $sql);
$colleges = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_close($conn);

?>