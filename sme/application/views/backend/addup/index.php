<?php echo anchor('backend/addup/lists', 'All List', 'class="btn btn-primary"')?>
<form action="<?php echo site_url().'backend/addup/addAddup'; ?>" method="post" id="form-addup">

    <div class="form-group">
        <label class="col-sm-2">ชื่อ</label>
        <div class="col-sm-10">
            <input type="text" name="addup_name" id="addup_name" class="form-control" required data-parsley-required-message="จำเป็นต้องกรอก">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2">ราคา</label>
        <div class="col-sm-10">
            <input type="text" name="addup_price" id="addup_price" class="form-control" required data-parsley-required-message="จำเป็นต้องกรอก">
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
        $('#form-addup').parsley();
    })
</script>