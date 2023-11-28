// validation.js

function validateForm() {
    var filename = document.getElementById("filename").value.trim();
    var filetitle = document.getElementById("filetitle").value.trim();
    var filedesc = document.getElementById("filedesc").value.trim();
    var fileInput = document.getElementById("file");

    if (filename === "" || filetitle === "" || filedesc === "") {
        alert("All fields must be filled out.");
        return false;
    }
    else if(filename.length > 100){
        alert("Filename must be less than 100 characters.");
        return false;
    }
    else if(filetitle.length > 100){
        alert("File title must be less than 100 characters.");
        return false;
    }
    else if(filedesc.length > 1000){
        alert("File description must be less than 1000 characters.");
        return false;
    }
    else if(filename === "" || filetitle === ""){
        alert("Filename and file title must be filled out.");
        return false;
    }
    else if(filename === "" ||  filedesc === ""){
        alert("Filename and file description must be filled out.");
        return false;
    }
    else if(filetitile === "" ||  filedesc === ""){
        alert(" file title and file description must be filled out.");
        return false;
    }
    else if(filename === ""){
        alert("Filename must be filled out.");
        return false;
    }
    else if(filedesc === ""){
        alert("File description must be filled out.");
        return false;
    }
    else if(filetitle === ""){
        alert("File title must be filled out.");
        return false;
    }
    

    // Additional validation for the file input if needed
    if (fileInput.files.length === 0) {
        alert("Please select a file to upload.");
        return false;
    }

    return true;
}
