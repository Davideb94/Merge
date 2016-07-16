window.onload = function(){
	var login = document.getElementById('login_container');
	var header = document.getElementById('header');
	var show_form = false;
	
	login.addEventListener("click", function(){
			var login_menu = document.getElementById('login_menu');
			
			if(show_form == false){
					login_menu.className = 'clicked_login';
					show_form = true;
			}
			else{
				login_menu.className = '';
				show_form = false;
			}
		} 						 
	);
			
	var section_2 = document.getElementById('section_2');
	var offset = section_2.offsetTop - 60;
	var y = document.documentElement.scrollTop || document.body.scrollTop;
	console.log(y);

	if(y>=offset){
		header.className = 'colored_header';
		login.className = 'colored_login';
	}
	if(y<offset){
		header.className = '';
		login.className = '';
	}
	console.log('MY OFFSET IS: ' + offset);
	
	document.addEventListener("scroll", function(){
			var y = document.documentElement.scrollTop || document.body.scrollTop;
			console.log(y);

			if(y>=offset){
				header.className = 'colored_header';
				login.className = 'colored_login';
			}
			if(y<offset){
				header.className = '';
				login.className = '';
			}
			console.log('MY OFFSET IS: ' + offset);
		}
	);
}

function validate(){
	
	var pass = document.getElementById('password').value;
    var confirm_pass = document.getElementById('confirm_pass').value;
    var ok = true;
    if (pass != confirm_pass) {
        //alert("Passwords Do not match");
        document.getElementById('password').style.borderColor = "#E34234";
        document.getElementById('confirm_pass').style.borderColor = "#E34234";
        ok = false;
    }
    else {
        //alert("Passwords Match!!!");
    }
    return ok;
	
}