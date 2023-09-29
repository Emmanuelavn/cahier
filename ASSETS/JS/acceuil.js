const burgeur = document.querySelector(".menu-burgeur");
burgeur.addEventListener("click", () => {
    burgeur.classList.toggle("menu_active");
    console.log("burgeur");
});
const navbar= document.querySelector(".navbar");
const slider_container= document.querySelector(".slider_container");
const  profil= document.querySelector(".profil-setting");
const chevron = document.querySelector(".icon-bar-lateral");
chevron.addEventListener("click", () => {
    console.log("chevron");
    slider_container.classList.toggle("active");
    navbar.classList.toggle("active");
    profil.classList.toggle("active");
    chevron.classList.toggle("active");
});