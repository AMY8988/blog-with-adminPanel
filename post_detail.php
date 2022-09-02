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

                <h4 class="mb-0">
                    <?php echo $current['title']; ?>
                </h4>
                <div class="my-3 text-black-50 h6 d-flex " >
                    <div class="me-2">
                        <i class="fa-solid fa-user"></i>
                        <?php echo user($current['user_id'])['name'] ;?>
                    </div>

                    <div class="me-2">
                        <i class="fa-solid fa-layer-group"></i>
                        <?php echo category($current['category_id'])['title'] ;?>
                    </div>

                   <div class="me-2">
                       <i class="fa-solid fa-calendar"></i>
                       <?php echo day($current['created_at']) ;?>
                   </div>
                </div>
                <p>
                    <?php echo html_entity_decode($current['description'],ENT_QUOTES); ?>
                </p>


            </div>
        </div>


    </div>
    <div class="col-12 col-md-8 col-lg-6">

        <div class="card">
            <div class="card-body">
                <!-- add-item header -->
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class=" mb-0">
                        <i class="fa-solid fa-info-circle text-primary "></i>
                        Post Views
                    </h5>
                    <div class="">
                        <a href="#" class="border px-1 rounded border-1 border-primary me-1 full-screen-btn" style="text-decoration: none;">
                            <i class="fa-solid fa-up-right-and-down-left-from-center"></i>
                        </a>
                    </div>
                </div>

                <hr>

                <table class="table table-hover table-striped">
                    <thead>
                       <tr>
                           <th>name</th>
                           <th>device</th>
                           <th>created_at</th>
                       </tr>
                    </thead>
                    <tbody>
                        <?php foreach (viewerByPost($id) as $v){  ?>
                            <tr>
                                <td class="text-nowrap">
                                    <?php
                                        if(user($v['user_id'])){
                                            echo user($v['user_id'])['name'];
                                        }else{
                                            echo "Guest";
                                        }
                                    ?>
                                </td>
                                <td><?php echo $v['device']; ?></td>
                                <td class="text-nowrap"><?php echo day($v['created_at']) ?></td>
                            </tr>
                        <?php }; ?>

                    </tbody>
                </table>


            </div>
        </div>


    </div>

</div>







<?php include "template/footer.php";?>




