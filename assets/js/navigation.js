(function() {
    'use strict';

    const menuToggle = document.querySelector('.menu-toggle');
    const mainNav = document.querySelector('.main-navigation');

    if (menuToggle) {
        menuToggle.addEventListener('click', function() {
            const isExpanded = menuToggle.getAttribute('aria-expanded') === 'true';
            menuToggle.setAttribute('aria-expanded', !isExpanded);
            mainNav.classList.toggle('toggled');
        });
    }

    document.addEventListener('click', function(event) {
        const isClickInside = mainNav.contains(event.target);
        const isToggleClick = menuToggle.contains(event.target);

        if (!isClickInside && !isToggleClick && mainNav.classList.contains('toggled')) {
            mainNav.classList.remove('toggled');
            menuToggle.setAttribute('aria-expanded', 'false');
        }
    });

    const navLinks = document.querySelectorAll('.main-navigation a');
    navLinks.forEach(function(link) {
        if (link.href === window.location.href) {
            link.classList.add('current');
        }
    });
})();