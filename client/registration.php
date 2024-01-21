<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    <div class="container">
        <?php
        if (isset($_POST["submit"])) {
           $fullName = $_POST["username"];
           $email = $_POST["email"];
           $password = $_POST["password"];
           $passwordRepeat = $_POST["repeat_password"];
           $phone = $_POST["phone"];
           $hostel = $_POST["hostel"];
           $room = $_POST["roomno"];
           $passwordHash = password_hash($password, PASSWORD_DEFAULT);

           $errors = array();
           
           if (empty($fullName) OR empty($email) OR empty($password) OR empty($passwordRepeat) OR empty($phone) OR empty($hostel) OR empty($room )) {
            array_push($errors,"All fields are required");
           }
           if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "Email is not valid");
           }
           if (strlen($password)<8) {
            array_push($errors,"Password must be at least 8 charactes long");
           }
           if ($password!==$passwordRepeat) {
            array_push($errors,"Password does not match");
           }
           require_once "database.php";
           $sql = "SELECT * FROM customers WHERE email = '$email' OR roomno=$room";
           $result = mysqli_query($conn, $sql);
           $rowCount = mysqli_num_rows($result);
           if ($rowCount>2) {
            array_push($errors,"Email already Or Room Number Already Exit!");
           }
           if (count($errors)>0) {
            foreach ($errors as  $error) {
                echo "<div class='alert alert-danger'>$error</div>";
            }
           }else{
            
            $sql = "INSERT INTO customers (username, email, password,phoneno,hostel,roomno) VALUES ( ?, ?, ? , ? , ? , ? )";
            $stmt = mysqli_stmt_init($conn);
            $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
            if ($prepareStmt) {
                mysqli_stmt_bind_param($stmt,"ssssss",$fullName, $email, $passwordHash,$phone,$hostel,$room);
                mysqli_stmt_execute($stmt);
                echo "<div class='alert alert-success'>You are registered successfully.</div>";
                header("Location: ../login.php");
                
            }else{
                die("Something went wrong");
            }
           }
          

        }
        ?>
       <div id="login-box">
  <div class="left">
    <h1 class="sign">Sign up</h1>
    <form action="" method="POST">
    <input type="text" name="username" placeholder="Username" />
    <input type="email" name="email" placeholder="E-mail" />
    <input type="password" name="password" placeholder="Password" />
    <input type="password" name="repeat_password" placeholder="Retype password" />
    <input type="tel" name="phone" placeholder="Phone Number" />
    <input type="text" name="hostel" placeholder="Hostel Name" />
    <input type="text" name="roomno" placeholder="Room No" />
    <center><input type="submit" name="submit" value="Sign Up" /></center>
    </form>

    <p>Already Registered <a href="../login.php">Login Here</a></p>
  
  
</div>
    
        
    </div>
                                                 
</body>
</html>