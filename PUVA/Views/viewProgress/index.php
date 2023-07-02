<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View | Progress Listing</title>
    <link rel="icon" href="../../logo/logo-rasmi-ump-logo-sahaja.png" type="image/x-icon">
    <link rel="stylesheet" href="../viewProgress/styleSheet/progressStyle.css">
    <style>
        table{
            border: 1px solid black;
            height: 100%;
            width: 100%;
            margin-bottom: 20px;
        }

        h1{
            text-align: center;
        }

        table{
            background-color: rgb(41, 134, 114);;
        }

        th{
            height: 50%;
            border: 1px solid black;
            background-color: lightgreen;
        }

        td{
            text-align: center;
            height: 50%;
            border: 1px solid black;
            background-color: lightyellow;
        }
    </style>
</head>
<body>
<a href="../../calendar_view/index.php"><img class="logo" src="../../logo/logo.png" alt="UMP_Logo"></a>
    <br>
    <br>
    <div class="nav_top">
        <a href="../../calendar_view/index.php">Home</a>
        <a href="../broadcast/index.php">Broadcast</a>
        <a href="../report/index.php">Report</a>
        <a href="../Profile/index.php" style="float: right; margin-top:-15px; margin-bottom:-15px"><img src="../../logo/user_logo.png" alt="User Logo" id="userlogo"></a>
    </div>
    <hr>

    <h1 id="title">View Progress Listing</h2>

    <br>

    <?php
        include("dbase.php");

        $query = "SELECT * FROM views, staff_prog, expert_Prog WHERE views.id = staff_prog.id AND views.id = expert_Prog.id GROUP BY rating ORDER BY rating DESC";
        $result = mysqli_query($conn,$query);

        if (mysqli_num_rows($result) > 0){
         // output data of each row
    ?>
        <table>
            <tr>
                <th> ID</th>
                <th>Staff</th>
                <th>Expert</th>
                <th>Post Name</th>
                <th style="width: 30%;">Progress</th>
                <th style="width: 20%;">Rating</th>
                <?php
                    $i=0;
                    while($row = mysqli_fetch_assoc($result)){
                        $student_id = $row["student_id"];
                        $staff_prog = $row["name_staff"];
                        $expert_Prog = $row["name_expert"];
                        $post_name = $row["post_name"];
                        $comment_Staff = $row["comment_Staff"];
                        $comment_Expert = $row["comment_Expert"];
                        $rating = $row["rating"];
                ?>
                <tr>
                    <td><?php echo $student_id; ?></td>
                    <td><?php echo $staff_prog; ?></td>
                    <td><?php echo $expert_Prog; ?></td>
                    <td><?php echo $post_name; ?></td>
                    <td style="text-align: justify; padding:10px;">
                        Comment:
                        <ul>
                            <?php echo $comment_Expert; ?>
                        </ul>
                        Comment:
                        <ul>
                            <?php echo $comment_Staff; ?>
                        </ul>
                    </td>
                    <td><?php echo $rating; ?></td>
                </tr>
                <?php
                    $i++;
                    }
                ?>
            </tr>
        </table>
    <?php
        }
    ?>
</body>
</html>