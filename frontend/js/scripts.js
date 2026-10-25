
document.addEventListener("DOMContentLoaded", function () {
    const pages = document.querySelectorAll(".spa-view");

    function showPage(pageId) {
        const selectedPage = document.getElementById(pageId);

        if (!selectedPage || !selectedPage.classList.contains("spa-view")) {
            return;
        }

        pages.forEach(function (page) {
            page.classList.add("spa-hidden");
        });

        selectedPage.classList.remove("spa-hidden");

        document.querySelectorAll('a[href^="#"]').forEach(function (link) {
            link.classList.toggle(
                "active",
                link.getAttribute("href") === "#" + pageId
            );
        });

        window.scrollTo(0, 0);
    }

    document.addEventListener("click", function (event) {
        const link = event.target.closest('a[href^="#"]');

        if (!link) return;

        const pageId = link.getAttribute("href").substring(1);
        const selectedPage = document.getElementById(pageId);

        if (selectedPage && selectedPage.classList.contains("spa-view")) {
            event.preventDefault();
            showPage(pageId);
            history.pushState(null, "", "#" + pageId);
        }
    });

    window.addEventListener("popstate", function () {
        showPage(location.hash.substring(1) || "home");
    });

    showPage(location.hash.substring(1) || "home");

    // Search destinations
    const searchInput = document.getElementById("destinationSearch");
    const cards = document.querySelectorAll(".destination-item");
    const noDestinations = document.getElementById("noDestinations");

    if (searchInput) {
        searchInput.addEventListener("input", function () {
            const query = searchInput.value.toLowerCase().trim();
            let count = 0;

            cards.forEach(function (card) {
                const matches = card.textContent.toLowerCase().includes(query);
                card.style.display = matches ? "" : "none";

                if (matches) count++;
            });

            if (noDestinations) {
                noDestinations.style.display = count === 0 ? "block" : "none";
            }
        });
    }

    // Demo forms
    document.querySelectorAll(".demo-form").forEach(function (form) {
        form.addEventListener("submit", function (event) {
            event.preventDefault();
            alert("This is a demo. Authentication is not connected yet.");
        });
    });

    console.log("Explore Bosnia loaded successfully.");
});
