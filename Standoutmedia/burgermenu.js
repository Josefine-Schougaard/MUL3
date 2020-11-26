function burgerMenuToggle () {
    var menu = document.getElementsByClassName("mobilenav")[0];
    if (menu.style.display === "block") { 
        menu.style.display = "none";
    }
    else {
        menu.style.display = "block";
    }
}