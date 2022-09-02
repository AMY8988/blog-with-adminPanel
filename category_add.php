<?php include "core/auth.php" ?>
<?php require_once "core/isAdmin&editor.php"; ?>
<?php include "template/header.php"; ?>


    <!-- breadcrumb start-->
    <div class="row">
        <div class="col-12 my-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb fw-bold text-black-50">
                    <li class="breadcrumb-item"><a href="dashboard.php" style="text-decoration: none">Home</a></li>
                    <li class="breadcrumb-item" aria-current="page">Category</li>

                </ol>
            </nav>
        </div>
    </div>
    <!-- breadcrumb end-->


    <div class="row">
        <div class="col-12 col-md-8">

            <div class="card">
                <div class="card-body">
                    <!-- add-category header -->
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class=" mb-0">
                            <i class="fa-solid fa-layer-group text-primary "></i>
                            Add Category
                        </h5>
                    </div>

                    <hr>

                    <?php


                    if (isset($_POST["btn"])){
                        categoryAdd();
                    };


                    ?>

                    <form class="col-4 mb-4" method="post" >
                        <div class="d-flex align-items-center justify-content-center">
                            <input class=" form-control mx-2" type="text" name="title" required>
                            <button class="btn btn-primary" name="btn">add</button>
                        </div>
                    </form>

                  <?php include "category_list.php" ?>

                </div>
            </div>


        </div>
    </div>

<?php include "template/footer.php";?>
<script>
    $("#example").DataTable({
        order: [[0, 'desc']],
    });

</script>
