<?php

session_start();
include("connection.php");
include("functions.php");

//if something is posted by the user
if($_SERVER['REQUEST_METHOD']=="POST"){

   $user_name = $_POST['user_name'];
   $password = $_POST['password'];

   if(!empty($user_name) && !empty($password) && !is_numeric($user_name)){

    //save to database
    $user_id = random_num(10);
    $query = "INSERT into users (user_id, user_name, password) values('$user_id', '$user_name','$password')";

    mysqli_query($con,$query);

    header("Location:login.php");
    die;


   }else{
    echo "Please enter valid information!";
   }


}


?>

<!DOCTYPE html>
<html>
    <head><title>SignUp</title></head>
    <body>
        <style type="text/css">


        </style>

        <div id="box">
            <form method="post">
                <div style="font-size: 20px">Signup</div>
                <input id="text" type="text" name="user_name"> <br><br>
                <input id="text" type="password" name="password"><br><br>
                <input id="button" type="submit" value="Signup"><br><br>
                <a href="login.php">Login</a><br><br>


            </form>
        </div>


    </body>
</html>

