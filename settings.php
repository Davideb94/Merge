<?php 
include("./php/Auth.php"); //include auth.php file on all secure pages 
?>

<!DOCTYPE html>
<html lang="en">
	
	<head>
		<meta charset="utf-8">
		<title>Merge</title>
		
		<link rel="stylesheet" type="text/css" href="css/settings.css">
		<script src="client.js" type="text/javascript"></script><!-- just in order to work with Flujd, an npm package for live programming -->
        <script src="js/ajax.js" type="text/javascript"></script>
		<script src="js/settings.js" type="text/javascript"></script>
	</head>
	<body onload="fetch_info()">
		<!--alert and confirm boxes-->
		<div id="nickname_alert" class="overlay">
			<div class="dialog">
				<div class="title">
					Good news,
				</div>
				<div class="content">
					your nickname was updated correctly!
				</div>
				<div class="buttons">
					<button onclick="hideDialog()">OK</button>
				</div>
			</div>
		</div>
		<div id="email_alert" class="overlay">
			<div class="dialog">
				<div class="title">
					Good news,
				</div>
				<div class="content">
					your email was updated correctly!
				</div>
				<div class="buttons">
					<button onclick="hideDialog()">OK</button>
				</div>
			</div>
		</div>
		<div id="password_alert" class="overlay">
			<div class="dialog">
				<div class="title">
					Good news,
				</div>
				<div class="content">
					your password was updated correctly!
				</div>
				<div class="buttons">
					<button onclick="hideDialog()">OK</button>
				</div>
			</div>
		</div>
		<div id="wrong_password_alert" class="overlay">
			<div class="dialog">
				<div class="title">
					Watch out!
				</div>
				<div class="content">
					you typed a wrong password!
				</div>
				<div class="buttons">
					<button onclick="hideDialog()">OK</button>
				</div>
			</div>
		</div>
		<div id="image_alert" class="overlay">
			<div class="dialog">
				<div class="title">
					Good news,
				</div>
				<div class="content">
					your profile image was updated correctly!
				</div>
				<div class="buttons">
					<button onclick="hideDialog()">OK</button>
				</div>
			</div>
		</div>
		<div id="nickname_confirm" class="overlay">
			<div class="dialog">
				<div class="title">
					Hey there,
				</div>
				<div class="content">
					are you sure you want to modify your nickname?
				</div>
				<div class="buttons">
                    <button onclick="modify_nick()">OK</button>
					<button onclick="hideDialog()">CANCEL</button>
				</div>
			</div>
		</div>
		<div id="email_confirm" class="overlay">
			<div class="dialog">
				<div class="title">
					Hey there,
				</div>
				<div class="content">
					are you sure you want to modify your email?
				</div>
				<div class="buttons">
					<button onclick="modify_email()">OK</button>
					<button onclick="hideDialog()">CANCEL</button>
				</div>
			</div>
		</div>
		<div id="password_confirm" class="overlay">
			<div class="dialog">
				<div class="title">
					Hey there,
				</div>
				<div class="content">
					are you sure you want to modify your password?
				</div>
				<div class="buttons">
					<button onclick="resetPass()">OK</button>
					<button onclick="hideDialog()">CANCEL</button>
				</div>
			</div>
		</div>
		<div id="delete_accout_confirm" class="overlay">
			<div class="dialog">
				<div class="title">
					Wait wait wait...
				</div>
				<div class="content">
					do you really want to delete your account and all your uploaded files?
				</div>
				<div class="buttons">
					<button  onclick="deleteProfile()">OK</button>
					<button onclick="hideDialog()">CANCEL</button>
				</div>
			</div>
		</div>
		<!--end of alert and confirm boxes -->
		
		<header id="header" >
			<span id="logo_container">
				merge
			</span>
			<nav class="navs">
				<ul class="navs_ul">
					<li class="navs_li">
						<a id="desk_link" href="http://localhost/merge/main.php">
							<div class="vertical_align"></div>
							<div class="vertical_align">
								<img id="desk_img" alt ="back_arrow" src="assets/img/back_arrow.png" />
								My desk
							</div>
							<div class="vertical_align"></div>
						</a>	
					</li>
					<li class="navs_li" id="logout">
						<a id="logout_link" href="php/Logout.php">
							<div class="vertical_align"></div>
							<div class="vertical_align">
								<img id="logout_img" alt="log_out" src="assets/img/logout.png" />
							</div>
							<div class="vertical_align"></div>
						</a>
					</li>
				</ul>
			</nav>
		</header>
		<header id="settings_header">
			<span>
				Account Settings
			</span>
		</header>
		
		<div class="card">
			<div class="card_title" id="space_left">
				<p>Space</p>
			</div>
			<div class="card_content">
				<div id="progress_bar" class="progress-radial progress-30">
					<div class="overlay">
						<p id="percentage_value"></p>
					</div>
				</div>
				<div id="infos">
					<b>Used space: </b>
					<p id="used_space"></p>
					<br>
					<b>Remaining space:</b>
					<p id="remaining_space"></p>
				</div>
				<div style="clear:both"></div>
				
				<button class="get_more">Get More</button>
			</div>
		</div>
		<div class="card">
			<div class="card_title">
				<p>Personal settings</p>
			</div>
			<div class="card_content">
				<table>
					<tr>
						<td class="row_title">Nickname</td>
						<td id="nickname">
                        
                        </td>
						<td class="modify" onclick="showChangeName()">
							<img class="edit" alt="edit" src="assets/img/edit.png">
							Modify
						</td>
					</tr>
					<tbody class="change" id="change_name_id">
						<tr>
							<th>New nickname</th>
							<td>
								<input class="validate" name="name" type="text" placeholder="new nickname"
                                       id="newnick" required>
							</td>
                            <td>
                            </td>
						</tr>
						<tr>
							<td></td>
							<td class="confirm">
								<button onclick="showDialog('nickname_confirm')">CONFIRM</button>
							</td>
                            <td>
                            </td>
						</tr>
					</tbody>
					<tr>
						<td class="row_title">Mail</td>
						<td id="email">
                        
                        </td>
						<td class="modify" onclick="showChangeMail()">
							<img class="edit" alt="edit" src="assets/img/edit.png">
							Modify
						</td>
					</tr>
					<tbody class="change" id="change_mail_id">
						<tr>
							<th>New mail</th>
							<td>
								<input class="validate" name="mail" type="text" placeholder="new mail" id="Email" required>
							</td>
                            <td>
                            </td>
						</tr>
						<tr>
							<td></td>
							<td class="confirm">
								<button onclick="showDialog('email_confirm')">CONFIRM</button>
							</td>
                            <td>
                            </td>
						</tr>
					</tbody>
					<tr>
						<td class="row_title">Password</td>
						<td>****</td>
						<td class="modify" onclick="showChangePassword()">
							<img class="edit" alt="edit" src="assets/img/edit.png">
							Modify
						</td>
					</tr>
					<tbody class="change" id="change_password_id">
						<tr>
							<th>Old password</th>
							<td>
								<input class="validate" name="username" id="oldpassword" type="password" placeholder="**********" required>
							</td>
                            <td>
                            </td>
						</tr>
						<tr>
							<th>New password</th>
							<td>
								<input class="validate" id="password" name="username" type="password" placeholder="**********" required>
							</td>
                            <td>
                            </td>
						</tr>
						<tr>
							<th>Confirm password</th>
							<td>
								<input class="validate" id="confirmed_password" name="username" type="password" placeholder="**********" required>
							</td>
                            <td>
                            </td>
						</tr>
						<tr>
							<td></td>
							<td class="confirm">
								<button onclick="validate()">CONFIRM</button>
							</td>
                            <td>
                            </td>
						</tr>
					</tbody>
					<tr>
						<td class="row_title">Image</td>
						<td id="profile_pic">
							
						</td>
						<td class="modify" >
							<!-- <img class="edit" src="assets/img/edit.png">
							Modify-->
                            <form id="file-form" method="POST" enctype= "multipart/form-data">
                            <label>
                                <img class="edit" alt="edit" src="assets/img/edit.png">
									Modify
                                
                                	<input type="file" id="prof_pic" hidden name="input_file" onchange="upload_profile_pic()"/>
                            </label>
                            </form>
						</td>
					</tr>
				</table>
			</div>
		</div>
		<div class="card">
			<div class="card_title" id="danger_zone_title">
				<p>Danger zone</p>
			</div>
			<div class="card_content" id="danger_zone_content" onclick="showDialog('delete_accout_confirm')">
				<p>Delete account</p>
			</div>
		</div>
	</body>
</html>