var show = false;

function showMenu(){
	var aside = document.getElementsByTagName("aside")[0];
	
	if(show == false){
		aside.className = 'show';
		show = true;
	}
	else{
		aside.className = '';
		show = false;
	}
	
}

function openTab(mytab) {
	var mydesk = document.getElementById("my_desk");
	var others = document.getElementById("others");
	
	var mydesk_tab = document.getElementById("my_desk_tab");
	var others_tab = document.getElementById("others_tab");
	
	var button = document.getElementById("add_button");
	
	if(mytab == 'mydesk'){
		mydesk.style.display = "block";
		others.style.display = "none";
		others.className = "tab";
		
		mydesk_tab.className = "tab_active";
		others_tab.className = "";
		
		button.className = "add_file";
	}
	else if(mytab == 'others'){
		mydesk.style.display = "none";
		mydesk.className = "tab";
		others.style.display = "block";
		
		mydesk_tab.className = "";
		others_tab.className = "tab_active";
		
		button.className = "add_file hide_button";
	}
	else
		alert('An error occured');
}

function upload(){
    var input = document.getElementById("input_upload");
    input.submit();
}
