<?php $func = new func(); ?>
<table class="table" id="table-user">
    <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Price</td>
            <td>Action</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach($products as $pro){ ?>
        <tr>
            <td><?php echo $pro['id']; ?></td>
            <td><?php echo $pro['product_name']; ?></td>
            <td><?php echo $pro['product_price']; ?></td>
            <td>
                <?php echo anchor('backend/product/update/'. $func->encrypt($pro['id'], ENCRYPT_KEY), 'แก้ไข', 'class="btn btn-warning btn-xs"'); ?>
                <?php echo anchor('backend/product/delete/'. $func->encrypt($pro['id'], ENCRYPT_KEY), 'ลบ', 'class="btn btn-danger btn-xs"'); ?>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>