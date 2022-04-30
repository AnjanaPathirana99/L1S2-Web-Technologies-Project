<?php
session_start();

    include("connection.php");
    include("functions.php");




   if($_SERVER['REQUEST_METHOD'] == "POST")
   {
       //something was posted
       $user_name = $_POST['user_name'];
       $password = $_POST['password'];
       $name = $_POST['name'];
       $class_year = $_POST['class_year'];
       $subject = $_POST['subject'];
       $email = $_POST['email'];
       $phone_no = $_POST['phone_no'];

       if(!empty($user_name) && !empty($password))
       {
           //save to db
           $user_id = random_num(20);
           $query = "insert into users (user_id, user_name, password, name, class_year, subject, email, phone_no) values ('$user_id', '$user_name', '$password','$name', '$class_year', '$subject', '$email', '$phone_no')";

           mysqli_query($con, $query);

           header("Location: successful.php");
           die;
       
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
    <title>Register</title>
</head>
<body>
    <form method="post">
        <h4>Username</h4><input type="text" name="user_name"><br><br>
        <h4>Password</h4><input type="password" name="password"><br><br>
        <h4>Name with initials</h4><input type="text" name="name"><br><br>
        <h4>Year of examination</h4><input type="year" name="class_year"><br><br>
        <h4>Subject</h4><input type="text" name="subject"><br><br>
        <h4>E-mail</h4><input type="text" name="email"><br><br>
        <h4>Contact number</h4><input type="text" name="phone_no"><br><br>
        <!-- <!h4>Upload payment receipt<!/h4><!input type="file" name="image">     <!payment receipt> -->

        <form action="upload.php" method="post" enctype="multipart/form-data">
            Upload the payment receipt here:
            <input type="file" name="file">
            <input type="submit" name="submit" value="Upload">
        </form>
        <br>
        <br>
        <input type="submit" value="Register">

        <h4>Already registered? Click <a href = "login.php">here</a> to login</h4>
        </form>

        


</body>
</html>