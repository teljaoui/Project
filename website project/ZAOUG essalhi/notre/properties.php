<?php include('server/connectiom.php');
include "header.php";
if (isset($_POST['search'])) {


    if (isset($_GET['page_no']) && $_GET['page_no'] != "") {
        $page_no = $_GET['page_no'];
    } else {
        $page_no = 1;
    }

    $price = $_POST['price'];


    $stmt = $conn->prepare("SELECT COUNT(*) As total_records FROM properties WHERE properties_price<=?");

    $stmt->bind_param('si', $price);

    $stmt->execute();

    $stmt->bind_result($total_records);

    $stmt->store_result();

    $stmt->fetch();


    $total_records_per_page = 8;
    $offset = ($page_no - 1) * $total_records_per_page;

    $previous_page = $page_no - 1;
    $next_page = $page_no + 1;

    $adjacents = "2";

    $total_no_of_pages = ceil($total_records / $total_records_per_page);


    $stmt2 = $conn->prepare("SELECT * FROM properties WHERE properties_price<=? LIMIT $offset,$total_records_per_page");
    $stmt2->bind_param("si", $price);
    $stmt2->execute();
    $products = $stmt2->get_result();
} else {

    if (isset($_GET['page_no']) && $_GET['page_no'] != "") {
        $page_no = $_GET['page_no'];
    } else {
        $page_no = 1;
    }

    $stmt1 = $conn->prepare("SELECT COUNT(*) As total_records FROM properties ");

    $stmt1->execute();

    $stmt1->bind_result($total_records);

    -$stmt1->store_result();

    $stmt1->fetch();

    $total_records_per_page = 8;
    $offset = ($page_no - 1) * $total_records_per_page;

    $previous_page = $page_no - 1;
    $next_page = $page_no + 1;

    $adjacents = "2";

    $total_no_of_pages = ceil($total_records / $total_records_per_page);

    $stmt2 = $conn->prepare("SELECT * FROM properties LIMIT $offset,$total_records_per_page");
    $stmt2->execute();
    $products = $stmt2->get_result();
}



?>
<?php
include('server/connectiom.php');
$stmt2 = $conn->query('SELECT * FROM properties ORDER BY properties_id DESC');
if (isset($_GET['s']) && !empty($_GET['s'])) {
    $recherche = htmlspecialchars($_GET['s']);
    $allusers = $conn->query('SELECT * FROM properties WHERE properties_name LIKE  "%' . $recherche . '%" OR properties_description LIKE "%' . $recherche . '%" ORDER BY properties_id DESC');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="bootstrap.min.css">
    <style>
        body{
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }
        h4{
            margin: 0;
            padding: 0;
            color: grey;
            font-size: 24px;
        }
        
        input .sea{
            
           
           font-size: 20px;
           box-sizing: border-box;
          

        }
        input[type="search"]{
            background: whitesmoke;
            width: 340px;
            height: 50px;
            border: none;
            outline: none;
            padding: 0 25px;
            border-radius: 25px 0 0 25px;
        }
         #se{
            
            border-radius: 0 25px 25px 0;
            left: -5px;
            width: 150px;
            height: 50px;
            border: none;
            outline: none;
            cursor: pointer;
            background: green;
            color: white;
        }
         #se:hover{
         background: greenyellow;
        }
    </style>
    <title>Document</title>
</head>

<body>
<section>
        <div class="boxo">
            <form action="" method="GET">
                <h4>search</h1>
                <div class="search">
                    
                        <input class="sea" type="search" name="s" class="s form-control" placeholder="write something">

                        <input class="sea" id="se"  type="submit" name="" value="search">
                   

                </div>
            </form>
        </div>
    </section>


    <section class="properties container" id="properties">

        <div class="heading">

            <span>Recent</span>

            <h2>Our Featured Properties</h2>

            <p>Lorem ipsum dolor sit amet consectetur <br> adipisicing elit. Odio, laborum

        </div>

        <div class="properties-container container">

            <?php

            if (isset($allusers)) {
                while ($row = $allusers->fetch_assoc()) { ?>


                    <div class="box">

                        <a href="<?php echo "shops.php?properties_id=" . $row['properties_id']; ?>"><img src="img/<?php echo $row['properties_image']; ?>" alt=""></a>

                        <h3><?php echo $row['properties_price']; ?>DH</h3>

                        <div class="content">

                            <div class="text">

                                <h3><?php echo $row['properties_name']; ?></h3>

                                <p><?php echo $row['properties_category']; ?></p>

                            </div>

                            <div class="icon">

                                <i class='bx bx-bed'><span>5</span></i>

                                <i class='bx bx-bath'><span>2</span></i>

                            </div>

                        </div>

                    </div>


                <?php }
            } else if (isset($products)) {
                while ($row = $products->fetch_assoc()) {
                ?>


                    <div class="box">

                        <a href="<?php echo "shops.php?properties_id=" . $row['properties_id']; ?>"><img src="img/<?php echo $row['properties_image']; ?>" alt=""></a>

                        <h3><?php echo $row['properties_price']; ?>DH</h3>

                        <div class="content">

                            <div class="text">

                                <h3><?php echo $row['properties_name']; ?></h3>

                                <p><?php echo $row['properties_category']; ?></p>

                            </div>

                            <div class="icon">

                                <i class='bx bx-bed'><span>5</span></i>

                                <i class='bx bx-bath'><span>2</span></i>

                            </div>

                        </div>

                    </div>

            <?php }
            } else {
                echo "";
            } ?>


        </div>
        <!--properties -->
    </section>


    <nav aria-label="Page navigation example">
        <ul class="pagination mt-5">

            <li class="page-item <?php if ($page_no <= 1) {
                                        echo "disabled";
                                    } ?>">
                <a class="page-link" href="<?php if ($page_no <= 1) {
                                                echo '#';
                                            } else {
                                                echo "?page_no=" . ($page_no - 1);
                                            } ?>">Previous</a>
            </li>


            <li class="page-item"><a class="page-link" href="?page_no=1">1</a></li>
            <li class="page-item"><a class="page-link" href="?page_no=2">2</a></li>
            <?php if ($page_no >= 3) { ?>
                <li class="page-item"><a class="page-link" href="#">...</a></li>
                <li class="page-item"><a class="page-link" href="<?php echo "page_no=" . $page_no; ?>"><?php echo $page_no; ?></a></li>

            <?php } ?>


            <li class="page-item <?php if ($page_no >= $total_no_of_pages) {
                                        echo "disabled";
                                    } ?>">
                <a class="page-link" href="<?php if ($page_no >= $total_no_of_pages) {
                                                echo '#';
                                            } else {
                                                echo "?page_no=" . ($page_no + 1);
                                            } ?>">Next</a>
            </li>

        </ul>
    </nav>

    



</body>

</html>