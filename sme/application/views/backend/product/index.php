<?php echo anchor('backend/product/lists', 'All List', 'class="btn btn-primary"')?>
<!--<form action="--><?php //echo site_url().'backend/product/addproduct'; ?><!--" method="post" id="form-product" enctype="multipart/form-data">-->
<?php echo form_open_multipart('backend/product/addproduct', array('id'=>'form-product')); ?>
    <div class="form-group">
        <label class="col-sm-2">รูป</label>
        <div class="col-sm-10">
            <input type="file" name="product_image" id="product_image" class="form-control" required data-parsley-required-message="จำเป็นต้องกรอก">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2">ชื่อ</label>
        <div class="col-sm-10">
            <input type="text" name="product_name" id="product_name" class="form-control" required data-parsley-required-message="จำเป็นต้องกรอก">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2">ขนาด</label>
        <div class="col-sm-10">
            <input type="text" name="product_size" id="product_size" class="form-control" required data-parsley-required-message="จำเป็นต้องกรอก">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2">ราคา</label>
        <div class="col-sm-10">
            <input type="text" name="product_price" id="product_price" class="form-control" required data-parsley-required-message="จำเป็นต้องกรอก">
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
        $('#form-product').parsley();
    })
</script>