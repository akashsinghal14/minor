<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>E-Separation Portal</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<script>
		function checkPass()
{
    //Store the password field objects into variables ...
    var pass1 = document.getElementById('password');
    var pass2 = document.getElementById('retypepassword');
    //Store the Confimation Message Object ...
    var message = document.getElementById('confirmMessage');
    //Set the colors we will be using ...
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
    //Compare the values in the password field 
    //and the confirmation field
    if(pass1.value == pass2.value){
        //The passwords match. 
        //Set the color to the good color and inform
        //the user that they have entered the correct password 
        pass2.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "Passwords Match!"
    }else{
        //The passwords do not match.
        //Set the color to the bad color and
        //notify the user.
        pass2.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "Passwords Do Not Match!"
    }
}  
		</script>
</head>

<body>

    <div class="container">
    
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                
                    <div class="panel-heading">
                        <h3 class="panel-title">Registration Page</h3>
                    </div>
                    <div class="panel-body">
                        <form action="register.php" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="username" id="username" name="username" type="username" autofocus required>
                                </div>
								
								<div class="form-group">
                                    <input class="form-control" placeholder="email" id="email" name="email" type="email" autofocus required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" id="password" name="password" type="password" password="password" required>
                                </div>
								 <div class="form-group">
                                    <input class="form-control" placeholder="Retype Your Password" id="retypepassword" name="retypepassword" type="password" required onkeyup="checkPass(); return false;">
                                   <span id="confirmMessage" class="confirmMessage"></span>
                                </div>
                                
								
                                <input tabindex="3" class="btn btn-lg btn-success btn-block" type="submit" value="Create Your Account" name="submit"></br>
                                
                                
                                <!-- Change this to a button or input when using this as a form -->
                                
                                
             
                            </fieldset>
                        </form>
                        
                       <a href="login_page.php"><input tabindex="3" class="btn btn-lg btn-success btn-block" type="submit" value="Login" name="submit"></br></a>
                        
						 
                    </div>
					
					<?php if(isset($_GET['error']))
							{
							  echo '<div class="alert alert-error">';
							  echo '<a href="#" class="close" data-dismiss="alert">&times;</a>';
							  echo '<strong>Warning!&emsp;</strong>';
							  echo ''.$_GET['error'].'';
							  echo "</br>";
							  echo '</div>';
							} 
							
							?>
                </div>
				<div class="row">
                <div class="col-lg-6">
                    
                        <!-- /.panel-heading -->
                        <a href="register_page.php" class="panel-body">
                            
                           
                                  
							
            </a>
        </div>
    </div>

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>