function myparsing(data,idfunction){
    switch(idfunction){
        case 1: //identification
            
            /* printing image*/
			var container = document.createElement("div");
			container.className = "profile_container";
            
            var isFirefox = typeof InstallTrigger !== 'undefined';
            if(isFirefox){
                container.style.marginTop = "5px";
            }
            
			var container_img = document.createElement("div");
			container_img.className = "container_img";
			var container_name = document.createElement("div");
			container_name.className = "container_name";
			
			var img = document.createElement("img");
			img.id = "ident_pic"; 
            img.alt ="ident_pic";
            if(data['image'] == null){
                   img.src = 'assets/img/user.png';
            }else{
                img.src = "profile_pic/" +data['image'];
            }
			
			var username = document.createTextNode(data['username']);
			
			profile_elem.appendChild(container);
			container.appendChild(container_img);
			container_img.appendChild(img);
			container.appendChild(container_name);
			container_name.appendChild(username);            
            
            //refresh notifications number
            var logo = document.getElementById("notifications_icon");
            logo.removeChild(logo.childNodes[2]);
            if(data['number'] != 0){
                var number_div = document.createElement("div");
                number_div.className = "notification_number";

                var number = document.createTextNode(data['number']);
                
                number_div.appendChild(number);
                logo.appendChild(number_div);
            }
            
            break;
        case 2:
            
            //preview
            var desk = document.getElementById("my_desk");
           
            for(var i = 0;i<data.length;i++){
                
                var div1 = document.createElement("div");
                div1.className = "file_card";
                var div_relative = document.createElement("div");
				div_relative.style.position = "relative";
                var div2 = document.createElement("div");
                div2.className ="card_hover";
                var link1 = document.createElement("a");
                link1.href = "upload/" + data[i]['data']['reference'];
                link1.setAttribute("download","");
                var div3 = document.createElement("div");
                div3.className ="card_download";
                div3.setAttribute("title",data[i]['data']['reference']);
                
                div_relative.appendChild(div2);
                
                //div to change policy 
				var status = data[i]['data']['policy'];
				
                var lock = document.createElement("div");
                lock.setAttribute("onclick","showChangePrivacy(this)");
                lock.className = "privacy_bar";
                lock.setAttribute("title",data[i]['data']['reference']);
				
				var lock_img = document.createElement("img");
				lock_img.className= "lock_img";
                lock_img.alt ="lock_img";
				if(status == "PRIVATE"){
					lock_img.setAttribute("src", "./assets/img/locked.png");
				}
				else if(status == "PUBLIC"){
					lock_img.setAttribute("src", "./assets/img/unlocked.png");
				}
				else{
					console.log(status);
				}
                //---------------------//
                
                
                var downimage = document.createElement('img');
                downimage.className = "download_icon";
                downimage.src = './assets/img/download.png';
                downimage.alt = "download_icon";
                var div4 = document.createElement("div");
                div4.className = "card_delete";
                div4.setAttribute("title",data[i]['data']['reference']);
                div4.setAttribute("onclick","showDeleteFile(this)");
              
                var delimage = document.createElement('img');
                delimage.className = "delete_icon";
                delimage.src = './assets/img/delete.png';
                delimage.alt = "del_img";
                var div5 = document.createElement("div");
                div5.style.backgroundImage = "url(./thumbnails/"+  data[i]['data']['reference']+")";
                div5.className = "card_cover";
                
                
                var text1 = document.createTextNode(data[i]['data']['info']);
                var text2 = document.createTextNode(data[i]['data']['Size']);
                var text3 = document.createTextNode(data[i]['data']['dim']);
                var text4 = document.createTextNode(data[i]['data']['Name']);
                var pelem = document.createElement('p');
                pelem.appendChild(text4);
                
                var div6 = document.createElement("div");
                div6.className = "cover_text_extension";
                div6.appendChild(text1);
                
                var div7 = document.createElement("div");
                div7.className = "cover_text_size";
                div7.appendChild(text2);
                
                var div8 = document.createElement("div");
                div8.className = "cover_text_unit";
                div8.appendChild(text3);
                
                var div9 = document.createElement("div");
                div9.className = "card_footer";
                div9.appendChild(pelem);
                
                
                
                link1.appendChild(div3);
				lock.appendChild(lock_img);
                div2.appendChild(lock);
                div3.appendChild(downimage);
                div4.appendChild(delimage);
                div1.appendChild(div_relative);
                div2.appendChild(link1);
                div2.appendChild(div4);
                div1.appendChild(div5);
                div5.appendChild(div6);
                div6.appendChild(div7);
                div7.appendChild(div8);
                div1.appendChild(div9);
                desk.appendChild(div1);
                
            }
         break;
            
        case 3:
            var list =  document.getElementById("result_search");
            
            
            if(data[0] == null){
                    var empty_search = document.createElement("div");
                    empty_search.className = "aside_element"

                    var text = document.createTextNode("No result accoured");
                    empty_search.appendChild(text);

                    list.appendChild(empty_search);
                
            }else{
                    for(var i = 0; i<data.length; i++){

                        var searched_elem = document.createElement("div");
                        searched_elem.className = "searched_elem";
                        searched_elem.setAttribute("value",data[i]['data']['Email']);
                        searched_elem.setAttribute("onmousedown",'addpeople(event,this)');

                        var profile_pic = document.createElement("div");
                        profile_pic.className = "profile_pic";

                        var image = document.createElement("img");
                        image.className = "searched_pic";
                        image.alt = "searched_pic";
                        if(data[i]['data']['image'] == null){
                            image.src = 'assets/img/user.png';
                        }else{
                            image.src = "profile_pic/"+data[i]['data']['image'];                   
                        }

                        var searched_name = document.createElement("div");
                        searched_name.className = "searched_name";

                        var seached_username = document.createElement("div");
                        seached_username.className = "searched_username";

                        var name = document.createTextNode(data[i]['data']['Name']);

                        seached_username.appendChild(name);

                        var seached_email = document.createElement("div");
                        seached_email.className = "searched_email";

                        var email = document.createTextNode(data[i]['data']['Email']);

                        seached_email.appendChild(email);


                        searched_elem.appendChild(profile_pic);
                        profile_pic.appendChild(image);
                        searched_elem.appendChild(searched_name);
                        searched_name.appendChild(seached_username);
                        searched_name.appendChild(seached_email);


                        list.appendChild(searched_elem);

                }
            }
            break;
            
		case 4:
			var container = document.getElementById("aside_list_contacts");
			for(var i=0; i<data.length; i++){
				var myid = data[i]["data"]["ID"];
				var myname = data[i]["data"]["Name"];
				var myimg = data[i]["data"]["image"];
				
				var element = document.createElement("li");
				element.className = "aside_element people_element";
				element.setAttribute("title", myid);
				
				var image = document.createElement("img");
				image.className = "aside_pic";
                image.alt = "aside_pic";
				if(myimg == null){
					image.src = 'assets/img/user.png';
				}
				else{
					image.src = "profile_pic/"+ myimg;				
				}
				
				var element_name = document.createElement("div");
				element_name.className = "aside_element_name";
				
				var name = document.createTextNode(myname);
				
				var delete_element = document.createElement("div");
				delete_element.className = "delete_contact";
				delete_element.setAttribute("onclick", "showDeleteContact(this.parentElement.title)");
				var delete_content = document.createElement("img");
				delete_content.src = "./assets/img/delete_contact.png";
                delete_content.alt = "delete_contact";
				delete_element.appendChild(delete_content);
				element_name.appendChild(name);
				element.appendChild(image);
				element.appendChild(element_name);
				element.appendChild(delete_element);
				container.appendChild(element);
			}
			break;
        case 5:
            
            var container = document.getElementById("aside_list_desks");
			for(var i=0; i<data.length; i++){
				var myname = data[i]["data"]["Name"];
				var myimg = data[i]["data"]["image"];
				var element = document.createElement("li");
				element.className = "aside_element";
				element.setAttribute("id", data[i]["data"]["ID"]);
				element.setAttribute("onclick", 'otherDesks(this)');
                
				var image = document.createElement("img");
				image.className = "aside_pic";
                image.alt ="aside_pic";
				if(myimg == null){
					image.src = 'assets/img/user.png';
				}
				else{
					image.src = "profile_pic/" +myimg;				
				}
				
				var element_name = document.createElement("div");
				element_name.className = "aside_element_name";
				
				var name = document.createTextNode(myname);
				
				var triangle = document.createElement("img");
				triangle.src = "./assets/img/triangle_desk.png";
				triangle.className = "desk_triangle";
				triangle.alt ="triangle";
				element_name.appendChild(name);
				element.appendChild(image);
				element.appendChild(element_name);
				element.appendChild(triangle);
				container.appendChild(element);
			}
			break;
        case 6:
             //preview other desk
            var desk = document.getElementById("others");
            
            if(data[0] == null){
                    var text = document.createTextNode("The Desk is empty.");

                    desk.appendChild(text);
                
            }else{
                for(var i = 0;i<data.length;i++){

                    var div1 = document.createElement("div");
                    div1.className = "file_card";

                    var div2 = document.createElement("div");
                    div2.className ="card_hover";
					var div_relative = document.createElement("div");
					div_relative.style.position = "relative";
					div_relative.appendChild(div2);
                    var link1 = document.createElement("a");
                    link1.href = "thumbnails/" + data[i]['data']['reference'];
                    link1.setAttribute("download","");
                    var div3 = document.createElement("div");
                    div3.className ="card_download";
                    div3.setAttribute("name",data[i]['data']['reference']);

                    var downimage = document.createElement('img');
                    downimage.className = "download_icon";
                    downimage.src = './assets/img/download.png';
                    downimage.alt = "down_image";
                    var delimage = document.createElement('img');
                    delimage.className = "delete_icon";
                    delimage.src = './assets/img/delete.png';
                    delimage.alt = "del_image";
                    var div5 = document.createElement("div");
                    div5.className = "card_cover";
                    var url = "./upload/" + data[i]['data']['reference'];
                    div5.style.backgroundImage = "url('"+url+"')";
                    div5.style.backgroundRepeat = "no-repeat";
                    div5.style.backgroundPosition = "center center";
                    div5.style.backgroundSize = "auto 249px";



                    var text1 = document.createTextNode(data[i]['data']['info']);
                    var text2 = document.createTextNode(data[i]['data']['Size']);
                    var text3 = document.createTextNode(data[i]['data']['dim']);
                    var text4 = document.createTextNode(data[i]['data']['Name']);
                    var pelem = document.createElement('p');
                    pelem.appendChild(text4);

                    var div6 = document.createElement("div");
                    div6.className = "cover_text_extension";
                    div6.appendChild(text1);

                    var div7 = document.createElement("div");
                    div7.className = "cover_text_size";
                    div7.appendChild(text2);

                    var div8 = document.createElement("div");
                    div8.className = "cover_text_unit";
                    div8.appendChild(text3);

                    var div9 = document.createElement("div");
                    div9.className = "card_footer";
                    div9.appendChild(pelem);



                    link1.appendChild(div3);
                    div3.appendChild(downimage);
                    div1.appendChild(div_relative);
                    div2.appendChild(link1);
                    div1.appendChild(div5);
                    div5.appendChild(div6);
                    div6.appendChild(div7);
                    div7.appendChild(div8);
                    div1.appendChild(div9);
                    desk.appendChild(div1);

                }
            }
         break;
            
        case 7:
            
            var menu = document.getElementById("notifications_menu");
            
            for(var i = 0;i<data.length; i++){
                var elem = document.createElement("div");
                elem.className = "notification_element";
                
                var not_elem = document.createElement("div");
                not_elem.className = "notification_text";
                not_elem.setAttribute("value", data[i]['data']['ID']);
				not_elem.setAttribute("onclick", "visualized_not(this,event); otherDesks(this)");
                var pelem = document.createElement("p");
				var boldname = document.createElement("b");
				var boldtext  = document.createTextNode(data[i]['data']['Name']);
                var text = document.createTextNode(" added you, go check his desk");
                // little ball
                var visualized = document.createElement("div");
                visualized.className ="visualize_notification";
                visualized.className += " visualized";
                visualized.setAttribute("onclick", "visualized_not(this,event)");
                boldname.appendChild(boldtext);
				pelem.appendChild(boldname);
				pelem.appendChild(text);
                not_elem.appendChild(pelem);
                not_elem.appendChild(visualized);
                elem.appendChild(not_elem);
                menu.appendChild(elem);

            }
            break;
    }

}
function deleteContact(id){
	var xhr = new XMLHttpRequest();

	xhr.onreadystatechange = function (){
		if(xhr.readyState == 4 && xhr.status == 200){
			if(xhr.responseText == "ok"){
				viewcontacts();
			}
			console.log(xhr.responseText);
		}
	}
	xhr.open("GET","./php/deleteContact.php?contact=" + id, true);
	xhr.send();
	
	hideDialog();
}
function visualized_not(ele, e){
    var not_id;
    if(ele.getAttribute("value")== null){
        not_id = ele.parentElement.getAttribute("value");
    }else{
        not_id = ele.getAttribute("value");
    }
    var xhr = new XMLHttpRequest();
  
    xhr.onreadystatechange = function (){
        if(xhr.readyState == 4 && xhr.status == 200){
            identification();
        }
    }
    xhr.open("POST","./php/del_notification.php",true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send('IDnot='+not_id);
	
    e.stopPropagation();
    var bell = document.getElementById("notifications_icon");
    bell.click();
}


//ajax function for upload file
function loadfile(){
    var formData = new FormData();// form in js
    var input = document.getElementById("input_file");
    
    var number_uploadedfiles = input.files.length; 
    for(var name = 0; name< number_uploadedfiles ; name++){
        formData.append("file"+ name,input.files[name]);
    }
    
    var xhr = new XMLHttpRequest();
    var _progress = document.getElementById("progress");
    xhr.onreadystatechange = function (){
        if(xhr.readyState == 4 && xhr.status == 200){
            console.log(xhr.response);
            if(xhr.response == "ok"){
                showDialog("upload");   
            }else if(xhr.response == "max_space_reached"){
                showDialog("max-space-reached");
            }
            preview();
            _progress.style.display = "none";
            _progress.style.width = 0;
        }
    }
    
    _progress.className = "progress_bar";
    _progress.style.display = "block";
    xhr.upload.addEventListener('progress', function(e){
        _progress.style.width = Math.round((e.loaded/e.total)*100) + '%';
    }, false);
    xhr.open("POST","./php/upload.php",true);
    xhr.send(formData);

}

function identification(){
    var xhr = new XMLHttpRequest();
    var profile_elem = document.getElementById("profile_elem");

   
    while (profile_elem.firstChild) {
        profile_elem.removeChild(profile_elem.firstChild);
    }
    xhr.onreadystatechange = function (){
        if(xhr.readyState == 4 && xhr.status == 200){
            var packet = JSON.parse(xhr.responseText);
            if(!packet.responseCode){
                myparsing(packet.data,1);
            }
        }
    }
    xhr.open("POST","./php/identification.php",true);
    xhr.send();
    
    
}

//ajax function for preview file

function preview(){
    var xhr = new XMLHttpRequest();
    var desk = document.getElementById("my_desk");  
    while (desk.firstChild) {
        desk.removeChild(desk.firstChild);
    }
    xhr.onreadystatechange = function (){
        if(xhr.readyState == 4 && xhr.status == 200){
            var arraycard = JSON.parse(xhr.responseText);
            if(!arraycard.responsecode){
                myparsing(arraycard,2);
            }
            
        }
    }
    xhr.open("POST","./php/preview.php",true);
    xhr.send();
}

//ajax function to close results of livesearch
function closeresult(){
    var searchbox = document.getElementById("search");
    var list =  document.getElementById("result_search");
    list.className=''; 
    searchbox.value = "";
}
//ajax function for livesearch
function showResult(str){
    
    var searchbox = document.getElementById("search");
    var list =  document.getElementById("result_search");  
    
    while (list.firstChild) {
        list.removeChild(list.firstChild);
    }
    if(str.length==0){
        list.className=''; 
        searchbox.value = "";
        return;
    }

    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange=function() {
        if (xhr.readyState==4 && xhr.status==200) {
            var search = JSON.parse(xhr.responseText);
            myparsing(search,3);                       
            list.className='visible_search';
        }
    }

    xhr.open("GET","./php/livesearch.php?q="+str,true);
    xhr.send();
}
function leftMousePressed(e)
{
    e = e || window.event;
    var button = e.which || e.button;
    return button == 1;
}


//ajax function for add people searched
function addpeople(e,ele){
    if (leftMousePressed(e)){
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange=function() {

        if (xhr.readyState==4 && xhr.status==200) {
            showDialog("contact");
            viewcontacts();
        }
      }
      var str = ele.getAttribute('value');
      xhr.open("GET","./php/addpeople.php?q="+str,true);
      xhr.send();
    }
      
}


//ajax function for contacts 
function viewcontacts(){
    //view of contacts
    var container = document.getElementById("aside_list_contacts");
    while (container.firstChild) {
        container.removeChild(container.firstChild);
    }
    var xhr1 = new XMLHttpRequest();
    xhr1.readyState = 0;
    xhr1.open('POST', './php/listofcontacts.php', true);
    xhr1.send();    
   
		 xhr1.onreadystatechange = function() {
			if (xhr1.readyState == 4 && xhr1.status==200) {
				var decoded_json = JSON.parse(xhr1.responseText);
				myparsing(decoded_json, 4);
		 }
    };
}
//ajax function for listing of other desks 
function viewdesks(){
    //view of contacts
    
 
    var container = document.getElementById("aside_list_desks");
    
    while (container.firstChild) {
        container.removeChild(container.firstChild);
    }
    var xhr1 = new XMLHttpRequest();
    xhr1.readyState = 0;
    xhr1.open('POST', './php/listofdesks.php', true);
    xhr1.send("");    
   
    xhr1.onreadystatechange = function() {
        if (xhr1.readyState == 4 && xhr1.status==200) {
            var decoded_json = JSON.parse(xhr1.responseText);
            myparsing(decoded_json, 5);
        }
    };
}
//ajax function to delete a file
function deleteFile(name){
	var xhr = new XMLHttpRequest();

	xhr.open('GET','./php/delete_file.php?name=' + name, true);
	xhr.send();

	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && xhr.status==200) {
			preview();
		}
	};
	
	hideDialog();
}

