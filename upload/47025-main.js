var show = false;

function start(){
    var others_tab = document.getElementById("others_tab");
    others_tab.className = "not_active";
    var others_link = document.getElementById("link_others");
    others_link.style.color = "gray";
    var desk = document.getElementById("my_desk");
    preview();
    viewdesks();
    viewcontacts();
    identification();
}


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
function fetchId(mytab){
	var container = document.getElementById("aside_list_desks");
	
	for(var i=0; i<container.childNodes.length; i++){
		if(container.childNodes[i].className == 'aside_element active_desk'){
			openTab(mytab, container.childNodes[i].value);
			break;
		}
	}
}
function openTab(mytab, id_other) {
	var container = document.getElementById("aside_list_desks");
	
	var mydesk = document.getElementById("my_desk");
	var others = document.getElementById("others");
	
	var mydesk_tab = document.getElementById("my_desk_tab");
	var others_tab = document.getElementById("others_tab");
	
    var mydesk_link = document.getElementById("link_mydesk");
    var others_link = document.getElementById("link_others");
    
	var button = document.getElementById("add_button");
	
	if(mytab == 'mydesk'){
		for(var i=0; i<container.childNodes.length; i++){
			if(container.childNodes[i].value == id_other){
				container.childNodes[i].childNodes[2].className = "desk_triangle";
				break;
			}
		}
		mydesk.style.display = "block";
		others.style.display = "none";
		others.className = "tab";
		
		mydesk_tab.className = "tab_active";
        mydesk_link.style.color = "#2c3e50";
            
		others_tab.className = "";
		others_link.style.color = "gray";
		button.className = "add_file";
	}
	else if(mytab == 'others'){
		for(var i=0; i<container.childNodes.length; i++){
			if(container.childNodes[i].value == id_other){
				container.childNodes[i].childNodes[2].className = "desk_triangle active_desk_triangle";
				break;
			}
		}
		mydesk.style.display = "none";
		mydesk.className = "tab";
		others.style.display = "block";
		
		mydesk_tab.className = "";
        mydesk_link.style.color = "gray";
            
		others_tab.className = "tab_active";
		others_link.style.color = "#2c3e50";
		button.className = "add_file hide_button";
	}
	else
		alert('An error occured');
}

function upload(){
    var input = document.getElementById("input_upload");
    input.submit();
}

function cleanUi(){
	var container = document.getElementById("aside_list_desks");
	for(var i=0; i<container.childNodes.length; i++){
		container.childNodes[i].className = "aside_element";
		container.childNodes[i].childNodes[2].className = "desk_triangle";
	}
}

function showChangePrivacy(elem){
	var my_dialog = document.getElementById("change_privacy");
	my_dialog.className = "overlay show_dialog";
	
	var name = elem.getAttribute("name");
	
	document.getElementById("change_it").setAttribute("onclick",'changePolicy("' + name + '")');
	document.getElementById("do_not_change_it").setAttribute("onclick","hideDialog()");
}

function showDeleteFile(elem){
	var my_dialog = document.getElementById("delete_file");
	my_dialog.className = "overlay show_dialog";
	
	var name = elem.getAttribute("name");
	
	document.getElementById("delete_this_file").setAttribute("onclick",'deleteFile("' + name + '")');
	document.getElementById("do_not_delete_this_file").setAttribute("onclick","hideDialog()");
}

function showDeleteContact(id){	
	var my_dialog = document.getElementById("delete_contact");
	my_dialog.className = "overlay show_dialog";

	document.getElementById("delete_this_contact").setAttribute("onclick","deleteContact(" + id + ")");
	document.getElementById("do_not_delete_this_contact").setAttribute("onclick","hideDialog()");
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
	
}