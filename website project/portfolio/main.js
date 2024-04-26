var typed = new Typed(".typing", {
    strings: ["", "Web Designer", "Web Developer", "Graphic Designer"],
    typeSpeed: 100,
    backSpeed: 60,
    loop: true
});

function bar() {
    var bar = document.querySelector('.bar');
    var aside = document.querySelector('.aside');
    bar.style.display = 'none';
    aside.style.left = '0px';
}
function xmark() {
    var bar = document.querySelector('.bar');
    var aside = document.querySelector('.aside');
    bar.style.display = '';
    aside.style.left = '';
}
