<?php
include("config.php");
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form

    echo "<script>console.log('Been here all along');</script>";

    $myusername = mysqli_real_escape_string($db,$_POST['username']);
    $mypassword = mysqli_real_escape_string($db,$_POST['password']);

    $sql = "SELECT username FROM testusers WHERE username = '$myusername' and password = '$mypassword'";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $active = $row['active'];

    $count = mysqli_num_rows($result);

    // If result matched $myusername and $mypassword, table row must be 1 row

    if($count == 1) {
        //session_register("myusername");
        $_SESSION['username'] = $myusername;

        header("location: homepage.php");
    }else {
        $error = "Your Login Name or Password is invalid";
        die('$error');
    }
}
?>

<?php
//require("APIClient.php");

//APIClient::login($_POST['username'],$_POST['password']);

//if(APIClient::isLoggedIn())
//echo "Logged in successfully";
//else
//echo "Invalide user credentials...";

?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Form</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!With this we connect CSS and HTML>
    <link rel = "stylesheet" type = "text/css" href="style.css"/>
    <!With this we connect font-awesome.css and index.html>
    <link rel = "stylesheet" type = "text/css" href ="font-awesome.css">
</head>
<body>
<div class = "container">
    <img src ="images/RowanSeal.png"/>
    <form action="login.php" method="post">
        <div class="form-input">
            <input type="text" name="username" placeholder="Enter Username">
        </div>
        <div class ="form-input">
            <input type="password" name="password" placeholder="Enter Password">
        </div>
        <input type="submit" name="submit" value="LOGIN" class="btn-login">
    </form><br>
    <a href ="#">Forgot Password?</a>
    <p>Login Form powered by <a class="footer-text" href="http://www.rowan.edu/home/">Rowan University </a></p>
</div>
</body>
</html>