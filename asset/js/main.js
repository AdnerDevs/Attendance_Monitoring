// const hamburger = document.querySelector('toggle-btn');

// hamburger.addEventListener("click", function(){

// });

const a = $("#toggle-btn");
let sidebar = ("#sidebar");

a.click(function(){
   $("#sidebar").toggleClass("expand");
});