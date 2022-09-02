
<div class="col-12 col-md-4 position-relative">
    <div class="front-panel-sideBar">
        <div class="card">
            <div class="card-body">
                <?php if(isset($_SESSION['user']['id'])){ ?>
                <div class="d-flex align-items-center justify-content-between">
                    <h6 class="mb-0">Hello <?php echo $_SESSION['user']['name']; ?> &#128521; </h6>
                    <a href="<?php $url; ?>dashboard.php" class="btn  btn-secondary">Go dashboard</a>
                </div>
                <?php }else{ ?>

                <div class="d-flex align-items-center justify-content-between">
                    <h6 class="mb-0">Hello Guest &#128522; </h6>
                    <a href="<?php $url; ?>register.php" class="btn  btn-secondary">Register</a>
                </div>
                <?php }; ?>

            </div>
        </div>
        <h5 class="my-2 ">Categories</h5>
        <div class="list-group my-3">
            <!--   category_id နဲ့မတူတဲ့ဟာကို active ထည့်တာ - all categories မို့လို့ သက်သက်ပြပေးတာ-->
            <a href="<?php echo $url; ?>index.php" class="list-group-item list-group-item-action <?php echo isset($_GET['category_id'])?'':'active'; ?>">All Categories</a>
            <?php foreach (fcategories() as $category){ ?>
                <a
                    href="category_base_posts.php?category_id=<?php echo $category['id']; ?>"
                    class=" list-group-item list-group-item-action
                    <?php echo isset($_GET['category_id'])? ($_GET['category_id'] === $category['id']?'active':'') :'';?> "
                >
                <!--   $_Get category_id တူတဲ့ဟာထဲကမှ categories ထဲမှာပါတဲ့ id နဲ့ $_GET category_id နဲ့တူတာကိုပဲ active  ထည့်ပေးတာ-->
                    <?php echo $category['title'] ;?>
                    <?php if($category['ordering'] == 1){ ?>
                        <i class="fa-solid fa-thumb-tack text-primary"></i>
                    <?php } ?>

                </a>
            <?php }; ?>
        </div>
<!--        <div>-->
<!--            <h5 class="my-2 ">Advertisement</h5>-->
<!--            <div class="my-3">-->
<!--                <img src="--><?php //echo $url; ?><!--img/a.jpg" class="w-100 rounded" alt="">-->
<!--            </div>-->
<!--        </div>-->
        <div class="card">
            <h5 class="py-3 card-header  bg-primary">Search By Date</h5>
            <div class="card-body">
                <form class="" action="<?php echo $url; ?>fsearchByDate.php" method="post">
                   <div class="mb-3">
                       <label for="" class="form-label">Start Date</label>
                       <input type="date" name="start" class="form-control mb-2" required>

                        <label for="" class="form-label">End Date</label>
                        <input type="date" name="end" class="form-control " required>
                    </div>
                    <button type="submit" class="btn btn-secondary">Search</button>
                </form>
            </div>
        </div>
    </div>
</div>