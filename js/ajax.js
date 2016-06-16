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