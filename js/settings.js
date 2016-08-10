//veeery ugly functions to show the accordions
var change_name_shown = false;
function showChangeName(){
	var tbody = document.getElementById("change_name_id");
	if(change_name_shown){
		tbody.className = "change";
		change_name_shown = false;
	}
	else{
		tbody.className = "active";
		change_name_shown = true;
	}
}

var change_mail_shown = false;
function showChangeMail(){
	var tbody = document.getElementById("change_mail_id");
	if(change_mail_shown){
		tbody.className = "change";
		change_mail_shown = false;
	}
	else{
		tbody.className = "active";
		change_mail_shown = true;
	}
}

var change_password_shown = false;
function showChangePassword(){
	var tbody = document.getElementById("change_password_id");
	if(change_password_shown){
		tbody.className = "change";
		change_password_shown = false;
	}
	else{
		tbody.className = "active";
		change_password_shown = true;
	}
}
//ajax function to modify nickname
function modify_nick(){
	var xhr = new XMLHttpRequest();
	var newnick = document.getElementById('newnick').value;
    console.log(newnick);
    hideDialog();
	xhr.onreadystatechange = function (){
		if(xhr.readyState == 4 && xhr.status == 200){
			console.log(xhr.response);
			if(xhr.response == "ok"){
				showDialog("nickname_alert");
                
			}
		}
	}

	xhr.open("POST","./php/modify_nick.php",true);
	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhr.send("newnick="+newnick);
	
	
}
//ajax function to modify email address
function modify_email(){
	var xhr = new XMLHttpRequest();
    hideDialog();
	var newmail = document.getElementById('Email').value;
    console.log(newmail);
	xhr.onreadystatechange = function (){
		if(xhr.readyState == 4 && xhr.status == 200){
			console.log(xhr.response);
			if(xhr.response == "ok"){
				showDialog("email_alert");
			}
            
		}
	}

	xhr.open("POST","./php/modify_email.php",true);
	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhr.send("newmail="+newmail);

	
}

//ajax function to reset password
function resetPass(){
	//to hide the current dialog box
	var dialog = document.getElementsByClassName("overlay");
	
	for(var i=0; i<dialog.length; i++){
		dialog[i].className = "overlay";
	}
	
	var oldpass = document.getElementById('oldpassword').value;
	var newpass = document.getElementById('password').value;

    var xhr1 = new XMLHttpRequest();
    xhr1.readyState = 0;
    xhr1.onreadystatechange = function() {
        if (xhr1.readyState == 4 && xhr1.status==200) {
            if(xhr1.responseText == "error match"){
                showDialog("wrong_password_alert");
            }else{
                showDialog("password_alert");
            }
        }
    };
    xhr1.open('POST', './php/ResetPassword.php', true);
    xhr1.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr1.send('newpass='+newpass+'&oldpass='+oldpass);  
}
//function to alert not matching passwords
function validate(){
    var oldpass = document.getElementById('oldpassword').value;
	var pass = document.getElementById('password').value;
    var confirmed_pass = document.getElementById('confirmed_password').value;
    var ok = true;
    if (pass != confirmed_pass) {
        //alert("Passwords Do not match");
        document.getElementById('password').style.borderColor = "#E34234";
        document.getElementById('confirmed_password').style.borderColor = "#E34234";
        ok = false;
    }
    else {
        //alert("Passwords Match!!!");
        showDialog("password_confirm");
        resetPass();
        
    }
    return ok;
}
//ajax function to upload profile pic
function upload_profile_pic(){
    var formData = new FormData();
    var input = document.getElementById("prof_pic");
    formData.append("file",input.files[0]);
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function (){
        if(xhr.readyState == 4 && xhr.status == 200){
            console.log(xhr.response);
            if(xhr.response == "ok"){
                showDialog("image_alert");
            }
        }
    }
    xhr.open("POST","./php/up_prof_pic.php",true);
    xhr.send(formData);    
}

function deleteProfile(){
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function (){
		if(xhr.readyState == 4 && xhr.status == 200){
           location.reload();
		}
	}
	xhr.open("POST","./php/del_profile.php",true);
	xhr.send();
}

//to fetch infos used in settings.html
function fetch_info(){
    var xhr1 = new XMLHttpRequest();
    xhr1.readyState = 0;
    xhr1.onreadystatechange = function() {
        if (xhr1.readyState == 4 && xhr1.status==200) {
            var info = JSON.parse(xhr1.responseText);
            if(!info.responseCode){
                //nickname
                var nick = document.getElementById("nickname");
                var nick_fetched = document.createTextNode(info.data['Name']);
                nick.appendChild(nick_fetched);
                
                var email = document.getElementById("email");
                var email_fetched = document.createTextNode(info.data['Email']);
                email.appendChild(email_fetched);
                
                var image = document.getElementById("profile_pic");
                var prof = document.createElement("img");
                if(info.data['image']== null){
                    prof.src = "assets/img/user.png";
                }else{
                    prof.src = "profile_pic/" +info.data['image'];
                    
                }
                prof.style="height:50px;width: 50px;border-radius: 50%;";
                image.appendChild(prof);
                
                var percentage_value = document.getElementById("percentage_value");
                
                var space =Math.round((info.data['space_occupied']/1048576)*(100/1024));    
                
                var percent = document.createTextNode(space+"%");
                percentage_value.appendChild(percent);
                
                var used_space = document.getElementById("used_space");
                var remaining_space = document.getElementById("remaining_space");
                var value = Math.round((info.data['space_occupied']/1048576)*100)/100;
                var used_value = document.createTextNode(value+"mb");
                
                var remaining_value;
                
                if(1024 -value == 1024){
                    remaining_value = document.createTextNode(1+"Gb");
                }else{
                    remaining_value = document.createTextNode(1024-value+"mb");
                }
                used_space.appendChild(used_value);
                remaining_space.appendChild(remaining_value);
                
                var progress_bar = document.getElementById("progress_bar");
                progress_bar.className = "progress-radial progress-"+(Math.ceil(space/5)*5);  
            }
        }
    };
    xhr1.open('POST', './php/fetch_info.php', true);
    xhr1.send();       
}

function showDialog(elem){
	var my_dialog = document.getElementById(elem);
	my_dialog.className = "overlay show_dialog";
}

function hideDialog(){
	var dialog = document.getElementsByClassName("overlay");
	
	for(var i=0; i<dialog.length; i++){
		dialog[i].className = "overlay";
	}
	
	location.reload();
}