<?php
session_start();

  if(isset($_POST["post"])){

     $sender_name = $_SESSION["uname"];

     $reciever_name = $_GET["user_name"];

     $msg = $_POST["msg"];

     $filename = $_FILES["image"]["name"];

     $tempname = $_FILES["image"]["tmp_name"];

     $folder =  "simg/".$filename;

      move_uploaded_file($tempname,$folder);



      if($msg == "" && $folder == ""){
        
      echo "message is empty can't sent";

      }
      else{

      $conn = mysqli_connect("localhost","root","","chats1") or die("connection failed");

      $query = "insert into users_chat (sender_name,reciever_name,msg,image) values ('$sender_name','$reciever_name','$msg','$folder')";

      mysqli_query($conn,$query) or die("query failed");

      header("location: http://localhost/chat/home.php?user_name=$reciever_name");

    }
  }

  else{

     echo "message can't be send";
}
  ?>   