<form action="<?php echo site_url().'backend/messenger/update'; ?>" method="post" id="form-messenger">
    <input type="hidden" name="id" id="id" value="<?php echo $messenger['id']; ?>">
    <input type="hidden" name="method" id="method" value="edit">
    <div class="form-group">
        <label class="col-sm-2">ชื่อ</label>
        <div class="col-sm-10">
            <input type="text" name="mes_name" id="mes_name" class="form-control" value="<?php echo $messenger['mes_name']; ?>" required data-parsley-required-message="จำเป็นต้องกรอก">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2">นามสกุล</label>
        <div class="col-sm-10">
            <input type="text" name="mes_surname" id="mes_surname" class="form-control" value="<?php echo $messenger['mes_surname']; ?>" required data-parsley-required-message="จำเป็นต้องกรอก">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2">เบอร์โทร</label>
        <div class="col-sm-10">
            <input type="text" name="mes_phone" id="mes_phone" class="form-control" value="<?php echo $messenger['mes_phone']; ?>" required data-parsley-pattern-message="กรอกเฉพาะตัวเลขกับตัวอักษรอังกฤษเท่านั้น">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2">เขต</label>
        <div class="col-sm-10">
            <select class="form-control" name="mes_amphur" id="mes_amphur" onclick="$.getDistrict($(this).val())" onchange="$.getDistrict($(this).val())" required data-parsley-required-message="จำเป็นต้องกรอก">
                <option value="">เลือกเขต</option>
                <?php foreach($amphurs as $amphur){ ?>
                    <option value="<?php echo $amphur['AMPHUR_ID']; ?>" <?php echo $messenger['mes_amphur']==$amphur['AMPHUR_ID'] ? 'selected':'' ?>><?php echo $amphur['AMPHUR_NAME']; ?></option>
                <?php } ?>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2">แขวง</label>
        <div class="col-sm-10">
            <select class="form-control" name="mes_district" id="mes_district" required data-parsley-required-message="จำเป็นต้องกรอก">
                <option value="">เลือกแขวง</option>
                <?php foreach($districts as $district){ ?>
                    <option value="<?php echo $district['DISTRICT_ID']; ?>" <?php echo $messenger['mes_district']==$district['DISTRICT_ID'] ? 'selected':'' ?>><?php echo $district['DISTRICT_NAME']; ?></option>
                <?php } ?>
            </select>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-12">
            <button type="submit">Update</button>
        </div>
    </div>

</form>

<script>
    $(function(){
        $('#form-messenger').parsley();

        $.getDistrict = function( amphur_id ){
            $('#mes_district').html('');
            $.post( '<?php echo site_url(); ?>backend/messenger/getDistrict',{ amphur_id:amphur_id }, function(rs){
                $('#mes_district').append($('<option />',{
                    'value' : '',
                    'text'  : 'เลือกแขวง'
                }));
                $(rs).each(function(i, e){
                    $('#mes_district').append($('<option />',{
                        'value' : e.DISTRICT_ID,
                        'text'  : e.DISTRICT_NAME
                    }));
                })
            },'json');
        }
    })
</script>