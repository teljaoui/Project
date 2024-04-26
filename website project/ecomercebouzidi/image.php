<?php
 include('server/connectiom.php');
 session_start();
 if (isset($_POST['add'])) {
    $user_id = $_POST['user_id'];
    $user_name =$_POST['user_name'] ;



    $image_nam1 = $user_name."1.png";
   
    $image1 = $_FILES['image1']['tmp_name'];
$file_name = $_FILES['image1']['name'];
$image_nam1 = $user_name."1.png";
$image_name1 = "imag/".$user_name."1.png";
move_uploaded_file($image1, "imag/".$image_nam1);




        $stmt = $conn->prepare("UPDATE users SET usser_image=? WHERE user_id=?");
        $stmt->bind_param('si',$image_name1,$user_id);
        $stmt->execute();
     
      
}

?>