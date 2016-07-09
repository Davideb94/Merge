//ajax function to reset password


function Resetpass(newpass){
    
    
    var xhr1 = new XMLHttpRequest();
    xhr1.readyState = 0;
    xhr1.onreadystatechange = function() {
        if (xhr1.readyState == 4 && xhr1.status==200) {
            
        }
    };
    xhr1.open('POST', './php/ResetPassword.php', true);
    xhr1.send('newpass = '+newpass);    
    
    
}
//ajax function to upload profile pic
function upload_profile_pic(){
    var formData = new FormData();// form in js
    //
    var input = document.getElementById("input_file");
    
    var xhr = new XMLHttpRequest();
    
    xhr.onreadystatechange = function (){
        if(xhr.readyState == 4 && xhr.status == 200){
            if(xhr.response == "ok"){
                alert("image upload successfull.");
            }
        }
    }
    xhr.open("POST","./php/up_prof_pic.php",true);
    xhr.send(formData);    
}

function delete_profile(){
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function (){
        if(xhr.readyState == 4 && xhr.status == 200){
            if(xhr.response == "ok"){
                alert("Your account was deleted.");
            }
        }
    }
    xhr.open("POST","./php/del_profile.php",true);
    xhr.send();
}

//function for left space
function info_space(){
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function (){
        if(xhr.readyState == 4 && xhr.status == 200){
            if(xhr.response == "ok"){
                alert("Your account was deleted.");
            }
        }
    }
    xhr.open("POST","./php/info_space.php",true);
    xhr.send();
}

//function to alert not matching passwords
function validate(){
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
    }
    return ok;
}

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