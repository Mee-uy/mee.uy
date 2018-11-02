function popMenu() {
    var x = document.getElementById("menu");
    var y = document.getElementById("username_pop");
    if (x.className === "menu") {
        x.className += " responsive";
        y.focus();
    } else {
        x.className = "menu";
    }
}

function popLogin() {
    var x = document.getElementById("stuff");
    var y = document.getElementById("username");
    if (x.className === "stuff") {
        x.className += " responsive";
        y.focus();
    } else {
        x.className = "stuff";
    }
}