<?php
include_once('config\conn.php');

$id = $_GET['id'];
$idPaciente = $_GET['idPaciente'];

$QUERY = "Select * from paciente where id = '$idPaciente'";
$rsQUERY = mysqli_query($conn, $QUERY) or die('Error: ' . mysqli_error($conn));
$countQUERY = mysqli_num_rows($rsQUERY);
$paciente = mysqli_fetch_array($rsQUERY);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="p-3 bg-dark text-light text-center my-0">
    <p class="m-0">Sistema de laboratorio clinico</p>
    </nav>

    <h2 class="text-center">Evaluacion de examenes para el paciente <?php echo $paciente['nombre'] ?> </h2>

    <form action="process/addExamen.php" method="post" class="text-center">
        <label for="">Globulos rojos</label>
        <input value="0" name="rojos"  type="text"> <br/>   <br/>

        <label for="">Globulos blancos</label>
        <input value="0" name="blancos"  type="text"> <br/>  <br/>

        <label for="">Plaquetas</label>
        <input value="0" name="plaquetas"  type="text"> <br/>  <br/>

        <label for="">Hemoglobina</label>
        <input value="0" name="hemoglobina"  type="text"> <br/>  <br/>

        <label for="">Hematocrito</label>
        <input value="0" name="hematocrito"  type="text"> <br/>  <br/>

        <label for="">Observaciones</label>
        <textarea  name="observaciones"></textarea> <br/>  <br/>

        <input value="<?php echo $id ?>" name="idOrden"  type="hidden"> <br/>  <br/>
        <input value="<?php echo $idPaciente ?>" name="idPaciente"  type="hidden"> <br/>  <br/>

        <input type="submit" name="submit" value="Enviar" class="btn boton-verde">
    </form>

    <footer style="position: fixed; bottom:0; width: 100%;" class="bg-dark text-center text-light">
        <div class="text-center p-3"">
            © 2022 Copyright.
            Todos los derechos reservados.
        </div>
    </footer>


</body>
</html>