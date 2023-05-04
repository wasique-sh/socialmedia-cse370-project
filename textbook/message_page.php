<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Message - TextBook</title>
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
        <h3>Message Log</h3>
        
		<?php	session_start();// Initialize the session	?>
		<div class="col-sm-4"><span class="badge" style="background-color: dimgrey"><?php echo $_SESSION['fuid']; ?></span></div>

        <div class="col-sm-4"></div>

		<div class="col-sm-4"><span class="badge" style="background-color: deepskyblue; float:right;">Me</span></div> <br>
        
	<?php 
	// first of all, we need to connect to the database
	require_once("dbconnect.php");

	$sql = "SELECT From_UID, Subject, Text, MID, Likes FROM Message WHERE (From_UID = '" . $_SESSION['uid'] . "' AND To_UID = '" . $_SESSION['fuid'] . "') OR (From_UID = '" . $_SESSION['fuid'] . "' AND To_UID = '" . $_SESSION['uid'] . "') ORDER BY MID";
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result) > 0){
		//here we will print the row that is returned by our query $sql
		while($row = mysqli_fetch_array($result)){
		//here we have to write some HTML code, so we will close php tag
			?>
	<?php	if($row[0] == $_SESSION['fuid']){	?>
        <div class="col-sm-12" style="margin-top: 5px;">
            <div class="col-sm-4" id="friend">
                <p style="font-size: 10px;">MID: <?php echo $row[3]; ?></p>
                <h4><?php echo $row[1]; ?></h4>
                <p style="font-size: 15px;"><?php echo $row[2]; ?></p>
                <p style="font-size: 10px; text-align: right; margin-left: 5px%;"><?php echo $row[4]; ?> Likes</p>
            </div>
            <div class="col-sm-8"></div>
        </div>
    <?php	}else{	?> 
        <div class="col-sm-12" style="margin-top: 5px;">
            <div class="col-sm-8"></div>
            <div class="col-sm-4" id="me">
                <p style="font-size: 10px;">MID: <?php echo $row[3]; ?></p>
                <h4><?php echo $row[1]; ?></h4>
                <p style="font-size: 15px;"><?php echo $row[2]; ?></p>
                <p style="font-size: 10px; text-align: right; margin-left: 5px%;"><?php echo $row[4]; ?> Likes</p>
            </div>
        </div> 
	<?php	}	
		}					
	}  ?>
    </div>
    
    <div class="container" style="margin-top:10px; margin-bottom:10px;" id="card2">
        <div class=" form-signin" >
            <form action="message.php" class="form_design" method="post">
            <div class="container">
                <h3>Message</h3>
                <label class="col-sm-1" style="margin-right:12px;">Subject: </label>
                 <input class="col-sm-10" type="text" name="subject" maxlength = "20" minlength = "1"> <br/>
                
                <label class="col-sm-1" style="margin-right:12px;">Text: </label>
                <textarea class="col-sm-10" name="message" rows="2" maxlength = "100" minlength = "1"></textarea>
                
                </div>
                <input type="submit" value="Submit" class="btn" id="dark">
                
            </form>
        </div>
    </div>
    
    <div class="container" style="margin-top:10px; margin-bottom:10px;" id="card2">
        <div class=" form-signin" >
            <form action="interactmessage.php" class="form_design" method="post">

                <div class="container">
                <h3>Interact with Message</h3>
                
                <label class="col-sm-2" style="margin-right:12px;">MessageID: </label>
                <input class="col-sm-8" type="text" name="mid" maxlength = "11"> <br/>
                    
                <label class="col-sm-2">Action: </label>
                <div class="col-sm-8" style="margin-left:0px;">
                    <input type="radio" name="action" value="1"> Like<br/>
                    <input type="radio" name="action" value="-1"> Dislike<br/>
                </div>
                </div>

                <div class="col-sm-12"></div>
                <input type="submit" value="Submit" class="btn" id="dark">

            </form>
        </div>
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</body>
</html>
