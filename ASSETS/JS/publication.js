//document.querySelector(".card-pub").addEventListener("click", function() {
 //   this.classList.toggle("expanded");
//});
 // Fonction pour actualiser la page
 function actualiserPage() {
    // Recharge la page
    location.reload();
  }

  setInterval('load_message()' , 500);
  function load_message(){
    $('#commentaire').load('loadePost.php')
}

  