<?php 
session_start();
require('dbc.php');
require('config.php');
date_default_timezone_set('UTC');
require('fpdf/fpdf.php');



//We check if the users ID is defined


	


class PDF_result extends FPDF {
	function __construct ($orientation = 'P', $unit = 'pt', $format = 'Letter', $margin = 40) {
		$this->FPDF($orientation, $unit, $format);
		$this->SetTopMargin($margin);
		$this->SetLeftMargin($margin);
		$this->SetRightMargin($margin);
		
		$this->SetAutoPageBreak(true, $margin);
	}
	
	function Header () {
	    // $this->Image('employee-separation-process.jpg',50,0,150);

	//	$this->SetFont('Arial', 'B', 20);
	//	$this->SetFillColor(36, 96, 84);
	//	$this->SetTextColor(225);
	//	$this->Cell(0, 30, "YouHack MCQ Results", 0, 1, 'C', true);
	}
	
 function Footer()
{
    //Position at 1.5 cm from bottom
    //$this->SetY(-15);
    //Arial italic 8
    //$this->SetFont('Arial','I',8);
    //Page number
    //$this->Cell(0,10,'Generated at YouHack.me',0,0,'C');
}

	
function Generate_Table($subjects, $marks) {
	
	$this->SetFont('Arial', 'B', 12);
	$this->SetTextColor(0);
//	$this->SetFillColor(94, 188, z);
$this->SetFillColor(94, 188, 225);
	$this->SetLineWidth(1);
	$this->Cell(427, 25, "Subjects", 'LTR', 0, 'C', true);
	$this->Cell(100, 25, "Marks", 'LTR', 1, 'C', true);
	 
	$this->SetFont('Arial', '');
	$this->SetFillColor(238);
	$this->SetLineWidth(0.2);
	$fill = false;
	
	for ($i = 0; $i < count($subjects); $i++) {
		$this->Cell(427, 20, $subjects[$i], 1, 0, 'L', $fill);
		$this->Cell(100, 20,  $marks[$i], 1, 1, 'R', $fill);
		$fill = !$fill;
	}
	//$this->SetX(367);
	//$this->Cell(100, 20, "Total", 1);
//	$this->Cell(100, 20,  array_sum($marks), 1, 1, 'R');
}
}

$pdf = new PDF_result();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetY(100);

//$pdf->Cell(100, 13, "Student Details");
$pdf->SetFont('Arial', '');

//$pdf->Cell(250, 13, $_POST['name']);

//$pdf->SetFont('Arial', 'B');
$pdf->SetFont('Arial', 'B');
$res = "Resignation Letter

";
$pdf->MultiCell(0, 15, $res);
$pdf->Cell(50, 13, "Date:");
$pdf->SetFont('Arial', '');
$pdf->Cell(100, 13, date('F j, Y'), 0, 1);

$pdf->SetFont('Arial', 'I');
//$pdf->SetX(140);
//$pdf->Cell(200, 15, $_POST['e-mail'], 0, 2);
//$pdf->Cell(200, 15, $_POST['Address'] . ',' . $_POST['City'] , 0, 2);
//$pdf->Cell(200, 15, $_POST['Country'], 0, 2);

//$pdf->Ln(100);

//$pdf->Generate_Table($_POST['subjects'], $_POST['Marks']);
$pdf->Ln(10);
//$pdf->Ln(50);
$pdf->SetFont('Arial', '');
$message = "To,
Director,
Jaipur Shop Info,
Nirwana Boys Hostel

Dear Mr. Akash Singhal,
Please accept this letter as my two-week notice of resignation. My last day of work will be <Date>.
While I have been very satisfied at <Company Name>, I have decided to make this move to advance my career. I have enjoyed working with you and appreciate the opportunities I have been given here.
I hope two week notice is sufficient for you to find a replacement for me. If I can help to train my replacement or tie up any loose ends, please let me know.

