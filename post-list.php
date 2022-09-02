<?php include "core/auth.php"?>
<?php include "template/header.php";?>




        <!-- breadcrumb -->
        <div class="row">
            <div class="col-12 my-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb  fw-bold text-black-50">
                        <li class="breadcrumb-item"><a href="dashboard.php" style="text-decoration: none">Home</a></li>
                        <li class="breadcrumb-item"><a href="post-add.php" style="text-decoration: none">Add Post</a></li>
                        <li class="breadcrumb-item " aria-current="page">Post</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-12 ">

                <div class="card">
                    <div class="card-body">
                        <!-- add-item header -->
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class=" mb-0">
                                <i class="fa-solid fa-list text-primary "></i>
                               Post list
                            </h5>
                            <div class="">
                                <a href="#" class="border px-1 rounded border-1 border-primary me-1 full-screen-btn" style="text-decoration: none;">
                                    <i class="fa-solid fa-up-right-and-down-left-from-center"></i>
                                </a>

                                <a href="<?php echo $url ?>post-add.php" class="border px-1 rounded border-1 border-primary">
                                    <i class="fa-solid fa-plus-circle text-primary"></i>
                                </a>
                            </div>
                        </div>

                        <hr>

                        <table id="example" class="display" style="width:100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th width="40%">Description</th>
                                <th>Category</th>
                                <?php if($_SESSION['user']['role'] ==0 ){  ?>
                                    <th>User</th>
                                <?php } ?>
                                <th>Post Views</th>
                                <th >Control</th>
                                <th class="text-nowrap">Created-at</th>
                            </tr>
                            </thead>

                            <tbody>

                            <?php
                            foreach (posts() as $post){
                                ?>
                                <tr>
                                    <td><?php echo $post['id']; ?></td>
                                    <td><?php echo short($post['title'] , '20'); ?></td>
                                    <!-- html_entity_decode နဲ့ entities တွေကို ပြောင်းပီး strip_tags နဲ့ html tags တွေကိုဖျက်-->
                                    <td><?php echo short(strip_tags(html_entity_decode($post['description'])) , "100"); ?></td>
                                    <td class="text-nowrap"><?php print_r(category($post['category_id'])['title']) ; ?></td>
                                    <?php if($_SESSION['user']['role'] ==0 ){  ?>
                                    <td class="text-nowrap"> <?php print_r(user($post['user_id'])['name']); ?></td>
                                    <?php } ?>
                                    <td>
                                        <?php echo count(viewerByPost($post['id'])) ?>
                                    </td>
                                    <td  class="text-nowrap">

                                        <a class='btn  btn-sm border border-0 btn-outline-info' type="button" data-bs-toggle="tooltip" title="post detail" href='post_detail.php?id=<?php echo $post['id']; ?>'>
                                            <i class='fa-solid fa-info-circle'></i>
                                        </a>

                                        <a  onclick="return confirm('are you sure to delete this post')"  data-bs-toggle="tooltip" title="edit" class='btn btn-sm border border-0  btn-outline-danger' href='post_delete.php?id=<?php echo $post['id']; ?>'>
                                            <i class='fa-solid fa-trash-can'></i>
                                        </a>

                                        <a class='btn  btn-sm border border-0 btn-outline-success '  data-bs-toggle="tooltip" title="delete" href='post_edit.php?id=<?php echo $post['id']; ?>'>
                                            <i class='fa-solid fa-edit'></i>
                                        </a>
                                    </td>
                                    <td><?php echo day($post['created_at']); ?></td>
                                </tr>
                            <?php }; ?>

                            </tbody>


                        </table>


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

<script src="<?php echo $url; ?>assets/vendor/dataTable/jquery.dataTables.min.js"></script>


