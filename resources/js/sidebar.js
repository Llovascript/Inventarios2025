document.querySelectorAll(".sidebar-toggler, .sidebar-menu-button").forEach(button => {
    button.addEventListener("click", () => {
        const sidebar = document.querySelector(".sidebar");
        const contentWrapper = document.querySelector(".content-wrapper");
        const mainContent = document.querySelector(".flex-1");
        
        sidebar.classList.toggle("collapsed");
        
        // Si necesitas alguna lógica adicional para el contenido principal
        // Ajusta el margen del content-wrapper
        if (sidebar.classList.contains("collapsed")) {
            // Cuando el sidebar está colapsado
            if (mainContent) mainContent.style.marginLeft = "85px";
            if (contentWrapper) {
                contentWrapper.style.width = "calc(100% - 30px)"; // 30px para mantener margen a los lados
                contentWrapper.style.marginLeft = "auto";
                contentWrapper.style.marginRight = "auto";
            }
        } else {
            // Cuando el sidebar está expandido
            if (mainContent) mainContent.style.marginLeft = "260px";
            if (contentWrapper) {
                contentWrapper.style.width = "calc(100% - 30px)";
                contentWrapper.style.marginLeft = "auto";
                contentWrapper.style.marginRight = "auto";
            }
        }
    });
});