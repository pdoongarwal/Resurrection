<html>

	<head>
		<title>Compete</title>
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="../css/compete.css">
	    <script src="../js/html5shiv.min.js"></script>
	    <script src="../js/respond.min.js"></script>
	</head>

	<body>
		<nav class = "navbar navbar-default navbar-fixed-top" id ="my-navbar">
			<div class = "container-fluid">
			    <div class = "navbar-header">
			      	<button type="button" class ="navbar-toggle" data-toggle = "collapse" data-target ="#navbar-collapse">
				    	<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
				  	</button>
		         	<a href="#" class="navbar-brand">CF Toolkit</a>	
			    </div>
		       
		      	<div class="collapse navbar-collapse" id="navbar-collapse">
		         	<ul class="nav navbar-nav">
					</ul>
		      	</div>
		    </div>
	   	</nav>

	   	<div class="jumbotron" id="search">
	      
	      	<div class="container text-center">
	      		<h1>Let the Comparison Begin!</h1>
	      		<p></p>
	      		
	      		<div class="row">
				  	<form action="compete.php" method="post">
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

			<div>
				<?php

					function getNumberFromRank($rank) {
						if($rank=='newbie')
							return 1;
						else if($rank=='pupil')
							return 2;
						else if($rank=='specialist')
							return 3;
						else if($rank=='expert')
							return 4;
						else if($rank=='candidate master')
							return 5;
						else if($rank=='master')
							return 6;
						else if($rank=='international master')
							return 7;
						else if($rank=='grandmaster')
							return 8;
						else if($rank=='international grandmaster')
							return 9;
						else
							return 10;
					}

					$coder1="MayankPratap";
					$url="http://codeforces.com/api/user.info?handles=".$coder1;
					$proxy='172.31.102.14:3128';
					$proxyauth='edcguest:edcguest';
					$ch = curl_init();
					curl_setopt($ch, CURLOPT_URL, $url);

					curl_setopt($ch,CURLOPT_PROXY,$proxy);
					curl_setopt($ch,CURLOPT_PROXYUSERPWD,$proxyauth);


					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					$response = curl_exec($ch);  //getting the response from the site in JSON format
					curl_close($ch);

					$response=json_decode($response,true);  //converting it to PHP friendly format
					//values for coder1
					if($response['status']=="FAILED")
					{
					  echo "INVALID USERNAME ".$coder1;
					   die();
					}
					$response=$response['result'];
					$response=$response[0];
					//echo $another[0]['handle'];
					$handle1=$response['handle'];
					$country1=$response['country'];
					$organization1=$response['organization'];
					$rank1=$response['rank'];
					$rating1=$response['rating'];
					$maxrank1=$response['maxRank'];
					$maxrating1=$response['maxRating'];
					$name1=$response['firstName'];
					$name1=$name1." ";
					$name1.=$response['lastName'];
					$contribution1=$response['contribution'];
					$registartionTimeSeconds1=$response['registrationTimeSeconds'];



					$coder2="tourist";
					$url="http://codeforces.com/api/user.info?handles=".$coder2;
					$proxy='172.31.102.14:3128';
					$proxyauth='edcguest:edcguest';
					$ch = curl_init();
					curl_setopt($ch, CURLOPT_URL, $url);

					curl_setopt($ch,CURLOPT_PROXY,$proxy);
					curl_setopt($ch,CURLOPT_PROXYUSERPWD,$proxyauth);


					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					$response = curl_exec($ch);  //getting the response from the site in JSON format
					curl_close($ch);

					$response=json_decode($response,true);  //converting it to PHP friendly format
					//values for coder1
					if($response['status']!="OK")
					{
					  echo "INVALID USERNAME ".$coder2;
					   die();
					}
					$response=$response['result'];
					$response=$response[0];
					//echo $another[0]['handle'];
					$handle2=$response['handle'];
					$country2=$response['country'];
					$organization2=$response['organization'];
					$rank2=$response['rank'];
					$rating2=$response['rating'];
					$maxrank2=$response['maxRank'];
					$maxrating2=$response['maxRating'];
					$name2=$response['firstName'];
					$name2=$name2." ";
					$name2.=$response['lastName'];
					$contribution2=$response['contribution'];
					$registartionTimeSeconds2=$response['registrationTimeSeconds'];




					$totalrating = $rating1 + $rating2;
					$percent1 = ROUND($rating1*100/$totalrating);
					$percent2 = ROUND($rating2*100/$totalrating);

					$totalmaxrating = $maxrating1 + $maxrating2;
					$maxpercent1 = ROUND($maxrating1*100/$totalmaxrating);
					$maxpercent2 = ROUND($maxrating2*100/$totalmaxrating);

					$totalcontribution = $contribution1 + $contribution2;
					if($totalcontribution == 0) {
						$contripercent1 = 50;
						$contripercent2 = 50;
					}
					else {
						$contripercent1 = ROUND($contribution1*100/$totalcontribution);
						$contripercent2 = ROUND($contribution2*100/$totalcontribution);
					}



					$val_rank1 = getNumberFromRank($rank1);
					$val_rank2 = getNumberFromRank($rank2);
					$val_maxrank1 = getNumberFromRank($maxrank1);
					$val_maxrank2 = getNumberFromRank($maxrank2);

					$totalval_rank = $val_rank1 + $val_rank2;
					$val_percent1 = ROUND($val_rank1*100/$totalval_rank);
					$val_percent2 = ROUND($val_rank2*100/$totalval_rank);

					$totalval_maxrank = $val_maxrank1 + $val_maxrank2;
					$maxval_percent1 = ROUND($val_maxrank1*100/$totalval_maxrank);
					$maxval_percent2 = ROUND($val_maxrank2*100/$totalval_maxrank);
				?>
			</div>
		</div>

		<table class="table" width='70%'>
			<tr>
				<td align='center'>
					<?php
						echo $handle1;
					?>
				</td>
				
				<td>
				</td>
				
				<td align='center'>
					<?php
						echo $handle2;
					?>
				</td>
			</tr>

			<tr>
				<td align='center'>
					<?php
						echo "<img src=http://codeforces.com/userphoto/title/".$handle1."/photo.jpg height='200px width='200px'></img>";
					?>
				</td>
				
				<td align='center'>
					<img src="../images/vs.jpeg" height='200px' width='200px'>
				</td>
				
				<td align='center'>
					<?php
						echo "<img src=http://codeforces.com/userphoto/title/".$handle2."/photo.jpg height='200px width='200px'></img>";
					?>
				</td>
			</tr>

			<tr>
				<td align='center'>
					<?php
						echo $country1.'<br>';
					?>
				</td>
				
				<td>
				</td>
				
				<td  align='center'>
					<?php
						echo $country2.'<br>';
					?>
				</td>
			</tr>

			<tr>
				<td align='center'>
					<?php
						echo 'Rating: '.$rating1;
					?>
				</td>
				
				<td>
					<div class="progress">
						<?php
						echo '<div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: '.$percent1.'%">';
						?>
					    	<?php
								echo $percent1.'%';
							?>
					  	</div>
					  	<?php
					  	echo '<div div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: '.$percent2.'%">';
					  	?>
					    	<?php
								echo $percent2.'%';
							?>
					  	</div>
					</div>
				</td>
				
				<td align='center'>
					<?php
						echo 'Rating: '.$rating2;
					?>
				</td>
			</tr>

			<tr>
				<td align='center'>
					<?php
						echo 'Max Rating: '.$maxrating1;
					?>
				</td>
				
				<td>
					<div class="progress">
						<?php
						echo '<div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: '.$maxpercent1.'%">';
						?>
					    	<?php
								echo $maxpercent1.'%';
							?>
					  	</div>
					  	<?php
					  	echo '<div div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: '.$maxpercent2.'%">';
					  	?>
					    	<?php
								echo $maxpercent2.'%';
							?>
					  	</div>
					</div>
				</td>
				
				<td align='center'>
					<?php
						echo 'Max Rating: '.$maxrating2;
					?>
				</td>
			</tr>

			<tr>
				<td align='center'>
					<?php
						echo 'Organization: '.$organization1;
					?>
				</td>
				
				<td>
				</td>
				
				<td align='center'>
					<?php
						echo 'Organization: '.$organization2;
					?>
				</td>
			</tr>

			<tr>
				<td align='center'>
					<?php
						echo 'Current Rank: '.$rank1;
					?>
				</td>
				
				<td width = '400px'>
					<div class="progress">
						<?php
						echo '<div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: '.$val_percent1.'%">';
						?>
					    	<?php
								echo $val_percent1.'%';
							?>
					  	</div>
					  	<?php
					  	echo '<div div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: '.$val_percent2.'%">';
					  	?>
					    	<?php
								echo $val_percent2.'%';
							?>
					  	</div>
					</div>
				</td>
				
				<td align='center'>
					<?php
						echo 'Current Rank: '.$rank2;
					?>
				</td>
			</tr>

			<tr>
				<td align='center'>
					<?php
						echo 'Highest Rank: '.$maxrank1;
					?>
				</td>
				
				<td>
					<div class="progress">
						<?php
						echo '<div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: '.$maxval_percent1.'%">';
						?>
					    	<?php
								echo $maxval_percent1.'%';
							?>
					  	</div>
					  	<?php
					  	echo '<div div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: '.$maxval_percent2.'%">';
					  	?>
					    	<?php
								echo $maxval_percent2.'%';
							?>
					  	</div>
					</div>
				</td>
				
				<td align='center'>
					<?php
						echo 'Highest Rank: '.$maxrank2;
					?>
				</td>
			</tr>

			<tr>
				<td align='center'>
					<?php
						echo 'Contribution: '.$contribution1;
					?>
				</td>
				
				<td>
					<div class="progress">
						<?php
						echo '<div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: '.$contripercent1.'%">';
						?>
					    	<?php
								echo $contripercent1.'%';
							?>
					  	</div>
					  	<?php
					  	echo '<div div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: '.$contripercent2.'%">';
					  	?>
					    	<?php
								echo $contripercent2.'%';
							?>
					  	</div>
					</div>
				</td>
				
				<td align='center'>
					<?php
						echo 'Contribution: '.$contribution2;
					?>
				</td>
			</tr>


		</table>

	   	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	    <script src="../js/bootstrap.min.js"></script>
	</body>
</html>
