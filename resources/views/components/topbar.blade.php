@vite(['resources/css/topbar.css'])

<nav class="topbar">
    <div class="topbar-content">
        <!-- Nombre de usuario/menú para mobile -->
        <div class="user-name-mobile">
            {{ Auth::user()->name }}
        </div>
        
        <!-- Título -->
        <div class="page-title">
            Dashboard
        </div>
        
        <!-- Dropdown de usuario -->
        <div class="topbar-right">
            <div class="relative">
                <button class="user-dropdown-button" onclick="toggleUserMenu()">
                    <img src="{{ asset('storage/img/logo.svg') }}" alt="User Profile" class="user-avatar">
                    <span class="user-name">{{ Auth::user()->name }}</span>
                </button>

                <!-- Dropdown menu -->
                <div id="userDropdown" class="user-dropdown-menu hidden">
                    <div class="user-dropdown-header">
                        <p class="user-email">{{ Auth::user()->email }}</p>
                    </div>
                    
                    <div class="user-dropdown-items">
                        <a href="{{ route('profile.edit') }}" class="dropdown-item">
                            <span class="material-symbols-outlined">person</span>
                            Profile
                        </a>
                        
                        <!-- Formulario de logout -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item text-red-600">
                                <span class="material-symbols-outlined">logout</span>
                                Log Out
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>