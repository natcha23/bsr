<?php echo anchor('backend/user/lists', 'All List', 'class="btn btn-primary"')?>
<form action="<?php echo site_url().'backend/user/addUser'; ?>" method="post" id="form-user-create">

    <div class="form-group">
        <label class="col-sm-2">ชื่อ</label>
        <div class="col-sm-10">
            <input type="text" name="user_name" id="user_name" class="form-control" required data-parsley-required-message="จำเป็นต้องกรอก">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2">นามสกุล</label>
        <div class="col-sm-10">
            <input type="text" name="user_surname" id="user_surname" class="form-control" required data-parsley-required-message="จำเป็นต้องกรอก">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2">Username</label>
        <div class="col-sm-10">
            <input type="text" name="user_username" id="user_username" class="form-control" required minLength="4" data-parsley-required-message="จำเป็นต้องกรอก" pattern="/^[A-Za-z][A-Za-z0-9]*$/" data-parsley-minLength-message="ไม่น้อยกว่า 6 ตัว" data-parsley-pattern-message="กรอกเฉพาะตัวเลขกับตัวอักษรอังกฤษเท่านั้น">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2">Password</label>
        <div class="col-sm-10">
            <input type="password" name="user_password" id="user_password" class="form-control" required minLength="6">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2">Confirm Password</label>
        <div class="col-sm-10">
            <input type="password" name="user_password_conf" id="user_password_conf" class="form-control" data-parsley-equalto="#user_password">
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-12">
            <button type="submit">Create user</button>
        </div>
    </div>

</form>

<script>
    $(function(){
        $('#form-user-create').parsley();
    })
</script>