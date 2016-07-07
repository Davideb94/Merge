function myparsing(data,idfunction){
    switch(idfunction){
        case 1: //identification
            
            /* printing image*/
            var profile_elem = document.getElementById("profile_elem");
            var profileSpan = document.createElement('span')
            profileSpan.className = "ident";
            
            var profilediv1 = document.createElement('div');
            profilediv1.className = "vertical_center";
            
            var profilediv2 = document.createElement('div');
            profilediv2.className = "vertical_center";
            
            var profilediv3 = document.createElement('div');
            profilediv3.className = "vertical_center";
            
            var link = document.createElement('a');
            link.href = "#";
            var image = document.createElement('img');
            image.id = "ident_pic"; 
            if(data['image'] == null){
                   image.src = 'assets/img/user.png';
            }else{
                image.src = "data:image/jpeg;base64,"+ data['image'];
            }
            profileSpan.appendChild(profilediv1);
            profileSpan.appendChild(profilediv2);
            link.appendChild(image);
            profileSpan.appendChild(link);
            profileSpan.appendChild(profilediv2);
            profile_elem.appendChild(profileSpan);
            
            /*printing username*/
            
            var usernameSpan = document.createElement('span');
            usernameSpan.className = "ident";
            var userdiv1 = document.createElement('div');
            userdiv1.className = "vertical_center";
            var userdiv2 = document.createElement('div');
            userdiv2.className = "vertical_center";
            userdiv2.id = "ident_name";
            
            var username = document.createElement('p');
            var name = document.createTextNode(data['username']);
            username.appendChild(name);
            userdiv2.appendChild(username);
            
            var userdiv3 = document.createElement('div');
            userdiv3.className = "vertical_center";
            
            usernameSpan.appendChild(userdiv1);
            usernameSpan.appendChild(userdiv2);
            usernameSpan.appendChild(userdiv3);
            profile_elem.appendChild(usernameSpan);
            break;
        case 2:
            
            //preview
            var desk = document.getElementById("my_desk");
           
            for(var i = 0;i<data.length;i++){
                
                var div1 = document.createElement("div");
                div1.className = "file_card";
                div1.style = 'background-color: transparent';
                
                var div2 = document.createElement("div");
                div2.className ="card_hover";
                var link1 = document.createElement("a");
                link1.href = "upload/" + data[i]['data']['reference'];
                link1.setAttribute("download","");
                var div3 = document.createElement("div");
                div3.className ="card_download";
                div3.setAttribute("name",data[i]['data']['reference']);
              
                var downimage = document.createElement('img');
                downimage.className = "download_icon";
                downimage.src = './assets/img/download.png';
                var div4 = document.createElement("div");
                div4.className = "card_delete";
                div4.setAttribute("name",data[i]['data']['reference']);
                div4.setAttribute("onclick","deleteFile(this)");
              
                var delimage = document.createElement('img');
                delimage.className = "delete_icon";
                delimage.src = './assets/img/delete.png';
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
                div4.appendChild(delimage);
                div1.appendChild(div2);
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
    }

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
    
    xhr.onreadystatechange = function (){
        if(xhr.readyState == 4 && xhr.status == 200){
            preview();
        }
    }
    xhr.open("POST","./php/upload.php",true);
    xhr.send(formData);
}

function identification(){
    var xhr = new XMLHttpRequest();
    
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
    if(str.length==0){
        list.className=''; 
        searchbox.value = "";
        return;
    }

    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange=function() {
        if (xhr.readyState==4 && xhr.status==200) {
            list.innerHTML=xhr.responseText;                          
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
            alert(xhr.responseText);
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
    
    var xhr1 = new XMLHttpRequest();
    xhr1.readyState = 0;
    xhr1.open('POST', './php/listofcontacts.php', true);
    xhr1.send();    
   
     xhr1.onreadystatechange = function() {
        if (xhr1.readyState == 4 && xhr1.status==200) {
            document.getElementById("aside_list_contacts").innerHTML =xhr1.responseText;
        }
    };
}
//ajax function for listing of other desks 
function viewdesks(){
    //view of contacts
    
    var xhr1 = new XMLHttpRequest();
    xhr1.readyState = 0;
    xhr1.open('POST', './php/listofdesks.php', true);
    xhr1.send("");    
   
    xhr1.onreadystatechange = function() {
        if (xhr1.readyState == 4 && xhr1.status==200) {
            document.getElementById("aside_list_desks").innerHTML =xhr1.responseText;
        }
    };
}
//ajax function to delete a file
function deleteFile(elem){
	if(confirm('Are you sure you want to delete this file?')){
		var xhr = new XMLHttpRequest();
		var name = elem.getAttribute('name');

		xhr.open('GET','./php/delete_file.php?name=' + name, true);
		xhr.send();

		xhr.onreadystatechange = function() {
			if (xhr.readyState == 4 && xhr.status==200) {
				console.log("Element " + xhr.responseText + " deleted succesfully.");
				preview();
			}
		};
	}
}

//ajax function to show file preview

function otherDesks(ele){
    var a = document.getElementById("link_others");
    a.className = "";
    
    var xhr = new XMLHttpRequest();
  
    xhr.onreadystatechange = function (){
        if(xhr.readyState == 4 && xhr.status == 200){
            var desk = document.getElementById("others");
            desk.innerHTML = xhr.response;
            openTab('others');
        }
    }
    xhr.open("POST","./php/otherdesk.php",true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send('str='+ele.getAttribute('value'));  
}

//ajax function to show notifications box
var show_notifications = false;

function showNotifications(){
	var menu = document.getElementById("notifications_menu");
	
	if(!show_notifications){		
		var xhr = new XMLHttpRequest();
		
		xhr.onreadystatechange = function (){
			if(xhr.readyState == 4 && xhr.status == 200){
				menu.innerHTML = xhr.response;
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