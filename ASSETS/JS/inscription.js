const burgeur = document.querySelector(".menu-burgeur");
burgeur.addEventListener("click", () => {
    burgeur.classList.toggle("menu_active");
    console.log("burgeur");
});

// Sélectionnez l'élément sur lequel vous souhaitez détecter le clic
const connexion = document.querySelector("#connexion");
const inscription = document.querySelector("#inscription");
const containerRigth = document.querySelector(".container-rigth");
const containerLeft = document.querySelector(".container-left");
// Ajoutez un gestionnaire d'événements "click"
connexion.addEventListener("click",()=> {
console.log("connexion");
containerLeft.style.opacity="0";
containerRigth.style.opacity="1";
containerRigth.style.width="100%";
containerRigth.style.display="block"
});

inscription.addEventListener("click",()=> {
    console.log("inscription");
    containerLeft.style.opacity="1";
    containerRigth.style.opacity="0";
    containerRigth.style.width="50%";
    containerRigth.style.display="none"
    });

    

