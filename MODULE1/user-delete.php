<?php
    include('assets/config/dbcon.php');
    $c_id = $_GET['id'];

    $sql = "DELETE FROM `user` WHERE `id`='$c_id'";
    $run = mysqli_query($conn, $sql);
    if($run == true){
        header('Location: users.php?status=delete');
    }else{
        header('Location: users.php?status=error');
    }

?>