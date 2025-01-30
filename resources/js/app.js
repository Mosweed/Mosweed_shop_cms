// import './bootstrap';


document.addEventListener("DOMContentLoaded", function() {
    const userMenuButton = document.getElementById('user-menu-button');
    const userMenu = document.getElementById('user-menu');

    userMenuButton.addEventListener('click', () => {
        const isMenuOpen = userMenu.getAttribute('aria-expanded') === 'true';
        userMenu.setAttribute('aria-expanded', !isMenuOpen);
        userMenu.classList.toggle('hidden');
    });


    document.addEventListener('click', (event) => {
        if (!userMenu.contains(event.target) && !userMenuButton.contains(event.target)) {
            userMenu.setAttribute('aria-expanded', 'false');
            userMenu.classList.add('hidden');
        }
    });
 });


document.addEventListener("DOMContentLoaded", function() {
    const mobileMenuButton = document.querySelector('[aria-controls="mobile-menu"]');
    const mobileMenu = document.getElementById('mobile-menu');
    const mobileMenuOverlay = document.getElementById('mobile-menu-overlay');

    mobileMenuButton.addEventListener('click', () => {
        const isMenuOpen = mobileMenu.getAttribute('aria-expanded') === 'true';
        mobileMenu.setAttribute('aria-expanded', !isMenuOpen);
        mobileMenu.classList.toggle('hidden');
    });


    document.addEventListener('click', (event) => {
        if (!mobileMenu.contains(event.target) && !mobileMenuButton.contains(event.target)) {
            mobileMenu.setAttribute('aria-expanded', 'false');
            mobileMenu.classList.add('hidden');
        }
    });


});

document.addEventListener("DOMContentLoaded", function() {
        const dropdownButton = document.querySelector('[aria-labelledby="mobile-menu-button"]');
        const dropdownMenu = document.getElementById('mobile-menu-buttens');

        dropdownButton.addEventListener('click', () => {

            if (!dropdownMenu.contains(event.target) && !dropdownButton.contains(event.target)) {
                dropdownMenu.classList.toggle('hidden');
                dropdownButton.setAttribute('aria-expanded', 'false');
            }
      const isMenuOpen = dropdownMenu.classList.contains('hidden');
            dropdownMenu.classList.toggle('hidden', !isMenuOpen);
            dropdownButton.setAttribute('aria-expanded', isMenuOpen ? 'false' : 'true');
        });

        document.addEventListener('click', (event) => {
            if (!dropdownMenu.contains(event.target) && !dropdownButton.contains(event.target)) {
                dropdownMenu.classList.add('hidden');
                dropdownButton.setAttribute('aria-expanded', 'false');
            }
        });
    });
