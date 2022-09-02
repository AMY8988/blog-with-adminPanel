<?php include "core/base.php"?>
<?php include "core/functions.php"?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DashBoard</title>



    <link rel="stylesheet" href="<?php echo $url; ?>node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $url; ?>assets/vendor/dataTable/jquery.dataTables.min.css">
    <link rel="stylesheet" href="<?php echo $url; ?>assets/vendor/dataTable/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo $url; ?>assets/vendor/fontawesome/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $url; ?>assets/style.css">

</head>
<body>

<section class="main container-fluid bg-light">
    <div class="row">

        <!-- sidebar-area -->
        <?php  include "template/side-bar.php";?>

        <!--   nav-bar-->
        <div class=" col-sm-12 col-md-9 col-xl-10 vh-100 py-2 content">

            <div class="row px-2 sticky-top">

                <div class="col-12 d-flex justify-content-between align-items-center bg-primary p-2 px-3 rounded header  ">

                    <button class="btn show-sidebar  d-block d-md-none">
                        <i class="fa-solid fa-bars"></i>
                    </button>

                    <form action=""  class=" d-none d-sm-block">
                        <div class=" d-flex align-items-center justify-content-center">
                            <input type="text" placeholder="Search Everything" class="form-control form-control-sm me-2">
                            <a class="btn btn-sm btn-light">
                                <i class="fa-solid fa-magnifying-glass text-primary"></i>
                            </a>
                        </div>
                    </form>

                    <div class="dropdown">
                        <div class="dropdown">
                            <button class="text-black btn btn-outline-secondary border border-0 dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="<?php echo $url ?>assets/img/WIN_20211220_21_57_25_Pro.jpg" class="profile img-fluid border border-4 border-secondary  rounded-circle " alt="">
                                <?php echo $_SESSION['user']['name']; ?>
                            </button>
                            <ul class="dropdown-menu bg-secondary" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </div>

                    </div>

                </div>

            </div>
