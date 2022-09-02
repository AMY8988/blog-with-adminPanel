<?php include "core/auth.php" ?>
<?php include "template/header.php"; ?>



<!-- breadcrumb start-->
<div class="row">
    <div class="col-12 my-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb fw-bold text-black-50">
                <li class="breadcrumb-item"><a href="dashboard.php" style="text-decoration: none">Home</a></li>
                <li class="breadcrumb-item" aria-current="page">wallet</li>

            </ol>
        </nav>
    </div>
</div>
<!-- breadcrumb end-->

<?php

if (isset($_POST["transferBtn"])){
    transfer();
};

?>


<div class="row">
    <div class="col-12 col-md-10">

        <div class="card">
            <div class="card-body">
                <!-- add-category header -->
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class=" mb-0">
                        <i class="fa-solid fa-dollar-sign text-primary "></i>
                        My Wallet
                    </h5>
                    <div>
                        <h4 class="mb-0"><?php echo  user($_SESSION['user']['id'])['money']; ?> MMK</h4>
                        <h6 class="mb-0 text-black-50">Your Money</h6>
                    </div>
                </div>

                <hr>



                <form class="col-12 col-md-10 mb-4" method="post" >
                    <div class="d-flex align-items-center justify-content-center">
                        <select name="toUserId" id="" class="form-select">
                            <option value="0" selected disabled>Select user</option>
                            <?php foreach (users() as $u){ ?>
                                <?php if($u['id'] != $_SESSION['user']['id']){ ?>
                                    <option value="<?php echo $u['id'] ?>"><?php echo $u['name']; ?></option>
                                <?php } ?>
                            <?php } ?>
                        </select>
                        <input class=" form-control mx-2" placeholder="Amount" type="text" name="amount" required>
                        <input class=" form-control mx-2" placeholder="Description" type="text" name="description" required>
                        <button class="btn btn-primary" type="submit" name="transferBtn">Transfer</button>
                    </div>
                </form>

                <table id="example" class="display" style="width:100%">
                    <thead>
                    <tr>
                        <th >#</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Description</th>
                        <th>Created-at</th>
                    </tr>
                    </thead>

                    <tbody>

                    <?php
                    foreach (transitions() as $t){
                        ?>
                        <tr>
                            <td class="text-center"><?php echo $t['id']; ?></td>
                            <td><?php  echo user($t['from_user'])['name']; ?></td>
                            <td><?php echo user($t['to_user'])['name']; ?></td>
                            <td><?php echo $t['description']; ?></td>
                            <td><?php echo day($t['created_at'],"Y-m-d / h:i A");  ?></td>
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
