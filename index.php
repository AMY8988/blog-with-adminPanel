<?php session_start(); ?>
<?php require_once "front-panel/head.php"?>
<title>Home</title>
<?php require_once "front-panel/side-header.php"?>



<div class="container">
    <div class="row">

        <div class="col-12 col-md-8">

            <div class="col-12 my-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb  fw-bold text-black-50">
                        <li class="breadcrumb-item" aria-current="page">Home</li>
                    </ol>
                </nav>
            </div>

            <div class="d-flex justify-content-between my-2">
                <h5 class="my-2 ">Posts</h5>
                <div class="dropdown">
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        Sort By
                    </a>

                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li>
                            <a class="dropdown-item" href="?order_by=created_at&order_type=asc">Oldest to newest</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="?order_by=created_at&order_type=desc">Newest to oldest</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="<?php echo $url; ?>index.php">Default</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="">
                <?php
                if(isset($_GET['order_by']) && isset($_GET['order_type'])){
                    $order_by=$_GET['order_by'];
                    $order_type=strtoupper($_GET['order_type']);
                    $posts =fposts($order_by,$order_type);
                }else{
                    $posts=fposts();
                }

                foreach ($posts as $post){
                    ?>
                    <?php include "front-panel-post.php"; ?>
                <?php }; ?>
            </div>
        </div>

        <?php include "frontPanel-sideBar.php";?>

    </div>
</div>

<?php require_once "front-panel/footer.php"?>


