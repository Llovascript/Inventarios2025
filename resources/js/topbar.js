window.toggleUserMenu = function() {
    const dropdown = document.getElementById('userDropdown');
    dropdown.classList.toggle('hidden');
    
    // Cerrar el dropdown cuando se hace click fuera de él
    const closeDropdown = function(e) {
        const dropdownButton = document.querySelector('.user-dropdown-button');
        const dropdown = document.getElementById('userDropdown');
        
        if (!dropdownButton.contains(e.target) && !dropdown.contains(e.target)) {
            dropdown.classList.add('hidden');
            document.removeEventListener('click', closeDropdown);
        }
    };
    
    document.addEventListener('click', closeDropdown);
}