<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="login.css">
</head>
<body style="background-image:url('dp/whatsapp.jpg');">
    <h1 style="color:white;top:20%;background:lime;width:500px;border:3px solid white;">login to ichat</h1>
    <form action=" <?php $_SERVER['PHP_SELF']; ?>" method="post">
    <input type="text" name="usname" placeholder="username">
    <input type="password" name="password" placeholder="password">
    <input type="submit" value="login" name="submit">
    </form>
    <a href="register.php" style="color:red;">register?</a>
    <div style="position:absolute;top:26.8%;left:25.55%;width:3px;height:220px;background:white;"></div>
    <div style="position:absolute;top:60%;left:25.55%;width:525px;height:3px;background:white;"></div>
    <div style="position:absolute;top:26.8%;left:63.8%;width:3px;height:220px;background:white;"></div> 
    
    <?php 
    session_start();

   if(isset($_POST["submit"])){ 
       
         $usname = $_POST["usname"];
         $password = $_POST["password"];

        if($usname == "" || $password == "" ){

            echo "<script>alert('enter username and password');</script>";
        }
        else{

            $conn = mysqli_connect("localhost","root","","chats1");

            $query = "select * from users where uname = '$usname' and password = '$password' ";
    
            $result = mysqli_query($conn,$query) or die("query failed");
    
            $row = mysqli_num_rows($result);
            
            if($row == 1){

                $_SESSION["uname"] = $usname;
                 
                $update_msg = mysqli_query($conn,"update users set login = 'online' where uname = '$usname' ");

                $user  = $_SESSION["uname"];

                $login_user = "select * from users where uname = '$user' ";

                $run_user = mysqli_query($conn,$login_user) or die("query failed");

                $row = mysqli_fetch_assoc($run_user);

                $user_name = $row["uname"];

                header("location: http://localhost/chat/home.php");
            }
           mysqli_close($conn);
       }
        
        }
        
?>
</body>
</html>