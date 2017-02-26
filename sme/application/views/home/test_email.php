<?php
echo form_open('home/sendEmail', 'id="frm_email"');

echo form_input(array(
    'name'  => 'to',
    'id'    => 'to',
    'class' => 'form-control'
));

echo form_submit('bt_submit', 'Send Email', 'class="btn btn-primary btn-block"');

echo form_close();