console.log("JavaScript loaded");

document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");
    console.log("Form found");

    form.addEventListener("submit", function (event) {
        console.log("Form submitted");
        // Validation logic...
    });
});



document.getElementById('loginForm').onsubmit = function() {
const email = document.getElementById('email').value.trim();
const password = document.getElementById('password').value.trim();

            if (!email) {
                alert("Please enter your email.");
                return false; 
            }

            if (!password) {
                alert("Please enter your password.");
                return false; 
            }

            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email)) {
                alert("Please enter a valid email address.");
                return false;
            }

            return true; 
        };