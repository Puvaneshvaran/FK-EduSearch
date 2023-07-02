<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile </title>
    <link rel="icon" href="../../logo/logo-rasmi-ump-logo-sahaja.png" type="image/x-icon">
    <link rel="stylesheet" href="../Profile/styleSheet/index_style.css">
    <style>
        *:focus{
            outline: none;
        }

        .box{
            box-sizing: border-box;
            width: 163px;
            height: 153px;
            border:2px solid #33b998;;
            box-shadow: -3px -3px 7px #ffffff73,
            3px 3px 5px rgba(94,104,121,0.288);
            border-radius: 50%;
            background-color: black;
            margin-top: 50px;
            overflow: hidden;
            transition: all 0.5s;
        }

        .box:hover{
            width: 360px;
            height: 550px;
            border-radius: 5px;
        }

        .box:not(:hover){
            transition: all 500000s;
        }

        image{
            box-sizing: border-box;
            width:149px;
            height:149px;
            border-radius:50%;
            margin:0;
            border:5px solid #33b998;;
            padding: 3px;
            background-color: white;
            overflow: hidden;
            transition: all 0.5s;
        }

        .box:hover img{
            width: 100px;
            height: 100px;
            margin:20px 35% ;
        }

        .box:not(:hover) img{
            transition: all 500000s;
        }

        /* hr{
            width:500px;
            line-height:20px;
            margin:10px 10px 10px 10px;
        } */

        input[type="text"],input[type="email"],input[type="number"],input[type="date"] {
            display: block;
            box-sizing: border-box;
            color: #33b998;;
            margin-bottom: 30px;
            padding: 4px;
            width: 220px;
            height: 32px;
            border: none;
            border-bottom: 1px solid #33b998;;
            font-family: 'Roboto', sans-serif;
            font-weight: 400;
            font-size: 15px;
            transition: 0.2s ease;
            background: none;
        }

        input[type="text"]{
            margin-top: 25px;
        }
            
        input[type="text"]:focus,input[type="email"]:focus,input[type="number"], input[type="date"]:focus {
            border-bottom: 2px solid #33b998;;
            border-bottom-right-radius:20px;
            color: #33b998;;
            transition: 0.2s ease;
            background: black;
            border-top: none;
        }
            
        button{
            border:1px solid #33b998;;
            background-color: black;
            color:white;
            height: 30px;
            width: 100px;
            border-radius: 5px;
            left:0;
            margin:0px;
            transition: all .3s;
        }
            
        button:hover{
            transform: scale(1.1);
            background-color: #566573;
        }

        input[type="file"]{
            display:none;
        }
            
        #upload{
            box-sizing: border-box;
            width:40px;
            height:20px;
            background-color: black;
            color:white;
            border:1px solid #33b998;;
            background-color: black;
            color:white;
            padding: 4px;
            border-radius: 2px;
        }

        #upload:hover{
            background-color: #566573;
            transform: scale(1.1);
        } 

        fieldset{
            width: 50%;
            border: 2px solid #33b998;
            background-color: #33b998;
            padding-bottom: 30px;
        }

        #user_name, #email{
            background-color: transparent;
            border: none;
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
        <a href="../viewProgress/index.php">Progress</a>
        <a href="../report/index.php">Report</a>
        <a href="../Profile/index.php" style="float: right; margin-top:-15px; margin-bottom:-15px"><img src="../../logo/user_logo.png" alt="User Logo" id="userlogo"></a>
    </div>
    <hr>

    <h1 id="title">Profile</h1>

    <center>
        <form action="update.php" method="POST" name="profileDetail" enctype="multipart/form-data">

            <div class="box" style="margin-top: -10px;">

            <!-- <input type="file" id="file" name="image" id="upload" onclick="triggerClick()"> -->
            <img src="../../logo/user_logo.png" width="100%" height="100%" id="image">
            <!-- <label for="file" id="upload">EDIT PICTURE</label> -->


            <input type="text" placeholder="Name" name="name" value="" required>
            <input type="Email" placeholder="Email ID" name="email" required>
            <input type="text" placeholder="Phone Number" name="phone_num" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..?)\../g, '$1');" required>
            <input type="date" placeholder="Date of Birth" name="dob" required>
            <input type ="hidden" name="id" value="<?php echo $id; ?>">
            <br>

            <button type="reset" style="float: left;margin: 10px 0 0 18.2%;">CANCEL</button>

            <button type="submit"
            name="done" style="float: right;margin:10px 18.2% 0 0;">DONE</button>

            </div>
        </form>
    </center>

    <script src="scripts.js"></script>

    <br><br>
    <form name="userDetail">
            <?php
                include("dbase.php");

                $query = "SELECT * FROM detail";
                $result = mysqli_query($conn,$query);

                if (mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                    $uname = $row["name"];
                    $email = $row["email"];
                    $phone_num = $row["phone_num"];
                    $dob = $row["dob"];
            ?>
            <center>
                <fieldset style="box-shadow: 2px 2px 8px grey;">
                    <br>
                    <label for="user_name" id="user_name" style="color: white; text-shadow: 1px 1px black;">Name: </label> <br> <?php echo $uname; ?>
                    <br><br>
                    <label for="email" id="email" style="color: white; text-shadow: 1px 1px black;">E-Mail: </label> <br> <?php echo $email; ?>
                    <br><br>
                    <label for="phone_num" id="phone_num" style="color: white; text-shadow: 1px 1px black;">Phone Number:</label> <br> <?php echo $phone_num; ?>
                    <br><br>
                    <label for="dob" style="color: white; text-shadow: 1px 1px black;">Date of Birth:</label> <br> <?php echo $dob; ?>
                    
                </fieldset>
            </center>
            <?php
                }}
            ?>
    </form>
</body>
</html>