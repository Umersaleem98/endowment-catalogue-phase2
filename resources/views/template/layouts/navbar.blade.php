<style>
    .nav-link {
        font-size: 16px;
        font-weight: 600;
        color: black;
    }

    .nav-item {
        margin-left: 3px; /* Adjust the margin value as needed */
        margin-right: 3px; /* Adjust the margin value as needed */
    }
    .navbar {
    transition: background-color 0.5s ease;
}

.navbar.transparent {
    background-color: rgba(255, 255, 255, 0.5); /* Adjust transparency as needed */
}

.nav-item.active .nav-link {
    color: #007bff; /* Change to your preferred active link color */
    font-weight: 700; /* Make the active link bolder */
}


</style>
<nav class="navbar navbar-expand-lg navbar-light bg-light w-100">
    <a class="navbar-brand ml-3" href="{{ url('/') }}">
        <img src="{{ asset('templates/logo/logo.png') }}" alt="Left Logo" class="navbar-logo ml-4">
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/') }}">Home</a>
            </li>
            <li class="nav-item {{ Request::is('about_us') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('about_us') }}">About Us</a>
            </li>
            <li class="nav-item {{ Request::is('signrature_program') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('signrature_program') }}">Signature Programs</a>
            </li>
            <li class="nav-item {{ Request::is('nust_trust_foundation') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('nust_trust_foundation') }}">Nust Trust Fund</a>
            </li>
            <li class="nav-item {{ Request::is('r_m_o') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('r_m_o') }}">Resource Mobilization Officers</a>
            </li>
            <li class="nav-item {{ Request::is('our_team') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/our_team') }}">Our Team</a>
            </li>
            <li class="nav-item {{ Request::is('contact_us') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/contact_us') }}">Contact Us</a>
            </li>
        </ul>

        <a class="navbar-brand d-lg-none mr-3" href="{{ url('/') }}">
            <img src="{{ asset('templates/images/logo3.png') }}" alt="Right Logo" id="right_logo" class="navbar-logo img-fluid blinking-animation">
        </a>
    </div>

    <a class="navbar-brand d-none d-lg-block mr-4" href="{{ url('/') }}">
        <img src="{{ asset('templates/logo/logo3.png') }}" alt="Right Logo" class="navbar-logo img-fluid blinking-animation">
    </a>
</nav>

<script>
    window.addEventListener('scroll', function() {
        const navbar = document.getElementById('navbar');
        if (window.scrollY > 50) { // Adjust the scroll position value as needed
            navbar.classList.add('transparent');
        } else {
            navbar.classList.remove('transparent');
        }
    });
</script>
