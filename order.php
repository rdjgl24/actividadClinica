<?php


include_once('config\conn.php');

$id = $_GET['id'];

$QUERY = "Select * from paciente where id = '$id'";
$rsQUERY = mysqli_query($conn, $QUERY) or die('Error: ' . mysqli_error($con));
$countQUERY = mysqli_num_rows($rsQUERY);
$paciente = mysqli_fetch_array($rsQUERY);

$date = date('Y-m-d');
if (isset($_POST['submit'])) {
    $insertquery = "INSERT INTO orden (idPaciente, status, fecha) VALUES ('$id', 0, '$date')";

    $resolve = mysqli_query($conn, $insertquery) or die('Error: ' . mysqli_error($conn));

    header("Location: dashboardEnfermero.php");
}


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
    <title>Ordenes</title>
</head>

<body>
    <nav class="p-3 bg-dark text-light text-center my-0">
    <p class="m-0">Sistema de laboratorio clinico</p>
    </nav>

    <h1 class="mx-2 d-block text-center">Esta seguro que desea enviar una orden de examenes para el paciente <?php echo $paciente['nombre'] ?> </h1>

    <form action="order.php?id=<?php echo $id ?>" method="post">
        <input class="btn mx-auto btn-lg d-block text-center boton-verde mt-5" name="submit" type="submit" value="Enviar">
    </form>


   <footer style="position: fixed; bottom:0; width: 100%;" class="bg-dark text-center text-light">
        <div class="text-center p-3"">
            © 2022 Copyright.
            Todos los derechos reservados.
        </div>
    </footer>
</body>
</html>