<?php

include 'connection.php';

$data = '';
session_start();
if (!isset ($_SESSION['login']) && $_SESSION['login']==false)
{
  header("location:login.php");

  
}


?>

 <!doctype html>
<html class="no-js" lang="en">
    <head>
    	<base href="template/">
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Complaint Dashboard</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
       	 <link rel="stylesheet" href="../css/popup.css">                
        <!-- <link rel="icon" href="favicon.ico" type="image/x-icon" /> -->

        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="plugins/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="plugins/icon-kit/dist/css/iconkit.min.css">
        <link rel="stylesheet" href="plugins/ionicons/dist/css/ionicons.min.css">
        <link rel="stylesheet" href="plugins/perfect-scrollbar/css/perfect-scrollbar.css">
        <link rel="stylesheet" href="plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap.css">
        <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/build/css/tempusdominus-bootstrap-4.min.css">
        <link rel="stylesheet" href="plugins/weather-icons/css/weather-icons.min.css">
        <link rel="stylesheet" href="plugins/c3/c3.min.css">
        <link rel="stylesheet" href="plugins/owl.carousel/dist/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="plugins/owl.carousel/dist/assets/owl.theme.default.min.css">
        <link rel="stylesheet" href="dist/css/theme.min.css">	

        <script src="src/js/vendor/modernizr-2.8.3.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


 		 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
 		 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/fontawesome.min.css">


    </head>

    <body>




        <div class="wrapper">
            <header class="header-top" header-theme="light">
                <div class="container-fluid">
                    <div class="d-flex justify-content-between">
                        <div class="top-menu d-flex align-items-center">
                            <button type="button" class="btn-icon mobile-nav-toggle d-lg-none"><span></span></button>
                         
                            <button type="button" id="navbar-fullscreen" class="nav-link"><i class="ik ik-maximize"></i></button>
                        </div>
                        <div class="top-menu d-flex align-items-center">
                          <h6 class="mt-1">Complaints Dashboard <?php echo "[".$_SESSION['user']."]";?></h6>

                        </div>
                    </div>
                </div>
            </header>


            <div class="page-wrap">
                <div class="app-sidebar colored">
                    <div class="sidebar-header">
                        <a class="header-brand" href="../index.php">
                            <div class="logo-img">
                              <i class="fas fa-database"></i>

                            </div>

                            <span class="text">Dashboard</span>
                        </a>
                        <button type="button" class="nav-toggle"><i data-toggle="expanded" class="ik ik-toggle-right toggle-icon"></i></button>
                        <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
                    </div>
                    
                    <div class="sidebar-content">
                        <div class="nav-container">
                            <nav id="main-menu-navigation" class="navigation-main">

                                <div class="nav-lavel">General</div>

                                <div class="nav-item">
                                    <a href="../index.php"><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
                                </div>

                                 <div class="nav-item">
                                    <a href="../login.php"><i class="ik ik-log-out"></i><span>Logout</span></a>
                                </div>
                          
                               
                              

                                	 
                            </nav>
                        </div>
                    </div>
                </div> 
                <div class="main-content">
                	 

    <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header d-block">
                                        <h3>All Complaints</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="dt-responsive">

										<?php
										if ($_SESSION['user']!="Principal")
										{
										  // echo $_SESSION['user'];
										$query = "SELECT cid,dept.dept_name,complaint_category.complaint_type,complainant_year,complaint_category_id,complaint_status,complainant_screenshot,complaint_text,complaint_exp_com_date,complaint_forward_msg FROM complaint INNER JOIN complaint_category ON complaint.complaint_category_id = complaint_category.category_id INNER JOIN dept ON complaint.complainant_dept_id = dept.dept_id where
										 isComplaintForwarded=1 AND complaint_fwd_to='$_SESSION[user]'";	

										$result = mysqli_query ($connection, $query);
										?>

                                            <table id="simpletable"
                                                   class="table table-striped table-bordered nowrap">
                                                <thead>
                                                <tr>
                                                  <th scope="col">From the Department of</th>
										        <th scope="col">Year</th>
										        <th scope="col">Category</th>
										        <th scope="col">Current Status</th>
										        <th scope="col">Reporter Message</th>
										        <th scope="col">Expected Completion Date</th>
										        <th scope="col">Principal Message</th>
										        <th scope="col">Screenshot</th>
										        <th scope="col">Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
	                                                    <?php
													while ($data = mysqli_fetch_assoc ($result))
													{
													      ?>
													      <tr>
													        <td><?php echo $data['dept_name']; ?></td>
													        <td><?php echo $data['complainant_year']; ?></td>
													        <td><?php echo $data['complaint_type']; ?></td>        
     													   <td><?php echo $data['complaint_status']; ?></td>
													        <td><?php echo $data['complaint_text']; ?></td>
													        <td><?php echo $data['complaint_exp_com_date']; ?></td>
													        <td><?php echo $data['complaint_forward_msg']; ?></td>
													        <td>
													        	<?php if ($data['complainant_screenshot'] == NULL)
													        		{?>
													          <button type="button" name="btnScreenshot"
													            id="btnScreenshot" class="ml-2 btn btn-danger"><del>Complainant</del></button>
													            <?php }
													             else
													            {?>
													            	 <button type="button" onclick="imgPop('<?php echo $data['complainant_screenshot'];?>','complainee');" name="btnScreenshot"
													            id="btnScreenshot" class="ml-2 btn btn-outline-primary">Complainant</button>
													            <?php  
													        }?>
													        </td>
													        <td>
													          <button type="button" class="btn btn btn-outline-warning" data-toggle="modal" data-target="#revertModal"
													            data-id="<?php echo $data['cid']; ?>">Revert</button>

													        </td>



													      </tr>
													      <?php
													  }
													  ?>

                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                      <th scope="col">From the Department of</th>
										        <th scope="col">Year</th>
										        <th scope="col">Category</th>
										        <th scope="col">Current Status</th>
										        <th scope="col">Reporter Message</th>
										        <th scope="col">Expected Completion Date</th>
										        <th scope="col">Principal Message</th>
										        <th scope="col">Screenshot</th>
										        <th scope="col">Action</th>
                                                </tr>
                                                </tfoot>
                                            </table>

                                             <?php

}

  
// PRINCIPAL TABLE STARTS************************PRINCIPAL TABLE STARTS************************PRINCIPAL TABLE STARTS************************PRINCIPAL TABLE STARTS************************

