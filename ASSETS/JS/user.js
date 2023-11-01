
//variable
const navlink = document.querySelector(".link_container");
const body = document.querySelector("#body")
//burgeur menu
const burgeur = document.querySelector(".menu-burgeur");
burgeur.addEventListener("click", () => {
    burgeur.classList.toggle("menu_active");
    navlink.classList.toggle("burgeuractive");
    //body.classList.toggle("burgeuractive");
    console.log("burgeur");
});
