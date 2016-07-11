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
    if(confirm("Are you sure to modify your nickname?")){
        var xhr = new XMLHttpRequest();
        var newnick = document.getElementById('newnick').value;
        xhr.onreadystatechange = function (){
            if(xhr.readyState == 4 && xhr.status == 200){
                console.log(xhr.response);
                if(xhr.response == "ok"){
                    alert("Nickname modified!");
                }
            }
        }
        
        xhr.open("POST","./php/modify_nick.php",true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("newnick="+newnick);
		
		location.reload();
    }
}
//ajax function to modify email address
function modify_email(){
    if(confirm("Are you sure to modify your Email?")){
        var xhr = new XMLHttpRequest();
        var newmail = document.getElementById('Email').value;
        xhr.onreadystatechange = function (){
            if(xhr.readyState == 4 && xhr.status == 200){
                console.log(xhr.response);
                if(xhr.response == "ok"){
                    alert("Email modified!");
                }
            }
        }
        
        xhr.open("POST","./php/modify_email.php",true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("newmail="+newmail); 
    }
}

//ajax function to reset password
function Resetpass(newpass,oldpass){
    var xhr1 = new XMLHttpRequest();
    xhr1.readyState = 0;
    xhr1.onreadystatechange = function() {
        if (xhr1.readyState == 4 && xhr1.status==200) {
            if(xhr1.responseText == "error match"){
                alert("old password wrong!");
            }else{
                alert("password changed!");
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
        Resetpass(pass,oldpass);
        
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
            if(xhr.response == "ok"){
                alert("image upload successfull.");
            }
        }
    }
    console.log(formData);
    xhr.open("POST","./php/up_prof_pic.php",true);
    xhr.send(formData);    
}

function delete_profile(){
    if(confirm("Are you sure to delete your Account? Your files will finally deleted.")){
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
                
                var space =Math.round((info.data['space_occupied']/1073741824)*100)/100;
                var percent = document.createTextNode(space+"%");
                percentage_value.appendChild(percent);
                
                var used_space = document.getElementById("used_space");
                var remaining_space = document.getElementById("remaining_space");
                
                var used_value = document.createTextNode(Math.round((info.data['space_occupied']/1048576)*100)/100+"mb");
                
                var remaining_value;
                
                if(1024 -Math.round((info.data['space_occupied']/1048576)*100)/100 == 1024){
                    remaining_value = document.createTextNode(1+"Gb");
                }else{
                    remaining_value = document.createTextNode(1024 -Math.round((info.data['space_occupied']/1048576)*100)/100+"mb");
                }
                used_space.appendChild(used_value);
                remaining_space.appendChild(remaining_value);
                
                var progress_bar = document.getElementById("progress_bar");
                progress_bar.className = "progress-radial progress-"+(Math.ceil((info.data['space_occupied']/1073741824)/5)*5-5);  
            }
        }
    };
    xhr1.open('POST', './php/fetch_info.php', true);
    xhr1.send();       
}
