<?php

 session_start();

 if(isset($_SESSION["uname"])){
    
    $user = $_SESSION["uname"];

    $conn = mysqli_connect("localhost","root","","chats1") or die("connection failed");

    $query = "update users set login = 'offline' where uname = '$user'";

    mysqli_query($conn,$query) or die("query failed");

    session_unset();

    session_destroy();

    header("location: http://localhost/chat/login.php");

    mysqli_close($conn);



 }











?>