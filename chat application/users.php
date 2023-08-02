<?php

$usname = $_POST["uname"];
$email = $_POST["email"];
$pass = $_POST["password"];
$phone = $_POST["phone"];

$filename = $_FILES["image"]["name"];

$tempname = $_FILES["image"]["tmp_name"];

$folder =  "dp/".$filename;

move_uploaded_file($tempname,$folder);


if($usname == "" || $email == "" || $pass == "" || $phone == "" || $filename == ""){

  echo "registration failed";

}
else{

    $conn = mysqli_connect("localhost","root","","chats1");

    $query = "insert into users (uname,uemail,password,phone,login,img) values ('$usname','$email','$pass','$phone','offline','$folder')" ;

    $result = mysqli_query($conn,$query) or die("query failed");

    mysqli_close($conn);

    header("location: http://localhost/chat/login.php");

    echo "registration successful";

}
?>