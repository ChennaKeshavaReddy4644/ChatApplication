<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background-image:url('dp/whatsapp.jpg');background-repeat:repeat;background-size:center;overflow-y:scroll;background-attachment:fixed;">
<?php

 session_start(); 

?>
    <h1 style="position:fixed;top:10px;left:40%;color:white;font-size:30px;background-attachment:fixed;text-transform:uppercase;font-weight:1000;z-index:2;">ichat</h1>

    <a href="home.php" style="position:fixed;top:35px;right:370px;text-transform:uppercase;text-decoration:none;font-size:20px;color:white;z-index:2;">home</a>
   
    <a href="myprofile.php" style="position:fixed;top:35px;right:250px;text-transform:uppercase;text-decoration:none;font-size:20px;color:white;z-index:2;">account</a>
   
    <a href="settings.php"  style="position:fixed;top:35px;right:130px;text-transform:uppercase;text-decoration:none;font-size:20px;color:white;z-index:2;">settings</a>
   
    <div style="background-attachment:fixed;position:fixed;top:0;left:0;width:100%;height:100px;background:lime;border:1px solid white;"></div>
   
    <div style="background-attachment:fixed;position:fixed;top:100px;left:0;width:270px;height:1000%;background:rgb(0,255,255);z-index:-100;border:1px solid white;"></div>
   
    <div style="background-attachment:fixed;position:fixed;top:100px;right:0;width:400px;height:1000%;z-index:-100;background:rgb(85,107,47);border:1px solid white;"></div>
   
    <div style="background-attachment:fixed;position:fixed;top:200px;right:0;width:400px;height:3px;background:white;"></div>

     <a href="logout.php?user_name=<?php echo $_SESSION["uname"]; ?>" style="position:fixed;top:35px;right:20px;border-bottom:2px solid red;color:red;text-align:center;text-transform:uppercase;font-size:20px;color:white;text-decoration:none;z-index:2;" >logout</a>

     
      <?php
    
     $login_user = $_SESSION["uname"];

     $conn = mysqli_connect("localhost","root","","chats1") or die("connection failed");

     $query = "select * from users where uname = '$login_user'";

     $result = mysqli_query($conn,$query) or die("query failed");

     $row = mysqli_fetch_assoc($result);

     $name = $row["uname"];
     
     $img = $row["img"];

      echo "<a href='$img'><img src='$img' style='position:fixed;top:25px;left:20px;width:50px;height:50px;box-sizing:border-box;border-radius:50%;border:2px solid white;' ></a>";
     
      echo "<h2 style='position:fixed;top:15px;left:80px;color:white;text-transform:uppercase;font-weight:1000;z-index:2;'>$name</h2>";
?>

   <ul style="margin:150px 70px 0 0;z-index:1; list-style:none;">
    <?php 

     $login = $_SESSION["uname"];
     
     $conn = mysqli_connect("localhost","root","","chats1");

     $query = "select * from users where uname != '$login'";

     $result = mysqli_query($conn,$query);

     while($row = mysqli_fetch_assoc($result)){

        $name = $row["uname"];

        $status = $row["login"];

        $img = $row["img"];

      echo "<div style='margin:0 -25px;width:200px;height:70px;background:rgb(255,99,71);border:5px solid white;'>";
       
      echo "<a href='$img'><img src='$img' style='margin:10px 0 -30px 0;width:50px;height:50px;border:1px solid white;border-radius:50%;'></a>";
        
      echo "<a href='home.php?user_name=$name' style='margin:30px 10px 40px 10px;color:white;'>$name</a>";
      
      echo "<li style='text-decoration:none;margin:-33px 0 0 140px;'>$status</li>";
      
      echo"</div>";

     }

      ?>

    </ul>

    <form action="message.php?user_name=<?php echo $_GET['user_name']; ?>" method="post" enctype="multipart/form-data" style="position:absolute;top:50%;left:0;">

    <textarea name="msg" cols="45" rows="3" placeholder="type anything...." style="z-index:100;border:2px solid white;border-radius:10px;margin:70px 0 0 955px;position:fixed;top:200px;"></textarea>
    
     <input type="submit" name="post" value="send" style="margin:17px 0 0 955px;position:fixed;width:100px;height:50px;outline:none;border:2px solid white;border-radius:10px;;background:blue;color:white;font-size:20px;">
       
     <input type="file" name="image" style="margin:17px 0 0 1100px;position:fixed;width:100px;height:50px;outline:none;border:2px solid white;border-radius:10px;;background:green;color:white;font-size:15px;">
      

    </form>

    <?php

