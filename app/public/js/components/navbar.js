function showExtendedMenuOptions() {
    if(window.location.pathname.indexOf("/planet/") !== -1){
        var fleet  = document.getElementById("nav-fleet");
        var hangar = document.getElementById("nav-hangar");
        var materials = document.getElementById("materials");
        fleet.classList.add("show");
        hangar.classList.add("show");
        materials.classList.add("show");
    }
}


function init() {
    showExtendedMenuOptions();
}

init();
