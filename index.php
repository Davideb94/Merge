<?php 
include("./php/AuthConnection.php");
session_start();

//controlling cookie for corrisponding username and id


//if there's a cookies with authentication-> enter
 if(empty($_SESSION["username"]) && !empty($_COOKIE["usermerge"]) && !empty($_COOKIE["idusermerge"])){
    //start session
     $query = "SELECT * from user where id= '{$_COOKIE["idusermerge"]}' and name = '{$_COOKIE["usermerge"]}';";
    
    $result = $mysqli->query($query);
    
    if(!$result){
        echo $mysqli->error;
    }else if($row = $result->fetch_assoc()){
         $secure_user = sha1($_COOKIE["usermerge"]);
            $secure_id= sha1($_COOKIE["idusermerge"]);
            $salt = "MergeProject";
            $secure_script = sha1($salt.$secure_user.$secure_id);
            if($secure_script == $_COOKIE["secure"]){
                $_SESSION["IDuser"] = $_COOKIE["idusermerge"];
                $_SESSION["username"] = $_COOKIE["usermerge"];
                header("Location: main.php");  
            }
        
    }   
     //in the extreme case in wich you enter in the index when you're logged redirect to your page
}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Merge</title>
		
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<script src="client.js" type="text/javascript"></script><!-- just in order to work with Flujd, an npm package for live programming -->
		<script src="js/index.js"></script>
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
				<img id="triangle" alt="triangle "src="assets/img/triangle.png">
				<form action="./php/Login.php" method="POST">
					<div class="input-field">
						<input class="login_input" name="Lemail" type="email" placeholder="Email" required>
					</div>
					<div class="input-field">
						<input class="login_input" name="Lpassword" type="password" placeholder="Password" required>
					</div>
                    <div id="check_keep_login">
                        <input type="checkbox" name="keep_login">
                            <p>
                                Keep me signed in
                            </p>
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
						<p>
                            Discover More
                        </p>
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
				<p id="text_title">
                    Sign Up!
				</p>
				<p id="text_subtitle">
					It's free and it won't take more than 1 minute...
                </p>
				<form id="sign_up_form" action="./php/Signup.php" onsubmit="return validate()" method="POST">
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
                    <div id="check">
                        <input type="checkbox"   onClick="!this.checked;" required/>
                        <p>I agree to <a href="">Terms and Conditions.</a></p>
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
