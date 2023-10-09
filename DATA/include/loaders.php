<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
       
    </style>
</head>
<body>
<div class="loader-wrapper">
  
</div>

<script>
window.addEventListener("load", function () {
  document.querySelector(".loader-wrapper").style.display = "none";
  document.querySelector(".loader-wrapper").style.transition = "0.9s eseaout"; // Affiche le chargement pendant 3 secondes
});
</script>
</body>
</html>