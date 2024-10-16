document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");

    form.addEventListener("submit", function (event) {
        let isValid = true; 

        const errorMessages = document.querySelectorAll(".error-message");
        errorMessages.forEach(msg => msg.remove());

        const name = document.querySelector("input[name='name']");
        const username = document.querySelector("input[name='userName']");
        const phone = document.querySelector("input[name='phone']");
        const email = document.querySelector("input[name='email']");
        const password = document.querySelector("input[name='password']");
        const dob = document.querySelector("input[name='dob']");

        if (!name.value.trim()) {
            isValid = false;
            showError(name, "Name is required.");
        }
        
        if (!username.value.trim()) {
            isValid = false;
            showError(username, "Username is required.");
        }
        
        const phonePattern = /^\+?\d{1,11}$/;  //Regex code from google.
        if (!phone.value.trim()) {
            isValid = false;
            showError(phone, "Phone number is required.");
        } 
        else if (!phonePattern.test(phone.value)) {
            isValid = false;
            showError(phone, "Phone number must contain only numbers and an optional + sign.");
        }

        if (!email.value.trim()) {
            isValid = false;
            showError(email, "Email is required.");
        } 
        else {
            const emailPattern = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/; //Regex code from google.
            
            if (!emailPattern.test(email.value)) {
                isValid = false;
                showError(email, "Please enter a valid email.");
            }
        }

        if (!password.value.trim()) {
            isValid = false;
            showError(password, "Password is required.");
        }

        if (!dob.value) {
            isValid = false;
            showError(dob, "Date of Birth is required.");
        } 
        else {
            const birthYear = new Date(dob.value).getFullYear();
            if (birthYear >= 2024) {
                isValid = false;
                showError(dob, "Year of Birth must be less than 2024.");
            }
        }

        if (!isValid) {
            event.preventDefault();
        }
    });

    function showError(input, message) {
        const errorMessage = document.createElement("div");
        errorMessage.className = "error-message";
        errorMessage.style.color = "red";
        errorMessage.textContent = message;
        input.parentNode.insertBefore(errorMessage, input.nextSibling);
    }
});
