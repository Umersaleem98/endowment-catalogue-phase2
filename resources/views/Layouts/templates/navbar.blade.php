<!-- ✅ Modern Bootstrap 5.3 Navbar -->
<nav class="navbar navbar-expand-lg fixed-top bg-white shadow-sm py-2" id="navbar">
    <div class="container-fluid px-lg-4">

        <!-- Left Logo -->
        <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
            <img src="{{ asset('templates/logo/logo.png') }}" alt="Left Logo" class="navbar-logo">
        </a>

        <!-- Mobile Toggler -->
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Links -->
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav align-items-lg-center gap-lg-1">

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('aboutus') ? 'active' : '' }}" href="{{ route('aboutus') }}">About
                        Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('signrature.program') ? 'active' : '' }}"
                        href="{{ route('signrature.program') }}">Signature Programs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('nust.trust.foundation') ? 'active' : '' }}"
                        href="{{ route('nust.trust.foundation') }}">Nust Trust Fund</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('r.m.o') ? 'active' : '' }}"
                        href="{{ route('r.m.o') }}">Resource Mobilization Officers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('our.team') ? 'active' : '' }}"
                        href="{{ route('our.team') }}">Our Team</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('contactus') ? 'active' : '' }}"
                        href="{{ route('contactus') }}">Contact Us</a>
                </li>

            </ul>
        </div>

        <!-- Right Logo -->
        <a class="navbar-brand right-logo d-none d-lg-block" href="{{ route('home') }}">
            <img src="{{ asset('templates/logo/logo3.png') }}" alt="Right Logo" class="navbar-logo blinking-animation">
        </a>

    </div>
</nav>

<!-- ✅ Navbar Styling -->
<style>
    /* Navbar base */
    .navbar {
        transition: all 0.4s ease;
        backdrop-filter: blur(8px);
    }

    /* Transparent on scroll */
    .navbar.transparent {
        background-color: rgba(255, 255, 255, 0.9) !important;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
    }

    /* Logo styling */
    .navbar-logo {
        height: 55px;
        width: auto;
        object-fit: contain;
        transition: transform 0.3s ease;
    }

    .navbar-logo:hover {
        transform: scale(1.05);
    }

    /* Nav links */
    .nav-link {
        font-size: 16px;
        font-weight: 600;
        color: #000;
        padding: 10px 14px;
        transition: color 0.3s ease, transform 0.2s ease;
    }

    .nav-link:hover {
        color: #004476;
        transform: translateY(-2px);
    }

    /* Active state */
    .nav-link.active {
        color: #004476 !important;
        font-weight: 700;
        border-bottom: 2px solid #004476;
    }

    /* Responsive adjustments */
    @media (max-width: 992px) {
        .navbar-logo {
            height: 45px;
        }

        .navbar-collapse {
            text-align: center;
            background: #fff;
            border-radius: 0.5rem;
            margin-top: 10px;
            padding: 10px 0;
        }

        .navbar-nav .nav-link {
            display: inline-block;
            padding: 10px;
        }

        .right-logo {
            display: none !important;
        }
    }

    /* Optional blink animation */
    @keyframes blink {

        0%,
        100% {
            opacity: 1;
        }

        50% {
            opacity: 0.5;
        }
    }

    .blinking-animation {
        animation: blink 2s infinite;
    }
</style>

<!-- ✅ Navbar Scroll Script -->
<script>
    document.addEventListener("scroll", function() {
        const navbar = document.getElementById("navbar");
        navbar.classList.toggle("transparent", window.scrollY > 50);
    });
</script>