//ajax function to show file preview

function otherDesks(ele){
	cleanUi();
	
    var a = document.getElementById("link_others");
    a.className = "";
    
    if(ele.className == "notification_text"){
    
        var list_desks = document.getElementById("aside_list_desks");
        for(var i=0; i<list_desks.childNodes.length; i++){
            
            if(list_desks.childNodes[i].id == ele.getAttribute("value")){
                ele = list_desks.childNodes[i];
                break;
            }
        }
    }
 
    ele.className = "aside_element active_desk";
    ele.childNodes[2].className = "desk_triangle active_desk_triangle";

	
    var xhr = new XMLHttpRequest();
    var desk = document.getElementById("others");
    while (desk.firstChild) {
        desk.removeChild(desk.firstChild);
    }
    xhr.onreadystatechange = function (){
        if(xhr.readyState == 4 && xhr.status == 200){
            console.log(xhr.responseText);
            var preview_desk = JSON.parse(xhr.responseText);
            myparsing(preview_desk, 6);
            openTab('others', ele.getAttribute("value"));
        }
    }
    xhr.open("POST","./php/otherdesk.php",true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send('str='+ele.getAttribute('id'));
}

//ajax function to show notifications box
var show_notifications = false;

function showNotifications(){
	var menu = document.getElementById("notifications_menu");
	while (menu.firstChild) {
        menu.removeChild(menu.firstChild);
    }
	if(!show_notifications){		
		var xhr = new XMLHttpRequest();
		
		xhr.onreadystatechange = function (){
			if(xhr.readyState == 4 && xhr.status == 200){
                var notification = JSON.parse(xhr.responseText);
                if(!notification.responseCode){
                    myparsing(notification.data,7);
                }
                
			}
		}
		
		xhr.open("POST","./php/notifications.php",true);
		xhr.send();
		
		menu.className = "show_notifications_menu";
		show_notifications = true;
	}
	else if(show_notifications){
		menu.className = " ";
		show_notifications = false;
	}
}

//ajax function to change policy
function changePolicy(name){
	var xhr = new XMLHttpRequest();

	xhr.open('GET','./php/change_policy.php?name=' + name, true);
	xhr.send();

	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && xhr.status==200) {
			if(xhr.response== "ok"){
				preview();
			}
		}
	};
	
	hideDialog();
}
