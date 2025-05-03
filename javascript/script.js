document.addEventListener("DOMContentLoaded", function() {
    // Get the current URL path
    var path = window.location.pathname;
    var page = path.split("/").pop();

    // Get all navigation links
    var navLinks = document.querySelectorAll(".navbar .link a");

    // Loop through each navigation link
    navLinks.forEach(function(link) {
        // If the href of the link matches the current page, add the active class to the parent <li>
        if (link.getAttribute("href") === page) {
            link.parentElement.classList.add("active");
        }
    });
});
