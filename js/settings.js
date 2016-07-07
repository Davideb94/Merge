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