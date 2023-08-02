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
    <div style="position:absolute;top:150px;left:0;width:100%;height:550px;background:rgb(250,128,114);border:1px solid white;"></div>
    
     <a href="logout.php?user_name=<?php echo $_SESSION["uname"]; ?>" style="position:absolute;top:35px;right:20px;border-bottom:2px solid red;color:red;text-align:center;text-transform:uppercase;font-size:20px;color:white;text-decoration:none;z-index:2;" >logout</a>
    <h2 style="position:absolute;top:130px;left:36%;color:white;font-size:30px;text-transform:uppercase;font-weight:1000;z-index:2;">update profile</h2>
   
    <form action="<?php $_SERVER["PHP_SELF"]; ?>" method="post" enctype="multipart/form-data">

    
    <label for="image" style="position:absolute;top:250px;left:36%;z-index:100;font-size:25px;text-transform:uppercase;">image</label>

     <input type="file" name="image" style="position:absolute;top:300px;left:35%;z-index:100;font-size:25px;text-transform:uppercase;">
    
     <input type="submit" value="update" name="upload" style="position:absolute;top:390px;left:37%;z-index:100;font-size:25px;text-transform:uppercase;background:green;color:white;border:none;">

    </form>
    <?php
 
 if(isset($_POST["upload"])){

    $p_name = $_SESSION["uname"];
    

    $filename = $_FILES["image"]["name"];

    $tempname = $_FILES["image"]["tmp_name"];

    $folder =  "dp/".$filename;

    move_uploaded_file($tempname,$folder);

    if($filename != ""){

     $conn = mysqli_connect("localhost","root","","chats1") or die("connection failed");

    $query = "update users set img='$folder' where uname = '$p_name' ";

    mysqli_query($conn,$query) or die("query failed");

    mysqli_close($conn);
    
    echo "<script>alert('uploaded successfully');</script>";
    

    }
    else{
        echo "<script> alert('news upload failed');</script>";
    }


 }

?>

</body>
</html>