$chat_user = $_GET["user_name"];

$conn = mysqli_connect("localhost","root","","chats1") or die("connection failed");

$query = "select * from users where uname = '$chat_user' ";

$result = mysqli_query($conn,$query) or die("query failed");

$row = mysqli_fetch_assoc($result);

$r = $row["uname"];

$i = $row["login"];

$l = $row["img"];

echo "<a href='$l'><img src='$l' style='position:fixed;top:18%;left:72%;border-radius:50%;width:60px;height:60px;border:2px solid white;z-index:1;'/></a>";

echo "<h1 style='position:fixed;top:15%;left:78%;color:white;'>$r</h1>";

echo "<h3 style='position:fixed;top:21%;left:78%;color:white;' >$i</h3>";
?>

    <?php

$sender_name = $_SESSION["uname"];

$reciever_name = $_GET["user_name"];

$conn = mysqli_connect("localhost","root","","chats1") or die("connection failed");

$query = "select * from users_chat where (sender_name = '$sender_name' and reciever_name = '$reciever_name')or(sender_name = '$reciever_name' and reciever_name = '$sender_name')";

$result = mysqli_query($conn,$query) or die("query failed");

$n_row = mysqli_num_rows($result);

echo "<div style='margin:-400px 0 0 600px;'>";

  while($row = mysqli_fetch_assoc($result)){


   $s_name = $row["sender_name"];

   $r_name = $row["reciever_name"];

   $text = $row["msg"];
   
   $i = $row["image"];

   $time = $row["time"];
     
   if($sender_name == $s_name && $reciever_name == $r_name && $text != ""){

       echo "<h3 style='margin:20px 130px;text-align:center;width:180px;font-weight:1000;height:70px;border-radius:5px;background:lightgreen;font-size:20px;font-style:bold;'>$time  $text</h3>";
      
   }
   else if($sender_name  == $r_name && $reciever_name == $s_name && $text != ""){

    echo "<h3 style='align-items:center;font-weight:1000;margin:20px -300px;text-align:center;width:180px;height:70px;border-radius:5px;background:white;font-size:20px;'>$time $text</h3>";

   }

   else if($sender_name == $s_name && $reciever_name == $r_name && $text == "" && $i != ""){
     
    echo "<tr style='margin:0 50px;width:500px;'>";

    echo "<td style='margin:0 50px;width:500px;'><a href='$i'><img src='$i' style='margin:20px 20px;width:300px;height:300px;border:3px solid red;'/></td></a>";

    echo "</tr>";

    echo "<div style='margin:-10px 150px;color:white;'>$time</div>";

   }

   else if($sender_name == $r_name && $reciever_name == $s_name && $text == "" && $i != ""){
     
    echo "<tr style='margin:0 -50px;width:500px;'>";

    echo "<td style='margin:0 -50px;width:500px;text-align:left;'><a href='$i'><img src='$i' style='margin:20px -320px;width:300px;height:300px;border:3px solid red;'/></td></a>";

    echo "</tr>";

    echo "<div style='margin:-10px -150px;color:white;'>$time</div>";

   }

  else{
 
    echo "message is can't sent";

  }
  
  }

    echo "</div>";  

?>

</body>
</html>