<?php echo anchor('backend/promotion/lists', 'All List', 'class="btn btn-primary"')?>
<form action="<?php echo site_url().'backend/promotion/addPromotion'; ?>" method="post" id="form-promotion">

    <div class="form-group">
        <label class="col-sm-2">Code</label>
        <div class="col-sm-10">
            <input type="text" name="pro_code" id="pro_code" class="form-control" required data-parsley-required-message="จำเป็นต้องกรอก">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2">วันที่สิ้นสุด</label>
        <div class="col-sm-10">
            <input type="text" name="pro_stop" id="pro_stop" class="form-control" data-date-format="yyyy-mm-dd" required data-parsley-required-message="จำเป็นต้องกรอก">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2">จำนวน</label>
        <div class="col-sm-10">
            <input type="text" name="pro_limit" id="pro_limit" class="form-control" required data-parsley-required-message="จำเป็นต้องกรอก">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2">ประเภท</label>
        <div class="col-sm-10">
            <input type="text" name="pro_type" id="pro_type" class="form-control" required data-parsley-required-message="จำเป็นต้องกรอก">
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-12">
            <button type="submit">Create</button>
        </div>
    </div>

</form>

<script>
    $(function(){
        $('#form-promotion').parsley();
        $('#pro_stop').datepicker();
    })
</script>