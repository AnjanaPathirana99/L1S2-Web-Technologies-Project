<?php
session_start();

    include("connection.php");
    include("functions.php");




   if($_SERVER['REQUEST_METHOD'] == "POST")
   {
       //something was posted
       $user_name = $_POST['user_name'];
       $password = $_POST['password'];
       /*$name = $_POST['name'];
       $class_year = $_POST['class_year'];
       $subject = $_POST['subject'];
       $email = $_POST['email'];
       $phone_no = $_POST['phone_no'];*/

       if(!empty($user_name) && !empty($password))
       {
           //read from db
           $query = "select * from users where user_name = '$user_name' limit 1";

           $result = mysqli_query($con, $query);

           if($result)
           {
                if($result && mysqli_num_rows($result) > 0)
                {
                    $user_data = mysqli_fetch_assoc($result);

                    if($user_data['password'] === $password)    //=== check wheather the pwd entertered is identical to pwd of relevent user
                    {
                        $_SESSION['user_id'] = $user_data['user_id'];
                        header("Location: index.php");
                        die;
                    }  
                    echo "Wrong username or password!";                  
                }
           }
          
          
        }else
       {
           echo "Invalid information!";
       }
   }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form method="post">
        <h4>Username</h4><input type="text" name="user_name"><br><br>
        <h4>Password</h4><input type="password" name="password"><br><br>

        <input type="submit" value="Login">

        <h4>Is this your first time? Click <a href = "signup.php">here</a> to Register</h4>
    </form>
</body>
</html>