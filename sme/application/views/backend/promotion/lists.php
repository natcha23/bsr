<?php $func = new func(); ?>
<table class="table" id="table-user">
    <thead>
        <tr>
            <td>ID</td>
            <td>Code</td>
            <td>Date stop</td>
            <td>Action</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach($promotions as $user){ ?>
        <tr>
            <td><?php echo $user['id']; ?></td>
            <td><?php echo $user['pro_code']; ?></td>
            <td><?php echo $user['pro_stop']; ?></td>
            <td>
                <?php echo anchor('backend/promotion/update/'. $func->encrypt($user['id'], ENCRYPT_KEY), 'แก้ไข', 'class="btn btn-warning btn-xs"'); ?>
                <?php echo anchor('backend/promotion/delete/'. $func->encrypt($user['id'], ENCRYPT_KEY), 'ลบ', 'class="btn btn-danger btn-xs"'); ?>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>