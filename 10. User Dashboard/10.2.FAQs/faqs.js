

document.querySelectorAll(".faq-box-set").forEach(faqBoxSet => {
    const span = faqBoxSet.querySelector("span"); // Select the span inside the faq-box-set

    faqBoxSet.addEventListener("click", () => {
        faqBoxSet.classList.toggle("active");
        span.textContent = faqBoxSet.classList.contains("active") ? "-" : "+"; // Change span text
    });
});


