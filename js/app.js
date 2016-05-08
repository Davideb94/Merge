window.onload = function(){
	var login = document.getElementById('login_container');
	
	login.addEventListener("click", function(){
			alert('Log In!');
		} 						 
	);
	
	document.addEventListener("scroll", function(){
			var header = document.getElementById('header');
		
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
		}
	);
}