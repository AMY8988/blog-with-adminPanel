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
if(isset($_POST['ads_btn'])){
    adsAdd();
}
?>
<form action="" method="post" class="row mb-3">
    <div class="col-12 col-md-10">

        <div class="card">
            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center">
                    <h5 class=" mb-0">
                        <i class="fa-brands fa-adversal text-primary "></i>
                        Add Advertisement
                    </h5>
                </div>

                <hr>


                <div class="row">
                    <div class="col-12 col-md-8">
                       <div class="mb-2">
                           <label for="owner_name" class="col-form-label ">Owner Name</label>
                           <input type="text" name="owner_name" id="owner_name"  class="form-control" required>
                       </div >
                        <div class="mb-2">
                            <label for="photo" class="col-form-label ">Ads Image</label>
                            <input type="text" name="photo" id="photo"  class="form-control" required>
                        </div>
                        <div class="mb-2">
                            <label for="link" class="col-form-label ">Ads Link</label>
                            <input type="text" name="link" id="link"  class="form-control" required>
                        </div>
                    </div>

                    <div class="col-12 col-md-4">
                        <div class="card bg-light">
                            <h6 class="py-3 card-header  bg-primary">Search By Date</h6>
                            <div class="card-body">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Start Date</label>
                                        <input type="date" name="start_ads" class="form-control mb-2" required>

                                        <label for="" class="form-label">End Date</label>
                                        <input type="date" name="end_ads" class="form-control " required>
                                    </div>

                            </div>
                        </div>
                    </div>

                </div>

                <button class="btn btn-primary my-3" type="submit" name="ads_btn">Add</button>

            </div>

        </div>


    </div>


</form>
<div class="row">
    <div class="col-12 col-md-10">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class=" mb-0">
                        <i class="fa-solid fa-list text-primary "></i>
                        Advertisement list
                    </h5>
                </div>
                <hr>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Owner Name</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Created at</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach (showAds() as $ads){  ?>
                            <tr>
                                <td><?php echo $ads['id']; ?></td>
                                <td><?php echo $ads['owner_name']; ?></td>
                                <td><?php echo $ads['start']; ?></td>
                                <td><?php echo $ads['end']; ?></td>
                                <td><?php echo day($ads['created_at']); ?></td>
                            </tr>
                        <?php };  ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>





<?php include "template/footer.php";?>
<
