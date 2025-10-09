<style>
    /* General navbar styling */
    .navbar {
        background-color: #ffffff;
        transition: background-color 0.4s ease;
        padding: 0.6rem 1rem;
    }

    .navbar.transparent {
        background-color: rgba(255, 255, 255, 0.9);
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
    }

    /* Logo styling */
    .navbar-logo {
        height: 55px;
        width: auto;
        object-fit: contain;
    }

    /* Nav links */
    .nav-link {
        font-size: 16px;
        font-weight: 600;
        color: black;
        transition: color 0.3s ease, transform 0.2s ease;
        padding: 10px 12px;
    }

    .nav-link:hover {
        color: #004476; /* Blue hover */
        transform: translateY(-2px);
    }

    /* Active link */
    .nav-item.active .nav-link,
    .nav-link.active {
        color: #004476 !important;
        font-weight: 700;
        border-bottom: 2px solid #004476;
    }

    /* Keep color on hover for active link */
    .nav-item.active .nav-link:hover,
    .nav-link.active:hover {
        color: #004476 !important;
    }

    /* Nav item spacing */
    .nav-item {
        margin: 0 5px;
    }

    /* Responsive logos */
    .navbar-brand {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Right logo (desktop only) */
    .navbar-brand.right-logo {
        margin-right: 1rem;
    }

    /* On small screens */
    @media (max-width: 992px) {
        .navbar-logo {
            height: 45px;
        }

        .navbar-collapse {
            text-align: center;
        }

        .navbar-nav {
            margin-top: 10px;
        }

        .navbar-brand.right-logo {
            display: none;
        }
    }
</style>

<nav class="navbar navbar-expand-lg navbar-light fixed-top shadow-sm" id="navbar">
    <!-- Left Logo -->
    <a class="navbar-brand ms-lg-4" href="{{ route('home') }}">
        <img src="{{ asset('templates/logo/logo.png') }}" alt="Left Logo" class="navbar-logo">
    </a>

    <!-- Toggler for mobile -->
    <button class="navbar-toggler me-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar links -->
    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item {{ Request::is('home') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('home') }}">Home</a>
            </li>
            <li class="nav-item {{ Request::is('aboutus') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('aboutus') }}">About Us</a>
            </li>
            <li class="nav-item {{ Request::is('signrature.program') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('signrature.program') }}">Signature Programs</a>
            </li>
            <li class="nav-item {{ Request::is('nust.trust.foundation') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('nust.trust.foundation') }}">Nust Trust Fund</a>
            </li>
            <li class="nav-item {{ Request::is('r.m.o') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('r.m.o') }}">Resource Mobilization Officers</a>
            </li>
            <li class="nav-item {{ Request::is('our.team') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('our.team') }}">Our Team</a>
            </li>
            <li class="nav-item {{ Request::is('contactus') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('contactus') }}">Contact Us</a>
            </li>
        </ul>
    </div>

    <!-- Right Logo -->
    <a class="navbar-brand right-logo d-none d-lg-block me-lg-4" href="{{ route('home') }}">
        <img src="{{ asset('templates/logo/logo3.png') }}" alt="Right Logo" class="navbar-logo blinking-animation">
    </a>
</nav>

<script>
    // Navbar transparency on scroll
    window.addEventListener('scroll', function () {
        const navbar = document.getElementById('navbar');
        if (window.scrollY > 50) {
            navbar.classList.add('transparent');
        } else {
            navbar.classList.remove('transparent');
        }
    });
</script>
