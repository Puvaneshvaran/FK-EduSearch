<!-- create.php -->
<!-- Interface of insert data. -->
<html>
<head>
<title>Write A Report</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<body bgcolor="#FFFFFF" text="#000000">
<div class="card mt-5">
                    <div class="card-header">
                        <h2>Write A Report by User </h2>
                    </div>
                    <div class="card-body">

                        <form action="insertuser.php" method="POST">

                            <div class="from-group mb-3">
                                <label for="">User ID (Ex : CA20001)</label>
                                <input type="text" name="userID" class="form-control" />

</div>
<br>
<br>
<div>
                                <label for="">Type of User (Student / Expert): </label>
                                <input type="text" name="userType" class="form-control" />
</div>
<br>
<br>
                                Report : <br>
<textarea name="post" cols="30" rows="8"></textarea>

<br>
                            <div>
<br>                        
                            <div class="from-group mb-3">
                                <button type="submit" name="save_select" class="btn btn-primary">Submit</button>
                                <button type="reset" name="save_select" class="btn btn-primary">Reset</button>
                            </div>
                        </form>

                    </div>
                </div>
        

<hr>

</body>
</html>

