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
	</head>
	
	<body>
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
				<ul class="navs_ul">
					<li class="navs_li" id="search_block">
						<div class="vertical_center"></div>
						<div class="vertical_center">
							<input id="search" type="text">
							<img src="assets/img/search.svg" id="search_icon">
						</div>
						<div class="vertical_center"></div>
					</li>
					<li class="navs_li">
						<div class="vertical_center"></div>
						<div class="vertical_center">
							<a href="#home">
								<img class="navs_img" src="assets/img/notification.svg" />
							</a>
						</div>
						<div class="vertical_center"></div>
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
				</ul>
			</nav>
		</header>
		
		<aside>
			<div class="aside_container" id="desks"><!--UI BUG: aside_title must stay on top when scrolling-->
				<div class="aside_title">
					<img id="desk_pic" src="assets/img/desk.png"/><!--UI BUG: imgs are not responsive-->
					DESKS
				</div>
				<div class="list_container">
					<ul class="aside_list">
						<li class="aside_element">
							<img class="aside_pic" src="assets/img/user.png"/>
							<div class="aside_element_name">Garreth Wesley</div>
						</li>
						
					</ul>
				</div>
			</div>
			
			<div class="aside_container" id="people">
				<div class="aside_title">
					<img id="people_pic" src="assets/img/people.png"/>
					PEOPLE
				</div>
				<div class="list_container">
					<ul class="aside_list">
						<li id="people_element" class="aside_element">
							<img class="aside_pic" src="assets/img/user.png"/>
							<div class="aside_element_name">William Brown</div>
						</li>						
					</ul>
				</div>
			</div>
		</aside>
		<main>
			<ul class="tab_head">
				<li id="my_desk_tab" class="tab_active" onclick="openTab('mydesk')">
					<a href="#">My Desk</a>
				</li>
				<li id="others_tab" onclick="openTab('others')">
					<a href="#">Others</a>
				</li>
			</ul>
			<div id="my_desk" class="tab">
				<div class="file_card">
					<div class="card_cover">
						<div class="cover_text_size">
							700.50
							<div class="cover_text_unit">
							MB
						</div>
						</div>
					</div>
					<div class="card_footer">
						<p>myfile.mp4</p>
					</div>
				</div>				
			</div>
			<div id="others" class="tab">
				<h1>Others</h1>
				<p>This will show a desk I can work on, since someone gave me permissions to accede it.</p>
			</div>
            <form id="file-form" method="POST" enctype= "multipart/form-data">
			<button class="add_file" id="add_button">+</button>
            </form>
		</main>
	</body>
	
</html>