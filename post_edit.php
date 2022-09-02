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
        $id = $_GET['id'];
        $currentText = selectTitle($id);

        if (isset($_POST["updateBtn"])){
            postEdit();
        };
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
                            <input type="text" name="title" id="title" value="<?php print_r($currentText['title']); ?>"  class="form-control" required>
                            <input type="hidden" value="<?php echo $id;?>" name="id">
                        </div>



                        <div class="col-12">
                            <label for="summernote" class="col-form-label fw-bold">Post Description</label>
                            <textarea type="text" rows="7" name="description" id="summernote"  class="form-control" required>
                                <?php echo html_entity_decode($currentText['description']); ?>
                            </textarea>
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
                        <div class="form-check"  >
                            <input
                                    class="form-check-input"
                                    value=" <?php echo  $c['id']; ?>"
                                    <?php echo  $c['id']==$currentText['category_id']?'checked':'' ; ?>
                                    type="radio" name="category_id" id="flexRadioDefault<?php echo $c['id'] ?>"

                            >
                            <label class="form-check-label" for="flexRadioDefault<?php echo $c['id'] ?>">
                                <?php echo $c['title'] ?>
                            </label>
                        </div>
                    <?php } ?>
                    <hr>
                    <button class="btn btn-primary" name="updateBtn">Add Post</button>

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





<?php include "template/header.php";?>


    <!-- breadcrumb -->
    <div class="row">
        <div class="col-12 my-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Add Post</a></li>

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
                            <i class="fa-solid fa-plus-circle text-primary h6"></i>
                            Add Post
                        </h5>
                        <a href="<?php echo $url ?>template/item-list.php" class="border px-1 rounded border-1 border-primary">
                            <i class="fa-solid fa-list text-primary"></i>
                        </a>

                    </div>

                    <hr>

                    <?php

                    $id = $_GET['id'];

                    $currentText = selectTitle($id);

                    if (isset($_POST["updateBtn"])){
                        postEdit();
                    };


                    ?>
                    <form action="" method="post">
                        <div class="row">
                            <div class="col-12">
                                <label for="title" class="col-form-label fw-bold">Post Title</label>
                                <input type="text" name="title" id="title"  class="form-control" value="<?php print_r($currentText['title']); ?>" required>
                                <input type="hidden" value="<?php echo $id;?>" name="id">
                            </div>

                            <div class="col-12">
                                <label for="select" class="col-form-label fw-bold">Select Category</label>
                                <select type="text" name="category_id" id="select"  class="form-select bg-light" >
                                    <?php foreach(categories() as $c){ ?>
                                        <option value="<?php echo $c['id']; ?>" <?php echo  $c['id']==$currentText['category_id']?'selected':'' ; ?>  >
                                            <?php echo $c['title']; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="col-12">
                                <label for="Des" class="col-form-label fw-bold">Post Description</label>
                                <textarea type="text" rows="7" name="description" id="Des"   class="form-control " required><?php print_r($currentText['description']); ?>
                                </textarea>
                            </div>

                        </div>

                        <hr>
                        <button class="btn btn-primary" name="updateBtn">Add Post</button>
                    </form>
                </div>
            </div>


        </div>
    </div>





<?php include "template/footer.php";?>