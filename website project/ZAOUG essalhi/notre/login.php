
<?php
 session_start();


include('server/connectiom.php');

if(isset($_SESSION['logged_in'])){
    header('location: account.php');
    exit;
}

if(isset($_POST['login_btn'])){
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $stmt = $conn->prepare("SELECT user_id,user_name,user_email,user_password FROM users WHERE user_email=? AND user_password=? LIMIT 1");
    $stmt->bind_param('ss',$email,$password);
    if($stmt->execute()){
        $stmt->bind_result($user_id,$user_name,$user_email,$user_password);

        $stmt->store_result();

        if($stmt->num_rows() == 1){
            $stmt->fetch();
            $_SESSION['user_id'] = $user_id;
            $_SESSION['user_name'] = $user_name;
            $_SESSION['user_email'] = $user_email;
            $_SESSION['logged_in'] = true;

            header('location: account.php?login_success=logged in successfully');
        }else{
            header('location: login.php?error=could not verify your account');
        }

    }else{

        header('location: login.php?error=something went wrong');


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
            <h2>login to continue</h2>
            <p>enter you account</p>
            
            <form action="login.php" method="POST" id="Login-form">
            <p style="color: red;" class="text-center"><?php if(isset($_GET['error'])){echo $_GET['error'];} ?></p>
                <span>enter your email</span>
                
                <input type="email" name="email" id="email" required>
                <span>enter password</span>
                <input type="password" name="password" id="password" required>
                <input type="submit" value="log in" name="login_btn" class="buttom">
                <a href="">forget password?</a>

                



            </form>
            <a href="sign-up.php" class="btn">sign up now</a>
        </div>
        <div class="login-image">
            <img src="img/login-image.jpg" alt="eror">
        </div>
    </div>

</body>

</html>