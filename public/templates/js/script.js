document.addEventListener("DOMContentLoaded", function () {
    setTimeout(function () {
        var preloader = document.getElementById("preloader");
        preloader.style.display = "none";

        var content = document.getElementById("content");
        content.style.display = "block";
    }, 1500); // 2000 milliseconds = 2 seconds
});

function redirectToWhatsApp() {
    const phoneNumber = "923365317822";
    const isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);

    // Construct the appropriate URL based on the device
    const url = isMobile
        ? `https://wa.me/${phoneNumber}` // Redirect to WhatsApp app without message
        : `https://web.whatsapp.com/send?phone=${phoneNumber}`; // Redirect to WhatsApp Web without message

    // Open the URL in a new tab
    window.open(url, "_blank");
}
