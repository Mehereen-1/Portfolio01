document.addEventListener("DOMContentLoaded", () => {
    const cards = document.querySelectorAll(".project-card");
    let current = 0;

    function showCard(index) {
        cards.forEach((card, i) => {
            card.classList.toggle("active", i === index);
        });
    }

    document.querySelectorAll(".next-btn").forEach(btn => {
        btn.addEventListener("click", () => {
            current = (current + 1) % cards.length; // loop back to first card
            showCard(current);
        });
    });

    // Initial display
    showCard(current);
});
