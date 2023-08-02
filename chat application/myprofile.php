<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php session_start();?>
<h1 style="position:absolute;top:10px;left:40%;color:white;font-size:30px;text-transform:uppercase;font-weight:1000;z-index:2;">ichat</h1>
   
    <h2 style="position:absolute;top:50px;left:39%;color:black;font-size:30px;text-transform:uppercase;font-weight:1000;z-index:2;"><?php echo $_SESSION["uname"]; ?></h2>
    <a href="home.php" style="position:absolute;top:35px;right:370px;text-transform:uppercase;text-decoration:none;font-size:20px;color:white;z-index:2;">home</a>
   
    <a href="myprofile.php" style="position:absolute;top:35px;right:250px;text-transform:uppercase;text-decoration:none;font-size:20px;color:white;z-index:2;">account</a>
    <a href="settings.php"  style="position:absolute;top:35px;right:130px;text-transform:uppercase;text-decoration:none;font-size:20px;color:white;z-index:2;">settings</a>
    <div style="position:absolute;top:0;left:0;width:100%;height:150px;background:lime;border:1px solid white;"></div>
    <div style="position:absolute;top:150px;left:0;width:100%;height:550px;background:rgb(189,183,107);border:1px solid white;"></div>
    
     <a href="logout.php?user_name=<?php echo $_SESSION["uname"]; ?>" style="position:absolute;top:35px;right:20px;border-bottom:2px solid red;color:red;text-align:center;text-transform:uppercase;font-size:20px;color:white;text-decoration:none;z-index:2;" >logout</a>
    
    <?php

     $user = $_SESSION["uname"];

     $conn = mysqli_connect("localhost","root","","chats1") or die("connection failed");

     $query = "select * from users where uname = '$user' ";

     $result = mysqli_query($conn,$query) or die("query failed");

     $row = mysqli_fetch_assoc($result);

     $name = $row["uname"];

     $img = $row["img"];

     echo "<a href='$img'><img src='$img' style='position:absolute;top:30%;left:35%;width:300px;height:300px;z-index:100;border-radius:50%;border:2px solid black;'></a>";

     echo "<h1 style='position:absolute;top:80%;left:37%;color:black;text-transform:uppercase;z-index:100;font-weight:1000;'>name:$name</h1>";
    
    
    
    ?>
     
</body>
</html>