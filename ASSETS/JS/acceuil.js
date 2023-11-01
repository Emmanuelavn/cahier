//variable
const navlink = document.querySelector(".link_container");
const body = document.querySelector("#body");
const bouttonMenu = document.querySelector("#boutton_menu");
const bouttonDiscussion = document.querySelector("#menudiscussion");
const bouttonIa = document.querySelector("#menuia");
const navbar = document.querySelector("#navbar");


//action burgeur menu
const burgeur = document.querySelector(".menu-burgeur");
burgeur.addEventListener("click", () => {
  burgeur.classList.toggle("menu_active");
  navlink.classList.toggle("burgeuractive");
  body.classList.toggle("burgeuractive");
});



//action menu
bouttonMenu.addEventListener("click", () => {
    bouttonDiscussion.classList.toggle("discussion_active");
    bouttonIa.classList.toggle("ia_active");
});

//action boutton scroll up
const btnUp = document.querySelector(".btn_up");
btnUp.addEventListener("click", () => {
    console.log("btn_Up");
    window.scrollTo({
      top: 0,
      behavior: "smooth",
    });
  });

//animation de navbar au scroll

// Variables pour suivre la position de défilement précédente
let prevScrollPos = window.scrollY;

window.addEventListener("scroll", () => {
  const currentScrollPos = window.scrollY;

  if (prevScrollPos < currentScrollPos) {
    navbar.style.top = "-100px"; // Vous pouvez ajuster la valeur négative en fonction de la hauteur de votre navbar
  } else {
    navbar.style.top = "0";
  }

  prevScrollPos = currentScrollPos;
});
