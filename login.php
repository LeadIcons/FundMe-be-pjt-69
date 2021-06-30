<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
</head>
<body>
    <?php 
        session_start();
        $error = isset($_SESSION['error']) ? $_SESSION['error'] : '';

        if(!empty($error)):
    ?>
    <div style="background-color:red;width:200px; border-radius:5px;color:white;padding:5px;"><?= $error['credential'] ?></div>
    <?php unset($_SESSION['error']); endif ?>
    <form action="process-login.php" method="post">
        <label>Email</label><br>
        <input type="email" name="email"><br><br>
        <label>Password</label><br>
        <input type="password" name="password"><br><br>
        <input type="submit">
    </form>

 
   
</body>
</html>