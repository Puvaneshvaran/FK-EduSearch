<?php
require_once "dbase.php";
$Count = count($_POST["userclass"]);
for($i=0;$i<$Count;$i++) {
mysqli_query($conn, "DELETE FROM userclass WHERE id='" . $_POST["userclass"][$i] . "'");
}
header("Location:index.php");

mysqli_close($conn);
?>