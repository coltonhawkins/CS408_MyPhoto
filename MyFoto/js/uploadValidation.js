function validateForm() {
    var filename = document.getElementById("filename").value.trim();
    var filetitle = document.getElementById("filetitle").value.trim();
    var filedesc = document.getElementById("filedesc").value.trim();
    var fileInput = document.getElementById("file");
    var errorContainer = document.getElementById("error-container");

    // Clear previous error messages
    errorContainer.innerHTML = "";

    if (filename === "" && filetitle === "" && filedesc === "") {
        displayError("All fields must be filled out.");
        return false;
    }

    if (filename === "" && filetitle === "") {
        displayError("Filename and Image title must be filled out.");
        return false;
    }

    if (filename === "" && filedesc === "") {
        displayError("Filename and file description must be filled out.");
        return false;
    }

    if (filetitle === "" && filedesc === "") {
        displayError("Image title and Image description must be filled out.");
        return false;
    }

    if (filename === "") {
        displayError("Filename must be filled out.");
        return false;
    }

    if (filedesc === "") {
        displayError("Image description must be filled out.");
        return false;
    }

    if (filetitle === "") {
        displayError("Image title must be filled out.");
        return false;
    }

    // Additional validation for the file input if needed
    if (fileInput.files.length === 0) {
        displayError("Please select a file to upload.");
        return false;
    }

    // Validate file size (in bytes)
    var fileSize = fileInput.files[0].size; // Size in bytes
    var maxSize = 2 * 1024 * 1024; // 2MB in bytes

    if (fileSize > maxSize) {
        displayError("File size exceeds 2MB limit.");
        return false;
    }

    return true;
}

function displayError(message) {
    var errorContainer = document.getElementById("error-container");
    var errorParagraph = document.createElement("p");
    errorParagraph.textContent = message;
    
    // Clear previous error messages
    errorContainer.innerHTML = "";

    // Show the error container
    errorContainer.style.display = "block";

    // Append the new error message
    errorContainer.appendChild(errorParagraph);
    // Fade out after 5 seconds
    setTimeout(function() {
        errorContainer.fadeOut();
    }, 5000);
}
