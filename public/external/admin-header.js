/* Set the width of the side navigation to 250px and the left margin of the page content to 250px */
function toggleNav() {
    document.getElementById("mySidenav").classList.toggle("show-nav");
    document.getElementById("main").classList.toggle("nav-content");
}


// When the user scrolls the page, execute myFunction
window.onscroll = function () { myFunction() };

// Get the header
var header = document.getElementById("app-header");

// Get the offset position of the navbar
var sticky = header.offsetTop;

// Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
function myFunction() {
    if (window.pageYOffset > sticky) {
        document.getElementById("mySidenav").classList.add("mt-0");
    } else {
        document.getElementById("mySidenav").classList.remove("mt-0");
    }
}

console.log("Runned")