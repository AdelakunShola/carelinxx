<style>
.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-toggle {
    display: block;
    padding: 10px 15px;
}

.dropdown-menu {
    position: absolute;
    top: 100%;
    left: 0;
    display: none;
    background: white;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    min-width: 200px;
    z-index: 1000;
    padding: 0;
    margin: 0;
}

.dropdown:hover .dropdown-menu {
    display: block;
}

.dropdown-menu a {
    display: block;
    padding: 12px 20px;
    color: #333;
    text-decoration: none;
    white-space: nowrap;
}

.dropdown-menu a:hover {
    background: #f5f5f5;
}

/* Mobile-only sections - hidden by default */
.mobile-user-section {
    display: none;
}

.mobile-user-name {
    padding: 15px 10px;
    border-bottom: 1px solid #f0f0f0;
    font-weight: 600;
    color: #0d6e6e;
}

.mobile-logout-btn {
    width: 100%;
    padding: 15px 10px;
    background: none;
    border: none;
    border-bottom: 1px solid #f0f0f0;
    text-align: left;
    cursor: pointer;
    color: #666;
    font-size: inherit;
}

.mobile-logout-btn:hover {
    background: #f5f5f5;
}

/* Hamburger Menu Styles */
.hamburger {
    display: none;
    flex-direction: column;
    cursor: pointer;
    padding: 10px;
    z-index: 10001;
    position: relative;
}

.hamburger span {
    width: 25px;
    height: 3px;
    background: #0d6e6e;
    margin: 3px 0;
    transition: 0.3s;
    border-radius: 3px;
}

.hamburger.active span:nth-child(1) {
    transform: rotate(-45deg) translate(-5px, 6px);
}

.hamburger.active span:nth-child(2) {
    opacity: 0;
}

.hamburger.active span:nth-child(3) {
    transform: rotate(45deg) translate(-5px, -6px);
}

/* Mobile Navigation */
@media (max-width: 968px) {
    .hamburger {
        display: flex !important;
    }

    header {
        position: relative;
        z-index: 10000;
    }

    nav {
        position: fixed !important;
        top: 0 !important;
        right: -100% !important;
        width: 280px !important;
        height: 100vh !important;
        background: white !important;
        flex-direction: column !important;
        padding: 80px 20px 20px !important;
        box-shadow: -2px 0 10px rgba(0,0,0,0.1) !important;
        transition: right 0.3s ease !important;
        z-index: 10000 !important;
        overflow-y: auto !important;
        display: flex !important;
    }

    nav.active {
        right: 0 !important;
    }

    nav a {
        padding: 15px 10px;
        border-bottom: 1px solid #f0f0f0;
        width: 100%;
        text-align: left;
    }

    .dropdown {
        width: 100%;
        display: block;
    }

    .dropdown-toggle {
        width: 100%;
        padding: 15px 10px;
        border-bottom: 1px solid #f0f0f0;
    }

    .dropdown-menu {
        position: static;
        box-shadow: none;
        width: 100%;
        background: #f9f9f9;
        padding-left: 20px;
    }

    .dropdown.active .dropdown-menu {
        display: block;
    }

    .header-right {
        display: none;
    }

    /* Show mobile-only sections */
    .mobile-user-section {
        display: block;
        width: 100%;
    }

    /* Overlay */
    .nav-overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.5);
        z-index: 9999;
    }

    .nav-overlay.active {
        display: block;
    }
}

@media (min-width: 969px) {
    .nav-overlay {
        display: none !important;
    }
    
    /* Hide mobile sections on desktop */
    .mobile-user-section {
        display: none !important;
    }
}
</style>

