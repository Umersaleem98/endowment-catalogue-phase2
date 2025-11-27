<!-- Cookie Consent Section -->
<div id="cookieConsent"
    class="position-fixed bottom-0 start-0 end-0 bg-dark text-white d-flex justify-content-between align-items-center px-4 py-3"
    style="transform: translateY(100%); transition: transform 0.5s ease-in-out; border-radius: 8px 8px 0 0; z-index: 1050;">
    <div>
        We use cookies to improve your experience. <a href="#" class="text-info text-decoration-underline">Learn
            more</a>
    </div>
    <button id="acceptCookies" class="btn btn-info btn-sm">Accept</button>
</div>

<script>
    // Show cookie bar after page loads if not accepted
    document.addEventListener('DOMContentLoaded', () => {
        const consent = localStorage.getItem('cookiesAccepted');
        const bar = document.getElementById('cookieConsent');
        if (!consent) {
            setTimeout(() => {
                bar.style.transform = 'translateY(0)';
            }, 300);
        }
        document.getElementById('acceptCookies').onclick = () => {
            localStorage.setItem('cookiesAccepted', 'true');
            bar.style.transform = 'translateY(100%)';
        }
    });
</script>
