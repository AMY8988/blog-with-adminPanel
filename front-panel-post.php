<div class="card mb-3 shadow-sm post">
    <div class="card-body">
        <a href="detail.php?id=<?php echo $post['id'] ;?>" class="text-black" >
            <?php echo $post['title'];?>
        </a>
        <div class="my-3 text-black-50 fs-6 d-flex ">

            <div class="me-2  h6">
                <i class="fa-solid fa-user"></i>
                <?php echo user($post['user_id'])['name'] ;?>
            </div>
            <div class="me-2 h6">
                <i class="fa-solid fa-layer-group"></i>
                <?php echo category($post['category_id'])['title'] ;?>
            </div>
            <div class="me-2 h6">
                <i class="fa-solid fa-calendar"></i>
                <?php echo day($post['created_at']) ;?>
            </div>

        </div>
        <hr>
        <p>
            <?php echo short(strip_tags(html_entity_decode($post['description'])) , "200"); ?>
        </p>
    </div>
</div>