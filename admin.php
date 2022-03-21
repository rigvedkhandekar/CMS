<?php

include 'connection.php';
$data = '';
session_start();
if (!isset ($_SESSION['login']) && $_SESSION['login']==false)
{
  header("location:login.php");

  
}



?>



<!DOCTYPE html>
<html>

<head>

<!--   <link rel="stylesheet" type="text/css" href="css/popup.css">
  <script type="text/javascript" src="js/imgpopup.js"> </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet"
    id="bootstrap-css">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/fontawesome.min.css"> -->
  <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>ThemeKit - Admin Template</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <base href="template/" target="_blank">
        <link rel="icon" href="favicon.ico" type="image/x-icon" />

        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">
        
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
        <script src="template/src/js/vendor/modernizr-2.8.3.min.js"></script>
  <link rel="stylesheet" href="template/css/datepicker.css">
  <script src="js/datepicker.js"> </script>
  <script src="js/main.js"> </script>
  <title>
    Complaints Data
  </title>
</head>

<body>

  <!-- <div class="container"> -->

  <CENTER>
    <H1 class="diplay-3 mt-4 pb-3"> Complaints</H1>

    <div id="ssModal" class="modal">

      <span class="close">&times;</span>

      <img class="modal-content" id="screenshotImg">

    </div>

  </CENTER>

  <?php
if ($_SESSION['user']!="Principal")
{
  // echo $_SESSION['user'];
$query = "SELECT cid,dept.dept_name,complaint_category.complaint_type,complainant_year,complaint_category_id,complaint_status,complainant_screenshot,complaint_text,complaint_exp_com_date,complaint_forward_msg FROM complaint INNER JOIN complaint_category ON complaint.complaint_category_id = complaint_category.category_id INNER JOIN dept ON complaint.complainant_dept_id = dept.dept_id where
 isComplaintForwarded=1 AND complaint_fwd_to='$_SESSION[user]'";	

$result = mysqli_query ($connection, $query);
?>
  <table class="table table-bordered table-dark w-100 " align="center">
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
          <button type="button" onclick="imgPop('<?php echo $data['complainant_screenshot'];?>');" name="btnScreenshot"
            id="btnScreenshot" class="ml-2 btn btn-primary">View Screenshot</button>
        </td>
        <td>
          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#revertModal"
            data-id="<?php echo $data['cid']; ?>">Revert</button>

        </td>



      </tr>


    </tbody>
  </table>
  

  <?php
}

}

  
// PRINCIPAL TABLE STARTS************************PRINCIPAL TABLE STARTS************************PRINCIPAL TABLE STARTS************************PRINCIPAL TABLE STARTS************************

else
{
  $query = "SELECT dept.dept_name, complaint_category.complaint_type, `cid`, `complainant_name`, `complainant_contact`, `complainant_dept_id`, `complainant_year`, `complainant_rn`, `complaint_category_id`, `complaint_text`, `complaint_status`, `complainant_screenshot`, `complaint_exp_com_date`, `complaint_forward_msg`, `isComplaintForwarded`, `complaint_fwd_to` FROM `complaint` INNER JOIN dept ON complaint.complainant_dept_id = dept.dept_id INNER JOIN complaint_category ON complaint.complaint_category_id = complaint_category.category_id";	
  
$result = mysqli_query ($connection, $query);

?>

  <table class="table table-bordered table-dark w-100 " align="center">
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
          <button type="button" onclick="imgPop('<?php echo $data['complainant_screenshot'];?>');" name="btnScreenshot"
            id="btnScreenshot" class="ml-2 btn btn-primary">View Screenshot</button>

        </td>




        <td>
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#forwardModal" data-id="<?php echo $data['cid']; ?>">Forward</button>
          <a href="action.php?resolved=1&cid=<?php echo $data['cid'];?>" type="button" name="resolved"
            class="ml-2 btn btn-success">Resolved</a>
          <a href="action.php?delete=1&cid=<?php echo $data['cid'];?>" type="button" name="delete"
            class="ml-2 btn btn-danger">Delete</a>

        </td>

      </tr>
    </tbody>
  </table>
  
      <?php
}

}

    ?>

      <!-- </div> -->





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
              <form method="GET" action="action.php">
                <input type="hidden" name="cid" id="cid" value="">
               
                <div class="form-group">
                  <label for="category" class="col-form-label">Department:</label>
                  <select name="category" class="custom-select" required="true">
                    <option disabled selected value="0">Select</option>
                    <option value="132">Accounts</option>
                    <option value="133">Maintainance</option>
                    <option value="139">Ragging</option>
                    <option value="145">Cultural</option>
                    <option value="301">HOD-Computer Engineering</option>
                    <option value="302">HOD-Computer Technology</option>
                    <option value="303">HOD-Electronics & Tel. Engineering</option>
                  </select>
                </div>


                <div class="form-inline">

                  <label for="expected_date" class="col-form-label">Expected Completion Date:</label>

                  <input type="text" class="form-control docs-date text-center w-75" name="expected_date"
                    placeholder="DD-MM-YYYY" autocomplete="off" id="datepicker" readonly required="true">

                  <button type="button" class="btn btn-outline-secondary docs-datepicker-trigger ml-2" id="triggerBtn"
                    style="height: 35px;">
                    <i style="color:lightslategray;" class="fas fa-calendar-alt"></i>
                  </button>


                </div>


                <div class="form-group">
                  <label for="message" class="col-form-label">Message:</label>
                  <textarea class="form-control" id="message-text" name="message"></textarea>
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

        <form class="form-horizontal" enctype="multipart/form-data" method="POST" action="action.php">
                <input type="hidden" name="rcid" id="rcid" value="">

                <div class="form-group">
                  <label for="image" class="cols-sm-2 control-label">Resolution Picture:</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Upload</span>
                    </div>
                    <div class="custom-file">
                      <input type="file" name="image" class="custom-file-input" id="image" accept=".jpg">
                      <label class="custom-file-label" for="image">Choose file</label>
                    </div>

                        

                            
                                <script>
                            // Add the following code if you want the name of the file appear on select
                            $(".custom-file-input").on("change", function() {
                            var fileName = $(this).val().split("\\").pop();
                            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
                            });
                            </script>

                  </div>
                </div>


                <div class="form-inline">

                  <label for="expected_date" class="col-form-label">Completion Date:</label>

                  <input type="text" class="form-control docs-date text-center w-75" name="expected_date"
                    placeholder="DD-MM-YYYY" autocomplete="off" id="rdatepicker" readonly>

                  <button type="button" class="btn btn-outline-secondary docs-datepicker-trigger ml-2" id="rtriggerBtn"
                    style="height: 35px;">
                    <i style="color:lightslategray;" class="fas fa-calendar-alt"></i>
                  </button>


                </div>


                <input type="submit" class="mt-4 btn btn-success" name="revert">

                <button type="button" class="mt-4 btn btn-danger" data-dismiss="modal">Close</button>

              </form>
            </div>
          </div>
        </div>
      </div>




</body>

</html>