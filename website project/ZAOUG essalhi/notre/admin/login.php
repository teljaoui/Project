<?php include('header.php') ?>
<?php
 


include('../server/connectiom.php');

if(isset($_SESSION['admin_logged_in'])){
    header('location: index.php');
    exit();
}

if(isset($_POST['login_btn'])){
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $stmt = $conn->prepare("SELECT admin_id,admin_name ,admin_email,admin_password FROM admins WHERE admin_email=? AND admin_password=? LIMIT 1");
    $stmt->bind_param('ss',$email,$password);
    if($stmt->execute()){
        $stmt->bind_result($admin_id,$admin_name,$admin_email,$admin_password);

        $stmt->store_result();

        if($stmt->num_rows() == 1){
            $stmt->fetch();
            $_SESSION['admin_id'] = $admin_id;
            $_SESSION['admin_name'] = $admin_name;
            $_SESSION['admin_email'] = $admin_email;
            $_SESSION['admin_logged_in'] = true;

            header('location: index.php?login_success=logged in successfully');
        }else{
            header('location: login.php?error=could not verify your account');
        }

    }else{

        header('location: login.php?error=something went wrong');


    }

}




?>


<section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2 class="from-weight-bold">Login</h2>
            <hr class="mx-auto">
        </div>
    <div class="mx-auto container">
        <form action="login.php" id="login-form" enctype="multipart/form-data" method="post" >
            <p style="color: red;" class="text-center"><?php if(isset($_GET['error'])){echo $_GET['error'];} ?></p>
                <div class="form-group mt-2">
                    <label for="">Email</label>
                    <input type="email" class="form-control" id="prduct_name" name="email" placeholder="Email" required>
                </div>
                <div class="form-group mt-2">
                    <label for="">Password</label>
                    <input type="password" class="form-control" id="product-desc" name="password" placeholder="Password" required>
                </div>
                <div class="form-group mt-3">
                    <input type="submit" class="btn btn-primary" id="Login-btn" name="login_btn" value="Login">
                </div>
               
        </form>
    </div>
    
</body>
</html>