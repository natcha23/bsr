<?php
require('function.php');
updateData();

// echo '<pre>'.print_r($_POST, 1).'</pre>';

?>
<html lang="en">
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Register</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

		<style>
			.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
				/*border: none !important;*/
			}
			.review-error {
				color:red;
				font-weight:bold;
			}
			.review-data {
				color:green;
			}
			.ui-dialog .ui-dialog-buttonpane { 
			    text-align: center;
			}
			.ui-dialog .ui-dialog-buttonpane .ui-dialog-buttonset { 
			    float: none;
			}
			.ui-dialog-button-white {
				cursor: pointer;
			    display: inline-block;
			    background-color: #e6e6e6 !important;
			    background-repeat: no-repeat !important;
			    background-image: linear-gradient(#ffffff, #ffffff 25%, #e6e6e6) !important;
			    padding: 5px 14px 6px !important;
			    text-shadow: 0 1px 1px rgba(255, 255, 255, 0.75) !important;
			    color: #333 !important;
			}
			
			.ui-dialog-button-blue {
				cursor: pointer;
			    background-color: #0064cd !important;
			    background-repeat: repeat-x !important;
			    background-image: -webkit-linear-gradient(top, #049cdb, #0064cd) !important;
			    padding: 5px 14px 6px !important;
			    color: #ffffff !important;
			    border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25) !important;
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
    				<h4 style="color:red">**กรุณาตรวจสอบความถูกต้องของข้อมูลโดยละเอียดก่อนลงทะเบียน</h4>
    			</div>
    		</div>
    		<div class="row">
    			<div class="col-md-12">
			    	<form action="" method="post" name="" id="">
			    		<table class="table table-responsive">
			    			<tr>
			    				<td style="width:300px">ชื่อ/นามสกุล(ภาษาไทย)</td>
			    				<td colspan="3" style="min-width:500px" class="review-data">
			    					<?php echo (!empty($_POST['name_th']))? $_POST['name_th'] : '<span class="review-error">กรุณากรอก ชื่อ/นามสกุล(ภาษาไทย)</span>';?>
			    				</td>
			    			</tr>
			    			<tr>
			    				<td>First/Last name(English)</td>
			    				<td colspan="3" class="review-data">
			    					<?php echo (!empty($_POST['name_en']))? $_POST['name_en'] : '<span class="review-error">กรุณากรอก First/Last name(English)</span>';?>
			    				</td>
			    			</tr>
			    			<tr>
			    				<td>เลขบัตรประชาชน(ID Card)/เลขที่พาสปอร์ต (Passport ID)</td>
			    				<td colspan="3" class="review-data">
			    					<?php echo (!empty($_POST['idcard'])) ? $_POST['idcard'] : '<span class="review-error">เลขบัตรประชาชน(ID Card)</span>';?>
			    				</td>
			    			</tr>
			    			<tr>
			    				<td>วัน เดือน ปีเกิด(Birthday)</td>
			    				<td class="review-data">
			    					<?php echo (!empty($_POST['birthday'])) ? $_POST['birthday'] : '<span class="review-error">กรุณาระบุ วัน เดือน ปีเกิด(Birthday eg29-09-1999)</span>';?>
			    				</td>
			    				<td>อายุ(Age)</td>
			    				<td class="review-data">
			    					<?php echo (!empty($_POST['age'])) ? $_POST['age'] : '<span class="review-error">กรุณาระบุ วัน เดือน ปีเกิด</span>';?>
			    				</td>
			    			</tr>
			    			<tr>
			    				<td>เพศ(Gender)</td>
			    				<td colspan="3" class="review-data">
			    					<?php if (!empty($_POST['gender'])) { 
			    						$gender = $_POST['gender']==1 ? 'ชาย':'หญิง';
			    					} else {
			    						$gender = '<span class="review-error">กรุณาระบุ เลือกเพศ(Gender)</span>';
			    					}?>
			    					
			    					<?php echo $gender; ?>
			    				</td>
			    			</tr>
			    			<tr>
			    				<td>สัญชาติ(Nationality)</td>
			    				<td colspan="3" class="review-data">
			    					<?php echo (!empty($_POST['nationality'])) ? $_POST['nationality'] : '<span class="review-error">กรุณาระบุ สัญชาติ(Nationality)</span>';?>
			    				</td>
			    			</tr>
			    			<tr>
			    				<td>ที่อยู่ที่ติดต่อได้<br>(Postal Address or Mailing Address)</td>
			    				<td colspan="3" class="review-data">
			    					<?php echo (!empty($_POST['address'])) ? $_POST['address'] : '<span class="review-error">กรุณาระบุ ที่อยู่ที่ติดต่อได้(Postal Address or Mailing Address)</span>';?>
			    				</td>
			    			</tr>
			    			<tr>
			    				<td>จังหวัด(Province)</td>
			    				<td colspan="3" class="review-data">
			    					<?php echo (!empty($_POST['province'])) ? $_POST['province'] : '<span class="review-error">กรุณาระบุ จังหวัด(Province)</span>';?>
			    				</td>
			    			</tr>
			    			<tr>
			    				<td>เมือง(City)</td>
			    				<td colspan="3" class="review-data">
			    					<?php echo (!empty($_POST['city'])) ? $_POST['city'] : '<span class="review-error">กรุณาระบุ เมือง(City)</span>';?>
			    				</td>
			    			</tr>
			    			<tr>
			    				<td>รหัสไปรษณีย์(PostCode)</td>
			    				<td colspan="3" class="review-data">
			    					<?php echo (!empty($_POST['postcode'])) ? $_POST['postcode'] : '<span class="review-error">กรุณาระบุ รหัสไปรษณีย์(PostCode)</span>';?>
			    				</td>
			    			</tr>
			    			<tr>
			    				<td>โทรศัพท์(Mobile Phone)</td>
			    				<td colspan="3" class="review-data">
			    				<?php 
			    				if (!empty($_POST['mobile'])) {
			    					
				    				if (strlen($_POST['mobile']) >= 10 && preg_match('/^[0-9]{10}$/', $_POST['mobile'] )) {
				    					$mobile = $_POST['mobile'];
				    				} else {
				    					$mobile = '<span class="review-error">กรอกตัวเลขเท่านั้น อย่างน้อย 10 ตัว</span>';
				    				}
			    				} else {
			    					$mobile = '<span class="review-error">กรุณาระบุ โทรศัพท์(Mobile Phone)</span>';
			    				}
			    				?>
			    					<?php echo $mobile; ?>
			    				</td>
			    			</tr>
			    			<tr>
			    				<td>อีเมล(E-mail address)</td>
			    				<td colspan="3" class="review-data">
			    				
			    				<?php 
			    				if(!empty($_POST['email'])) {
			    					$pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/";
				    				if (preg_match($pattern, $_POST['email'] )) {
				    					$email = $_POST['email'];
				    				}else{
				    					$email = '<span class="review-error">รูปแบบอีเมลไม่ถูกต้อง(Invalid e-mail format)</span>';
				    				}
			    				}else {
			    					$email = '<span class="review-error">กรุณาระบุ อีเมล(E-mail address)</span>';
			    				}
			    				echo $email; 
			    				?>
			    				</td>
			    			</tr>
			    			<tr>
			    				<td>ชื่อติดต่อบุคคลอ้างอิงในกรณีฉุกเฉิน(Emergency Contact: Name)</td>
			    				<td class="review-data">
			    				<?php echo (!empty($_POST['refer-name'])) ? $_POST['refer-name'] : '<span class="review-error">กรุณาระบุ ชื่อติดต่อบุคคลอ้างอิงในกรณีฉุกเฉิน(Emergency Contact: Name)</span>';?>
			    				</td>
			    				<td>เบอร์โทร(Phone)</td>
			    				<td class="review-data">
			    				<?php 
			    				if (!empty($_POST['refer-phone'])) {
			    					
				    				if (strlen($_POST['refer-phone']) >= 10 && preg_match('/^[0-9]{10}$/', $_POST['refer-phone'] )) {
				    					$refer_phone = $_POST['refer-phone'];
				    				} else {
				    					$refer_phone = '<span class="review-error">กรอกตัวเลขเท่านั้น อย่างน้อย 10 ตัว</span>';
				    				}
			    				} else {
			    					$refer_phone = '<span class="review-error">กรุณาระบุ โทรศัพท์(Mobile Phone)</span>';
			    				}
			    				?>
			    				<?php echo $refer_phone; ?>
			    				</td>
			    			</tr>
			    			<tr>
			    				<td>เลือกทีม(Select Team)</td>
			    				<td colspan="3" class="review-data">
			    				<?php 
			    					if(!empty($_POST['team'])) {
			    						$team = $_POST['team']==1 ? 'Batman':'Superman';
			    					}else {
			    						
			    						$team = '<span class="review-error">กรุณาเลือกทีม(Select Team)</span>';
			    					}
			    					?>
			    					<?php echo $team; ?>
			    				</td>
			    			</tr>
			    			<tr>กรุณาเลือกทีม(Select Team)
			    				<td>ขนาดเสื้อ(T-shirt size)</td>
			    				<?php
			    					if(!empty($_POST['shirt'])) {
			    						if( $_POST['shirt'] == 's' ) {
			    							$shirt = 'S รอบอก / Chest 36"';
			    						} else if( $_POST['shirt'] == 'm' ) {
			    							$shirt = 'M รอบอก / Chest 38"';
			    						} else if( $_POST['shirt'] == 'l' ) {
			    							$shirt = 'L รอบอก / Chest 40"';
			    						} else if( $_POST['shirt'] == 'xl' ) {
			    							$shirt = 'XL รอบอก / Chest 42"';
			    						} else if( $_POST['shirt'] == 'xxl' ) {
			    							$shirt = 'XXL รอบอก / Chest 44"';
			    						}
			    					}else {
			    						$shirt = '<span style="color:red;font-weight:bold;">กรุณาเลือกขนาดเสื้อ(T-shirt size)</span>';
			    					}
		    					?>
			    				<td colspan="3" class="review-data">
			    					<?php echo $shirt;?>
			    				</td>
			    			</tr>
			    			<tr>
			    				<td colspan="4" style="text-align:center">
			    					<div>
			    					<?php if (!empty($_POST['agreement']) && $_POST['agreement'] == "agree") {?>
			    					
			    						<label for="agreement" style="color:blue">
			    							 ** ข้าพเจ้ายินดีสมัครเข้าร่วมกิจกรรมเดิน-วิ่งแข่งขันด้วยความเต็มใจและจะไม่เรียกร้องค่าเสียหายใดๆ หากเกิดอันตรายหรือบาดเจ็บแก่ตัวข้าพเจ้าก่อนหรือหลังเข้าร่วมการแข่งขัน
			    						</label>
			    						
			    						<?php } else { ?>
			    						<label>
			    							<span class="review-error">*กรุณายอมรับ คำรับรองการสมัคร</span>
			    						</label>
			    							
			    						<?php }?>
			    					</div>
			    					<!-- <div class="alert alert-danger" role="alert">ยังไม่สามารถลงทะเบียนได้</div> 
			    					<button type="submit" class="btn btn-success">บันทึก</button>
			    					<button type="reset" class="btn btn-danger">ยกเลิก</button>-->
			    				</td>
			    			</tr>
			    		</table>
			    	</form>
    			</div>
    		</div>
    	</div>

    </body>
</html>