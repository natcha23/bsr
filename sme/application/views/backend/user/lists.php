<?php $func = new func(); ?>
<table class="table" id="table-user">
    <thead>
        <tr>
            <td>ID</td>
            <td>Name - Surname</td>
            <td>Username</td>
            <td>Action</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach($users as $user){ ?>
        <tr>
            <td><?php echo $user['id']; ?></td>
            <td><?php echo $user['user_name'].' '.$user['user_surname']; ?></td>
            <td><?php echo $user['user_username']; ?></td>
            <td>
                <?php echo anchor('backend/user/update/'. $func->encrypt($user['id'], ENCRYPT_KEY), 'แก้ไข', 'class="btn btn-warning btn-xs"'); ?>
                <?php echo anchor('backend/user/delete/'. $func->encrypt($user['id'], ENCRYPT_KEY), 'ลบ', 'class="btn btn-danger btn-xs"'); ?>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>