<?php require_once "core/auth.php"?>
<?php include "template/header.php";?>

<div class="row">

    <!-- Item-Cards -->

    <div class="col-12 p-2 col-md-6 col-lg-6 col-xl-3  ">
        <div class="card mb-2 status-card" onclick="go('https://google.com')">
            <div class="card-body  rounded bg-secondary">
                <div class="row ">
                    <div class="col-3 align-items-center">
                        <i class="fa-solid fa-layer-group fs-1 text-primary"></i>
                    </div>
                    <div class="col-9">
                        <span class="h5 counter-up fw-bolder">
                            <?php echo countTotal('posts'); ?>
                        </span>
                        <p class="text-black-50 fw-bold m-0 ">Total Posts</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 p-2 col-md-6 col-lg-6 col-xl-3  ">
        <div class="card mb-2 status-card" onclick="go('https://google.com')">
            <div class="card-body rounded bg-secondary">
                <div class="row ">
                    <div class="col-3 align-items-center">
                        <i class="fa-solid fa-users fs-1 text-primary"></i>
                    </div>
                    <div class="col-9">
                        <span class="h5 counter-up fw-bolder">
                            <?php echo countTotal('users'); ?>
                        </span>
                        <p class="text-black-50 fw-bold m-0 ">Total Users</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 p-2 col-md-6 col-lg-6 col-xl-3  ">
        <div class="card mb-2 status-card" onclick="go('item-list.html')">
            <div class="card-body rounded bg-secondary">
                <div class="row ">
                    <div class="col-3 align-items-center">
                        <i class="fa-solid fa-box-open fs-1 text-primary"></i>
                    </div>
                    <div class="col-9">
                        <span class="h5 counter-up fw-bolder">
                           <?php echo countTotal('categories'); ?>
                        </span>
                        <p class="text-black-50 fw-bold m-0 ">Total Category</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 p-2 col-md-6 col-lg-6 col-xl-3  ">
        <div class="card mb-2 status-card onclick="go('https://google.com')"">
        <div class="card-body rounded bg-secondary">
            <div class="row ">
                <div class="col-3 align-items-center">
                    <i class="fa-solid fa-arrow-trend-up fs-1 text-primary"></i>
                </div>
                <div class="col-9">
                    <span class="h5 counter-up fw-bold">
                        <?php echo countTotal('viewers'); ?>
                    </span>
                    <p class="text-black-50 fw-bold m-0 ">Viewers</p>
                </div>
            </div>
        </div>
    </div>
</div>

</div>

