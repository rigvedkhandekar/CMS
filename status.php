<?php

include 'connection.php';

$flag = false;


if (isset ($_POST['check']))
{

    $cid = $_POST['cid'];


$query = "Select complaint_status,revert_screenshot from complaint where cid = '$cid'";

$result = mysqli_query ($connection,$query);
$data = mysqli_fetch_assoc ($result);

if ($result)
{
 $flag = true;

}

else
{
    $flag = false;
}



}


?>


<html>

<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Complaint Status</title>
    <!------ Include the above in your HEAD tag ---------->
</head>

<body>

    <div class="container">
        <div class="mt-4 row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Junior College Complaint Status</div>
                    <div class="card-body">

                        <form class="form-horizontal" method="POST" action="status.php">

                            <div class="form-group">
                                <label for="email" class="cols-sm-2 control-label">Complaint Id</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user fa"
                                                aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="cid" id="cid"
                                            placeholder="Complaint id" required />
                                    </div>
                                </div>
                            </div>



                            <div class="pt-2 form-group ">
                                <button type="submit" name="check"
                                    class="btn btn-success btn-lg btn-block login-button">Check Status</button>
                            </div>

                            <?php

if ($flag)
{
?>
<div class="m-3 alert alert-success alert-dismissible fade show" role="alert">
   Your Complaint status is : <?php echo $data['complaint_status']; ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
<?php
if ($data['complaint_status']=='Resolved')
{
	?>
<center>
<div class="container mb-3">
  <h2>Your Complaint is Resolved.</h2>
  <?php
  if ($data['revert_screenshot'] != NULL)
  {
  ?>
    <p>Here's what concrened department has reverted.</p>
    <img src="<?php echo "revert_screenshots/".$data['revert_screenshot']?>" class="rounded" alt="Cinque Terre" width="304" height="236" style=" border: 2px solid black;
    border-radius: 25px;;">
  </div></center>

  <?php
}
}
}
?>







                            <div class="login-register text-center">
                                <a href="complaint.php">Register Complaint</a>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

</body>

</html>
