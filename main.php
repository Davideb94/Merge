<?php 
    include("./php/Auth.php"); //include auth.php file on all secure pages
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Merge</title>
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<script src="js/main.js" type="text/javascript"></script>
        <script src="js/ajax.js" type="text/javascript"></script>
	</head>
	<body onload="start()">
		<!--alert and confirm boxes-->
		<div id="upload" class="overlay">
			<div class="dialog">
				<div class="title">
					Good news,
				</div>
				<div class="content">
					your file was uploaded correctly!
				</div>
				<div class="buttons">
					<button onclick="hideDialog()">OK</button>
				</div>
			</div>
		</div>
		<div id="contact" class="overlay">
			<div class="dialog">
				<div class="title">
					Good news,
				</div>
				<div class="content">
					he/she can now see your <b>desk</b> and download your <b>public</b> files!
				</div>
				<div class="buttons">
					<button onclick="hideDialog()">OK</button>
				</div>
			</div>
		</div>
		<div id="delete_contact" class="overlay">
			<div class="dialog">
				<div class="title">
					Hey there,
				</div>
				<div class="content">
					are you sure you want to delete this contact?
				</div>
				<div class="buttons">
					<button id="delete_this_contact">OK</button>
					<button id="do_not_delete_this_contact">CANCEL</button>
				</div>
			</div>
		</div>
		<div id="delete_file" class="overlay">
			<div class="dialog">
				<div class="title">
					Hey there,
				</div>
				<div class="content">
					are you sure you want to delete this file?
				</div>
				<div class="buttons">
					<button id="delete_this_file">OK</button>
					<button id="do_not_delete_this_file">CANCEL</button>
				</div>
			</div>
		</div>
		<div id="change_privacy" class="overlay">
			<div class="dialog">
				<div class="title">
					To be clear...
				</div>
				<div class="content">
					do you want to change the privacy to this file?
				</div>
				<div class="buttons">
					<button id="change_it">OK</button>
					<button id="do_not_change_it">CANCEL</button>
				</div>
			</div>
		</div>
		<!-- end of alert and confirm boxes -->
		
		<header class="header">
			<span id="logo_container">
				merge
			</span>
			<div id="hamburger_menu" onclick="showMenu()">
				<img alt="hamburger" src="assets/img/hamburger.png">
			</div>
			<nav class="navs">
				<ul>
					<li id="search_block">
						<div class="vertical_center"></div>
						<div class="vertical_center">
							<input id="search" type="text" placeholder="search@mail.com" onkeyup="showResult(this.value)"
                            onblur="closeresult()">
							<img src="assets/img/search.svg" alt="search" id="search_icon">
						</div>
                        <!-- searching -->
                        <span id="result_search">
                            
                        </span>
                        
						<div class="vertical_center"></div>
					</li>
					<li class="hover_li" onclick="showNotifications()">
						<div class="vertical_center"></div>
						<div class="vertical_center">
							<a href="#" id="notifications_icon">
								<img class="navs_img" alt="notification" src="assets/img/notification.svg" />
							</a>
						</div>
						<div class="vertical_center"></div>
						<!-- drop down menu -->
						<span id="notifications_menu">
						</span>
					</li>
					<li class="hover_li" onclick="location.href='./settings.php'">
						<div class="vertical_center"></div>
						<div class="vertical_center">
							<a href="./settings.php">
								<img class="navs_img" alt="settings" src="assets/img/settings.svg" />
							</a>
						</div>
						<div class="vertical_center"></div>
					</li>
					<li id="profile_elem">
		
					</li>
					<li id="logout">
						<a id="logout_link" href="php/Logout.php">
							<div class="vertical_center"></div>
							<div class="vertical_center">
								<img id="logout_img" alt="log_out" src="assets/img/logout.png" />
							</div>
							<div class="vertical_center"></div>
						</a>
					</li>
				</ul>
			</nav>
		</header>
		<aside>
			<div class="aside_container" id="desks"><!--UI BUG: aside_title must stay on top when scrolling-->
				<div class="aside_title">
					<img id="desk_pic" alt="desk" src="assets/img/desk.png"/>
					DESKS
				</div>
				<div class="list_container">
					<ul class="aside_list" id="aside_list_desks">	
                            <!--
                                HERE PHP REALTIME CONTENT

                            -->
                       
					</ul>
				</div>
			</div>
			
			<div class="aside_container" id="people">
				<div class="aside_title">
					<img id="people_pic" alt="people" src="assets/img/people.png"/>
					PEOPLE
				</div>
				<div class="list_container">
					<ul class="aside_list" id="aside_list_contacts">
							<!--
                                HERE PHP REALTIME CONTENT

                            -->		
					</ul>
				</div>
			</div>
		</aside>
		<main>
            <div id="progress">
            </div>
			<ul class="tab_head">
				<li id="my_desk_tab" class="tab_active" onclick="fetchId('mydesk')">
					<a href="#" id="link_mydesk">My Desk</a>
				</li>
				<li id="others_tab" onclick="fetchId('others')">
					<a href="#" id="link_others">Others</a>
				</li>
			</ul>
			<div id="my_desk" class="tab">
				<!--
                    HERE PHP REALTIME CONTENT

                -->
			</div>
			<div id="others" class="tab">
                <!--
                    HERE PHP REALTIME CONTENT

                -->
			</div>
            <form id="file-form" method="POST" enctype= "multipart/form-data">
                	<label for="input_file" class="add_file" id="add_button" >
                        <img src="assets/icons/plus1.png" alt="plus"/>
                        <input type="file" id="input_file" name="input_file" onchange="loadfile()" multiple/>	
                    </label>
            </form>
		</main>
	</body>
	
</html>
