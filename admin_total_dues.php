<?php 
session_start();
require('dbc.php');
require('config.php');
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

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include("header1.php"); ?>
		
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Total Dues</h1>
                    </div>
                    
                    
                    
                    <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Total Dues
                        </div>
                        <!-- /.panel-heading -->
                    
                    
                    <div class="panel-body">
                          <div class="table-responsive">
			  <table class="table">
                                    <thead>
                                        <tr>
											
                                            <th>Employee Id</th>
				            <th>Employee Name</th>					
					    <th>Total Dues</th>
											
                                        </tr>
                                   <?php
                    include('dbc.php');
		    include('config.php');
		    $ww = mysql_query("select emp_id, sum(dues) as sum from shop_dues group by emp_id; ");
                    
                    while($wq= mysql_fetch_array($ww)){
                   		$iid =  $wq['emp_id'];
                   		//echo $wq['sum'];
                     
                    $ww1 = mysql_query("select username from users where id = $iid");
                    while($wq1= mysql_fetch_array($ww1)){
                    ?>
					<tr>
		
    						<td class="left"><?php echo $wq['emp_id']; ?></td>
    						<td><?php echo $wq1['username']; ?></td>
    						<td><?php echo $wq['sum'] . '₹'; ?></td>
    	
	 
   					 </tr>
   					 <?php } }?>
   					 
  			</table>

<div class="panel-footer">
		<p> <?php// echo $c . '₹'; ?></p>
		<a href="http://www.esep.testweb.in/bower_components/morrisjs/examples/area.php"><button type="button" class="btn btn-info">Analysis</button></a>
	</div>
		
                            </div>
                       
                       
                    </div>
                    
                </div>
                    
                    
                    
                    
                    
                    
                    
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>

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