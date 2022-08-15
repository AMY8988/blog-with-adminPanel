<?php require "core/auth.php"?>
<?php include "template/header.php";?>


        <!-- breadcrumb -->
        <div class="row">
            <div class="col-12 my-2">
                <nav aria-label="breadcrumb ">
                    <ol class="breadcrumb fw-bold text-black-50">
                        <li class="breadcrumb-item"><a href="dashboard.php" style="text-decoration: none">Home</a></li>
                        <li class="breadcrumb-item" aria-current="page">Add Post</li>

                    </ol>
                </nav>
            </div>
        </div>



        <?php
            if(isset($_POST['addBtn'])){
                postAdd();
            }
        ?>
        <form action="" method="post" class="row">
            <div class="col-12 col-md-8">

                <div class="card">
                    <div class="card-body">
                        <!-- add-item header -->
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class=" mb-0">
                                <i class="fa-solid fa-plus-circle text-primary "></i>
                                Add Post
                            </h5>
                            <a href="<?php echo $url ?>post-list.php" class="border px-1 rounded border-1 border-primary">
                                <i class="fa-solid fa-list text-primary"></i>
                            </a>

                        </div>

                        <hr>


                            <div class="row">
                                <div class="col-12">
                                    <label for="title" class="col-form-label fw-bold">Post Title</label>
                                    <input type="text" name="title" id="title"  class="form-control" required>
                                </div>



                                <div class="col-12">
                                    <label for="summernote" class="col-form-label fw-bold">Post Description</label>
                                    <textarea type="text" rows="7" name="description" id="summernote"  class="form-control" required></textarea>
                                </div>

                            </div>



                    </div>
                </div>


            </div>

            <div class="col-12 col-md-4">
                <div class="card">
                    <div class="card-body">

                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class=" mb-0">
                                <i class="fa-solid fa-layer-group text-primary "></i>
                                Select Categories
                            </h5>
                            <a href="<?php echo $url ?>post-list.php" class="border px-1 rounded border-1 border-primary">
                                <i class="fa-solid fa-list text-primary"></i>
                            </a>
                        </div>

                        <hr>

                            <?php foreach(categories() as $c){ ?>
                            <div class="form-check">
                                <input class="form-check-input" value="<?php echo $c['id'] ?>"  type="radio" name="category_id" id="flexRadioDefault<?php echo $c['id'] ?>">
                                <label class="form-check-label" for="flexRadioDefault<?php echo $c['id'] ?>">
                                    <?php echo $c['title'] ?>
                                </label>
                            </div>
                            <?php } ?>
                        <hr>
                        <button class="btn btn-primary" name="addBtn">Add Post</button>

                    </div>
                </div>
            </div>
        </form>





<?php include "template/footer.php";?>
<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            height: 400,
            placeholder: "Description"
        });
    });
</script>
