const button = document.getElementById("btn");
const message = document.getElementById("thanks");
const feedbag = document.getElementById("feedbag");

button.addEventListener("click", () => {
    if(feedbag.value.trim() !== "") {
        message.textContent = "Thank You for Your Feedbag.";
        message.style.display = "block";
    }
    else {
        message.textContent = "Please enter your feedbag before submitting";
        message.style.display = "block";
    }
   
});