<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home - TextBook</title>
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
                    <li class="active"><a href="home_page.php">Home</a></li>
                    <li><a href="friends_page.php">Friends</a></li>
                    <li><a href="me_page.php">Me</a></li>
                    <li><a href="notifications_page.php">Notifications</a></li>
                    <li><a href="logout.php">Log Off</a></li>
                </ul>
            </div><!--.nav-collapse -->
        </div>
    </nav>
    
    <div class="container" style="margin-top:10px; margin-bottom:10px;" id="card2">
        <div class=" form-signin" >
            <form action="interactposts.php" class="form_design" method="post">

                <div class="container">
                <h3>Interact with Posts</h3>
                
                <label class="col-sm-1" style="margin-right:12px;">PostID: </label>
                <input class="col-sm-10" type="text" name="postid" maxlength = "11"> <br/>
                    
                <label class="col-sm-1">Action: </label>
                <div class="col-sm-11" style="margin-left:0px;">
                     <input type="radio" name="action" value="1"> Like<br/>
                    <input type="radio" name="action" value="-1"> Dislike<br/>
                    <input type="radio" name="action" value="2"> Share<br/>
                    <input type="radio" name="action" value="3"> Interact with Comments<br/><br/>
                </div>
                </div>
                <div class="col-sm-12"></div>
                <input type="submit" value="Submit" class="btn" id="dark">
            </form>
        </div>
    </div>
    
	<?php 
	// first of all, we need to connect to the database
	require_once("dbconnect.php");
	// Initialize the session
	session_start();
	$status1="Accepted";
	$sql="SELECT P.PID, P.From_UID, P.Shared_UID, P.Privacy_Level, P.Subject, P.Text, P.Likes, P.Shares FROM Posts P, Friends F WHERE (F.From_UID = '" . $_SESSION['uid'] . "' AND F.To_UID = P.From_UID AND F.Status ='$status1') AND (P.Privacy_Level = '1' OR F.To_UID = '" . $_SESSION['uid'] . "') ORDER BY P.PID DESC";
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result) > 0){
		//here we will print the row that is returned by our query $sql
		while($row = mysqli_fetch_array($result)){
		//here we have to write some HTML code, so we will close php tag
			?>
    
    <div class="container">
        
        <div class="row" id="card">
            
            <div class="col-sm-4">By <span class="badge" style="background-color: blue"><?php echo $row[1]; ?></span></div>

            <div class="col-sm-4">PostID: <span class="badge" style="background-color: grey"><?php echo $row[0]; ?></span></div>
			
    <?php	if(is_null($row[2])==1){	?>
				<div class="col-sm-4"></div><br>
	<?php	}else{	?>
			<div class="col-sm-4">Shared From <span class="badge" style="background-color: green"><?php echo $row[2]; ?></span></div><br>
	<?php	}	?>
			
            <div style="margin: 10px; border: 2px solid; border-color: dimgrey; padding:5px;background-color:white;">
                <h3><?php echo $row[4]; ?></h3>
                <p><?php echo $row[5]; ?></p>
            </div>    

            <div class="col-sm-4" >
                <h5><?php echo $row[6]; ?> Likes</h5>
            </div>

            <div class="col-sm-4"> <h5><?php echo $row[7]; ?> Shares</h5> </div>

            <div class="col-sm-4"><div><h5></h5></div></div>
        </div>
           
    </div>
	
	<?php 
		}					
	}
		?> 
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</body>
</html>
