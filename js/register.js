$(function(){
    $('#birthday').datepicker({
        dateFormat: 'dd-mm-yy'
    });
	$('#form-regist').validetta({
        validators: {
//            regExp: {
//                regname : {
//                    pattern : /^hello$/i,
//                    errorMessage : 'Custom Reg Error Message !'
//                },
//                // you can add more
//                example : {
//                    pattern : /^[\+][0-9]+?$|^[0-9]+?$/,
//                    errorMessage : 'Please enter number only !'
//                }
//            },
            phone: {
                number : {
                    pattern : /^[\+][0-9]+?$|^[0-9]+?$/,
                    errorMessage : 'Please enter number only !'
                }
            },
            idcard: {
                number : {
                    pattern : /^[\+][0-9]+?$|^[0-9]+?$/,
                    errorMessage : 'Please enter number only !'
                },
            }
//            ,
//            callback: {
//                sum: {
//                    callback:  function( el, value ) {
//                        if ( value == ( 3 + 5 ) ){
//                            return true
//                        }
//                        return false
//                    },
//                    errorMessage: "Incorrect total"
//                }
//            }
        },
        
        realTime : true,
        display: 'inline',
        onError : function( event ){ 
            var invalidFields = this.getInvalidFields();
            $(invalidFields).each(function(i,e){
                var field = e.field.id;
                if(i==0){ $('#'+ field).focus(); } 
            })
        }
    });

    // $(".btnPrint").printPage();

    $(".btnPrint").click(function () {
        var contents = $(".container-fluid").html();
        var frame1 = $('<iframe />');
        frame1[0].name = "frame1";
        frame1.css({ "position": "absolute", "top": "-1000000px" });
        $("body").append(frame1);
        var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
        frameDoc.document.open();
        //Create a new HTML document.
        frameDoc.document.write('<html><head><title>DIV Contents</title>');
        frameDoc.document.write('</head><body>');
        //Append the external CSS file.
        frameDoc.document.write('<link href="lib/bt336/css/bootstrap.min.css" rel="stylesheet" type="text/css" />');
        frameDoc.document.write('<link href="lib/bt336/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />');
        frameDoc.document.write('<link rel="stylesheet" href="lib/custom.css">');
        //Append the DIV contents.
        frameDoc.document.write(contents);
        frameDoc.document.write('</body></html>');
        frameDoc.document.close();
        setTimeout(function () {
            window.frames["frame1"].focus();
            window.frames["frame1"].print();
            frame1.remove();
        }, 500);
    });
    
    $(".btnPrintCheck").click(function () {
        var contents = $(".container-fluid").html();
        var frame1 = $('<iframe />');
        frame1[0].name = "frame1";
        frame1.css({ "position": "absolute", "top": "-1000000px" });
        $("body").append(frame1);
        var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
        frameDoc.document.open();
        //Create a new HTML document.
        
        frameDoc.document.write('<html><head><title>DIV Contents</title>');
        frameDoc.document.write('</head><body>');
        //Append the external CSS file.
        frameDoc.document.write('<link href="lib/bt336/css/bootstrap.min.css" rel="stylesheet" type="text/css" />');
        frameDoc.document.write('<link href="lib/bt336/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />');
        frameDoc.document.write('<link rel="stylesheet" href="lib/custom.css">');
        //Append the DIV contents.
        var pic = '<div class="row"><div class="col-md-12" style="text-align:center"><img src="img/500x300.jpg" class="img-responsive" style="display:inline"></div></div>';
        frameDoc.document.write(pic);
        frameDoc.document.write(contents);
        frameDoc.document.write('</body></html>');
        frameDoc.document.close();
        setTimeout(function () {
            window.frames["frame1"].focus();
            window.frames["frame1"].print();
            frame1.remove();
        }, 500);
    });
    
    $('#birthday').change(function(e){
        if( $('#birthday').val() != '' ){
            var age = getAge($('#birthday').val());
            $('#age').val(age);
        } else {
            $('#age').val('');
        }
    })
    
    $('input[type=radio][name=team]').change(function () {
    	$('#error_area').empty();
    	var team = $("input[name='team']:checked").val();
		var size = $("input[name='shirt']:checked").val();
		if(size!=undefined) {
		
			$.ajax({
				   type: "POST",
				   url: "check_tshirt.php",
				   data: "team="+team+"&shirt="+size,
				   success: function(msg){
						if(msg == 'soldout') {
							var objErr = '<h4 style="color:red">ไซส์เสื้อที่ท่านเลือกเต็ม กรุณาเลือกไซส์เสื้อใหม่หรือเลือกทีมใหม่</h4>';
							$('#error_area').html(objErr);
						}
				   }
			});
		}
    });
    
    $('input[type=radio][name=shirt]').change(function () {
    	$('#error_area').empty();
		var team = $("input[name='team']:checked").val();
		var size = $("input[name='shirt']:checked").val();
		if(team!=undefined) {
//			$("input[name=team][value='1']").prop("checked",true);
//			team = $("input[name='team']:checked").val();
			$.ajax({
				   type: "POST",
				   url: "check_tshirt.php",
				   data: "team="+team+"&shirt="+size,
				   success: function(msg){
						if(msg == 'soldout') {
							var objErr = '<h4 style="color:red">ไซส์เสื้อที่ท่านเลือกเต็ม กรุณาเลือกไซส์เสื้อใหม่หรือเลือกทีมใหม่</h4>';
							$('#error_area').html(objErr);
						}
				   }
			});
		}
    });
    
    $('#idcard').blur(function() {
    	var idcard = $('#idcard').val();
    	$.ajax({
			   type: "POST",
			   url: "check_identity.php",
			   data: "idcard="+idcard,
			   success: function(msg){
					if(msg == 'error') {
						var err_msg = '<span class="validetta-bubble validetta-bubble--right">หมายเลข '+idcard+' มีอยู่ในระบบแล้ว<br></span>';
						var target = $('#idcard').parent();
						target.append(err_msg);
						$('#idcard').val(''); 
					}
					
			   }
		});
    });
    
    var dialog=$('<div>',{id:'dialog'});
	$('#reviewregister').click(function(){
		
    	var name_th = $('#name_th').val();
    	var name_en = $('#name_en').val();
    	var idcard = $('#idcard').val();
    	var birthday = $('#birthday').val();
    	var age = $('#age').val();
    	var gender = $('input[name="gerder"]:checked').val();
    	var nationality = $('#nationality').val();
    	var address = $('#address').val();
    	var province = $('#province').val();
    	var city = $('#city').val();
    	var postcode = $('#postcode').val();
    	var mobile = $('#mobile').val();
    	var email = $('#email').val();
    	var refername = $('#refer-name').val();
    	var referphone = $('#refer-phone').val();
    	var team = $('input[name="team"]:checked').val();
    	var shirt = $('input[name="shirt"]:checked').val();
    	var agreement = 'unagree';
    	if($("#agreement").is(':checked')) {
    		agreement = 'agree';
    	}
    	var data = new Array();
    	data.push(
        		{ name: 'name_th', value: name_th},
        		{ name: 'name_en', value: name_en},
        		{ name: 'idcard', value: idcard},
        		{ name: 'birthday', value: birthday},
        		{ name: 'age', value: age},
        		{ name: 'gender', value: gender},
        		{ name: 'nationality', value: nationality},
        		{ name: 'address', value: address},
        		{ name: 'province', value: province},
        		{ name: 'city', value: city},
        		{ name: 'postcode', value: postcode},
        		{ name: 'mobile', value: mobile},
        		{ name: 'email', value: email},
        		{ name: 'refer-name', value: refername},
        		{ name: 'refer-phone', value: referphone},
        		{ name: 'team', value: team},
        		{ name: 'shirt', value: shirt},
        		{ name: 'agreement', value: agreement}
        );
    	
   	 $.post('register_review.php', data, function(html){
            
            $(dialog).dialog({
                modal:      true,
                title:      'ตรวจสอบข้อมูลก่อนทำการบันทึก',
                id : 		'message1',
                resizable:  false,
                width:      $(window).width()-200,
                height:     $(window).height()-150,
                buttons:    [
                {
                	text:   'ลงทะเบียน',
                    id: 'registerBtn',
                    click:  function(){ $('#form-regist').submit(); }
                },{
                	 text:   'ปิด',
                	 id: 'closeBtn',
                     click:  function(){  $( this ).dialog( "destroy" ); }
                    
                }
                ]
            }).html(html);
            $('#message1').find('.ui-button').addClass('cancelButton');
            $("#registerBtn").addClass('ui-dialog-button-blue');
            $("#closeBtn").addClass('ui-dialog-button-white');
        });
	})

    function getAge(dateString) {
        var today = new Date();
        var birthDate = new Date(dateString);
        var age = today.getFullYear() - birthDate.getFullYear();
        var m = today.getMonth() - birthDate.getMonth();
        if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }
        return age;
    }
	
})