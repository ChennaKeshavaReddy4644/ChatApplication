<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="reg.css">
</head>
<body>
    <h1>register</h1>
    <form action="users.php" method="post" enctype="multipart/form-data">
        <input type="text" name="uname" placeholder="username">
        <input type="text" name="email" placeholder="email">
        <input type="password" name="password" placeholder="password">
        <input type="text" name="phone" placeholder="phonenumber">
        <input type="file" name="image" style="position:absolute;top:70%;left:37%;background:blue;z-index:100;">
        <input type="submit" value="submit" style="position:absolute;top:80%;left:43%;color:white;font-size:20px;width:100px;border-radius:10px;height:50px;border:2px solid white;background:green;">
    </form>
</body>
</html>