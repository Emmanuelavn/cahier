const burgeur = document.querySelector(".menu-burgeur");
burgeur.addEventListener("click", () => {
    burgeur.classList.toggle("menu_active");
    console.log("burgeur");
});



const  btn_modif= document.querySelector(".btn_modif");
btn_modif.addEventListener("click", () => {
form_container= document.querySelector(".form_container").classList.toggle("modif_active");
    console.log("modification");
});