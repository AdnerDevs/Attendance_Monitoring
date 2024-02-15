// const hamburger = document.querySelector('toggle-btn');

// hamburger.addEventListener("click", function(){

// });

const a = $("#toggle-btn");
const sidebar = ("#sidebar");

a.click(function(){
    sidebar.classList.toggle("expand");
});