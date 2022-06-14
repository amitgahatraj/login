<?php

session_start();
include("connection.php");
include("functions.php");

//if something is posted by the user
if($_SERVER['REQUEST_METHOD']=="POST"){

   $user_name = $_POST['user_name'];
   $password = $_POST['password'];

   if(!empty($user_name) && !empty($password) && !is_numeric($user_name)){

    //read from database
    
    $query = "SELECT * FROM users WHERE user_name = '$user_name' limit 1";

    $result = mysqli_query($con,$query);

    
    if($result && mysqli_num_rows($result) > 0){
        $user_data = mysqli_fetch_assoc($result);
            
        if($user_data['password']=== $password){

            $_SESSION['user_id']= $user_data['user_id'];
            header("Location:index.php");
            die;

        }

    }
    echo "Wrong Username or Password!";

   }else{
    echo "Please enter valid information!";
   }
}
?>

<!DOCTYPE html>
<html>
    <head><title>Login</title></head>
    <body>
        <style type="text/css">


        </style>

        <div id="box">
            <form method="post">
                <div style="font-size: 20px">Login</div>
                <input id="text" type="text" name="user_name"> <br><br>
                <input id="text" type="password" name="password"><br><br>
                <input id="button" type="submit" value="Login"><br><br>
                <a href="signup.php">Signup</a><br><br>


            </form>
        </div>


    </body>
</html>

