<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Me - TextBook</title>
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
                    <li><a href="friends_page.php">Friends</a></li>
                    <li class="active"><a href="me_page.php">Me</a></li>
                    <li><a href="notifications_page.php">Notifications</a></li>
                    <li><a href="logout.php">Log Off</a></li>
                </ul>
            </div><!--.nav-collapse -->
        </div>
    </nav>
    
    <div class="container" style="margin-top:10px; margin-bottom:10px;" id="card2">
        <div class="container">
        <h3>My Profile</h3>
        
		<?php 
			// first of all, we need to connect to the database
			require_once("dbconnect.php");
			// Initialize the session
			session_start();
			$sql = "SELECT uid, first_name, last_name, gender, birth_date, email, phone, address, about_me FROM user WHERE UID = '" . $_SESSION['uid'] . "'";
			$result = mysqli_query($conn, $sql);
			if(mysqli_num_rows($result) > 0){
				//here we will print the row that is returned by our query $sql
				if($row = mysqli_fetch_array($result)){
				//here we have to write some HTML code, so we will close php tag
			?>
		
		<div class="col-sm-12">
            <div class="col-sm-2"><h4>Username: </h4></div>
            <div class="col-sm-10" id="box"><h4><?php echo $row[0]; ?></h4></div>
        </div>
        <div class="col-sm-12">
            <div class="col-sm-2"><h4>First Name: </h4></div>
            <div class="col-sm-10" id="box"><h4><?php echo $row[1]; ?></h4></div>
        </div>
        <div class="col-sm-12">
            <div class="col-sm-2"><h4>Last Name: </h4></div>
            <div class="col-sm-10" id="box"><h4><?php echo $row[2]; ?></h4></div>
        </div>
        <div class="col-sm-12">
            <div class="col-sm-2"><h4>Gender: </h4></div>
            <div class="col-sm-10" id="box"><h4><?php echo $row[3]; ?></h4></div>
        </div>
        <div class="col-sm-12">
            <div class="col-sm-2"><h4>Date of Birth: </h4></div>
            <div class="col-sm-10" id="box"><h4><?php echo $row[4]; ?></h4></div>
        </div>
        <div class="col-sm-12">
            <div class="col-sm-2"><h4>Email: </h4></div>
            <div class="col-sm-10" id="box"><h4><?php echo $row[5]; ?></h4></div>
        </div>
        <div class="col-sm-12">
            <div class="col-sm-2"><h4>Phone: </h4></div>
            <div class="col-sm-10" id="box"><h4><?php echo $row[6]; ?></h4></div>
        </div>
        <div class="col-sm-12">
            <div class="col-sm-2"><h4>Address: </h4></div>
            <div class="col-sm-10" id="box"><h4><?php echo $row[7]; ?></h4></div>
        </div>
        <div class="col-sm-12">
            <div class="col-sm-2"><h4>About Me: </h4></div>
            <div class="col-sm-10" id="box" ><h4><?php echo $row[8]; ?></h4></div>
            </div>
        </div>
        
		<?php 
				}					
			}
			?>
          
    </div>
    
    <div class="container" style="margin-top:10px; margin-bottom:10px;" id="card2">
        <div class=" form-signin" >
            <form action="update.php" class="form_design" method="post">
                <div class="container">
                <h3>Update My Profile</h3>
                <label style="margin-right:12px;">First Name: </label>
                 <input type="text" name="fname" maxlength = "30"> <br/>
                
                <label style="margin-right:13px;">Last Name: </label>
			     <input type="text" name="lname" maxlength = "30"> <br/>
                
                <label style="margin-right:35px;">Gender: </label>
			     <input type="text" name="gender" maxlength = "20"> <br/>
                
                <label>Date of Birth: </label>
			     <input type="date" name="bdate" style="margin-bottom: 2px"> <br/>
                
                <label style="margin-right:46px;">Email: </label>
			     <input type="email" name="ema" maxlength = "50"> <br/>
                
                <label style="margin-right:40px;">Phone: </label>
			     <input type="number" name="phon" maxlength = "13"> <br/>
                
                <label style="margin-right:27px;">Address: </label>
			     <input type="text" name="addr" maxlength = "50"> <br/>
                
                <label style="margin-right:19px;">About Me: </label>
			     <input type="text" name="about" maxlength = "150"> <br/>
			     <br/>
                
                <label>Action: </label><br/>
                 <input type="radio" name="action" value="update"> Update Info<br/>
                <input type="radio" name="action" value="updatepost"> Update info and Post Status Update<br/><br/>
                </div>
                <input type="submit" value="Update" class="btn" id="dark">
            </form>
            </div>
    </div>
    
    <div class="container" style="margin-top:10px; margin-bottom:10px;" id="card2">
        <div class=" form-signin" >
            <form action="posts.php" class="form_design" method="post">
                <div class="container">
                <h3>Create a Post</h3>
                <label class="col-sm-1" style="margin-right:12px;">Subject: </label>
                 <input class="col-sm-10" type="text" name="subject" maxlength = "20"> <br/>
                
                <label class="col-sm-1" style="margin-right:12px;">Text: </label>
                <textarea class="col-sm-10" name="message" rows="4"  maxlength = "300"></textarea>
                
                <label class="col-sm-1">Privacy: </label>
                
                <div class="col-sm-11" style="margin-left:0px;">
                    <input type="radio" name="action" value="1"> Friends<br/>
                    <input type="radio" name="action" value="0"> Only Me<br/><br/>
                </div>
                </div>
                <input type="submit" value="Submit" class="btn" id="dark">
                
            </form>
        </div>
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</body>
</html>