<header>
    <div class="container">
        <div class="header-content">
            <a href="{{ route('home') }}" class="logo">
                <img src="{{ asset('logo.jpg') }}" alt="NUVIACARE - CARE HOME" style="height: 75px; width: auto;">
            </a>

            <!-- Hamburger Menu -->
            <div class="hamburger" id="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>

            <!-- Navigation -->
            <nav id="navMenu">
                <a href="{{ route('find.a.caregiver') }}">Find a caregiver</a>
                <a href="{{ route('become.a.caregiver') }}">Become a care provider</a>
                <div class="dropdown" id="solutionsDropdown">
                    <a href="#" class="dropdown-toggle">Solutions</a>
                    <div class="dropdown-menu">
                        <a href="{{ route('health.plan') }}">Health Plans</a>
                        <a href="{{ route('healthcare.system') }}">Health Systems</a>
                        <a href="{{ route('healthcare.staffing') }}">Professional Staffing</a>
                    </div>
                </div>
                
                @auth
                    <!-- Mobile user section (only visible on mobile) -->
                    <div class="mobile-user-section">
                        <a href="{{ route('user.dashboard') }}">Dashboard</a>
                        <div class="mobile-user-name">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</div>
                        <form method="POST" action="{{ route('user.logout') }}">
                            @csrf
                            <button type="submit" class="mobile-logout-btn">Logout</button>
                        </form>
                    </div>
                @endauth
            </nav>

            <div class="header-right">
                @guest
                    <a href="{{ route('user.login') }}" class="login-link">Log in</a>
                @endguest
                
                @auth
                    <a href="{{ route('user.dashboard') }}" style="margin-right: 15px; color: #0d6e6e; text-decoration: none;">Dashboard</a>
                    <div class="user-avatar" style="display: inline-block;">{{ Auth::user()->first_name ?? Auth::user()->email ?? null }} {{ Auth::user()->last_name ?? '' }}</div>
                    <form method="POST" action="{{ route('user.logout') }}" style="display: inline;">
                        @csrf
                        <button type="submit" style="background: none; border: none; color: #666; cursor: pointer; margin-left: 15px;">Logout</button>
                    </form>
                @endauth
            </div>
        </div>
    </div>

    <!-- Mobile Overlay -->
    <div class="nav-overlay" id="navOverlay"></div>
</header>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Hamburger Menu Toggle
    const hamburger = document.getElementById('hamburger');
    const navMenu = document.getElementById('navMenu');
    const navOverlay = document.getElementById('navOverlay');
    const solutionsDropdown = document.getElementById('solutionsDropdown');

    if (!hamburger || !navMenu || !navOverlay || !solutionsDropdown) {
        console.error('Menu elements not found');
        return;
    }

    hamburger.addEventListener('click', function() {
        hamburger.classList.toggle('active');
        navMenu.classList.toggle('active');
        navOverlay.classList.toggle('active');
        document.body.style.overflow = navMenu.classList.contains('active') ? 'hidden' : '';
    });

    // Close menu when clicking overlay
    navOverlay.addEventListener('click', function() {
        hamburger.classList.remove('active');
        navMenu.classList.remove('active');
        navOverlay.classList.remove('active');
        document.body.style.overflow = '';
    });

    // Mobile dropdown toggle
    const dropdownToggle = solutionsDropdown.querySelector('.dropdown-toggle');
    if (dropdownToggle) {
        dropdownToggle.addEventListener('click', function(e) {
            if (window.innerWidth <= 968) {
                e.preventDefault();
                solutionsDropdown.classList.toggle('active');
            }
        });
    }

    // Close menu when clicking any nav link (except Solutions dropdown)
    const navLinks = navMenu.querySelectorAll('a:not(.dropdown-toggle)');
    navLinks.forEach(link => {
        link.addEventListener('click', function() {
            if (window.innerWidth <= 968) {
                hamburger.classList.remove('active');
                navMenu.classList.remove('active');
                navOverlay.classList.remove('active');
                document.body.style.overflow = '';
            }
        });
    });

    // Reset menu on window resize
    window.addEventListener('resize', function() {
        if (window.innerWidth > 968) {
            hamburger.classList.remove('active');
            navMenu.classList.remove('active');
            navOverlay.classList.remove('active');
            document.body.style.overflow = '';
            solutionsDropdown.classList.remove('active');
        }
    });
});
</script>