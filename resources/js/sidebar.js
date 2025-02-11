document.querySelectorAll(".sidebar-toggler, .sidebar-menu-button").forEach(button => {
    button.addEventListener("click", () => {
        const sidebar = document.querySelector(".sidebar");
        const mainContent = document.querySelector(".flex-1");
        
        sidebar.classList.toggle("collapsed");
        
        // Si necesitas alguna lógica adicional para el contenido principal
        if (sidebar.classList.contains("collapsed")) {
            mainContent.style.marginLeft = "85px";
        } else {
            mainContent.style.marginLeft = "260px";
        }
    });
});