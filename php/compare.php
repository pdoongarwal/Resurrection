<html>
	<head>
		<title>Compare</title>
		<link href="../css/bootstrap.min.css" rel="stylesheet">
	    <script src="../js/html5shiv.min.js"></script>
	    <script src="../js/respond.min.js"></script>
	    <meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
	    <link rel="stylesheet" href="../css/reset.css"> 
	    <link rel="stylesheet" href="../css/style.css"> 
	    <script src="../js/modernizr.js"></script>
	    <link rel="stylesheet" type="text/css" href="../css/compare.css">
	</head>

	<body>
		<nav class="main-nav navbar navbar-inverse navbar-fixed-top" id ="my-navbar">
			
			<div class = "container-fluid">
			    <div class = "navbar-header">
			      	<button type="button" class ="navbar-toggle" data-toggle = "collapse" data-target ="#navbar-collapse">
				    	<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
				  	</button>
		         	<a href="../php/homepage.php" class="navbar-brand">CFToolkit</a>	
			    </div>
		       
		      	<div class="collapse navbar-collapse" id="navbar-collapse">
		         	<ul class="nav navbar-nav">
				        <li><a href="compete.php">Compete</a>
				        <li><a href='allsub.php'>All Submissions</a>
				        <li><a href="lastsub.php">Last Submissions</a>
				        <li><a href="compare.php">Compare</a>
				        <li><a href="http://www.bugecode.com/">Bug-e-Code</a>
					</ul>
		      	</div>
		    </div>
		</nav>


		<div class="jumbotron" id="search">

	   		<br>
	      
	      	<div class="container text-center">
	      		<h1>Let the Comparison Begin!</h1>
	      		<p></p>
	      		
	      		<div class="row">
				  	<form action="compare.php" method="post">
					  	<div class="col-lg-6">
						    <div class="input-group">
						      <span class="input-group-addon" id="sizing-addon1">@</span>
						      <input type="text" class="form-control" placeholder="Search for..." name='coder1'>
						    </div><!-- /input-group -->
					  	</div><!-- /.col-lg-6 -->
						
						<div class="col-lg-6">
							<div class="input-group">
							    <span class="input-group-addon" id="sizing-addon1">@</span>
							    <input type="text" class="form-control" placeholder="Search for..." name='coder2'>
							    <span class="input-group-btn">
								    <button class="btn btn-default" type="submit">Go!</button>
							    </span>
							</div><!-- /input-group -->
						</div><!-- /.col-lg-6 -->
					</form>
				</div><!-- /.row -->
			</div>
	    </div>


	    <div class="container">

			<div id="table">
				<?php
		            if(!isset($_POST['coder1']) ||  !isset($_POST['coder2']))
		            {
		              	die();
		            }
		    	?>

				<?php


					if(isset($_POST['coder1']) && isset($_POST['coder2'])){
						$coder1=$_POST['coder1'];
                        $coder2=$_POST['coder2'];
				    }		

					
					$url="http://codeforces.com/api/user.info?handles=".$coder1;
					$proxy='172.31.102.29:3128';
					$proxyauth='edcguest:edcguest';
					$ch = curl_init();
					curl_setopt($ch, CURLOPT_URL, $url);

					//curl_setopt($ch,CURLOPT_PROXY,$proxy);
					//curl_setopt($ch,CURLOPT_PROXYUSERPWD,$proxyauth);


					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					$response = curl_exec($ch);  //getting the response from the site in JSON format
					curl_close($ch);

					$response=json_decode($response,true);  //converting it to PHP friendly format
					//values for coder1
					if($response['status']=="FAILED")
					{
					  echo "INVALID USERNAME1 ".$coder1;
					   die();
					}

					$response=$response['result'];
                  	$response=$response[0];
                  	$handle1=$response['handle'];
                  	$rank1=$response['rank'];
                  	$rating1=$response['rating'];
					

                    

					
					$url="http://codeforces.com/api/user.info?handles=".$coder2;
					$proxy='172.31.102.14:3128';
					$proxyauth='edcguest:edcguest';
					$ch = curl_init();
					curl_setopt($ch, CURLOPT_URL, $url);

					//curl_setopt($ch,CURLOPT_PROXY,$proxy);
					//curl_setopt($ch,CURLOPT_PROXYUSERPWD,$proxyauth);


					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					$response = curl_exec($ch);  //getting the response from the site in JSON format
					curl_close($ch);

					$response=json_decode($response,true);  //converting it to PHP friendly format
					//values for coder1
					if($response['status']=="FAILED")
					{
					  echo "INVALID USERNAME ".$coder2;
					   die();
					}

					$response=$response['result'];
                  	$response=$response[0];
                  	$handle2=$response['handle'];
                  	$rank2=$response['rank'];
                  	$rating2=$response['rating'];	
				?>

				<?php
					echo $rank1." : ".$coder1;
					echo "<br>Rating : ".$rating1;
					echo "<br>";
					echo $rank2." : ".$coder2;
					echo "<br>Rating : ".$rating2;
				?>
			</div>
		</div>



		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	    <script src="../js/bootstrap.min.js"></script>
	    <script src="../js/main.js"></script>
	</body>
</html>