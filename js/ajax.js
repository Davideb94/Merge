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
           alert("File Caricato con successo");
            preview();
        }
    }
    xhr.open("POST","./php/upload.php",true);
    xhr.send(formData);
}

//ajax function for preview file

function preview(){
    var xhr = new XMLHttpRequest();
    
    xhr.onreadystatechange = function (){
        if(xhr.readyState == 4 && xhr.status == 200){
            var desk = document.getElementById("my_desk");
            desk.innerHTML = xhr.response;
            
        }
    }
    xhr.open("POST","./php/preview.php",true);
    xhr.send();
}
//ajax function for livesearch
function closeresult(){
    var searchbox = document.getElementById("search");
    var list =  document.getElementById("result_search");
    list.className=''; 
    searchbox.value = "";
}
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
        if (xhr1.readyState == 4) {
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
        if (xhr1.readyState == 4) {
            document.getElementById("aside_list_desks").innerHTML =xhr1.responseText;
        }
    };
}
