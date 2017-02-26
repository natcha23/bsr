<form action="<?php echo site_url().'backend/promotion/update'; ?>" method="post" id="form-promotion">
    <input type="hidden" name="id" id="id" value="<?php echo $pro['id']; ?>">
    <input type="hidden" name="method" id="method" value="edit">
    <div class="form-group">
        <label class="col-sm-2">Code</label>
        <div class="col-sm-10">
            <input type="text" name="pro_code" id="pro_code" class="form-control" value="<?php echo $pro['pro_code']; ?>" required data-parsley-required-message="จำเป็นต้องกรอก">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2">วันที่สิ้นสุด</label>
        <div class="col-sm-10">
            <input type="text" name="pro_stop" id="pro_stop" class="form-control" value="<?php echo $pro['pro_stop']; ?>" data-date-format="yyyy-mm-dd" required data-parsley-required-message="จำเป็นต้องกรอก">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2">จำนวน</label>
        <div class="col-sm-10">
            <input type="text" name="pro_limit" id="pro_limit" class="form-control" value="<?php echo $pro['pro_limit']; ?>" required data-parsley-required-message="จำเป็นต้องกรอก">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2">ประเภท</label>
        <div class="col-sm-10">
            <input type="text" name="pro_type" id="pro_type" class="form-control" value="<?php echo $pro['pro_type']; ?>" required data-parsley-required-message="จำเป็นต้องกรอก">
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
        $('#form-user-update').parsley();
        $('#pro_stop').datepicker();
    })
</script>