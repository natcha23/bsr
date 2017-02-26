<form action="<?php echo site_url().'backend/addup/update'; ?>" method="post" id="form-addup">
    <input type="hidden" name="id" id="id" value="<?php echo $addup['id']; ?>">
    <input type="hidden" name="method" id="method" value="edit">
    <div class="form-group">
        <label class="col-sm-2">ชื่อ</label>
        <div class="col-sm-10">
            <input type="text" name="addup_name" id="addup_name" class="form-control" value="<?php echo $addup['addup_name']; ?>" required data-parsley-required-message="จำเป็นต้องกรอก">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2">ราคา</label>
        <div class="col-sm-10">
            <input type="text" name="addup_price" id="addup_price" class="form-control" required value="<?php echo $addup['addup_price']; ?>" data-parsley-required-message="จำเป็นต้องกรอก">
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
        $('#form-addup').parsley();
    })
</script>