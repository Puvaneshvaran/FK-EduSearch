<?php
require_once "dbase.php";
$Count = count($_POST["user"]);
for($i=0;$i<$Count;$i++) {
mysqli_query($conn, "DELETE FROM userb WHERE id='" . $_POST["user"][$i] . "'");
}
header("Location:index.php");

mysqli_close($conn);
?>