<?php
    if(isset($_POST['submit'])){
        // start session
        session_start();


        // init cookie
        setcookie('gender', $_POST['gender'], time() + 86400);
        // init session
        $_SESSION['name'] = $_POST['name'];

        // echo $_SESSION['name'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sanbox</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
        <input type="text" name="name" id="">
        <select name="gender" id="">
            <option value="male">male</option>
            <option value="female">female</option>
        </select>
        <input type="submit" value="submit" name="submit">
    </form>
</body>
</html>