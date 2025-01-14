<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="media/muskizlogo.png" type="image/x-icon">
  <link rel="stylesheet" href="prestamos.css">
  <title>Prestamos</title>
</head>

<!--Cabecera principal estatica de cada seccion-->
<body>
  <header>
    <nav class="header-1">
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSgwIRrFipHhzib2ULMT65_BOWt4EEIxC5SIg&s" alt="Logo ayuntamiento muskiz" height="85" width="85">
      <ul id="uno">
        <li><b>Biblioteca Municipal de Muskiz</b></li>
        <li><b>Muskizko Udal Liburutegia</b></li>
      </ul>
    </nav>
    <nav  >
      <a class="ventana" href="index.php"> Inicio</a>
      <a class="ventana" href="Conocenos.html"> Conocenos</a>
      <a class="ventana" href="CatalogoDeLibros.html"> Catalogo de Libros</a>
      <a class="ventanaactual" href="Prestamos.php"> Prestamos</a>
      <a class="ventana" href="Formulario1.php"> Iniciar Sesion</a>
      <form action="bienvenida.php" method="post">
      <a class=perfil href="bienvenida.php"><img class="imgperfil" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSeVg9KLX4bqxbJvgDoC8zXQGIWrrb1fcPsYQ&s" 
      alt="img"></a>
   </form>
   </nav>
  </header>
  <main>
   <!--Creacion de Formulario-->
  <h1>Registrar Préstamo</h1>
  <form class="prestamoform"id="prestamoForm" action="registro_prestamos.php" method="post">
    <label for="ID">ID del libro:</label><br>
    <input type="text" id="ID" name="ID" required><br><br>
       
    <label for="fecha">Fecha de préstamo:</label><br>
    <input type="date" id="fecha" name="fecha" required><br><br>
       
    <input type="submit" value="Registrar Préstamo">
  </form>

  <details>
    <summary><h1 class="prestamos">Préstamos de Biblioteca</h1></summary>
    <!--Creacion de tabla de Prestamos-->
  <table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Autor</th>
            <th>Estado</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>Tan poca vida</td>
            <td>Hanya Yanagihara</td>
            <td>Disponible</td>
        </tr>
        <tr>
            <td>2</td>
            <td>Los siete maridos de Evelynn Hugo</td>
            <td>Taylor Jenkins Reid</td>
            <td>Disponible</td>
        </tr>
        <tr>
            <td>3</td>
            <td>Adiós a la inflamación</td>
            <td>Sandra Moñino</td>
            <td>Disponible</td>
        </tr>
        <tr>
          <td>4</td>
          <td>Cómo hacer que te pasen cosas buenas</td>
          <td>Marian Rojas</td>
          <td>No disponible</td>
        </tr>
        <tr>
          <td>5</td>
          <td>Alas de sangre</td>
          <td>Rebeca Yarros</td>
          <td>Disponible</td>
        </tr>
        <tr>
          <td>6</td>
          <td>Me piden que regrese</td>
          <td>Andrés Triapello</td>
          <td>Disponible</td>
        </tr>

        <tr>
          <td>7</td>
          <td>El buen vasallo</td>
          <td>Francisco Narla</td>
          <td>No disponible</td>
        </tr>
        <tr>
          <td>8</td>
          <td>Intermezzo</td>
          <td>Sally Rooney</td>
          <td>Disponible</td>
        </tr>
        <tr>
          <td>9</td>
          <td>Cinco armas rotas</td>
          <td>Mai Corland</td>
          <td>Disponible</td>
        </tr>
        <tr>
          <td>10</td>
          <td>Una historia divertida</td>
          <td>Emily Henry</td>
          <td>No disponible</td>
        </tr>
        <tr>
          <td>11</td>
          <td>Robot Salvaje</td>
          <td>Peter Brown</td>
          <td>Disponible</td>
        </tr>
        <tr>
          <td>12</td>
          <td>Diario de Greg 19 - En su salsa</td>
          <td>Jeff Kiney</td>
          <td>Disponible</td>
        </tr>
        <tr>
          <td>13</td>
          <td>El gruñón</td>
          <td>Josephine Mark</td>
          <td>No disponible</td>
        </tr>
        <tr>
          <td>14</td>
          <td>Cómic los futbolísimos 3</td>
          <td>Roberto Santiago</td>
          <td>No disponible</td>
        </tr>
        <tr>
          <td>15</td>
          <td>Patas 2</td>
          <td>Nathan FairBairn</td>
          <td>Disponible</td>
        </tr>
        <tr>
          <td>16</td>
          <td>The taoiseach</td>
          <td>Iain Dale</td>
          <td>Disponible</td>
        </tr>
        <tr>
          <td>17</td>
          <td>Healthy calling</td>
          <td>Arianna Molloy</td>
          <td>Disponible</td>
        </tr>
        <tr>
          <td>18</td>
          <td>The last sunset in the west</td>
          <td>cNatalie Sanders</td>
          <td>Disponible</td>
        </tr>
        <tr>
          <td>19</td>
          <td>Room on the broom</td>
          <td>Julia Donaldson</td>
          <td>No disponible</td>
        </tr>
        <tr>
          <td>20</td>
          <td>A taste of the moon</td>
          <td>Michael Grejniech</td>
          <td>Disponible</td>
        </tr>
        <tr>
          <td>21</td>
          <td>Kamala Harris</td>
          <td>Maria Ramirez</td>
          <td>No disponible</td>
        </tr>
        <tr>
          <td>22</td>
          <td>Justiniano</td>
          <td>Peter Sarris</td>
          <td>Dsponible</td>
        </tr>
        <tr>
          <td>23</td>
          <td>Maria Antonieta</td>
          <td>Stefan Zweig</td>
          <td>Disponible</td>
        </tr>
        <tr>
          <td>24</td>
          <td>En el piso de abajo</td>
          <td>Margaret Powell</td>
          <td>Disponible</td>
        </tr>
        <tr>
          <td>25</td>
          <td>Alejandro Magno: El conquistador del mundo</td>
          <td>Robin Lane Fox</td>
          <td>Disponible</td>
        </tr>
        <tr>
          <td>26</td>
          <td>El imperio final</td>
          <td>Brandon Sanderson</td>
          <td>Disponible</td>
        </tr>
        <tr>
          <td>27</td>
          <td>Blackwater I. La riada</td>
          <td>Michael Mcdowell</td>
          <td>Disponible</td>
        </tr>
        <tr>
          <td>28</td>
          <td>Carrie</td>
          <td>Stephen King</td>
          <td>Disponible</td>
        </tr>
        <tr>
          <td>29</td>
          <td>El arte de ser nosotros</td>
          <td>Imma Rubiales</td>
          <td>Disponible</td>
        </tr>
        <tr>
          <td>30</td>
          <td>Corona de medianoche</td>
          <td>Sarah J.Maas</td>
          <td>Disponible</td>
        </tr>
        
    </tbody>
</table>
</details>
</main>
  <footer>
    <p>&copy; 2024 Muskizko Liburutegia. Todos los derechos reservados.</p>
    <p>
      <a href="https://facebook.com" target="_blank">Facebook</a> |
      <a href="https://twitter.com" target="_blank">Twitter</a> |
      <a href="https://instagram.com" target="_blank">Instagram</a>
    </p>
    <p>
      <a href="https://maps.app.goo.gl/edZ15iYRnLJY2kUx6" target="_blank">📍🌍Localización y horarios</a>|
      <a href="mailto:contacto@misitioweb.com">Contáctanos</a>
    </p>
  </footer>
  
</body>