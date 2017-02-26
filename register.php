<?php
echo "<script>window.location.href='./';</script>";
exit;

require('function.php');
updateData();
?>
<html lang="en">
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Register</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">


		<link rel="stylesheet" href="lib/bt336/css/bootstrap.min.css">
		<link rel="stylesheet" href="lib/bt336/css/bootstrap-theme.min.css">
		<link rel="stylesheet" href="lib/validetta/validetta.css" type="text/css" media="screen" >
		<link rel="stylesheet" href="lib/jquery-ui/jquery-ui.css">

		<script type="text/javascript" src="lib/jquery-2.2.1.js"></script>
		<script type="text/javascript" src="lib/bt336/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="lib/validetta/validetta.js"></script>
		<script type="text/javascript" src="lib/jquery-ui/jquery-ui.js"></script>
		
		<script type="text/javascript" src="js/register.js"></script>

		<style>
			.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
				/*border: none !important;*/
			}
		</style>
    </head>
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/56de6e25c2c44fe9679b3297/default';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <!--End of Tawk.to Script-->
    <body>

    	<div class="container-fluid">
    		<div class="row">
    			<div class="col-md-12" style="text-align:center">
    				<h2>ลงทะเบียนเข้าร่วมการแข่งขัน / Register Form BATMAN Vs SUPERMAN MIDNIGHT RUN</h2>
    				<h4>เพื่อความสมบูรณ์ในการเข้าร่วมการแข่งขัน โปรดกรอกข้อมูลของท่านโดยละเอียด</h4>
    			</div>
    		</div>
    		<div class="row">
    			<div class="col-md-12">
			    	<form action="regist.php" method="post" name="form-regist" id="form-regist"> 
			    		<table class="table table-responsive">
			    			<tr>
			    				<td style="width:300px">ชื่อ/นามสกุล(ภาษาไทย)</td>
			    				<td colspan="3" style="min-width:500px">
			    					<input type="text" class="form-control" id="name_th" name="name_th" data-validetta="required" data-vd-message-required="กรุณากรอก ชื่อ/นามสกุล(ภาษาไทย)">
			    				</td>
			    			</tr>
			    			<tr>
			    				<td>First/Last name(English)</td>
			    				<td colspan="3">
			    					<input type="text" class="form-control" id="name_en" name="name_en" data-validetta="required" data-vd-message-required="กรุณากรอก First/Last name(English)">
			    				</td>
			    			</tr>
			    			<tr>
			    				<td>เลขบัตรประชาชน(ID Card)/เลขที่พาสปอร์ต (Passport ID)</td>
			    				<td colspan="3">
			    					<input type="text" class="form-control" id="idcard" name="idcard" data-validetta="required" data-vd-message-required="เลขบัตรประชาชน(ID Card)">
			    					<!-- <input type="text" class="form-control" id="idcard" name="idcard" data-validetta="required,number" data-vd-message-required="เลขบัตรประชาชน(ID Card)" data-vd-message-number="กรอกเฉพาะตัวเลขเท่านั้น"> -->
			    				</td>
			    			</tr>
			    			<tr>
			    				<td>วัน เดือน ปีเกิด(Birthday)</td>
			    				<td>
			    					<input type="text" class="form-control" id="birthday" name="birthday" placeholder="eg: 29-09-1999" data-validetta="required" data-vd-message-required="กรุณาระบุ วัน เดือน ปีเกิด(Birthday eg29-09-1999)">
			    				</td>
			    				<td>อายุ(Age)</td>
			    				<td>
			    					<input type="text" class="form-control" id="age" name="age">
			    				</td>
			    			</tr>
			    			<tr>
			    				<td>เพศ(Gender)</td>
			    				<td colspan="3">
			    					<input type="radio" name="gerder" id="male" value="1" data-validetta="required" data-vd-message-required="กรุณาระบุ เลือกเพศ(Gender)">
			    					<label for="male">Male</label> 
			    					<input type="radio" name="gerder" id="female" value="2">
			    					<label for="female">Female</label>
			    				</td>
			    			</tr>
			    			<tr>
			    				<td>สัญชาติ(Nationality)</td>
			    				<td colspan="3">
			    					<input type="text" class="form-control" id="nationality" name="nationality" data-validetta="required" data-vd-message-required="กรุณาระบุ สัญชาติ(Nationality)">
			    				</td>
			    			</tr>
			    			<tr>
			    				<td>ที่อยู่ที่ติดต่อได้<br>(Postal Address or Mailing Address)</td>
			    				<td colspan="3">
			    					<textarea class="form-control" name="address" id="address" data-validetta="required" data-vd-message-required="กรุณาระบุ ที่อยู่ที่ติดต่อได้(Postal Address or Mailing Address)"></textarea>
			    				</td>
			    			</tr>
			    			<tr>
			    				<td>จังหวัด(Province)</td>
			    				<td colspan="3">
			    					<input type="text" class="form-control" id="province" name="province" data-validetta="required" data-vd-message-required="กรุณาระบุ จังหวัด(Province)">
			    				</td>
			    			</tr>
			    			<tr>
			    				<td>เมือง(City)</td>
			    				<td colspan="3">
			    					<input type="text" class="form-control" id="city" name="city" data-validetta="required" data-vd-message-required="กรุณาระบุ เมือง(City)">
			    				</td>
			    			</tr>
			    			<tr>
			    				<td>รหัสไปรษณีย์(PostCode)</td>
			    				<td colspan="3">
			    					<input type="text" class="form-control" id="postcode" name="postcode" data-validetta="required" data-vd-message-required="กรุณาระบุ รหัสไปรษณีย์(PostCode)">
			    				</td>
			    			</tr>
			    			<tr>
			    				<td>โทรศัพท์(Mobile Phone)</td>
			    				<td colspan="3">
			    					<input type="text" class="form-control" id="mobile" name="mobile" data-validetta="required,number,minLength[10]" data-vd-message-required="กรุณาระบุ โทรศัพท์(Mobile Phone)" data-vd-message-number="กรอกตัวเลขเท่านั้น(Number only)" data-vd-message-minLength="กรอกอย่างน้อย 10 ตัว">
			    				</td>
			    			</tr>
			    			<tr>
			    				<td>อีเมล(E-mail address)</td>
			    				<td colspan="3">
			    					<input type="text" class="form-control" id="email" name="email" data-validetta="required,email" data-vd-message-required="กรุณาระบุ อีเมล(E-mail address)" data-vd-message-email="รูปแบบอีเมลไม่ถูกต้อง(Invalid e-mail format">
			    				</td>
			    			</tr>
			    			<tr>
			    				<td>ชื่อติดต่อบุคคลอ้างอิงในกรณีฉุกเฉิน(Emergency Contact: Name)</td>
			    				<td><input type="text" class="form-control" id="refer-name" name="refer-name" data-validetta="required" data-vd-message-required="กรุณาระบุ ชื่อติดต่อบุคคลอ้างอิงในกรณีฉุกเฉิน(Emergency Contact: Name)"></td>
			    				<td>เบอร์โทร(Phone)</td>
			    				<td><input type="text" class="form-control" id="refer-phone" name="refer-phone" data-validetta="required,number,minLength[10]" data-vd-message-required="กรุณาระบุ เบอร์โทรติดต่อบุคคลอ้างอิงในกรณีฉุกเฉิน(Phone)" data-vd-message-number="กรอกตัวเลขเท่านั้น(Number only)" data-vd-message-minLength="กรอกอย่างน้อย 10 ตัว"></td>
			    			</tr>
			    			<tr>
			    				<td>เลือกทีม(Select Team)</td>
			    				<td colspan="3">
			    					<input type="radio" name="team" id="batman" value="1" data-validetta="required" data-vd-message-required="กรุณาเลือกทีม(Select Team)">
			    					<label for="batman">Batman</label> 
			    					<input type="radio" name="team" id="superman" value="2">
			    					<label for="superman">Superman</label>
			    				</td>
			    			</tr>
			    			<tr>
			    				<td>ขนาดเสื้อ(T-shirt size)</td>
			    				<td colspan="3">
			    					<div>
				    					<input type="radio" name="shirt" id="size-s" value="s" data-validetta="required" data-vd-message-required="กรุณาเลือกขนาดเสื้อ(T-shirt size)">
				    					<label for="size-s">S รอบอก / Chest 36"</label> 
				    				</div>
				    				<div>
				    					<input type="radio" name="shirt" id="size-m" value="m">
				    					<label for="size-m">M รอบอก / Chest 38"</label> 
				    				</div>
				    				<div>
				    					<input type="radio" name="shirt" id="size-l" value="l">
				    					<label for="size-l">L รอบอก / Chest 40"</label> 
				    				</div>
				    				<div>
				    					<input type="radio" name="shirt" id="size-xl" value="xl">
				    					<label for="size-xl">XL รอบอก / Chest 42"</label> 
				    				</div>
				    				<div>
				    					<input type="radio" name="shirt" id="size-xxl" value="xxl">
				    					<label for="size-xxl">XXL รอบอก / Chest 44"</label> 
				    				</div>
				    				<div id="error_area">
				    				
				    				</div>
			    				</td>
			    			</tr>
			    			<tr>
			    				<td colspan="4" style="text-align:center">
			    					<div>
			    						<input type="checkbox" id="agreement" data-validetta="required" data-vd-message-required="กรุณายอมรับ คำรับรองการสมัคร">
			    						<label for="agreement" style="color:red">
			    							<span>คำรับรองของผู้สมัคร</span> ข้าพเจ้ายินดีสมัครเข้าร่วมกิจกรรมเดิน-วิ่งแข่งขันด้วยความเต็มใจและจะไม่เรียกร้องค่าเสียหายใดๆ หากเกิดอันตรายหรือบาดเจ็บแก่ตัวข้าพเจ้าก่อนหรือหลังเข้าร่วมการแข่งขัน
			    						</label>
			    					</div>
			    					<!-- <div class="alert alert-danger" role="alert">ยังไม่สามารถลงทะเบียนได้</div> -->
			    					<button type="button" class="btn btn-success" id="reviewregister">บันทึก</button>
<!-- 			    					<button type="submit" class="btn btn-success">บันทึก</button> -->
			    					<button type="reset" class="btn btn-danger">ยกเลิก</button>
			    					
			    				</td>
			    			</tr>
			    		</table>
			    	</form>
    			</div>
    		</div>
    	</div>

    </body>
</html>