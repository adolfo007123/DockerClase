<!DOCTYPE html>
<html>
  <head>
    <title>Ejercicios</title>
    <h1>Formulario para añadir pelicula.</h1>
  </head>
  <body>
    <script type="text/javascript">
    function comprobarDatos(){
      var lleno = true;

      if(document.getElementById("titulo").value==null||document.getElementById("titulo").value==""){
        alert("Introduce un titulo");
        lleno = false;
      }

      if(document.getElementById("genero").value==null||document.getElementById("genero").value==""){
        alert("Introduce un genero");
        lleno = false;
      }

      if(document.getElementById("pais").value==null||document.getElementById("pais").value==""){
        alert("Introduce un pais");
        lleno = false;
      }

      if(document.getElementById("anio").value==null||document.getElementById("anio").value==""){
        alert("Introduce un anio");
        lleno = false;
      }

      if(document.getElementById("img").value==null||document.getElementById("img").value==""){
        alert("Introduce una imagen");
        lleno = false;
      }
      return lleno;

    }
    
    function ejecutar(){
      var pasa = comprobarDatos();
      alert(pasa);
      if(pasa ===true){
        document.getElementById("formulario").submit();
      }
    }
    
  </script>

<!--
  Cuidao aqui con el ecntype y tiene que ser post 100%
  Buscar sino file upload post php method php
  -->
  <?php
    include 'SqlUtil.php';
    if(!isset($_REQUEST["do"])){
      $do = "inicio";
    } else {
      $do = $_REQUEST["do"];


    }
    if($do=="inicio"){
      echo(
        '<form action="/v_formPelicula.php" method="post"  id="formulario"><!--enctype="multipart/form-data"-->
          <ul>
            <li>
              <label for="titulo">Titulo:</label>
              <input type="text" id="titulo" name="titulo">
            </li>
            <li>
              <label for="genero">Genero:</label>
              <input type="text" id="genero" name="genero">
            </li>
            <li>
              <label for="pais">Pais:</label>
              <input type="text" id="pais" name="pais">
            </li>
            <li>
              <label for="anio">Año:</label>
              <input type="text" id="anio" name="anio">
            </li>
            <li>
              <label for="img" >Imagen:</label>
              <input type="text" id="img" name="img">
              <!--<input type="file" id="img" name="peli_img">-->
            </li>
          </ul>
          <input type="hidden" id="do" value = "insertar">
        </form>'
      );

      
    }else{
      if($do=="insert"){
        $db = new SqlUtil();
        $db->insertPelicula($_REQUEST["titulo"],$_REQUEST["genero"],$_REQUEST["pais"],$_REQUEST["anio"],$_REQUEST["img"],);
        echo("
        <script type='text/javascript'>
        window.location.replace('/videoclub.php');
        </script>
        ");
      }
    }
  ?>
  


  <button name="Enviar" onclick="ejecutar()">Enviar</button>

  <button name="Inicio" role="link" onclick="window.location='/videoclub.php'">Inicio</button>

  </body>
</html>