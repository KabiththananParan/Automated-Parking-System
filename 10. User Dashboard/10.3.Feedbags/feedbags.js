const form = document.getElementById("feedbackForm");
const message = document.getElementById("thanks");
const feedbag = document.getElementById("feedbag");

form.addEventListener("submit", (event) => {
    if (feedbag.value.trim() === "") {
        event.preventDefault();

        message.textContent = "Please enter your feedback before submitting.";
        message.style.display = "block";
    } 
    else {
        message.textContent = "Thank you for your feedback.";
        message.style.display = "block";
    }
});