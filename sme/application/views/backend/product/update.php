<form action="<?php echo site_url().'backend/product/update'; ?>" method="post" id="form-promotion">
    <input type="hidden" name="id" id="id" value="<?php echo $product['id']; ?>">
    <input type="hidden" name="method" id="method" value="edit">
    <div class="form-group">
        <label class="col-sm-2">ชื่อ</label>
        <div class="col-sm-10">
            <input type="text" name="product_name" id="product_name" class="form-control" value="<?php echo $product['product_name']; ?>" required data-parsley-required-message="จำเป็นต้องกรอก">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2">ขนาด</label>
        <div class="col-sm-10">
            <input type="text" name="product_size" id="product_size" class="form-control" value="<?php echo $product['product_size']; ?>" required data-parsley-required-message="จำเป็นต้องกรอก">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2">ราคา</label>
        <div class="col-sm-10">
            <input type="text" name="product_price" id="product_price" class="form-control" value="<?php echo $product['product_price']; ?>" required data-parsley-required-message="จำเป็นต้องกรอก">
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
    })
</script>