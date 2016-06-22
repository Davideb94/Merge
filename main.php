<?php 
include("./php/Auth.php"); //include auth.php file on all secure pages 
?>

<!DOCTYPE html>
<html>
	
	<head>
		<meta charset="utf-8">
		<title>Merge</title>
		
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<script src="client.js" type="text/javascript"></script><!-- just in order to work with Flujd, an npm package for live programming -->
		<script src="js/main.js" type="text/javascript"></script>
        <script src="js/ajax.js" type="text/javascript"></script>
	</head>
	
	<body onload="start()">
		<header id="header">
			<span id="logo_container">
				<p>merge</p>
			</span>
			<ul class="navs_ul" id="hamburger_menu">
				<li onclick="showMenu()" class="navs_li">
					<div class="vertical_center"></div>
					<div class="vertical_center">
						<img class="navs_img" src="assets/img/hamburger.png" />
					</div>
					<div class="vertical_center"></div>
				</li>
			</ul>
			<nav class="navs">
				<ul class="navs_ul" id="navs_ul">
					<li class="navs_li" id="search_block">
						<div class="vertical_center"></div>
						<div class="vertical_center">
							<input id="search" type="text" placeholder="search@mail.com" onkeyup="showResult(this.value)"
                            onblur="closeresult()">
							<img src="assets/img/search.svg" id="search_icon">
						</div>
                        <!-- searching -->
                        <span id="result_search">
                            
                        </span>
                        
						<div class="vertical_center"></div>
					</li>
					<li class="navs_li" onclick="showNotifications()">
						<div class="vertical_center"></div>
						<div class="vertical_center">
							<a href="#">
								<img class="navs_img" src="assets/img/notification.svg" />
							</a>
						</div>
						<div class="vertical_center"></div>
						<!-- drop down menu -->
						<span id="notifications_menu">
							
							<div class="notification_element">
								<div class="notification_pic_container">
									<img class="notification_pic" src="./assets/img/user.png">
								</div>
								<div class="notification_text">
									<p><b>someone someone</b> added you, go check his desk!</p>
								</div>
							</div>
						</span>
					</li>
				  	<li class="navs_li">
						<div class="vertical_center"></div>
						<div class="vertical_center">
							<a href="#news">
								<img class="navs_img" src="assets/img/settings.svg" />
							</a>
						</div>
						<div class="vertical_center"></div>
					</li>
					<li class="navs_li" id="profile_elem">
						<!--<div class="vertical_center"></div>
						<div class="vertical_center">
							<a href="#">
								<img id="profile_pic" src="assets/img/user.png" />
							</a>
						</div>
						<div class="vertical_center"></div>-->
					</li>
					<li class="navs_li" id="logout">
						<div class="vertical_center"></div>
						<div class="vertical_center">
							<a href="php/Logout.php">
								<img id="logout_img" src="assets/img/logout.png" />
							</a>
						</div>
						<div class="vertical_center"></div>
					</li>
				</ul>
			</nav>
		</header>
		
		<aside>
			<div class="aside_container" id="desks"><!--UI BUG: aside_title must stay on top when scrolling-->
				<div class="aside_title">
					<img id="desk_pic" src="assets/img/desk.png"/>
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
					<img id="people_pic" src="assets/img/people.png"/>
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
			<ul class="tab_head">
				<li id="my_desk_tab" class="tab_active" onclick="openTab('mydesk')">
					<a href="#" id="link_mydesk">My Desk</a>
				</li>
				<li id="others_tab" onclick="openTab('others')">
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
				<!--<button class="add_file" id="add_button">+</button>-->
				<label>
					<div class="add_file" id="add_button">
						<div class="plus">+</div>
					</div>
					<input type="file" id="input_file" name="input_file" onchange="loadfile()" multiple/>
				</label>
            </form>
		</main>
	</body>
	
</html>
