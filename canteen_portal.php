<?php 
session_start();
require('dbc.php');
require('config.php');
date_default_timezone_set('UTC');
//require('fpdf/fpdf.php');



//We check if the users ID is defined


	




?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Portal</title>

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
    
    
<script type="text/javascript">
	function sum() {
            var txtFirstNumberValue = document.getElementById('price').value;
            var txtSecondNumberValue = document.getElementById('paid').value;
            var result = parseFloat(txtFirstNumberValue) - parseFloat(txtSecondNumberValue);
            if (!isNaN(result)) {
                document.getElementById('dues').value = result;
            }
        }
    </script>



</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include("header1.php"); ?>
		
<div id="page-wrapper">
</br></br>
<!-- /.row -->
<div class="row">
                
				 <div class="col-lg-10">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Canteen Dues Form
                        </div>
                        
                        <div class="panel-body">
                          <form role="form" action="canteen_update.php"  method="post">
                                        <div class="form-group">
                                            
                                            <input id="emp_id" name="emp_id" class="form-control" placeholder="Enter employee id" required>
                           </div>
                           <div class="form-group">
                                            
                                            <input id="name_stuff" name="name_stuff"  class="form-control" placeholder="Enter name of goods" required>
                           </div>
                           <div class="form-group">
                                             
                                            <input id="shop_id" name="shop_id" class="form-control" placeholder="Enter shop id" value="1">
                                        </div>
                                        <div class="form-group">
                                            
                                            <input type="text" onkeyup="sum();" id="price" name="price" class="form-control" placeholder="Enter price" required>
                                        </div>
                                        <div class="form-group">
                                            
                                            <input type="text" onkeyup="sum();" id="paid"  name="paid" class="form-control" placeholder="Enter paid ammount" required>
                                        </div>
                                        <div class="form-group">
                                            
                                            <input  type="text" id="dues"  name="dues" class="form-control" placeholder="Enter due ammount" required>
                                            
                                        </div>
                                        <input tabindex="1" class="btn btn-lg btn-success btn-block" type="submit" value="submit"></br>
                              </form>
                       
                        <?php if(isset($_GET['error']))
							{
							  echo '<div class="alert alert-error">';
							  echo '<a href="#" class="close" data-dismiss="alert">&times;</a>';
							  echo '<strong>Attention!&emsp;</strong>';
							  echo ''.$_GET['error'].'';
							  echo "</br>";
							  echo '</div>';
							
							} 
							
							?>
                    </div>
                    
                </div>
				</div>
           
		</div>
		



            <!-- /.row -->
           
            <!-- /.row -->
            
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
    
    
	
		
		</div>
		</div>
</body>
</html>	