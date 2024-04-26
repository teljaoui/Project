<?php include "server/connectiom.php";
include "server/get_featured.php";
session_start();
if (isset($_GET['properties_id'])) {

    $properties_id = $_GET['properties_id'];

    $stmt = $conn->prepare("SELECT * FROM properties WHERE properties_id = ?");
    $stmt->bind_param("i", $properties_id);

    $stmt->execute();

    $product = $stmt->get_result();
} else {
}

?>
<?php
include('server/connectiom.php');


if (isset($_POST['rating'])) {
    $properties_id = $_GET['properties_id'];
    $nom = $_POST['nom'];
    $review = $_POST['review'];

    $datetime = time();

    $stmt = $conn->prepare("INSERT INTO review (properties_id, review_name, review, datetime) VALUES (?, ?, ?, ?)");
    $stmt->bind_param('isss', $properties_id, $nom,  $review, $datetime);

    $stmt->execute();
}

if (isset($_GET['properties_id'])) {



    $properties_id = $_GET['properties_id'];
    $stmt = $conn->prepare("SELECT * FROM review WHERE properties_id=? ");

    $stmt->bind_param('i', $properties_id);

    $stmt->execute();

    $result = $stmt->get_result();
}


?>
<?php include('header.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">





    <title>Document</title>
</head>

<body>
    <style>

        #form1{

        }
        .modal {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;

        }

        .photos img {
            width: 205px;
            height: 300px;
            border: 5px solid #aaa;
        }

        .photos img:hover {
            cursor: pointer;
            border: 5px solid red;
        }

        .main img {
            width: 830px;
            height: 830px;
            border: 5px solid #aaa;
        }

        body {
            height: 2000px;
            width: 2000px;
        }

        #btn {
            width: 20px;
            height: 20px;
            border: none;
            background: #fa0;
            cursor: pointer;
            position: fixed;
            bottom: 10px;
            right: 10px;
            display: none;
        }
    </style>
    <button id="btn">^</button>
    <?php
    foreach ($product as $row) {

    ?>

        <div class="modal">
            <div class="box">

                <div class="gallary">

                    <div class="main">
                        <img src="img/<?php echo $row['properties_image']; ?>" name="mian" alt="">
                    </div>
                    <div class="photos">
                        <img onmouseenter="mian.src=this.src" src="img/<?php echo $row['properties_image']; ?>" alt="">
                        <img onmouseenter="mian.src=this.src" src="img/<?php echo $row['properties_image2']; ?>" alt="">
                        <img onmouseenter="mian.src=this.src" src="img/<?php echo $row['properties_image3']; ?>" alt="">
                        <img onmouseenter="mian.src=this.src" src="img/<?php echo $row['properties_image4']; ?>" alt="">
                    </div>
                </div>
            </div>




            <div class="content">

                <div class="text">
                    <h3><?php echo $row['properties_price']; ?>DH</h3>
                    <h3><?php echo $row['properties_name']; ?></h3>

                </div>

                <div class="icon">
                    <i class='bx bx-bed'><span>5</span></i>

                    <i class='bx bx-bath'><span>2</span></i>

                </div>

            </div>





            <form method="POST" id="form1" action="sales.php">
                <input type="hidden" name="properties_id" value="<?php echo $row['properties_id']; ?>">
                <input type="hidden" name="properties_image" value="<?php echo $row['properties_image']; ?>">
                <input type="hidden" name="properties_name" value="<?php echo $row['properties_name']; ?>">
                <input type="hidden" name="properties_price" value="<?php echo $row['properties_price']; ?>">


                <button type="submit" class="btn" name="add_to_cart">Add to Card</button>
                <p><?php echo $row['properties_category']; ?></p>
                <p><?php echo $row['properties_description']; ?></p>

            </form>

            


            <form id="form2" action="riview.php" method="POST">
                <input type="hidden" name="properties_id" value="<?php echo $row['properties_id']; ?>">


                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">


                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>

                            </div>


                            <div class="mx-auto container">
                                <label for="nom">nom et prenom:</label><br>
                                <div class="form-group">
                                    <input type="text" name="nom" style="width: 100%;" class="form-control" id="nom">
                                </div>
                                <label for="review">review:</label>
                                <div class="form-group">
                                    <textarea name="review" class="form-control" id="review" cols="10" rows="10"></textarea>
                                </div>
                            </div>


                            <div class="modal-footer">

                                <button type="submit" name="rating" class="btn btn-secondary">rating</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        <?php  } ?>
        <?php while ($row = $result->fetch_assoc()) { ?>

            <h1> <?php echo $row['review_name']; ?> </h2>

                <p><?php echo $row['review']; ?></p><br><label for="">
                    <p><?php echo date('l jS, F Y h:i:s A', $row["datetime"]); ?></p>

                <?php } ?>

        </div>
</body>
<script>
    var myModal = document.getElementById('myModal')
    var myInput = document.getElementById('myInput')

    myModal.addEventListener('shown.bs.modal', function() {
        myInput.focus()
    })
</script>
<script>
    let btn = document.getElementById('btn');
    window.onscroll = function() {
        if (scrollY >= 400) {
            btn.style.display = 'block'
        } else {
            btn.style.display = 'none'
        }
    }
    btn.onclick = function() {
        scroll({
            left: 0,
            top: 0,
            behavior: "smooth"
        })
    }
</script>

</html>