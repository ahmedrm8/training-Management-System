<!---------------- Session starts form here ----------------------->
<?php  
	session_start();
	
	if ($_SESSION["LoginAdmin"])
	{
		$roll_no=$_GET['roll_no'] ?? $_SESSION['LoginStudent'];
	}
	else if(!$_SESSION["LoginAdmin"] && $_SESSION['LoginStudent']){
		$roll_no=$_SESSION['LoginStudent'];
	}
	else{ ?>
		<script> alert("Your Are Not Authorize Person For This link");</script>
	<?php
		header('location:../login/login.php');
	}
	require_once "../connection/connection.php";
	?>
<!---------------- Session Ends form here ------------------------>


<!doctype html>
<html lang="en">
	<head>
		<title>المشرف - معلومات الطالب</title>
	</head>
	<body>
		<?php include('../common/common-header.php') ?>
	<?php
	$query="select * from student_info where roll_no='$roll_no'";
	$run=mysqli_query($con,$query);
	while ($row=mysqli_fetch_array($run)) {
		?>
		<div class="container  mt-1 border border-secondary mb-1">
			<div class="row text-white bg-primary pt-5">
				<div class="col-md-4">
					<?php  $profile_image= $row["profile_image"] ?>
					<img class="ml-5 mb-5" height='290px' width='250px' src=<?php echo "images/$profile_image"  ?> >
				</div>
				<div class="col-md-8">
					<h3 class="ml-5"><?php echo $row['first_name']." ".$row['middle_name']." ".$row['last_name'] ?></h3><br>
					<div class="row">
						<div class="col-md-6">
							<h5>اسم الأب:</h5> <?php echo $row['father_name']  ?><br><br>
							<h5>بريد إلكتروني:</h5> <?php echo $row['email']  ?><br><br>
							<h5>اتصال:</h5> <?php echo $row['mobile_no']  ?><br><br>
						</div>
						<div class="col-md-6">
							<h5>عنوان:</h5> <?php echo $row['permanent_address']  ?><br><br>
							<h5>كنيك:</h5> <?php echo $row['cnic']  ?><br><br>
							<h5>رقم اللفة:</h5> <?php echo $row['roll_no']  ?><br><br>
						</div>		
					</div>
				</div>
				<hr>
			</div>
			<div class="row pt-3">
				<div class="col-md-4"><h5>حالة مقدم الطلب:</h5> <?php echo $row['applicant_status']  ?></div>
				<div class="col-md-4"><h5>حالة التطبيق:</h5> <?php echo $row['application_status']  ?></div>
				<div class="col-md-4"><h5>حالة النشرة:</h5> <?php echo $row['prospectus_issued']  ?></div>
			</div>
			<div class="row pt-3">
				<div class="col-md-4"><h5>رقم الهاتف:</h5> <?php echo $row['mobile_no']  ?></div>
				<div class="col-md-4"><h5>الحالة:</h5> <?php echo $row['state']  ?></div>
				<div class="col-md-4"><h5>نصف الكورس:</h5> <?php echo $row['semester']  ?></div>
			</div>
			<div class="row pt-3">
				<div class="col-md-4"><h5>النوع:</h5> <?php echo $row['gender']  ?></div>
				<div class="col-md-4"><h5>الكورس:</h5> <?php echo $row['course_code']  ?></div>
				<div class="col-md-4"><h5>نوع الكورس:</h5> <?php echo $row['session']  ?></div>
			</div>
			<div class="row pt-3">
				<div class="col-md-4"><h5>تاريخ الميلاد:</h5> <?php echo $row['dob']  ?></div>
				<div class="col-md-4"><h5>تاريخ القبول:</h5> <?php echo $row['admission_date']  ?></div>
				<div class="col-md-4"><h5>نموذج ب:</h5> <?php echo $row['form_b']  ?></div>
			</div>
			<div class="row pt-3">
				<div class="col-md-4"><h5>عنوان دائم:</h5> <?php echo $row['permanent_address']  ?></div>
				<div class="col-md-4"><h5>العنوان الحالي:</h5> <?php echo $row['current_address']  ?></div>
				<div class="col-md-4"><h5>مكان الميلاد:</h5> <?php echo $row['place_of_birth']  ?></div>
			</div>
			<div class="row pt-3">
				<div class="col-md-4"><h5>تاريخ الانتهاء من ماتيرك:</h5> <?php echo $row['matric_complition_date']  ?></div>
				<div class="col-md-4"><h5>تاريخ منح ماتيرك:</h5> <?php echo $row['matric_awarded_date']  ?></div>
				<div class="col-md-4"><h5>شهادة ماتريك:</h5> <?php echo $row['matric_certificate']  ?></div>
			</div>
			<div class="row pt-3">
				<div class="col-md-4"><h5>تاريخ الانتهاء من الاتحاد الانجليزي:</h5> <?php echo $row['fa_complition_date']  ?></div>
				<div class="col-md-4"><h5>تاريخ منح Fa:</h5> <?php echo $row['fa_awarded_date']  ?></div>
				<div class="col-md-4"><h5>تاريخ شهادة Fa:</h5> <?php echo $row['fa_certificate']  ?></div>
			</div>
			<div class="row pt-3">
				<div class="col-md-4"><h5>تاريخ الانتهاء من درجة البكالوريوس:</h5> <?php echo $row['ba_complition_date']  ?></div>
				<div class="col-md-4"><h5>تاريخ منح درجة البكالوريوس:</h5> <?php echo $row['ba_awarded_date']  ?></div>
				<div class="col-md-4"><h5>شهادة البكالوريوس:</h5> <?php echo $row['ba_certificate']  ?></div>
			</div>
		</div>
	<?php } ?>
</body>
</html>
