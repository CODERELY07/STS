// header scroll effect
document.addEventListener('DOMContentLoaded', function() {
    const navbar = document.querySelector('.navbar');
    const navbarToggler = document.getElementById('navbar-toggler');

    navbarToggler.addEventListener('click', function() {
        navbar.classList.toggle('black-bg');
    });

});