<div class="row d-flex align-items-end ">
    <!-- chart -->
    <div class="col-12 col-lg-12 col-xl-7 ">
        <div class="card shadow-sm">
            <div class="card-body">

                <!-- header -->
                <div class=" d-flex align-items-center justify-content-between mb-3">
                    <h4 class=" m-0">Order and Viewer</h4>
                    <div class=" ">

                        <img src="<?php echo $url ?>assets/img/WIN_20211220_21_57_25_Pro.jpg" class=" profile rounded-circle border border-1" style="margin-left: -20px;" alt="">
                        <img src="<?php echo $url ?>assets/img/WIN_20211220_21_57_25_Pro.jpg" class=" profile rounded-circle border border-1" style="margin-left: -20px;" alt="">
                        <img src="<?php echo $url ?>assets/img/WIN_20211220_21_57_25_Pro.jpg" class=" profile rounded-circle border border-1" style="margin-left: -20px;" alt="">
                        <img src="<?php echo $url ?>assets/img/WIN_20211220_21_57_25_Pro.jpg" class=" profile rounded-circle border border-1" style="margin-left: -20px;" alt="">
                        <img src="<?php echo $url ?>assets/img/WIN_20211220_21_57_25_Pro.jpg" class=" profile rounded-circle border border-1" style="margin-left: -20px;" alt="">

                    </div>
                </div>

                <!-- chart -->
                <canvas id="ov" height="170"></canvas>
            </div>
        </div>
    </div>

    <!-- item -->

    <!-- chart-circle -->
    <div class="col-12 col-md-6 col-xl-5 mt-md-3">
        <div class="card">
            <div class="card-body">

                <!-- header -->
                <div class=" d-flex align-items-center justify-content-between mb-3">
                    <h3 class=" m-0">Posts/Categories</h3>
                    <div class=" ">
                        <i class="fa-solid fa-chart-pie "></i>
                    </div>
                </div>

                <!-- chart -->
                <canvas id="op" width="400" ></canvas>
            </div>
        </div>
    </div>
    <!-- data-table -->
    <div class="col-12 col-md-10 mt-3">
        <div class="card subscriber-list p-2 ">

            <div class="card-content py-2  d-flex justify-content-between align-items-center" style="user-select: auto;">
                <h4 class="card-title mb-0" style="user-select: auto;">Posts List</h4>
                <?php
                // for progress bar
                $currentUseId = $_SESSION['user']['id'];
                $postTotal = countTotal('posts');
                $currentUsePostTotal = countTotal('posts',"user_id ='$currentUseId' ");
                $result = floor(($currentUsePostTotal/$postTotal)*100);

                ?>
                <div class="w-25">
                    <h6 class="mb-0">Your work : <?php echo $currentUsePostTotal; ?></h6>
                    <div class="progress " style="height: 6px">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?php echo $result; ?>%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>

            </div>
            <hr>
            <table  class="display table table-hover table-striped" style="width:100%">
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
                    <th class="text-nowrap">Created-at</th>
                </tr>
                </thead>

                <tbody>

                <?php
                foreach (dashboardPosts('6') as $post){
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
                        <td class="text-nowrap"><?php echo day($post['created_at']); ?></td>
                    </tr>
                <?php }; ?>

                </tbody>


            </table>

        </div>
    </div>

</div>
<?php

//for chart Circle Start
$categoryName = [];
$categoryCount = [];
foreach (categories() as $category){
    array_push($categoryName,$category['title']);
    array_push($categoryCount,countTotal('posts',"category_id={$category['id']} "));
}
$categoryArr = json_encode($categoryName);
$countArr = json_encode($categoryCount);
//for chart Circle end

//for line Chart start
$dateArr = [];
$viewerArr = [];
$today = date("Y-m-d");
for ($i=0;$i<10;$i++){
    $date = date_create($today);
    date_sub($date,date_interval_create_from_date_string("$i days"));
    $current = date_format($date,'Y-m-d');
    array_push($dateArr,$current);

    $result = countTotal('viewers',"CAST(created_at AS DATE)='$current' ");
    array_push($viewerArr,$result);
}

//for line chart end
?>






<?php include "template/footer.php";?>
<script>

    let dateArr = <?php echo json_encode($dateArr) ?>;
    let viewerCountArr=<?php echo json_encode($viewerArr) ?>;

    const ctx = document.getElementById('ov');
    const myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: dateArr,
            // for orderCoundArr
            datasets: [

                //For viewerCountArr
                {
                    label: 'Viewers',
                    data: viewerCountArr,
                    fill: true,
                    backgroundColor: [
                        "#6f42c120"
                    ],
                    borderColor: [
                        "#6f42c1"
                    ],
                    borderWidth: 1,

                    tension: 0.3
                }

            ]

        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        display: true
                    }

                },
                x: {
                    grid: {
                        display: false
                    }
                }
            },

            plugins: {
                legend: {

                    labels: {
                        usePointStyle: true,

                    }
                }
            }
        }
    });



    let CategoryArr =  <?php echo $categoryArr; ?>;
    let CountArr = <?php echo $countArr; ?>;

    const op = document.getElementById('op');
    const opChart = new Chart(op, {
        type: 'doughnut',
        data: {
            labels: CategoryArr,
            datasets: [{
                label: '# of Votes',
                data: CountArr,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1


            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,

                    display: false

                },
                x:  {

                    display: false

                }
            },

            plugins: {
                legend: {
                    labels: {
                        usePointStyle: true,

                    },
                    position: "bottom"
                }
            }
        }
    });
</script>
