document.addEventListener("DOMContentLoaded", () => {
    function revealOnScroll() {
        let elements = document.querySelectorAll(".reveal");

        elements.forEach((elem) => {
            let rect = elem.getBoundingClientRect();

            if (rect.top < window.innerHeight - 120) {
                elem.classList.add("active");
            }
        });
    }

    window.addEventListener("scroll", revealOnScroll);
    revealOnScroll();
});