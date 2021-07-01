<?php
require ("connection.php");
$clg=$_GET["q"];
$sql = "SELECT branches FROM localuniversity where name='$clg';";
$result = mysqli_query($conn, $sql);
$branchess=mysqli_fetch_all($result,MYSQLI_ASSOC);
$branch=$branchess[0]['branches'];
echo "<option value='' disabled selected>Choose your option</option>";
$branches=explode(',',$branch);
foreach ($branches as $bran)
{
    echo "<option value='$bran'>$bran</option>";
}
mysqli_close($conn);
 ?>