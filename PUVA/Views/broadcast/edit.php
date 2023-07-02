<?php
   
    require_once "dbase.php";
    if(isset($_POST["submit"]) && $_POST["submit"]!="") {
    $membersCount = count($_POST["title"]);
    for($i=0;$i<$membersCount;$i++) {

        $date = date("d-m-Y", time());
        $time = date("H:i:s", time());

        mysqli_query($conn, "UPDATE userb SET date='" . $date . "', time='" . $time . "', category='" . $_POST["category"][$i] . "', title='" . $_POST["title"][$i] . "', Posts='" . $_POST["Posts"][$i] . "' WHERE id='" . $_POST["id"][$i] . "'");
    }
    header("Location:index.php");
}
?>
<html>
	<head>
    <title>Edit | Broadcast UMP</title>
    <link rel="icon" href="../../logo/logo-rasmi-ump-logo-sahaja.png" type="image/x-icon">
    <link rel="stylesheet" href="./styleSheet/broadcastStyle.css">
    </style>
</head>
<body>
<body>
	<a href="../../calendar_view/index.php"><img class="logo" src="../../logo/logo.png" alt="UMP_Logo"></a>
    <br>
    <br>
    <div class="nav_top">
        <a href="../../calendar_view/index.php">Home</a>
        <a href="../broadcast/index.php">Broadcast</a>
        <a href="../Views/view_progress.html">Progress</a>
        <a href="../report/index.php">Report</a>
        <a href="../../logout.php" id="username">Logout</a>
        <a href="../Profile/index.php" style="float: right; margin-top:-15px; margin-bottom:-15px"><img src="../../logo/user_logo.png" alt="User Logo" id="userlogo"></a>
    </div>
    <hr>

    <h1 id="title">Broadcast</h1>

    <br>

    <form name="frmUser" method="post" action="">
        <fieldset style="height: auto;">
            <div class="container_1">
			<?php
				$count = count($_POST["user"]);
				for($i=0;$i<$count;$i++) {
				$result = mysqli_query($conn, "SELECT * FROM userb WHERE id='" . $_POST["user"][$i] . "'");
				$row[$i]= mysqli_fetch_array($result);
			?>
                <label for="category">Category:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input type="hidden" name="id[]" class="txtField" value="<?php echo $row[$i]['id']; ?>">
                <select name="category[]">
                    <option value="<?php echo $row[$i]['category']; ?>" hidden>-Choose Type Posts-</option>
                    <option value="Information">Information</option>
                    <option value="News">News</option>
                    <option value="Important">Important</option>
                    <option value="Project Award">Project Award</option>
                </select>
                <br><br>
                <label for="title">Title:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input type="text" id="titleName" name="title[]" value="<?php echo $row[$i]['title']; ?>">
            </div>

            <textarea name="Posts[]" id="Posts" cols="30" rows="10"><?php echo $row[$i]['Posts']; ?></textarea>

            <script src="../../../ckeditor/ckeditor.js"></script>
            <script>
                CKEDITOR.replace('Posts');
            </script>

            <br>

            <div class="submit">
                <div class="center">
                    <input class="button" type="submit" value="Submit" name="submit">
                </div>
            </div>
			<?php
				}
			?>
        </fieldset>

        <br><br>

        <script>
            function myFunction(){
                alert("Your broadcast successful updated!");
            }
        </script>
    </form>

    <?php
        mysqli_close($conn);
    ?>
</body>
</html>