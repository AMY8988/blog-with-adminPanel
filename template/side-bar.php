



<div class=" col-sm-12 col-md-3 col-xl-2  bg-light vh-100 py-2 sidebar">
    <div class="row">
        <div class=" p-2  d-flex justify-content-between align-items-center">
            <div class="brand d-flex justify-content-center align-items-center">
                <div class="bg-primary  p-1 rounded-circle me-2">
                    <i class="fa-solid fa-briefcase p-1 text-light"></i>
                </div>
                <h5 class="m-0">My Blog</h5>
            </div>
            <button class="btn hide-sidebar d-block d-md-none">
                <i class="fa-solid fa-circle-xmark"></i>
            </button>
        </div>
    </div>

    <div class="nav-menu">
        <ul>
            <li class="menu-item  ">
                <a href="<?php echo $url; ?>dashboard.php" class="menu-item-link  ">
                    <i class="fa-solid fa-home"></i>
                    DashBoard
                </a>
            </li>

            <li class="menu-item  ">
                <a href="<?php echo $url; ?>index.php" class="menu-item-link  ">
                    <i class="fa-solid fa-folder-open"></i>
                    Blog page
                </a>
            </li>

            <li class="menu-spacer"></li>

            <li class="menu-title text-black-50 fw-bolder">
                Payment
            </li>
            <li class="menu-item">
                <a href="<?php echo $url; ?>wallet.php" class="menu-item-link">
                    <div class="d-flex justify-content-between align-items-center">
                                    <span>
                                        <i class="fa-solid fa-wallet"></i>
                                        my wallet
                                    </span>
                    </div>
                </a>
            </li>

            <li class="menu-spacer"></li>

            <?php if($_SESSION['user']['role'] == 0){ ?>
            <li class="menu-title text-black-50 fw-bolder">
                Manage Ads
            </li>
            <li class="menu-item">
                <a href="<?php echo $url ?>ads_add.php" class="menu-item-link">
                    <div class="d-flex justify-content-between align-items-center">
                                    <span>
                                        <i class="fa-brands fa-adversal"></i>
                                        Add Ads
                                    </span>
                        <!--                        <span class=" badge rounded-pill bg-light text-black-50  shadow ">23</span>-->
                    </div>
                </a>
            </li>
            <?php }; ?>

            <li class="menu-spacer"></li>


            <li class="menu-title text-black-50 fw-bolder">
                Manage Item
            </li>
            <li class="menu-item">
                <a href="<?php echo $url ?>post-add.php" class="menu-item-link">
                    <div class="d-flex justify-content-between align-items-center">
                                    <span>
                                        <i class="fa-regular fa-circle-dot me-1"></i>
                                        Add Post
                                    </span>
<!--                        <span class=" badge rounded-pill bg-light text-black-50  shadow ">23</span>-->
                    </div>
                </a>
            </li>
            <li class="menu-item">

                <a href="<?php echo $url ?>post-list.php" class="menu-item-link">
                    <div class="d-flex justify-content-between align-items-center">
                                     <span>
                                         <i class="fa-solid fa-list me-1"></i>
                                         Post list
                                     </span>
                         <span class=" badge rounded-pill bg-light text-black-50 shadow ">
                              <?php echo countTotal('posts'); ?>
                         </span>
                    </div>
                </a>
            </li>

        <?php if($_SESSION['user']['role'] <= 1){ ?>

            <li class="menu-spacer"></li>


                <li class="menu-title text-black-50 fw-bolder">
                    Setting
                </li>

                <li class="menu-item">
                    <a href="<?php echo $url ?>category_add.php" class="menu-item-link">
                        <div class="d-flex justify-content-between align-items-center">
                                    <span>
                                        <i class="fa-solid fa-circle-dot me-1"></i>
                                        Add Category
                                    </span>
                            <span class=" badge rounded-pill bg-light text-black-50  shadow ">
                            <?php echo countTotal('categories'); ?>
                        </span>
                        </div>
                    </a>
                </li>
                <li class="menu-spacer"></li>


            <?php if($_SESSION['user']['role'] == 0){ ?>
            <li class="menu-item">
                <a href="<?php echo $url ?>user_list.php" class="menu-item-link">
                    <div class="d-flex justify-content-between align-items-center">
                                    <span>
                                        <i class="fa-solid fa-user-group me-1"></i>
                                        User Manage
                                    </span>
                        <span class=" badge rounded-pill bg-light text-black-50  shadow ">
                            <?php echo countTotal('users'); ?>
                        </span>
                    </div>
                </a>
            </li>
            <?php }; ?>
        <?php }; ?>



            <li class="menu-spacer"></li>
            <li class="">
                <a href="<?php echo $url ?>logout.php" class=" btn  w-100 text-white" style="background-color: #9a8c98">
                    <div class="">

                                         <i class="fa-solid fa-lock me-1"></i>
                                         log out

                        <!-- <span class=" badge rounded-pill bg-light text-black-50 shadow ">23</span> -->
                    </div>
                </a>
            </li>


        </ul>
    </div>

</div>



