<?php
    require ("connection.php");
    $sql = "SELECT name FROM localbranch";
    $result = mysqli_query($conn, $sql);
    $branches=mysqli_fetch_all($result,MYSQLI_ASSOC);
    mysqli_close($conn);
    ?>