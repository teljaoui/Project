
<?php
session_start();
include('server/connectiom.php');

if(isset($_SESSION['logged_in'])){
    header('Location: account.php');
    exit;
}

if(isset($_POST['register'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    if($password !== $confirmPassword){
        header('Location: sign-up.php?error=passwords%20don%27t%20match');
        exit;
    }
    else if(strlen($password) < 6){
        header('Location: sign-up.php?error=passwords must be least 6 charachters');
        exit;
    }
  
    else{
        $stmt1 = $conn->prepare("SELECT COUNT(*) FROM users WHERE user_email = ?");
        $stmt1->bind_param('s', $email);
        $stmt1->execute();
        $stmt1->bind_result($num_rows);
        $stmt1->store_result();
        $stmt1->fetch();
        $stmt1->close();
    
        if($num_rows != 0){
            header('Location: sign-up.php?error=user with this email already exists');
            exit;
        }
        else{
            $stmt = $conn->prepare("INSERT INTO users (user_name, user_email, user_password) VALUES (?, ?, ?)");
            $stmt->bind_param('sss', $name, $email, md5($password));
    
            if($stmt->execute()){
                $user_id = $stmt->insert_id;
                $_SESSION['user_id'] = $user_id;
                $_SESSION['user_email'] = $email;
                $_SESSION['user_name'] = $name;
                $_SESSION['logged_in'] = true;
                header('Location: account.php?register_success=You registered successfully');
                exit;
            }
            else{
                header('Location: sign-up.php?error=could not create an account at the moment');
                exit;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        
:root {
    --main-color: green;
    --second-color: #192f6a;
    --text-color: #314862;
    --bg-color: #fff;

    --box-shadow: 2px 2Px 18px rgb(14 52 54 / 15%);

}

        .login {
    display: grid;
    grid-template-columns: 0.4fr 1fr;
    align-items: center;
    min-height: 100vh;
}
     .login-container {
      display: flex;
      flex-direction: column;
      row-gap: 1rem;
     }
     .login-container h2 {
        font-size: 1.4rem;
     }
     .login-container p{
        font-size: 0.9rem;
     }
     .login-container form {
        display: flex;
        flex-direction: column;
     }
     .login-container form span {
        font-size: 0.9rem;
        color: #8a8a8a;
        margin-bottom: 4px;
     }
     .login-container form input {
        border: 1px solid #8a8a8a;
        outline: none;
        padding: 10px;
        margin-bottom: 1rem;
        background: white;
     }
     
     .login-container form .buttom{
      outline: none;
      border: none;
      background: var(--main-color);
      color: var(--bg-color);
      font-size: 0.85rem;
      font-weight: 500;
   }
   .login-container form .buttom:hover {
    background: #3492fd;
   }
   .login-container form a {
    font-size: 0.9rem;
    text-align: right;
   }
   .login-container .btn {
    border-radius: 0;
    text-align: center;

   }
    </style>
    <title>Document</title>
</head>
  <?php include "header.php" ?>
<body>
    <div class="login container">
        <div class="login-container">
            <h2>sign up to continue</h2>
            <p>CREATE AN ACCOUNT</p>
            <p>already have an account? <a href="login.php">log in</a></p>
            <form action="sign-up.php" method="POST" id="regiter-form">
                <p style="color: red;"><?php if(isset($_GET['error'])){ $_GET['error']; }?></p>
            <input type="text" name="name" id="email" required>
                <span>enter your email</span>
                <input type="email" name="email" id="email" required>
                <span>enter password</span>
                <input type="password" class="form-control" id="register-password" name="password" placeholder="Password" required>
                <span>enter confirm Password</span>
                 <input type="password" class="form-control" id="register-conpassword" name="confirmPassword" placeholder="Confrim Password" required>
                <input type="submit" value="sign up" name="register" class="buttom">
                <a href="">forget password?</a>
            </form>

            

            <a href="login.php" class="btn">login now</a>
        </div>
        <div class="login-image">
            <img src="img/login-image.jpg" alt="eror">
        </div>
    </div>

</body>

</html>