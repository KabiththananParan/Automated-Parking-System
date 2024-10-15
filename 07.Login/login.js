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

    const emailPattern = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/; //Regex code from google.
    
    if (!emailPattern.test(email)) {
        alert("Please enter a valid email address.");
        return false;
    }

    return true; 
};