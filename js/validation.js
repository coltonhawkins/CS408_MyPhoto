const validation = new JustValidate("#signup");

validation
    .addField("#name", [
        {
            rule: "required"
        }
    ])
    .addField("#email", [
        {
            rule: "required"
        },
        {
            rule: "email"
        },
        {
            validator: (value) => () => {
                return fetch("validate-email.php?email=" + encodeURIComponent(value))
                       .then(function(response) {
                           return response.json();
                       })
                       .then(function(json) {
                           return json.available;
                       });
            },
            errorMessage: "email already taken"
        }
    ])
    .addField("#password", [
        {
            rule: "required"
        },
        {
            rule: "password"
        }
    ])
    .addField("#password_confirmation", [
        {
            validator: (value, fields) => {
                return value === fields["#password"].elem.value;
            },
            errorMessage: "Passwords should match"
        }
    ])
    .onSuccess((event) => {
        document.getElementById("signup").submit();
    });
    
    
    // const uploadValidation = new JustValidate("#uploadGallery", {
    //     rules: {
    //         filename: {
    //             required: true,
    //             // You can add more validation rules if needed
    //         },
    //         filetitle: {
    //             required: true,
    //             // You can add more validation rules if needed
    //         },
    //         filedesc: {
    //             required: true,
    //             // You can add more validation rules if needed
    //         },
    //         file: {
    //             required: true,
    //             fileType: ["jpg", "jpeg", "png", "gif"], // Add the allowed file extensions
    //             maxSize: "10mb" // Define the maximum file size
    //         }
    //     },
    //     messages: {
    //         filename: {
    //             required: "Please enter a file name",
    //             // Customize error messages if needed
    //         },
    //         filetitle: {
    //             required: "Please enter an image title",
    //             // Customize error messages if needed
    //         },
    //         filedesc: {
    //             required: "Please enter an image description",
    //             // Customize error messages if needed
    //         },
    //         file: {
    //             required: "Please select an image file",
    //             fileType: "Invalid file format. Allowed formats: jpg, jpeg, png, gif",
    //             maxSize: "File size should not exceed 2MB"
    //         }
    //     },
    //     submitHandler: function (form) {
    //         // Form is valid, you can submit it
    //         form.submit();
    //     },
    // });