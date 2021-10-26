let btn = document.querySelector("#btn");
let sidebar = document.querySelector(".sidebar");
let searchBtn = document.querySelector(".bx-search");

btn.onclick = function() {
    sidebar.classList.toggle("active");
}

searchBtn.onclick = function() {
    sidebar.classList.toggle("active");
}



$('.button').click(function () {
    $('.overlay').show();
})
$('.close').click(function () {
    $('.overlay').hide();
})

var dataID = $('#button').data('data-id');