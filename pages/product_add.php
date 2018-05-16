<?php 
session_start();
$branch=$_SESSION['branch'];
include('../dist/includes/dbcon.php');

	$equip_name = $_POST['equip_name'];
	$equip_no = $_POST['equip_no'];
	$model = $_POST['model'];
	$accuracy=$_POST['accuracy'];
	$manufacturer = $_POST['manufacturer'];
	$accuracy = $_POST['accuracy'];
	$rangee = $_POST['rangee'];
	$location = $_POST['location'];
	$category=$_POST['category'];
	$dept=$_POST['dept'];
	$certno=$_POST['cert_no'];
	$creation = $_POST['creation_date'];
	$ddate = $_POST['due_date'];
	$remark=$_POST['remark'];
	$validation=$_POST['validation'];
	$project=$_POST['project'];
	
	$query2=mysqli_query($con,"select * from product where equip_no='$equip_no' and branch_id='$branch'")or die(mysqli_error($con));
		$count=mysqli_num_rows($query2);

		if ($count>0)
		{
			echo "<script type='text/javascript'>alert('Equipment with that Serial Number already exist!');</script>";
			echo "<script>document.location='product.php'</script>";  
		}
		else
		{	

			

			mysqli_query($con,"INSERT INTO product(equip_no,equip_name,model,accuracy,manufacturer,rangee,location,branch_id,category,dept,cert_no,creation_date,due_date,remark,validation, project)
			VALUES('$equip_no','$equip_name','$model','$accuracy','$manufacturer','$rangee','$location','$branch','$category','$dept','$certno','$creation','$ddate','$remark','$validation', '$project')")or die(mysqli_error($con));

			echo "<script type='text/javascript'>alert('Successfully added new product!');</script>";
					  echo "<script>document.location='product.php'</script>";  
		}
?>