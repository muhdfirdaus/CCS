<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

include('../dist/includes/dbcon.php');
	$id = $_POST['id'];
	$equip_name = str_replace(',', ' ', $_POST['equip_name']);
	$equip_no = str_replace(',', ' ', $_POST['equip_no']);
	$accuracy=$_POST['accuracy'];
	$location = $_POST['location'];
	$category=$_POST['category'];
	$dept=str_replace(',', ' ', $_POST['dept']);
	$certno=str_replace(',', ' ', $_POST['cert_no']);
	$creation = $_POST['creation_date'];
	$ddate = $_POST['due_date'];
	$remark=$_POST['remark'];
	$validation=$_POST['validation'];
	$project=str_replace(',', ' ', $_POST['project']);

	
			
	mysqli_query($con,"update product set equip_name='$equip_name',equip_no='$equip_no',
	accuracy='$accuracy',location='$location',project='$project',category='$category',dept='$dept',cert_no='$certno',creation_date='$creation',due_date='$ddate',remark='$remark',validation='$validation' where equip_id='$id'")or die(mysqli_error($con));
	
	echo "<script type='text/javascript'>alert('Successfully updated equipment details!');</script>";
	echo "<script>window.history.back();</script>";  
	
	
?>
