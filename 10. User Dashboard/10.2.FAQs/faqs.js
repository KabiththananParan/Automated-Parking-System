document.querySelectorAll(".faq-box-set").forEach(faqBoxSet => {
    const span = faqBoxSet.querySelector("span"); 

    span.addEventListener("click", () => {
        faqBoxSet.classList.toggle("active");
        
        if (faqBoxSet.classList.contains("active")) {
            span.textContent = "-"; 
        } 
        else {
            span.textContent = "+"; 
        }
        
    });
    
});
