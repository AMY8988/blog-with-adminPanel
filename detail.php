<?php session_start() ?>
<?php require_once "front-panel/head.php"?>
<title>Home</title>
<?php require_once "front-panel/side-header.php"?>
<?php
$id=$_GET['id'];
$current = post($id);
$currentCatId = $current['category_id'];



if(isset($_SESSION['user']['id'])){
    $userId = $_SESSION['user']['id'];
}else{
    $userId = 0;
}
viewerRecord($userId,$id,$_SERVER['HTTP_USER_AGENT']);

?>

<div class="container">
    <div class="row">

        <div class="col-12 col-md-8">

            <!--   breadcrumb-->
            <div class="col-12 my-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb  fw-bold text-black-50">
                        <li class="breadcrumb-item"><a href="<?php echo $url;?>index.php" style="text-decoration: none">Home</a></li>
                        <li class="breadcrumb-item " aria-current="page"><?php echo $current['title'] ?></li>
                    </ol>
                </nav>
            </div>

            <!-- post detail-->
            <div class="card mb-4">
                <div class="card-body">
                    <!-- add-item header -->
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class=" mb-0">
                            <i class="fa-solid fa-info-circle text-primary "></i>
                            Post Detail
                        </h5>
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

            <!--   related posts-->
            <div class="row">
                <h5 class="my-2 ">Related news</h5>
                <?php foreach (fpostsByCategory($currentCatId,2,$id) as $post){ ?>
                    <div class="col-12 col-md-6 my-3">
                        <div class="card mb-1 shadow-sm post">
                            <div class="card-body">
                                <a href="detail.php?id=<?php echo $post['id'] ;?>" class="text-black" >
                                    <?php echo $post['title'];?>
                                </a>
                                <div class="my-3 text-black-50 fs-6 d-flex ">

                                    <div class="me-2  h6">
                                        <i class="fa-solid fa-user"></i>
                                        <?php echo user($post['user_id'])['name'] ;?>
                                    </div>
                                    <div class="me-2 h6">
                                        <i class="fa-solid fa-layer-group"></i>
                                        <?php echo category($post['category_id'])['title'] ;?>
                                    </div>
                                    <div class="me-2 h6">
                                        <i class="fa-solid fa-calendar"></i>
                                        <?php echo day($post['created_at']) ;?>
                                    </div>

                                </div>
                                <hr>
                                <p>
                                    <?php echo short(strip_tags(html_entity_decode($post['description'])) , "200"); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php }; ?>

            </div>
        </div>

        <?php include "frontPanel-sideBar.php";?>

    </div>
</div>

<?php require_once "front-panel/footer.php"?>


