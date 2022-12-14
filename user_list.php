<?php include "core/auth.php"?>
<?php include "core/isAdmin.php"?>
<?php include "template/header.php";?>




<!-- breadcrumb -->
<div class="row">
    <div class="col-12 my-2">
        <nav aria-label="breadcrumb ">
            <ol class="breadcrumb fw-bold text-black-50">
                <li class="breadcrumb-item"><a href="dashboard.php" style="text-decoration: none">Home</a></li>
                <li class="breadcrumb-item " aria-current="page">User List</li>
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
                        <i class="fa-solid fa-user-group text-primary "></i>
                        User list
                    </h5>
                </div>

                <hr>

                <table id="example" class="display" style="width:100%">
                    <thead>
                    <tr>
                        <th width="5%" >#</th>
                        <th>Name</th>
                        <th >role</th>
                        <th>Created-at</th>
                        <th>Control</th>
                    </tr>
                    </thead>

                    <tbody>

                    <?php
                    foreach (users() as $user){
                        ?>
                        <tr>
                            <td class="text-center"><?php echo $user['id']; ?></td>
                            <td><?php  echo $user['name']; ?></td>
                            <td><?php echo $role[$user['role']]; ?></td>
                            <td><?php echo day($user['created_at']); ?></td>
                            <td>
                                <a  onclick="return confirm('are you sure to delete this post')" class='btn btn-sm border border-0  btn-outline-danger' href='post_delete.php?id=<?php echo $post['id']; ?>'>
                                    <i class='fa-solid fa-trash-can'></i>
                                </a>

                            </td>
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

    });

</script>

<script src="<?php echo $url; ?>assets/vendor/dataTable/jquery.dataTables.min.js"></script>