Thank you very much for the opportunity to work here.
Sincerely,

";

$pdf->MultiCell(0, 15, $message);

	//We check if the user exists
	$dn = mysql_query('select username from users where username="'.$_SESSION['username'].'"');
	if(mysql_num_rows($dn)>0){
		$dnn = mysql_fetch_array($dn);
		$pdf->Cell(0, 0, $dnn['username']);
		$user = $dnn['username'];
		$pdf->Output("pdfs/$user".".pdf", "F");
	}
//$pdf->Cell(0, 0, $dnn['username']);
//$pdf->SetFont('Arial', 'U', 12);
//$pdf->SetTextColor(1, 162, 0);

//$pdf->Write(13, "admin@youhack.me", "mailto:example@example.com");

//$pdf->Output('result.pdf', 'F');

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
</br></br>
<!-- /.row -->
<div class="row">
                
				 <div class="col-lg-10">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Resignation Letter
                        </div>
                        <div class="panel-body">
                           <?php
//We check if the users ID is defined
$message = "<strong>To,</br>
Director,</br>
Jaipur Shop Info,</br>
Nirwana Boys Hostel</br>
</br>
Dear Mr. Akash Singhal,</br>
Please accept this letter as my two-week notice of resignation. My last day of work will be today.</br>
While I have been very satisfied at Jaipur Shop Info, I have decided to make this move to advance my career. I have enjoyed working with you and appreciate the opportunities I have been given here.</br>
I hope two week notice is sufficient for you to find a replacement for me. If I can help to train my replacement or tie up any loose ends, please let me know.</br>
</br>
Thank you very much for the opportunity to work here.</br>
Sincerely,</br></strong>

";

echo $message;
//$id = intval($_GET['id']);
	//We check if the user exists
	$dn = mysql_query('select username from users where username="'.$_SESSION['username'].'"');
	if(mysql_num_rows($dn)>0){
		$dnn = mysql_fetch_array($dn);
		echo "<strong>" . $dnn['username'] . "</strong>";
		$user = $dnn['username'];
	?>
                        </div>
                        <div class="panel-footer">
	<a target="_blank"  href="<?php echo "pdfs/$user".".pdf";}?>" ><p class="fa fa-file-pdf-o"> Download PDF File </p></a><br/>
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
                    </div>
                    
                    <?php
                    $uu = $_SESSION['username'];
                    $qq = mysql_query("select * from resign_app where emp_name='$uu' ");
                    $dn2 = mysql_fetch_array($qq);
                    if(isset($dn2)){
                     if($dn2['apply_app']=="y")
                     {
                    
                    ?>
                    <button type="button" id="cancel_resignation" class="btn btn-success">Cancel Resignation</button>
                    
                    <?php 
                    }
                    else{
                    ?>
                    <button type="button" id="resignation" class="btn btn-success">Send Resignation</button>
                    
                    <?php
                    }
                    }
                    
                    ?>
                    
                    
                    <?php
                    $uu1 = $_SESSION['username'];
                    $qq1 = mysql_query("select * from resign_app where emp_name='$uu1' ");
                    $dn21 = mysql_fetch_array($qq1);
                    if(isset($dn21)){
                     if($dn2['shop_canteen_status']=="y")
                     {
                    	
                    ?>
                    <button type="button" id="total_dues" class="btn btn-success">Total Dues</button>
                    <?php
                    }
                    }
                    ?>
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
    <script>
			$(document).ready(function() {
				$('#resignation').click(function (e) {
					document.location.href = "resign.php";
				})
			});
	</script>
	<script>
			$(document).ready(function() {
				$('#cancel_resignation').click(function (e) {
					document.location.href = "cancel_app.php";
				})
			});
	</script>
	
	<script>
			$(document).ready(function() {
				$('#total_dues').click(function (e) {
					document.location.href = "total_dues.php";
				})
			});
	</script>
		
		</div>
		</div>
</body>
</html>	