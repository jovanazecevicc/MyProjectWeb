/*!
* Start Bootstrap - Freelancer v7.0.7 (https://startbootstrap.com/theme/freelancer)
* Copyright 2013-2023 Start Bootstrap
* Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-freelancer/blob/master/LICENSE)
*/
//
// Scripts
// 

window.addEventListener('DOMContentLoaded', event => {

    // Navbar shrink function
    var navbarShrink = function () {
        const navbarCollapsible = document.body.querySelector('#mainNav');
        if (!navbarCollapsible) {
            return;
        }
        if (window.scrollY === 0) {
            navbarCollapsible.classList.remove('navbar-shrink')
        } else {
            navbarCollapsible.classList.add('navbar-shrink')
        }

    };

    // Shrink the navbar 
    navbarShrink();

    // Shrink the navbar when page is scrolled
    document.addEventListener('scroll', navbarShrink);

    // Activate Bootstrap scrollspy on the main nav element
    const mainNav = document.body.querySelector('#mainNav');
    if (mainNav) {
        new bootstrap.ScrollSpy(document.body, {
            target: '#mainNav',
            rootMargin: '0px 0px -40%',
        });
    };

    // Collapse responsive navbar when toggler is visible
    const navbarToggler = document.body.querySelector('.navbar-toggler');
    const responsiveNavItems = [].slice.call(
        document.querySelectorAll('#navbarResponsive .nav-link')
    );
    responsiveNavItems.map(function (responsiveNavItem) {
        responsiveNavItem.addEventListener('click', () => {
            if (window.getComputedStyle(navbarToggler).display !== 'none') {
                navbarToggler.click();
            }
        });
    });

});

 // Simple SPA-style navigation

 // SPA-style navigation

 // SPA-style navigation
document.addEventListener('DOMContentLoaded', function () {
    const masthead = document.querySelector('.masthead');
    const sections = document.querySelectorAll(
        '#portfolio, #about, #contact'
    );
    const navLinks = document.querySelectorAll(
        '#navbarResponsive .nav-link'
    );
    const brand = document.querySelector('.navbar-brand');

    function showSection(targetId) {
        const target = targetId === 'page-top'
            ? masthead
            : document.getElementById(targetId);

        if (!target) return;

        if (masthead) {
            masthead.classList.toggle('spa-hidden', target !== masthead);
        }

        sections.forEach(function (section) {
            section.classList.toggle('spa-hidden', section !== target);
        });

        history.replaceState(null, '', '#' + targetId);
    }

    navLinks.forEach(function (link) {
        link.addEventListener('click', function (event) {
            const targetId = link.getAttribute('href').substring(1);

            if (targetId === 'portfolio' ||
                targetId === 'about' ||
                targetId === 'contact') {
                event.preventDefault();
                showSection(targetId);
            }
        });
    });

    if (brand) {
        brand.addEventListener('click', function (event) {
            event.preventDefault();
            showSection('page-top');
        });
    }

    showSection('page-top');
});


 