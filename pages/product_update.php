<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

include('../dist/includes/dbcon.php');
	$id = $_POST['id'];
	$equip_name = $_POST['equip_name'];
	$equip_no = $_POST['equip_no'];
	$accuracy=$_POST['accuracy'];
	$location = $_POST['location'];
	$category=$_POST['category'];
	$dept=$_POST['dept'];
	$certno=$_POST['cert_no'];
	$creation = $_POST['creation_date'];
	$ddate = $_POST['due_date'];
	$remark=$_POST['remark'];
	$validation=$_POST['validation'];
	
			
	mysqli_query($con,"update product set equip_name='$equip_name',equip_no='$equip_no',
	accuracy='$accuracy',location='$location',category='$category',dept='$dept',cert_no='$certno',creation_date='$creation',due_date='$ddate',remark='$remark',validation='$validation' where equip_id='$id'")or die(mysqli_error($con));
	
	echo "<script type='text/javascript'>alert('Successfully updated equipment details!');</script>";
	echo "<script>document.location='product.php'</script>";  
	
	
?>
