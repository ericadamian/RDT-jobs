<!-- html/php/js program by Eric Adamian -->
<!-- website main page; displays job listings that can be updated by an administrator -->

<?php
	session_start();

	// destroying each session for admin.php logout
	if(isset($_GET['logout'])){
		session_destroy();
	}
?>

<!DOCTYPE html>
<html lang="en">
	
	<!-- head metadata -->
    <head>
        <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale = 1, shrink-to-fit = no">
		<title>Job Listings: Restorative Dental Technology</title>
		<meta name="author" content="Eric Adamian">
        <meta name="description" content="Job listings website that can be updated by an administrator.">
        <? include 'bootstrap.php'; ?>
        <link rel="stylesheet" href="styles.css?v=<?php echo time(); ?>">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="shortcut icon" type="image/png" href="other/img/rdt_favicon.png">
        <script src="https://use.fontawesome.com/c2642fff9e.js"></script>
    </head>

    <body>

    	<!-- top navigation bar -->
        <div class="top-nav">
            <a href="https://pasadena.edu/">PCC Homepage</a>
            <a href="https://pasadena.edu/academics/divisions/health-sciences/dental-programs/restorative-dentistry/">RDT Program</a>
            <a href="https://pasadena.edu/academics/divisions/health-sciences/dental-programs/restorative-dentistry/admissions.php">RDT Admission</a>
            <a href="https://pasadena.edu/academics/divisions/health-sciences/dental-programs/restorative-dentistry/coursework.php">RDT Coursework</a>
            <a href="#" onClick="alert('Continuing Education page coming soon.')">Continuing Education</a>

            <!-- navigation bar: search container -->
            <div class="search-container">
                <form class="login">
                    <label for="usernameInput" class="sr-only">Username</label>
                    	<input type="username" id="usernameInput" placeholder="Username" required>
                    <label for="passwordInput" class="sr-only">Password</label>
                    	<input type="password" id="passwordInput" placeholder="Password" required>
                    <button class="login" type="button" id="btnSubmit" onclick='login();'><b>Login</b></button>
                </form>
            </div>
        </div>


        <!-- header -->
        <header class="header">
            <img class="logo" src="other/img/pcc_logo.png" height="137"/>
            <h1 class="title" >Restorative Dental Technology</h1>
            <h2 class="subtitle">at Pasadena City College</h2>
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
	            </tr>


		        <?
		        	include 'connect.php';

		        	// query and select data from phpmyadmin table 
		            $stmt = $pdo->query("SELECT * from jobs_table");

		            // foreach to retrieve multiple rows from a statement
		            foreach ($stmt as $row) {

		            	// proper formatting for table when adding a job
	                    echo "<tr>";

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
		                   
		                echo "</tr>";	                    
					}
		        ?>
	        </table>
        </div>
    </body>



    <!-- footer -->
    <footer>   
        <footer class="footer"> 

        <p><b>Pasadena City College</b></p>
        <p>1570 E. Colorado Blvd.</p>
        <p>R 420, 505, 507, 517</p>
        <p>Pasadena, CA 91106</p>

        <p><a href="tel:626-585-7123">626-585-7200</a></p>

        <div class="footer-details">

            <a href="https://www.instagram.com/pcclancer/">
                <i class="fa fa-instagram"></i></a>

            <a href="https://www.facebook.com/pasadenacitycollege/">
                <i class="fa fa-facebook-f"></i></a>

            <a href="https://twitter.com/pcclancer">
                <i class="fa fa-twitter"></i></a>

            <a href="https://www.linkedin.com/school/pasadenacitycollege/">
                <i class="fa fa-linkedin"></i></a>

        </div>

		<p><small>Website created by Eric Adamian</small></p>
		<small>Copyright &copy; 2021 | <a href="other/privacy-policy.html">Privacy Policy</a></small>

    </footer>
</html>




<!-- javascript: retrieves database credentials -->

<script>
	function login(){
		
		// storing username and password input
	    var userInput = document.getElementById('usernameInput').value;
	    var passInput = document.getElementById('passwordInput').value;
	  	
	  	// input data sent to query.php
	    $.ajax({
	        type: "POST",
	        url: "query.php",
	        data:{ 'usernameData': userInput,
	                'passwordData': passInput                    
	     		 },
	            
	        // either successful login to admin.php page, or login failed alert
	        success: function(output) {
	            if(output=='pass') {
	                window.location.href='admin.php'; 
	            }else {
	                alert('Incorrect credentials. Try again.\n\nNOTE: This section is ONLY for website administrators.');
	            }
	        } 
	    });
	}
</script>
