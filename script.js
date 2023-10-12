// script.js
document.addEventListener("DOMContentLoaded", function() {
    const nextButtons = document.querySelectorAll(".next");
    const previousButtons = document.querySelectorAll(".previous");
    const fieldsets = document.querySelectorAll("fieldset");
    const progressBarItems = document.querySelectorAll("#progressbar li");

    let currentStep = 0;

    // Function to show the current step and update indicators
    function showStep(step) {
        fieldsets.forEach((fieldset, index) => {
            if (index === step) {
                fieldset.style.display = "block";
            } else {
                fieldset.style.display = "none";
            }
        });

        progressBarItems.forEach((item, index) => {
            if (index < step) {
                item.classList.add("active");
            } else {
                item.classList.remove("active");
            }
        });
    }

    // Next button click event
    nextButtons.forEach(button => {
        button.addEventListener("click", function() {
            currentStep++;
            showStep(currentStep);
        });
    });

    // Previous button click event
    previousButtons.forEach(button => {
        button.addEventListener("click", function() {
            currentStep--;
            showStep(currentStep);
        });
    });
});
