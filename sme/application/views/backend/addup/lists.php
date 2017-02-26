<?php $func = new func(); ?>
<table class="table" id="table-user">
    <thead>
        <tr>
            <td>ID</td>
            <td>Addup</td>
            <td>Price</td>
            <td>Action</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach($addups as $addup){ ?>
        <tr>
            <td><?php echo $addup['id']; ?></td>
            <td><?php echo $addup['addup_name']; ?></td>
            <td><?php echo $addup['addup_price']; ?></td>
            <td>
                <?php echo anchor('backend/addup/update/'. $func->encrypt($addup['id'], ENCRYPT_KEY), 'แก้ไข', 'class="btn btn-warning btn-xs"'); ?>
                <?php echo anchor('backend/addup/delete/'. $func->encrypt($addup['id'], ENCRYPT_KEY), 'ลบ', 'class="btn btn-danger btn-xs"'); ?>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>