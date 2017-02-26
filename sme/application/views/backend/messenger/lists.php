<?php $func = new func(); ?>
<table class="table" id="table-user">
    <thead>
        <tr>
            <td>ID</td>
            <td>Name - Surname</td>
            <td>Amphur</td>
            <td>District</td>
            <td>Action</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach($messengers as $mes){ ?>
        <tr>
            <td><?php echo $mes['id']; ?></td>
            <td><?php echo $mes['mes_name'].' '.$mes['mes_surname']; ?></td>
            <td><?php echo $this->core_model->findOneField('ci_amphurs', 'AMPHUR_NAME', array('AMPHUR_ID'=>$mes['mes_amphur'])); ?></td>
            <td><?php echo $this->core_model->findOneField('ci_districts', 'DISTRICT_NAME', array('DISTRICT_ID'=>$mes['mes_district'])); ?></td>
            <td>
                <?php echo anchor('backend/messenger/update/'. $func->encrypt($mes['id'], ENCRYPT_KEY), 'แก้ไข', 'class="btn btn-warning btn-xs"'); ?>
                <?php echo anchor('backend/messenger/delete/'. $func->encrypt($mes['id'], ENCRYPT_KEY), 'ลบ', 'class="btn btn-danger btn-xs"'); ?>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>