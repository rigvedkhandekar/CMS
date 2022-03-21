<?php

include 'connection.php';
include 'sms.php';

$flag = false;

session_start();


if (!isset ($_SESSION['login']) && $_SESSION['login']==false)
{
	header("location:login.php");
}


else if (isset($_GET['update']))
{
	$cid = $_GET['cid'];

    $query = "UPDATE complaint SET complaint_status = 'Forwarded' where cid = '$cid'";
    
    $result = mysqli_query ($connection,$query);

    if ($result)
    {
    $flag = true;
     header ("location:index.php");
    }

    else
    {
        $flag = false;
    }
}

else if (isset($_GET['delete']))
{

    $cid = $_GET['cid'];

    $query = "DELETE FROM complaint where cid = '$cid'";
    
    $result = mysqli_query ($connection,$query);

    if ($result)
    {
    $flag = true;
    header ("location:index.php");
    }

    else
    {
        $flag = false;
    }
}

else if (isset($_GET['resolved']))
{
	$cid = $_GET['cid'];

    $query = "UPDATE complaint SET complaint_status = 'Resolved' where cid = '$cid'";
    
    $result = mysqli_query ($connection,$query);

    if ($result)
    {
    $flag = true;

$smsObj = new sendSms ("Dear Complainant, Your Complaint #$cid has been resolved.\\n For more details check your complaint status online.",getMobile($cid));   
        

     header ("location:index.php");
    }

    else
    {
        $flag = false;
    }

    
}
    


else if (isset($_GET['forward']))
{


  $cid = $_GET['cid'];
  $category = $_GET['category'];
  $expected_date = $_GET['expected_date'];
  $message = $_GET['message'];


  	$query = "UPDATE complaint SET complaint_status = 'Forwarded', isComplaintForwarded = '1', complaint_fwd_to = '$category', complaint_exp_com_date = '$expected_date', complaint_forward_msg = '$message' where cid = '$cid'";
    echo $query;
    $result = mysqli_query ($connection,$query);

    if ($result)
    {
    $flag = true;
    header ("location:index.php");
    }

    else
    {
        $flag = false;
    }

 }



else if (isset($_POST['revert']))
{

  echo "in revert";
  $cid = $_POST['rcid'];
  echo $cid;
    $image_name = $_FILES['image']['name'];
    $image_tmpname = $_FILES['image'] ['tmp_name'];
    $image_newname =  md5($image_name. time()).".jpg";
    echo $image_newname;


  if (move_uploaded_file($image_tmpname, 'revert_screenshots/'.$image_newname))
{

    $query = "UPDATE complaint SET complaint_status = 'Reverted', isComplaintForwarded = '0', revert_screenshot = '$image_newname' where cid = '$cid'";
    echo $query;
    $result = mysqli_query ($connection,$query);

    if ($result)
    {
    $flag = true;
    header ("location:index.php");
    }

    else
    {
        $flag = false;
    }
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