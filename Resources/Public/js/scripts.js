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
if (window.location.pathname === '/contact') {
    document.addEventListener('DOMContentLoaded', (event) => {
        document.getElementById('contactForm').addEventListener('submit', function (e) {
            e.preventDefault();

            const formData = new FormData(this);

            const defaultMessage = "An unexpected error occurred. Please try again later.";
            fetch('/contact/json', {
                method: 'POST',
                body: formData,
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        this.reset();
                        document.getElementById('submitSuccessMessage').classList.remove('d-none');
                    } else {
                        document.getElementById('submitErrorMessage').classList.remove('d-none');
                        document.getElementById('error-message').textContent = data.errorMessage || defaultMessage;
                    }
                })
                .catch(error => {
                    // Handle errors here
                    console.error('Error:', error);
                    document.getElementById('error-message').textContent = defaultMessage;
                    document.getElementById('submitErrorMessage').classList.remove('d-none');
                });
        });
    });
}
