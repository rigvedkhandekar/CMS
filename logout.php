<?php

session_start ();
session_destroy ();
?>

<html>

<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Dashboard</title>
    <!------ Include the above in your HEAD tag ---------->
</head>

<body>

    <div class="container">
        <div class="mt-4 row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Principal Dashboard</div>
                    <div class="card-body">

					<div class="alert alert-primary" role="alert">
						You have successfully logged out. <a href="login.php"> click here to login again. </a> 
					</div>
                       
                    </div>

                </div>
            </div>
        </div>
    </div>

</body>

</html>
<?
header ("refresh:3; url:login.php;");
?>