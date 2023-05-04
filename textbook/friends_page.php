<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Friends - TextBook</title>
    <link rel="shortcut icon" href="">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="css/customstyles.css">
    <style>body{padding-top:50px;}.starter-template{padding:40px 15px;text-align:center;}</style>

    <!--[if IE]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="jumbotron">
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="about_page.php">TextBook</a>
            </div>

            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="home_page.php">Home</a></li>
                    <li class="active"><a href="friends_page.php">Friends</a></li>
                    <li><a href="me_page.php">Me</a></li>
                    <li><a href="notifications_page.php">Notifications</a></li>
                    <li><a href="logout.php">Log Off</a></li>
                </ul>
            </div><!--.nav-collapse -->
        </div>
    </nav>
    
    <div class="container" style="margin-top:10px; margin-bottom:10px;" id="card2">
        <div class="container">
        <div class="form-signin" >
            <form action="friendrequest.php" class="form_design" method="post">

                <h3>Manage Requests</h3>
                <label>Friend's Username: </label>
                <input type="text" name="fname" maxlength = "10"> <br/><br/>
                    
                <label>Action: </label><br/>
                 <input type="radio" name="action" value="1"> Accept Friend Request<br/>
                 <input type="radio" name="action" value="2"> Reject Friend Request<br/>
                <input type="radio" name="action" value="3"> Send Friend Request<br/><br/>

                <input type="submit" value="Submit" class="btn" id="dark">
                
            </form>
        </div>
        </div>
    </div>
    
    <div class="container" style="margin-top:10px; margin-bottom:10px;" id="card2">
        <div class="container">
        <h3>Friend Requests</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                  <th scope="col">Username</th>
                  <th scope="col">Status</th>
                </tr>
              </thead>
              <tbody>
		<?php 
			// first of all, we need to connect to the database
			require_once("dbconnect.php");
			// Initialize the session
			session_start();
			$sql = "SELECT To_UID, Status FROM Friends WHERE From_UID = '" . $_SESSION['uid'] . "' AND To_UID != '" . $_SESSION['uid'] . "' ORDER BY To_UID";
			$result = mysqli_query($conn, $sql);
			if(mysqli_num_rows($result) > 0){
				//here we will print the row that is returned by our query $sql
				while($row = mysqli_fetch_array($result)){
				//here we have to write some HTML code, so we will close php tag
		?>			
				<tr>
                  <th scope="row"><?php echo $row[0]; ?></th>
                  <td><?php echo $row[1]; ?></td>
                </tr>
		<?php 
				}					
			}
		?>    
              </tbody>
        </table>
        </div>  
    </div>
    
    <div class="container" style="margin-top:10px; margin-bottom:10px;" id="card2">
        <div class="container">
        <div class=" form-signin" >
            <form action="useraction.php" class="form_design" method="post">

                <h3>Manage User Interactions</h3>
                <label>Friend's Username: </label>
                <input type="text" name="fname" maxlength = "10"> <br/><br/>
                    
                <label>Action: </label><br/>
                 <input type="radio" name="action" value="0"> See User Profile<br/>
                 <input type="radio" name="action" value="1"> Chat<br/>
                 <br/>

                <input type="submit" value="Submit" class="btn" id="dark">
                
            </form>
        </div>
        </div>
    </div>
    
    <div class="container" style="margin-top:10px; margin-bottom:10px;" id="card2">
        <div class="container">
        <h3>All Users</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                  <th scope="col">Username</th>
                  <th scope="col">Name</th>
                  <th scope="col">Gender</th>
                  <th scope="col">Email</th>
                  <th scope="col">About</th>
                </tr>
              </thead>
              <tbody>
                
		<?php 
			$sql = "SELECT UID, First_Name, Last_Name, Gender, Email, About_Me FROM User ORDER BY UID";
			$result = mysqli_query($conn, $sql);
			if(mysqli_num_rows($result) > 0){
				//here we will print the row that is returned by our query $sql
				while($row = mysqli_fetch_array($result)){
				//here we have to write some HTML code, so we will close php tag
		?>
				
				<tr>
                  <th scope="row"><?php echo $row[0]; ?></th>
                  <td><?php echo $row[1]; ?> <?php echo $row[2]; ?></td>
                  <td><?php echo $row[3]; ?></td>
                  <td><?php echo $row[4]; ?></td>
                  <td><?php echo $row[5]; ?></td>
                </tr>
	
		<?php 
				}					
			}
		?>
				
              </tbody>
        </table>
        </div>
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</body>
</html>
