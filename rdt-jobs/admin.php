<!-- html/php program by Eric Adamian -->
<!-- admin controls page; updates jobs to be displayed on index.php -->

<?php
	session_start();
?>		

<!DOCTYPE html>
<html lang="en">

	<!-- head metadata -->
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale = 1, shrink-to-fit = no">
		<title>Admin Controls: Update Jobs</title>
		<meta name="author" content="Eric Adamian">
        <meta name="description" content="Admin controls page to update job listings.">
        <? include 'bootstrap.php'; ?>
        <link rel="stylesheet" href="styles.css?v=<?php echo time(); ?>">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="shortcut icon" type="image/png" href="other/img/rdt_favicon.png">
	</head>

	<body>

		<!-- header -->
	    <header class="header">
	    	<a href="index.php" class="logout"><b>Logout</b></a>
	        <img class = "logo "src="other/img/pcc_logo.png" height= "137"/>
	        <h1 class="title" >Admin Controls</h1>
	        <h2 class="subtitle">Update Jobs</h2>
	    </header>


		<!-- table grid -->
		<div class="table-grid">
			<div class="grid-header-1">Current Job Listings</div>

			<!-- bootstrap design -->
        	<table class="table table-bordered table-striped"> 

            	<tr class="table-header">
		    		<th>Job Name</th>
		    		<th>Posting Date</th>
		    		<th>Job Description</th>
		    		<th>Experience</th>
		    		<th>Contact Information</th>
		    		<th>Job Link</th>
		    		<th>Delete</th>
			    </tr>


			    <?
		    		include 'connect.php';

		        	// query and select data from phpmyadmin table 
		            $stmt = $pdo->query("SELECT * from jobs_table");

		            // foreach to retrieve multiple rows from a statement
		            foreach ($stmt as $row) {

		            	// proper formatting for table when adding a job
	                    echo "<tr>";
	                    $id = $row['id'];

			    		for($i = 1; $i < 7; $i++) {

		                	// user input replacing \n with <br> for proper spacing/formatting
		                	$temp = $row[$i];
	                        $temp = str_replace("\n", "<br>", $temp);

		    	
	                        if ($i == 1) {
	                            echo "<td style='vertical-align: middle; text-align: center; padding-left: 30px;'><p style='width:100%; max-width:120px;'>".$row[$i]."</p></td>";
	                        }elseif ($i == 2) {
	                            echo "<td style='vertical-align: middle; text-align: center; padding-left: 30px;'><p style='width:100%; max-width:70px;'>".$row[$i]."</p></td>"; 
	                        }elseif ($i == 3) {
	                            echo "<td style='vertical-align: middle;'><p style='width:100%; max-width:350px;'>".$temp."</p></td>"; 
	                        }elseif ($i == 4) {
	                        	echo "<td style='vertical-align: middle;'><p style='width:100%; max-width:120px;'>".$temp."</p></td>"; 
	                        }elseif ($i == 5) {
	                        	echo "<td style='vertical-align: middle; text-align: center; padding-left: 50px;'><p style='width:100%; max-width:180px;'>".$temp."</p></td>"; 
	                        }elseif ($i == 6) {
	                        	if($row[$i] == "") {
	                        		echo'<td></td>';
	                        	}else {
	                        		echo "<td style='vertical-align: middle;'><p style='width:100%; max-width:100px; text-align: center;'><a href='".$row[$i]."'>Job Link</a></p></td>";
	                        	}
	                        }             
                    	}
		    			
		    			echo "<td style='text-align:center; vertical-align: middle; padding-bottom: 25px;'><a href='process.php?id=$id'>Delete</a></td>";

		    			echo "</tr>";	                    
		    		}
			    ?>
				</table>
			</form>	
		</div>

		<!-- add job grid -->
		<div class = "add-job-grid">
			<form action="process.php" method="post">

				<div class="grid-header-2">Add a Job</div>

				<div class="job-input-title">Job Name</div>
					<input class="job-input" type="text" placeholder="Job Name" name="name" id="name">

				<div class="job-input-title">Posting Date</div>
					<input class="job-input" type="text" maxlength="100" placeholder="Posting Date" name="posting_date" id="posting_date">

				<div class="job-input-title">Job Description</div>
					<textarea class="job-input" type="text" placeholder="Job Description" name="description" id="description" cols="20" rows="5"></textarea>

				<div class="job-input-title">Experience</div>
					<textarea class="job-input" type="text" placeholder="Experience" name="experience" id="experience" cols="20" rows="5"></textarea>

				<div class="job-input-title">Contact Information</div>
					<textarea class="job-input" type="text" placeholder="Contact Information" name="contact" id="contact" cols="20" rows="5"></textarea>

				<div class="job-input-title">Link</div>
					<textarea class="job-input" type="text" placeholder="Link" name="link" id="link" cols="20" rows="5"></textarea>

				<div class="link-note"><i>Note: Links not accessible without <br> proper HTTP formatting (ie. pasadena.edu <br> vs. https://pasadena.edu/)</i></div>

				<center><input class= "add-button" type="submit" value='Add'></center>
			</form>
	    </div> 
	</body>
</html>