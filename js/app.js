document.addEventListener("scroll", function(){
		var header = document.getElementById('header');
		var section_2 = document.getElementById('section_2');
		var offset = section_2.offsetTop - 60;
		var y = document.body.scrollTop;
		console.log(y);
	
		if(y>=offset){
			header.className = 'colored_header';
		}
		if(y<offset){
			header.className = '';
		}
		console.log('MY OFFSET IS: ' + offset);
	}
);