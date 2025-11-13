<style>
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
    background: #00a896;
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

/* Mobile user section - hidden by default */
.mobile-user-section {
    display: none;
}

.mobile-user-name {
    padding: 15px 10px;
    border-bottom: 1px solid #f0f0f0;
    font-weight: 600;
    color: #00a896;
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
        padding: 15px 10px !important;
        border-bottom: 1px solid #f0f0f0;
        width: 100%;
        text-align: left;
    }

    .header-right {
        display: none !important;
    }

    /* Show mobile user section */
    .mobile-user-section {
        display: block;
        width: 100%;
        margin-top: auto;
        padding-top: 20px;
        border-top: 2px solid #e0e0e0;
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

            <nav id="navMenu">
                <a href="{{ route('user.dashboard') }}">Dashboard</a>
                <a href="{{ route('user.jobs') }}">Find Jobs</a>
                <a href="{{ route('user.applications') }}" style="color: #00a896;">My Applications</a>
                <a href="{{ route('user.profile') }}">Profile</a>

                <!-- Mobile user section (only visible on mobile) -->
                <div class="mobile-user-section">
                    <div class="mobile-user-name">{{ Auth::user()->first_name ?? Auth::user()->email ?? null }} {{ Auth::user()->last_name ?? '' }}</div>
                    <form method="POST" action="{{ route('user.logout') }}">
                        @csrf
                        <button type="submit" class="mobile-logout-btn">Logout</button>
                    </form>
                </div>
            </nav>

            <div class="header-right">
                <div class="user-avatar">{{ Auth::user()->first_name ?? Auth::user()->email ?? null }} {{ Auth::user()->last_name ?? Auth::user()->email ?? null }}</div>
                <form method="POST" action="{{ route('user.logout') }}" style="display: inline;">
                    @csrf
                    <button type="submit" style="background: none; border: none; color: #666; cursor: pointer; margin-left: 15px;">Logout</button>
                </form>
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

    if (!hamburger || !navMenu || !navOverlay) {
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

    // Close menu when clicking any nav link
    const navLinks = navMenu.querySelectorAll('a');
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
        }
    });
});
</script>