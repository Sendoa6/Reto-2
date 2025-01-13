<?php
   if ($_SESSION) {
        header("Refresh: 0.1; url=miPerfil.html");
   }else{
    header("Refresh: 0.1; url=Formulario1.php");
   }
?> 
