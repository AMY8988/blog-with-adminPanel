

<table  id="example" class="display table-hover my-4">
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
        <tr>
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
            </td>
            <td><?php echo day($category['created_at']); ?></td>
        </tr>
    <?php }; ?>

    </tbody>
</table>