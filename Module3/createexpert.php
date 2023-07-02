<!-- create.php -->
<!-- Interface of insert data. -->
<html>
<head>
<title>Write A Report</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<?php

if(isset($_GET["expert_id"])) {

    $id= $_GET["expert_id"];
}
?>


<body bgcolor="#FFFFFF" text="#000000">
<div class="card mt-5">
                    <div class="card-header">
                        <h2>Write A Report by Expert</h2>
                    </div>
                    <div class="card-body">

                        <form action="insertexpert.php" method="POST">

                            <div class="from-group mb-3">
                                <label for="">User ID (Ex : EX20001)</label>
                                <input type="text" name="ExpertID" class="form-control" />

</div>
<br>
<br>
<div>
                                <label for="">Type of User (Student / Expert): </label>
                                <input type="text" name="ExpertType" class="form-control" />
</div>
<br>
<br>
                                Report : <br>
<textarea name="RepbyExpert" cols="30" rows="8"></textarea>

<br>
                            <div>
<br>                        
                            <div class="from-group mb-3">
                                <button type="submit" name="save_select" class="btn btn-primary">Submit</button>
                                <button type="reset" name="save_select" class="btn btn-primary">Reset</button>
                            </div>
                        
      
    </form>
    <br>
    <br>
    <script>
            function myFunction(){
                alert("Your report successful updated!");
            }
        </script>
        <br>
                </div>
                </div>
        

<hr>
<div align="center"><a href="Post.php?expert_id=<?php echo $id?>">Main Menu</a ] </div>
</body>
</html>