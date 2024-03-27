/*!
* Start Bootstrap - Personal v1.0.1 (https://startbootstrap.com/template-overviews/personal)
* Copyright 2013-2023 Start Bootstrap
* Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-personal/blob/master/LICENSE)
*/
// This file is intentionally blank
// Use this file to add JavaScript to your project
// const removeFluidTemplateDefaultAttributes = (element, attributes) => {
//     attributes.forEach(attr => {
//         if(element.hasAttribute(attr)) {
//             element.removeAttribute(attr);
//         }
//     });
// }
//
// const profilePhotoElement = document.getElementById('myprofile');
// removeFluidTemplateDefaultAttributes(profilePhotoElement, ['height', 'width']);
//

document.addEventListener('DOMContentLoaded', (event) => {
    document.getElementById('contactForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const formData = new FormData(this);

        fetch('/contact/json', {
            method: 'POST',
            body: formData,
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    this.reset();
                    // Display the success message
                    document.getElementById('submitSuccessMessage').classList.remove('d-none');
                } else {
                    // Handle failure
                    document.getElementById('submitErrorMessage').classList.remove('d-none');
                }
            })
            .catch(error => {
                // Handle errors here
                console.error('Error:',  error);
                document.getElementById('submitErrorMessage').classList.remove('d-none');
            });
    });
});
