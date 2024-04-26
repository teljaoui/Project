<?php session_start(); ?>
<?php include('../server/connectiom.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap-5.2.3-dist/css/bootstrap.min.css">
    <title>Document</title>

<style>
    .bd-placeholder-img{
    font-size: 1.125rem;
    text-anchor: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;
    
}

@media (min-width: 768px) {
    .bd-placeholder-img-lg{
        font-size: 3.5rem;
    }
    
}
</style>
<body>

<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a href="" class="navbar-brand col-md-3 col-lg-2 me-0 px-3">Xboru</a>
    <button class="navbar-toggler position-absolute d-md-none cllapsed" type="button"><span class="navbar-toggler-icon"></span></button>
    <div class="navbar-nav">
        <div class="nav-item text-nowrap">
            <?php if(isset($_SESSION['admin_logged_in'])){ ?>
            <a href="logout.php?logout=1" class="nav-link px-3">Sign out</a>
            <?php } ?>
        </div>
    </div>
    
</header>
    
