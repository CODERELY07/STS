const navbar = document.querySelector('.navbar');
const navbarToggler = document.getElementById('navbar-togglers');

navbarToggler.addEventListener('click', function() {
    navbar.classList.toggle('black-bg');
    document.querySelector('.l1').classList.toggle('none');
    document.querySelector('.l2').classList.toggle('none');
});