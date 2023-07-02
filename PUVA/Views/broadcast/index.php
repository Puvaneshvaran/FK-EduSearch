<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Broadcast UMP</title>
    <link rel="icon" href="../../logo/logo-rasmi-ump-logo-sahaja.png" type="image/x-icon">
    <link rel="stylesheet" href="./styleSheet/broadcastStyle.css">
    <script language="javascript" src="index.js" type="text/javascript"></script>
    <script>
        function myFunction() {
            let x = document.forms["broadcast"]["category"].value;
            let y = document.forms["broadcast"]["title"].value;
            if(x == "" || x == null){
              alert("category must be choose.");
              return false;
            }
            if(y == "" || y == null){
              alert("Title must be filled out.");
              return false;
            }

            alert("Your Broadcast are successfully post!");
        }
    </script>
    <style>
         table{
            border: 1px solid black;
            height: 50%;
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

        #del{
            width: 20%;
            color: white;
            padding: 10px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            background-color:green;
            opacity: 0.9;
        }
        #del:hover{
            background-color:red;
            opacity: 0.8;
        }
        #update:hover{
            background-color:black;
            opacity: 0.8;
        }
        #update{
            width: 20%;
            color: white;
            padding: 10px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            background-color: green;
            opacity: 0.9;
        }
    </style>
</head>
<body>
<a href="../../calendar_view/index.php"><img class="logo" src="../../logo/logo.png" alt="UMP_Logo"></a>
    <br>
    <br>
    <div class="nav_top">
        <a href="../../calendar_view/index.php">Home</a>
        <a href="../viewProgress/index.php">Progress</a>
        <a href="../report/index.php">Report</a>
         
        <a href="../Profile/index.php" style="float: right; margin-top:-15px; margin-bottom:-15px"><img src="../../logo/user_logo.png" alt="User Logo" id="userlogo"></a>
    </div>
    <hr>


    <h1 id="title">Broadcast</h1>

    <br>

    <form action="content.php" method="POST" name="broadcast">
        <fieldset style="height: 100%;">
            <div class="container_1">
                <label for="category">Category:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <select name="category" required>
                    <option value="" hidden>-Please Choose-</option>
                    <option value="staff">Project Award</option>
                    <option value="student">News</option>
                    <option value="Expert">Important</option>
                    <option value="Admin">Information</option>
                </select>
                <br><br>
                <label for="title">Title:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input type="text" id="titleName" name="title" required>
            </div>

            <textarea name="Posts" id="Posts" cols="30" rows="10" required></textarea>

            <script src="../../../ckeditor/ckeditor.js"></script>
            <script>
                CKEDITOR.replace('Posts');
            </script>


            <br>

            <div class="submit">
                <div class="center">
                    <input class="button" type="submit" value="Posts" onclick="return myFunction()">
                </div>
            </div>
        </fieldset>

        <br>
    </form>

    <form name=frmUser method="POST">
        <center>
            <?php
                include("dbase.php");

                $query = "SELECT * FROM userb";
                $result = mysqli_query($conn,$query);

                if (mysqli_num_rows($result) > 0){
                    // output data of each row
            ?>
                    <table>
                        <tr>
                            <td style="border: none; background-color:transparent"></td>
                            <th>Counts</th>                           
                            <th>Date</th>
                            <th>Time</th>
                            <th>Category</th>
                            <th>Title</th>
                            <th>Posts</th>
                            
                            <?php
                                $i=0;
                                while($row = mysqli_fetch_assoc($result)){
                                    $date = $row["date"];
                                    $time = $row["time"];
                                    $category = $row["category"];
                                    $title = $row["title"];
                                    $Posts = $row["Posts"];
                                    $id = $row["id"];
                            ?>
                            <tr>
                                <td style="text-align: center;"><input type="checkbox" name="user[]" value="<?php echo $row["id"]; ?>" ></td>
                                <td><?php echo $id; ?></td>                              
                                <td><?php echo $date; ?></td>
                                <td><?php echo $time; ?></td>
                                <td><?php echo $category; ?></td>
                                <td><?php echo $title; ?></td>
                                <td><?php echo $Posts; ?></td>
                               
                            </tr>
                            <?php
                                $i++;
                                }
                            ?>
                            
                        </tr>
                        <tr class="head" style="background-color: transparent; border: none;">
                            <td colspan="8" style="background-color: transparent; border: none;"><input id="update" type="button" name="Edit" value="Edit" onClick="setUpdateAction();" /> 
				                                                                                <input id="del" type="button" name="delete" value="Delete"  onClick="setDeleteAction();" />
                            </td>
                        </tr>
                    </table>

            <?php
                } else {
            ?>

                    <table>
                        <tr>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Category</th>
                            <th>Title</th>
                            <th>Posts</th>

                            <tr>
                                <td colspan="5">No Data Found.</td>
                            </tr>
                        </tr>
                    </table>
            <?php
                }
            ?>
        </center>
    </form>
</body>
</html>