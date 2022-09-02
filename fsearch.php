<?php require_once "front-panel/head.php"?>
<title>Home</title>
<?php require_once "front-panel/side-header.php"?>
<?php

$searchKey=$_POST['search_key'];
$currentPost = fsearch($searchKey);

?>

<div class="container">
    <div class="row">

        <div class="col-12 col-md-8">

            <div class="col-12 my-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb fw-bold text-black-50">
                        <li class="breadcrumb-item"><a href="<?php echo $url; ?>index.php" style="text-decoration: none">Home</a></li>
                        <li class="breadcrumb-item" aria-current="page">
                          search by  "<?php echo $searchKey;  ?>"
                        </li>

                    </ol>
                </nav>
            </div>

            <h5 class="my-2 ">Posts</h5>
            <div class="">
                <?php
                if( count($currentPost) !== 0){
                    foreach (fsearch($searchKey) as $post){
                        ?>

                        <?php include "front-panel-post.php"; ?>

                        <?php
                    }
                }else{
                    echo alert("no news with $searchKey" , "secondary");
                }
                ?>
            </div>
        </div>

        <?php include "frontPanel-sideBar.php";?>

    </div>
</div>

<?php require_once "front-panel/footer.php"?>


