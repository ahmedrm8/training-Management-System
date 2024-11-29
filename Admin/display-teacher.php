<!---------------- Session starts form here ----------------------->
<?php  
	session_start();

	if ($_SESSION["LoginAdmin"] && !$_SESSION['LoginTeacher'])
	{
		$teacher_id=$_GET['teacher_id'];
	}
	else if(!$_SESSION["LoginAdmin"] && $_SESSION['LoginTeacher']){
		$teacher_email=$_SESSION['LoginTeacher'];
		$teacher_id="";
	}
	else{ ?>
		<script> alert("Your Are Not Autorize Person For This link");</script>
	<?php
		header('location:../login/login.php');
	}
	require_once "../connection/connection.php";
?>
<!---------------- Session Ends form here ------------------------>


<!doctype html>
<html lang="en">
	<head>
		<title>المشرف - معلومات المدرب</title>
	</head>
	<body>
		<?php include('../common/common-header.php') ?>
	<?php
		if($teacher_id){
			$query="select * from teacher_info where teacher_id='$teacher_id'";
		}
		else{
			$query="select * from teacher_info where email='$teacher_email'";
		}
		
		$run=mysqli_query($con,$query);
		while ($row=mysqli_fetch_array($run)) {
	?>
		<div class="container  mt-1 border border-secondary mb-1">
			<div class="row text-white bg-primary pt-5">
				<div class="col-md-4">
					<?php  $profile_image= $row["profile_image"] ?>
					<img class="ml-5 mb-5" height='270px' width='250px' src=<?php echo "images/$profile_image"  ?> >
				</div>
				<div class="col-md-8">
					<h3 class="ml-5"><?php echo $row['first_name']." ".$row['middle_name']." ".$row['last_name'] ?></h3><br>
					<div class="row">
						<div class="col-md-6">
							<h5>اسم الأب:</h5> <?php echo $row['father_name']  ?><br><br>
							<h5>بريد إلكتروني:</h5> <?php echo $row['email']  ?><br><br>
							<h5>اتصال:</h5> <?php echo $row['phone_no']  ?><br><br>
						</div>
						<div class="col-md-6">
							<h5>عنوان:</h5> <?php echo $row['permanent_address']  ?><br><br>
							<h5>CNIC:</h5> <?php echo $row['cnic']  ?><br><br>
							<h5>المدرب:</h5> <?php echo $row['teacher_id']  ?><br><br>
						</div>		
					</div>
				</div>
				<hr>
			</div>
			<div class="row pt-3">
				<div class="col-md-4"><h5>حالة:</h5> <?php echo $row['teacher_status']  ?></div>
				<div class="col-md-4"><h5>النوع:</h5> <?php echo $row['gender']  ?></div>
				<div class="col-md-4"><h5>تاريخ الميلاد:</h5> <?php echo $row['dob']  ?></div>
			</div>
			<div class="row pt-3">
				<div class="col-md-4"><h5>رقم الهاتف:</h5> <?php echo $row['other_phone']  ?></div>
				<div class="col-md-4"><h5>ولاية:</h5> <?php echo $row['state']  ?></div>
				<div class="col-md-4"><h5>المؤهل الأخير:</h5> <?php echo $row['last_qualification']  ?></div>
			</div>
			<div class="row pt-3">
				<div class="col-md-4"><h5>عنوان دائم:</h5> <?php echo $row['permanent_address']  ?></div>
				<div class="col-md-4"><h5>العنوان الحالي:</h5> <?php echo $row['current_address']  ?></div>
				<div class="col-md-4"><h5>مكان الميلاد:</h5> <?php echo $row['place_of_birth']  ?></div>
			</div>
			<div class="row pt-3">
				<div class="col-md-4"><h5>تاريخ الانتهاء من Matric:</h5> <?php echo $row['matric_complition_date']  ?></div>
				<div class="col-md-4"><h5>تاريخ منح Matric:</h5> <?php echo $row['matric_awarded_date']  ?></div>
				<div class="col-md-4"><h5>شهادة ماتريك:</h5> <?php echo $row['matric_certificate']  ?></div>
			</div>
			<div class="row pt-3">
				<div class="col-md-4"><h5>تاريخ الانتهاء من الاتحاد الانجليزي:</h5> <?php echo $row['fa_complition_date']  ?></div>
				<div class="col-md-4"><h5>تاريخ منح Fa:</h5> <?php echo $row['fa_awarded_date']  ?></div>
				<div class="col-md-4"><h5>شهادة فا:</h5> <?php echo $row['fa_certificate']  ?></div>
			</div>
			<div class="row pt-3">
				<div class="col-md-4"><h5>تاريخ الانتهاء من درجة البكالوريوس:</h5> <?php echo $row['ba_complition_date']  ?></div>
				<div class="col-md-4"><h5>تاريخ منح درجة البكالوريوس:</h5> <?php echo $row['ba_awarded_date']  ?></div>
				<div class="col-md-4"><h5>شهادة البكالوريوس:</h5> <?php echo $row['ba_certificate']  ?></div>
			</div>
			<div class="row pt-3">
				<div class="col-md-4"><h5>تاريخ الانتهاء من الماجستير:</h5> <?php echo $row['ma_complition_date']  ?></div>
				<div class="col-md-4"><h5> تاريخ منح الماجستير:</h5> <?php echo $row['ma_awarded_date']  ?></div>
				<div class="col-md-4"><h5>شهادة الماجستير:</h5> <?php echo $row['ma_certificate']  ?></div>
			</div>
		</div>
	<?php } ?>
</body>
</html>
