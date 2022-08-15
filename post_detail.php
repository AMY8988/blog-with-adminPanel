<?php include "core/auth.php"?>
<?php include "template/header.php";?>
<?php
 $id=$_GET['id'];
 $current = post($id);
?>




<!-- breadcrumb -->
<div class="row">
    <div class="col-12 my-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb  fw-bold text-black-50">
                <li class="breadcrumb-item"><a href="dashboard.php" style="text-decoration: none">Home</a></li>
                <li class="breadcrumb-item"><a href="post-list.php" style="text-decoration: none">Post</a></li>
                <li class="breadcrumb-item " aria-current="page"><?php echo $current['title'] ?></li>
            </ol>
        </nav>
    </div>
</div>

<div class="row">
    <div class="col-12 col-md-8 col-lg-6">

        <div class="card">
            <div class="card-body">
                <!-- add-item header -->
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class=" mb-0">
                        <i class="fa-solid fa-info-circle text-primary "></i>
                        Post Detail
                    </h5>
                    <div class="">
                        <a href="<?php echo $url ?>post-list.php" class="border px-1 rounded border-1 border-primary me-2 text-decoration-none">
                            <i class="fa-solid fa-list text-primary"></i>
                        </a>
                        <a href="<?php echo $url ?>post-add.php" class="border px-1 rounded border-1 border-primary">
                            <i class="fa-solid fa-plus-circle text-primary"></i>
                        </a>
                    </div>
                </div>

                <hr>

                <h4>
                    <?php echo $current['title']; ?>
                </h4>
                <p>
                    <?php echo html_entity_decode($current['description'],ENT_QUOTES); ?>
                </p>


            </div>
        </div>


    </div>
</div>







<?php include "template/footer.php";?>




