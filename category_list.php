

<table   class="table display table-hover my-4">
    <thead class="">
    <tr>
        <th>#</th>
        <th>Title</th>
        <th>Ordering</th>
        <th>Control</th>
        <th>Created-at</th>
    </tr>
    </thead>
    <tbody>

    <?php
    foreach (categories() as $category){
        ?>
        <tr class="<?php echo $category['ordering']==1?'bg-light':''; ?>">
            <td><?php echo $category['id']; ?></td>
            <td><?php echo $category['title']; ?></td>
            <td><?php print_r(user($category['user_id'])['name']); ?></td>
            <td>
                <a onclick="return confirm('are you sure to delete this post')" class='btn btn-sm border border-0  btn-outline-danger' href='category_delete.php?id=<?php echo $category['id']; ?>'>
                    <i class='fa-solid fa-trash-can'></i>
                </a>
                <a class='btn btn-sm border border-0  btn-outline-success' href='category_edit.php?id=<?php echo $category['id']; ?>'>
                    <i class='fa-solid fa-edit'></i>
                </a>
                <?php if($category['ordering'] != 0){ ?>
                    <a class="btn btn-sm border border-0  btn-outline-info text-primary  " href='category-remove-pin.php'>
                        <i class="fa-solid fa-thumbtack "></i>
                    </a>
                <?php }else{ ?>
                    <a class="btn btn-sm border border-0  btn-outline-info text-black  " href='category-pin-to-top.php?id=<?php echo $category['id']; ?>'>
                        <i class="fa-solid fa-thumbtack "></i>
                    </a>
                <?php } ?>


            </td>
            <td><?php echo day($category['created_at']); ?></td>
        </tr>
    <?php }; ?>

    </tbody>
</table>