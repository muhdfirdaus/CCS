<?php
//session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;
date_default_timezone_set("Asia/Singapore"); 
?>
<?php
include('../dist/includes/dbcon.php');

$branch=$_SESSION['branch'];
$query=mysqli_query($con,"select * from branch where branch_id='$branch'")or die(mysqli_error($con));
  $row=mysqli_fetch_array($query);
           $branch_name=$row['branch_name'];
?>

      <header class="main-header">
        <nav class="navbar navbar-static-top">
          <div class="container">
            <div class="navbar-header" style="padding-left:20px">
              <a href="home.php" class="navbar-brand"><b><i class="glyphicon glyphicon-home"></i> <?php echo $branch_name;?> </b></a>
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                <i class="fa fa-bars"></i>
              </button>
            </div>

            <!-- Navbar Right Menu -->
              <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                  
				 
               
                  <li class="dropdown notifications-menu">
                    <!-- Menu toggle button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <i class="glyphicon glyphicon-refresh text-red"></i> Total
                      <span class="label label-danger">
                      <?php 
                      $query=mysqli_query($con,"select COUNT(*) as count from product where branch_id='$branch'")or die(mysqli_error());
                			$row=mysqli_fetch_array($query);
                			echo $row['count'];
                			?>	
                      </span>
                    </a>
                    <ul class="dropdown-menu">
                      <li class="header">You have <?php echo$row['count'];?> equipments</li>
                      <li>
                        <!-- Inner Menu: contains the notifications -->
                        <ul class="menu">
                        <?php
                        $queryprod=mysqli_query($con,"select equip_name from product where  branch_id='$branch'")or die(mysqli_error());
			  while($rowprod=mysqli_fetch_array($queryprod)){
			?>
                          <li><!-- start notification -->
                            <a href="product.php">
                              <i class="glyphicon glyphicon-refresh text-red"></i> <?php echo $rowprod['equip_name'];?>
                            </a>
                          </li><!-- end notification -->
                          <?php }?>
                        </ul>
                      </li>
                   <!--   <li class="footer"><a href="inventory.php">View all</a></li>-->
                    </ul>
                  </li>
                  <!-- Tasks Menu -->
				   <li class="dropdown notifications-menu">
                    <!-- Menu toggle button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <i class="	glyphicon glyphicon-menu-down  text-red"></i> Menu
                      
                    </a>
                    <ul class="dropdown-menu">
                      <li>
                        <!-- Inner Menu: contains the notifications -->
                        <ul class="menu">
						  <li><!-- start notification -->
                            <a href="category.php">
                              <i class="glyphicon glyphicon-folder-open text-green"></i> Category
                            </a>
                          </li><!-- end notification -->
						             
						 <li><!-- start notification -->
                            <a href="manufacturer.php">
                              <i class="glyphicon glyphicon-edit text-green"></i> Manufacturer
                            </a>
                          </li><!-- end notification -->
						   <li><!-- start notification -->
                            <a href="location.php">
                              <i class="glyphicon glyphicon-home text-green"></i> Location
                            </a>
                          </li><!-- end notification -->
						                       
                         <li><!-- start notification -->
                            <a href="product.php">
                              <i class="glyphicon glyphicon-menu-hamburger text-green"></i> Equipment
                            </a>
                          </li><!-- end notification -->
						             
						 
                        </ul>
                      </li>
                     
                    </ul>
                  </li>
                  
                  <!-- Tasks Menu -->
				        <li class="dropdown notifications-menu">
                    <!-- Menu toggle button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <i class="glyphicon glyphicon-stats text-red"></i> Report
                     
                    </a>
                    <ul class="dropdown-menu">
                     <li>
                        <!-- Inner Menu: contains the notifications -->
                        <ul class="menu">
                        
						
                          <li><!-- start notification -->
                              <a href="report.php">
                                <i class="glyphicon glyphicon-th-list text-blue"></i>Equipment Listing
                              </a>
                          </li><!-- end notification -->

                          <li><!-- start notification -->
                              <a href="report_active.php">
                                <i class="glyphicon glyphicon-ok text-green"></i>Listing by Active
                              </a>
                          </li><!-- end notification -->
                  
                          <li><!-- start notification -->
                              <a href="report_inactive.php">
                                <i class="glyphicon glyphicon-ban-circle text-grey"></i>Listing by Inactive
                              </a>
                          </li><!-- end notification -->

                          <li><!-- start notification -->
                              <a href="report_oos.php">
                                <i class="glyphicon glyphicon-remove text-green"></i>Listing for Out Of Service
                              </a>
                          </li><!-- end notification -->  
                  
                          <li><!-- start notification -->
                              <a href="report_overdue.php">
                                <i class="glyphicon glyphicon-warning-sign text-red"></i>Listing by Overdue in 30 Days
                              </a>
                          </li><!-- end notification -->

                          <li><!-- start notification -->
                              <a href="report_accreditation.php">
                                <i class="glyphicon glyphicon-check text-green"></i>Listing by Accreditation
                              </a>
                          </li><!-- end notification -->  

                          <li><!-- start notification -->
                              <a href="report_project.php">
                                <i class="glyphicon glyphicon-briefcase text-yellow"></i>Listing for Automotive Project
                              </a>
                          </li><!-- end notification -->  
                        </ul>
                      </li>
                    </ul>
                  </li>
                  <!-- Tasks Menu -->
				  <li class="">
                    <!-- Menu Toggle Button -->
                    <a href="profile.php" class="dropdown-toggle">
                      <i class="glyphicon glyphicon-cog text-orange"></i>
                      <?php echo $_SESSION['name'];?>
                    </a>
                  </li>
                  <li class="">
                    <!-- Menu Toggle Button -->
                    <a href="logout.php" class="dropdown-toggle">
                      <i class="glyphicon glyphicon-off text-red"></i> Logout 
                      
                    </a>
                  </li>
                  
                </ul>
              </div><!-- /.navbar-custom-menu -->
          </div><!-- /.container-fluid -->
        </nav>
      </header>