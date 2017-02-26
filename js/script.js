$(function(){
//	var dialog=$('<div>',{id:'dialog'});
//	$('#reviewregister').click(function(){
//		
//    	var name_th = $('#name_th').val();
//    	var name_en = $('#name_en').val();
//    	var idcard = $('#idcard').val();
//    	var birthday = $('#birthday').val();
//    	var age = $('#age').val();
//    	var gender = $('input[name="gerder"]:checked').val();
//    	var nationality = $('#nationality').val();
//    	var address = $('#address').val();
//    	var province = $('#province').val();
//    	var city = $('#city').val();
//    	var postcode = $('#postcode').val();
//    	var mobile = $('#mobile').val();
//    	var email = $('#email').val();
//    	var refername = $('#refer-name').val();
//    	var referphone = $('#refer-phone').val();
//    	var team = $('input[name="team"]:checked').val();
//    	var shirt = $('input[name="shirt"]:checked').val();
//    	var agreement = 'unagree';
//    	if($("#agreement").is(':checked')) {
//    		agreement = 'agree';
//    	}
//    	var data = new Array();
//    	data.push(
//        		{ name: 'name_th', value: name_th},
//        		{ name: 'name_en', value: name_en},
//        		{ name: 'idcard', value: idcard},
//        		{ name: 'birthday', value: birthday},
//        		{ name: 'age', value: age},
//        		{ name: 'gender', value: gender},
//        		{ name: 'nationality', value: nationality},
//        		{ name: 'address', value: address},
//        		{ name: 'province', value: province},
//        		{ name: 'city', value: city},
//        		{ name: 'postcode', value: postcode},
//        		{ name: 'mobile', value: mobile},
//        		{ name: 'email', value: email},
//        		{ name: 'refer-name', value: refername},
//        		{ name: 'refer-phone', value: referphone},
//        		{ name: 'team', value: team},
//        		{ name: 'shirt', value: shirt},
//        		{ name: 'agreement', value: agreement}
//        );
//    	
//   	 $.post('register_review.php', data, function(html){
//            
//            $(dialog).dialog({
//                modal:      true,
//                title:      'ตรวจสอบข้อมูลก่อนทำการบันทึก',
//                id : 		'message1',
//                resizable:  false,
//                width:      $(window).width()-200,
//                height:     $(window).height()-150,
//                buttons:    [
//                {
//                	text:   'ลงทะเบียน',
//                    id: 'registerBtn',
//                    click:  function(){ $('#form-regist').submit(); }
//                },{
//                	 text:   'ปิด',
//                	 id: 'closeBtn',
//                     click:  function(){  $( this ).dialog( "destroy" ); }
//                    
//                }
//                ]
//            }).html(html);
//            $('#message1').find('.ui-button').addClass('cancelButton');
//            $("#registerBtn").addClass('ui-dialog-button-blue');
//            $("#closeBtn").addClass('ui-dialog-button-white');
//        });
//	})
	
})