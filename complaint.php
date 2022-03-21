<?php

include 'connection.php';
include 'sms.php';

$flag = false;


if (isset ($_POST['register']))
{

    if(!isset($_FILES['image']) || $_FILES['image']['error'] == UPLOAD_ERR_NO_FILE)
    {
        $screenshotFlag = 'false';
    }
    else
    {
            $screenshotFlag = 'true';
           $image_name = $_FILES['image']['name'];
           $image_tmpname = $_FILES['image'] ['tmp_name'];
           $image_newname =  md5($image_name. time()).".jpg";
    }





    $name = $_POST['name'];
	$contact = $_POST['contact'];
    $dept = $_POST['dept'];
	$year = $_POST['year'];
    $rn = $_POST['rn'];
    $category = $_POST['category'];
    $message = $_POST['message'];
	$cid = rand(1000,10000);

    // echo $screenshotFlag;

    if($screenshotFlag=='true')
    {
        if (move_uploaded_file($image_tmpname, 'screenshots/'.$image_newname))
    {
        $query = "INSERT INTO complaint VALUES ('$cid','$name','$contact','$dept','$year','$rn','$category','$message','Under Scrutiny','$image_newname',NULL,NULL,NULL,NULL,NULL)";
             $result = mysqli_query ($connection,$query);
        // echo $query;
     }
    }
 else
 {
        $query = "INSERT INTO complaint VALUES ('$cid','$name','$contact','$dept','$year','$rn','$category','$message','Under Scrutiny',NULL,NULL,NULL,NULL,NULL,NULL)";
             $result = mysqli_query ($connection,$query);
 }

    // echo $query;


        if ($result)
        {
            $flag = true;
            $smsObj = new sendSms ("Dear Complainant, Your Complaint #$cid has been resolved.\\n For more details check your complaint status online.",getMobile($cid));
        }

        else
        {
            $flag = false;
        }

}










function getMobile ($cid)
 {
    $getMobile = "select complainant_contact from complaint where cid = '$cid'";
    $result = mysqli_query ($GLOBALS ['connection'],$getMobile);
    $contact = mysqli_fetch_assoc ($result);
    $contact = $contact['complainant_contact'];

    return $contact;
 }


?>


<html>

<head>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <title>Junior College Complaint Portal</title>

    <!------ Include the above in your HEAD tag ---------->
</head>

<body>



    <div class="container">

                            <?php

if ($flag)
{
  echo "<script>
       Swal.fire(
       {
        icon : 'success',
        title: 'Complaint has been Registered.',
        html: 'We will get back to you in 24 working hrs. <br> <div class=pt-2>  Your Complaint id is : $cid </div>',
        footer: '<a href=status.php>Check Complaint Status</a>'
       })
         </script>";
}           ?>


        <div class="mt-4 row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Babasaheb Gawde Institute of Technology Complaint Portal</div>
                    <div class="card-body">

                        <form class="form-horizontal" enctype="multipart/form-data" method="POST" action="complaint.php">

                        	    <div class="form-group">
                                <label for="name" class="cols-sm-2 control-label">Full Name</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user fa"
                                                aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="name" id="name"
                                            placeholder="Enter your Name" required/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="contact" class="cols-sm-2 control-label">Contact No.</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user fa"
                                                aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="contact" id="contact"
                                            placeholder="Enter your Contact No." required />
                                    </div>
                                </div>
                            </div>

                                <div class="row">
                                <div class="col-6">
                              <div class="form-group">
                                <div> <label class="cols-sm-2 control-label" for="dept">Department</label> </div>
                                <select name="dept" class="custom-select">
                                    <option disabled selected>Select Department</option>
                                    <option value="401">Computer Engineering</option>
                                    <option value="402">Computer Technology</option>
                                    <option value="403">Electronics & Telecommunication</option>
                                    </select>
                            </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                  <div> <label class="cols-sm-2 control-label" for="year">Year</label> </div>
                                  <select name="year" class="custom-select">
                                      <option disabled selected>Select Year</option>
                                      <option value="1">1st</option>
                                      <option value="2">2nd</option>
                                      <option value="3">3rd</option>

                                      </select>
                              </div>
                              </div>
                            </div>


                            <div class="form-group">
						<label class="cols-sm-2 control-label" for="rn">Roll No.</label>
						<input type="number" min="1" class="form-control" placeholder="Roll No." id="rn" name="rn" required>

                            </div>

                            <div class="form-group">
                                <div> <label class="cols-sm-2 control-label" for="category">Complaint Type</label> </div>
                                <select name="category" class="custom-select">
                                    <option disabled selected>Select</option>
                                    <option value="132">Accounts</option>
                                    <option value="133">College Maintenance</option>
                                    <option value="135">Faculty Behavior</option>
                                    <option value="137">Lab Related</option>
                                    <option value="138">Toilet Hygiene</option>
                                    <option value="139">Ragging</option>
                                    <option value="136">Student</option>
                                    <option value="134">Curriculum</option>
                                    <option value="145">Events</option>
                                    <option value="155">Parking</option>
                                    <option value="160">Other</option>
                                </select>
                            </div>


                            <div class="form-group">
                                <label for="name" class="cols-sm-2 control-label">Message</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user fa"
                                                aria-hidden="true"></i></span>
                                        <textarea class="form-control" rows="5" id="message" name="message" required></textarea>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                            <label for="image" class="cols-sm-2 control-label">Screenshot</label>
                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Upload</span>
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


                            <div class="pt-3 form-group ">
                                <button type="submit" name="register"
                                    class="btn btn-success btn-lg btn-block login-button">Submit Complaint</button>
                            </div>



                            <div class="login-register text-center">
                                <a href="status.php">Check Complaint Status</a>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

</body>

</html>
