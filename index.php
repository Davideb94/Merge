<?php 
session_start();
//controlling cookie

//if there's a cookies with authentication-> enter
 if(empty($_SESSION["username"]) && !empty($_COOKIE["usermerge"])){
    //start session
    $_SESSION["username"] = $_COOKIE["usermerge"];
    header("Location: ./elaborate/secure.php");
     //in the extreme case in wich you enter in the index when you're logged redirect to your page
}else if(!empty($_SESSION["username"]) && !empty($_COOKIE["usermerge"])){
       header("Location: ./elaborate/secure.php");
 }
?>

<!DOCTYPE html>
<html>
	
	<head>
		<meta charset="utf-8">
		<title>Merge</title>
		
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<script src="client.js" type="text/javascript"></script><!-- just in order to work with Flujd, an npm package for live programming -->
		<script src="js/app.js"></script>
	</head>
	
	<body>
		<header id="header">
			<div id="logo_container">
				<p>merge</p>
			</div>
			<div id="login_container">
                <p>Log in</p>
			</div>
			<div id="login_menu">
				<form action="elaborate/Login.php" method="POST">
					<div class="input-field">
						<input class="login_input" name="Lemail" type="email" placeholder="Email" required>
					</div>
					<div class="input-field">
						<input class="login_input" name="Lpassword" type="password" placeholder="Password" required>
					</div>
					<div class="input-field">
						<input type="submit" id="log_in_button" value="Log In">
					</div>
				</form>
			</div>
		</header>
		<section id="section_1">
			<div id="container_1">
				<p>
                Store your files and share them with<br>friends and co-workers.
                </p>
					<a id="sign_up" href="#section_3">Sign Up</a>
					<a id="discover" href="#section_2">
						Discover More<br>
						<img id="Down_Arrow" src="./assets/icons/scroll-arrow-to-down.svg" alt="Down Arrow">
					</a>
			</div>
		</section>
		<section id="section_2">
			<div id="container_2">
                <div class="rowing">
                    <div class="text_elem left_elem">
                        <p>
                            Upload your files<br>and organize<br>them on <b>your desk</b>.
                        </p>
                    </div>
                    <div class="img_elem right_elem" >
                        <img class="wireframe" src="./assets/icons/mydesk.png" alt="Missing Img">
                    </div>
                </div>
                <div class="rowing">
                      <div class="img_elem left_elem">
                        <img class="wireframe" src="./assets/icons/contacts.png" alt="Missing Img">
                    </div>
                    <div class="text_elem right_elem" >
                        <p>
								Add people to<br>your <b>contacts</b>...
                        </p>
                    </div>
                  
                </div>
                <div class="rowing">
                <div class="text_elem left_elem" >
                    <p>
                                ...in order to give them<br> permissions to<br><b>accede</b> their files on your<br>desk.
                    </p>
                </div>
                <div class="img_elem right_elem">
                    <img class="wireframe" src="./assets/icons/newfile.png" alt="Missing Img">
                </div>
                </div>
			</div>
		</section>
		<section id="section_3">
			<div id="container_3">
				<p style="font-size:30px">
                    Sign Up!
				</p>
				<p>
					It's free and it won't take more than 1 minute...
                </p>
				<form id="sign_up_form" action="elaborate/Signup.php" onsubmit="return validate()" method="POST">
					<div class="input-field">
						<img src="./assets/icons/name.svg" alt="Name" class="icon">
						<input class="validate" name="username" type="text" placeholder="Name" required>
					</div>
					<div class="input-field">
						<img src="./assets/icons/mail.svg" alt="Mail" class="icon">
						<input class="validate" name="email" type="email" placeholder="Email" required>
					</div>
					<div class="input-field">
						<img src="./assets/icons/password.svg" alt="Pass" class="icon">
						<input class="validate" id="password" name="password" type="password" placeholder="Password" required>
					</div>
					<div class="input-field">
					    <img src="./assets/icons/password.svg" alt="Pass" class="icon">
						<input class="validate" id="confirm_pass" name="confirm_pass" type="password" placeholder="Confirm password" required>
					</div>
					
					<input type="submit" id="submit" value="Register!" />
				</form>
			</div>
		</section>
		<footer>
			<span id="footer_content">© 2016 Created by Davide Brunetti and Gabriele Martino.</span>
		</footer>
	</body>
	
</html>
