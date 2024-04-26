<?php
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

    $image_nam1 = $name."1.png";
    $image1 = $_FILES['image1']['tmp_name'];
    $file_name = $_FILES['image1']['name'];
    $image_nam1 = $name."1.png";
    $image_name1 = "imag/".$name."1.png";
    move_uploaded_file($image1, "imag/".$image_nam1);

    if($password !== $confirmPassword){
        header('Location: register.php?error=passwords%20don%27t%20match');
        exit;
    }
    else if(strlen($password) < 6){
        header('Location: register.php?error=passwords must be least 6 characters');
        exit;
    }
    else{
        $stmt1 = $conn->prepare("SELECT COUNT(*) FROM users WHERE user_email = ?");
        $stmt1->bind_param('s', $email);
        $stmt1->execute();
        $stmt1->bind_result($num_rows); // Assign the value to a variable
        $stmt1->store_result();
        $stmt1->fetch();
        $stmt1->close();
    
        if($num_rows != 0){
            header('Location: register.php?error=user with this email already exists');
            exit;
        }
        else{
            $stmt = $conn->prepare("INSERT INTO users (user_name, user_email, user_password, usser_image) VALUES (?, ?, ?, ?)");
            $stmt->bind_param('ssss', $name, $email, md5($password), $image_name1);
    
            if($stmt->execute()){
                $user_id = $stmt->insert_id;
                $_SESSION['user_id'] = $user_id;
                $_SESSION['user_email'] = $email;
                $_SESSION['usser_image'] = $image_name1;
                $_SESSION['user_name'] = $name;
                $_SESSION['logged_in'] = true;
                header('Location: account.php?register_success=You registered successfully');
                exit;
            }
            else{
                header('Location: register.php?error=could not create an account at the moment');
                exit;
            }
        }
    }
}

include('layouts/header.php');
?>



<style>
 
 :root {
     --background-color: #ffffff; /* لون الخلفية في الوضع العادي */
     --text-color: #000000; /* لون النص في الوضع العادي */
   }
   
   /* الوضع العادي */
   body {
     background-color: var(--background-color);
     color: var(--text-color);
   }
   #header{
     background-color: var(--background-color);
     color: var(--text-color);
   }
   #navbar li a{
     color: var(--text-color);
 }
 
   
   /* وضع الظلام */
   body.dark-mode {
     --background-color: #181818; /* لون الخلفية في وضع الظلام */
     --text-color: #ffffff; /* لون النص في وضع الظلام */
   }
 
   #header.dark-mode {
     --background-color: #181818; /* لون الخلفية في وضع الظلام */
     --text-color: #ffffff; /* لون النص في وضع الظلام */
   }
   #navbar li a .dark-mode{
     --text-color: #ffffff;
 }
 #navbar{
    background-color: var(--background-color);
}


  #navbar.dark-mode {
    --background-color: #181818; 
}
 </style>

    <!--register-->
    <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2 class="from-weight-bold">Register</h2>
            <hr class="mx-auto">
        </div>
        <div class="mx-auto container">
            <form action="register.php" enctype="multipart/form-data" method="POST" id="regiter-form">
                <p style="color: red;"><?php if(isset($_GET['error'])){ $_GET['error']; }?></p>
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" id="Login-Name" name="name" placeholder="Name" required>
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" class="form-control" id="register-email" name="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control" id="register-password" name="password" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <label for="">Confrim Password</label>
                    <input type="password" class="form-control" id="register-conpassword" name="confirmPassword" placeholder="Confrim Password" required>
                </div>
                <div class="form-group">
                <label for="">Image:</label>
                    <input type="file" class="form-control"  id="image1" name="image1" placeholder="Image 1" required>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn" id="register-btn" name="register" value="register">
                </div>
                <div class="form-group">
                   <a id="Login-url" href="login.php" class="btn">Do you have accoount? Logine</a>
                </div>
            </form>
        </div>
    </section>
    
</body>
<script>
    const body = document.body;
const darkModeKey = 'darkMode';

// تحقق من وجود حالة الوضع المحفوظة في localStorage
if (localStorage.getItem(darkModeKey) === 'true') {
  body.classList.add('dark-mode');
}
</script>
<script>
    const bar = document.getElementById('bar');
    const close = document.getElementById('close');

    const nav = document.getElementById('navbar');

    if (bar) {
        bar.addEventListener('click', () => {
            nav.classList.add('active')
        })
    }
    if (close) {
        close.addEventListener('click', () => {
            nav.classList.remove('active')
        })
    }

</script>
</html>