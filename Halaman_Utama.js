document.title = 'Landing Page'

const content = document.querySelector('.content h1')
content.style.color = 'red'

const navbar = document.querySelector('.navbar')
navbar.style.background = 'pink'

const footer = document.querySelector('.footer')
footer.style.background = 'pink'

const home = document.querySelector('.Home');
home.style.color = 'aqua';
if (home) {
    home.style.fontSize = '35px';
}

function ganti() {
    alert('Halaman Tidak Tersedia')
    home.style.color = 'green';
}

const login = document.querySelector('.login');
function ubah() {
    login.textContent = 'Login Broh'
}

function back() {
    login.textContent = 'Sign In'
}

const station = document.querySelector('.station');
function kecil() {
    if (station) {
        station.style.fontSize = '10px';
    }
}

const route = document.querySelector('.route');
function besar() {
    if (route) {
        route.style.fontSize = '50px';
    }
}