else
{
  $query = "SELECT dept.dept_name, complaint_category.complaint_type, `cid`, `complainant_name`, `complainant_contact`, `complainant_dept_id`, `complainant_year`, `complainant_rn`, `complaint_category_id`, `complaint_text`, `complaint_status`, `complainant_screenshot`, `complaint_exp_com_date`, `complaint_forward_msg`, `isComplaintForwarded`, `complaint_fwd_to`,`revert_screenshot` FROM `complaint` INNER JOIN dept ON complaint.complainant_dept_id = dept.dept_id INNER JOIN complaint_category ON complaint.complaint_category_id = complaint_category.category_id ";	
  
$result = mysqli_query ($connection, $query);

?>

									             <table id="simpletable"
                                                   class="table table-striped table-bordered nowrap">
                                                <thead>
                                                <tr>
                                            <th scope="col">Name</th>
									        <th scope="col">Contact No.</th>
									        <th scope="col">Department</th>
									        <th scope="col">Year</th>
									        <th scope="col">Roll No.</th>
									        <th scope="col">Category</th>
									        <th scope="col">Message</th>
									        <th scope="col">Status</th>
									        <th scope="col">Screenshot</th>
									        <th scope="col">Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
	                                                   
      <?php
while ($data = mysqli_fetch_assoc ($result))
{

      ?>



      <tr>

        <td><?php echo $data['complainant_name']; ?></td>
        <td><?php echo $data['complainant_contact']; ?></td>
        <td><?php echo $data['dept_name']; ?></td>
        <td><?php echo $data['complainant_year']; ?></td>
        <td><?php echo $data['complainant_rn']; ?></td>
        <td><?php echo $data['complaint_type']; ?></td>
        <td><?php echo $data['complaint_text']; ?></td>
        <td><?php echo $data['complaint_status']; ?></td>
        <td>
          <?php if ($data['complainant_screenshot'] != NULL)
													        	{?>
													        		<button type="button" onclick="imgPop('<?php echo $data['complainant_screenshot'];?>','complainee');" name="btnScreenshot"
													            id="btnScreenshot" class="ml-2 btn btn-outline-primary">Complainant</button>
													         	 	
													            <?php
													        	} 
													        	else
													            {
													            ?>
													            	 
													            	<button type="button" name="btnScreenshot"
													           	 	id="btnScreenshot" class="ml-2 btn btn-danger"><del>Complainant</del></button>
													            <?php  
													       		 }
													       		 ?>

           <?php if ($data['revert_screenshot'] != NULL)
           {?>
           		   <button type="button" onclick="imgPop('<?php echo $data['revert_screenshot'];?>','revert');" name="btnScreenshot"
          		  id="btnScreenshot" class="ml-2 btn btn-outline-warning">Revert</button>
          <?php }
           ?>

        </td>




        <td>
          	<?php if ($data['complaint_status']=='Resolved')
            	{?>
            	   <button type="button" name="resolved" class="ml-2 btn btn-primary" disabled="true">Forward</button>           		
        
            	   <button type="button" name="resolved" class="ml-2 btn btn-success" disabled="true">Resolved</button>
            	   <button type="button" name="resolved" class="ml-2 btn btn-danger" disabled="true">Delete</button>
          
            	<?php } else
            	{
            		?>
          <button type="button" class="ml-2 btn btn-primary" data-toggle="modal" data-target="#forwardModal"  data-id="<?php echo $data['cid']; ?>">Forward</button>


          <a href="../action.php?resolved=1&cid=<?php echo $data['cid'];?>" type="button" name="resolved"
            class="ml-2 btn btn-success" 
                        >Resolved</a>
          <a href="../action.php?delete=1&cid=<?php echo $data['cid'];?>" type="button" name="delete"
            class="ml-2 btn btn-danger">Delete</a>

            <?php 
        }

        ?>

        </td>

      </tr>
  <?php }
  ?>
    </tbody>
  </table>
  
      <?php


}

    ?>







                                        </div>
                                    </div>
                                </div>
                                </div>
                                    </div>                                                    
                                                    
                                    
                                                    
                                        </div>




      <div class="modal" id="forwardModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
          <div class="modal-content">
            <div class="modal-header">

              <h5 class="modal-title" id="forwardModalLabel"></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="GET" action="../action.php">
                <input type="hidden" name="cid" id="cid" value="">
               
                <div class="form-group">
                  <label for="category" class="col-form-label">Department:</label>
                  <select name="category" class="custom-select" required>
                    <option disabled selected value="">Select</option>
                    <option value="132">Accounts</option>
                    <option value="133">Maintainance</option>
                    <option value="139">Ragging</option>
                    <option value="145">Cultural</option>
                    <option value="301">HOD-Computer Engineering</option>
                    <option value="302">HOD-Computer Technology</option>
                    <option value="303">HOD-Electronics & Tel. Engineering</option>
                  </select>
                </div>


                <div class="mb-2 form-inline">
                  <label for="expected_date" class="col-form-label">Expected Completion Date:</label>


                  <input type="text" class="form-control docs-date text-center w-75" name="expected_date"
                    placeholder="DD-MM-YYYY" autocomplete="off" id="datepicker" readonly required>

                  <button type="button" class="btn btn-outline-secondary docs-datepicker-trigger ml-2" id="triggerBtn"
                    style="height: 35px; margin-right:0px;">
                    <i class="fas fa-calendar-alt"  style="color:black; margin-right:0px;"  ></i>
                  </button>


                </div>


                <div class="form-group">
                  <label for="message" class="col-form-label">Message:</label>
                  <textarea class="form-control" id="message-text" name="message" required></textarea>
                </div>


                <input type="submit" class="btn btn-success" name="forward">

                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

              </form>
            </div>
            <div class="modal-footer">

            </div>
          </div>
        </div>
      </div>


      <div class="modal" id="revertModal" tabindex="-1" role="dialog" aria-labelledby="rexampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
          <div class="modal-content">
            <div class="modal-header">

              <h5 class="modal-title" id="revertModalLabel"></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

        <form class="form-horizontal" enctype="multipart/form-data" method="POST" action="../action.php">
                <input type="hidden" name="rcid" id="rcid" value="">

                            <div class="form-group">
                            <label for="image" class="cols-sm-2 control-label">Screenshot</label>
                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" style="height: 38px;">Upload</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" name="image" class="custom-file-input" id="image" accept=".jpg">
                                <label class="custom-file-label" for="image">Choose file</label>
                            </div>
                            </div>
                            </div>

                           

                            
                                <script>
                            // Add the following code if you want the name of the file appear on select
                            $(".custom-file-input").on("change", function() {
                            var fileName = $(this).val().split("\\").pop();
                            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
                            });
                            </script>
              
                  <label for="expected_date" class="col-form-label">Completion Date:</label>


                <div class="form-inline">


                  <input type="text" class="form-control docs-date text-center w-75" name="expected_date"
                    placeholder="DD-MM-YYYY" autocomplete="off" id="rdatepicker" readonly>

                    <button type="button" class="btn btn-outline-secondary docs-datepicker-trigger ml-2" id="rtriggerBtn"
                    style="height: 35px; margin-right:0px;">
                    <i class="fas fa-calendar-alt"  style="color:black; margin-right:0px;"  ></i>
                  </button>


                </div>


                <input type="submit" class="mt-4 btn btn-success" name="revert">

                <button type="button" class="mt-4 btn btn-danger" data-dismiss="modal">Close</button>

              </form>
            </div>
          </div>
        </div>
      </div>

      

  <CENTER>
  
    <div id="ssModal" class="modal">

      <span class="close" onclick="closeModal('ssModal')" style="
      float: right;
    font-size: 3.5rem;
    font-weight: 700;
    line-height: 1;
    color: #fff;
    text-shadow: 0 1px 0 #fff;
    opacity: 1;
    ">&times;</span>

      <img class="modal-content" id="screenshotImg">

    </div>

  </CENTER>


                    

               
                <footer class="footer">
                    <div class="w-100 clearfix">
                        <span class="text-center text-sm-left d-md-inline-block">Copyright © 2020 MMBGIT/CO6I/54-55-56 </span>
              
                    </div>
                </footer>
                
        </div>
    </div>

        
        <script>window.jQuery || document.write('<script src="src/js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
        <script src="plugins/popper.js/dist/umd/popper.min.js"></script>
        <script src="plugins/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
        <script src="plugins/screenfull/dist/screenfull.js"></script>
        <script src="plugins/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
        <script src="plugins/jvectormap/jquery-jvectormap.min.js"></script>
        <script src="plugins/jvectormap/tests/assets/jquery-jvectormap-world-mill-en.js"></script>
        <script src="plugins/moment/moment.js"></script>
        <script src="plugins/tempusdominus-bootstrap-4/build/js/tempusdominus-bootstrap-4.min.js"></script>
        <script src="plugins/d3/dist/d3.min.js"></script>
        <script src="plugins/c3/c3.min.js"></script>
        <script src="js/tables.js"></script>
        <script src="js/widgets.js"></script>
        <script src="js/charts.js"></script>
        <script src="dist/js/theme.min.js"></script>
        <script src="js/datatables.js"></script>
 		 <script src="../js/imgpopup.js"> </script>
         <link rel="stylesheet" href="../css/datepicker.css">
 		 <script src="../js/datepicker.js"> </script>
 		 <script src="../js/main.js"> </script>



    </body>
</html>
