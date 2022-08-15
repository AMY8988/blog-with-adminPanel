<?php include "template/header.php";?>

    <!-- breadcrumb -->
    <div class="row">
        <div class="col-12 my-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Category</a></li>

                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-md-8">

            <div class="card">
                <div class="card-body">
                    <!-- add-item header -->
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class=" mb-0">
                            <i class="fa-solid fa-layer-group text-primary h6"></i>
                            Edit Category
                        </h5>
                        <a href="<?php echo $url ?>template/category-list.php" class="border px-1 rounded border-1 border-primary">
                            <i class="fa-solid fa-list text-primary"></i>
                        </a>

                    </div>

                    <hr>

                    <?php

                     $id = $_GET['id'];

                    $currentText = category($id);

                    if (isset($_POST["updateBtn"])){
                       categoryEdit();
                    };


                    ?>

                    <form class="col-12 col-md-4" method="post">
                        <div class="d-flex align-items-center justify-content-center ">
                            <input type="hidden" value="<?php echo $id;?>" name="id">
                            <input class=" form-control mx-2 " type="text" value="<?php echo $currentText['title']; ?>" name="title" required>
                            <button class="btn btn-primary " name="updateBtn">Update </button>
                        </div>
                    </form>



                </div>
            </div>


        </div>
    </div>

<?php include "template/footer.php";?>