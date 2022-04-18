<?php
include_once('config\conn.php');
require_once 'fpdf/fpdf.php';
$id = $_GET['id'];

$QUERY = "Select * from examen INNER JOIN orden ON orden.id = examen.idOrden where examen.idPaciente = '$id'";
$rsQUERY = mysqli_query($conn, $QUERY) or die('Error: ' . mysqli_error($con));
$countQUERY = mysqli_num_rows($rsQUERY);
$examenes = mysqli_fetch_array($rsQUERY);

$pdf = new FPDF();
$pdf->SetFont('Arial', 'B', 16);
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
    <title>Resultados</title>
</head>

<body>
    <nav class="p-3 bg-dark text-light text-center my-0">
    <p class="m-0">Sistema de laboratorio clinico</p>
    </nav>

    <div class="row">

        <?php
        if ($countQUERY == 0) {
            # code...
            echo "  <h1> <b> No hay resultados disponibles </b> </h1> ";
        } else {
            foreach ($rsQUERY as $examen) {
                $pdf->AddPage();
        ?>
                <div class="col">
                    <ul class="list-group mx-auto w-50">
                        <hi class="mx-auto d-block "> <b> Resultado de la orden realizada el <?php echo $examen['fecha'] ?> </b> </hi>
                        <?php

                        $pdf->Cell(40, 10,  "Fecha" . " " . $examen['fecha']);
                        $pdf->Ln(15);

                        foreach ($examen as $key => $value) {
                            if ($key !== 'id' &&  $key != 'fecha' && $key != 'idPaciente' &&  $key != 'idOrden') {
                                if ($key == 'status' && $value == 1) {
                                    $key = 'Estado';
                                    $value = 'Realizado';
                                }
                                if ($key == 'rojos' || $key == 'blancos') {
                                    $key = 'Globulos' . " " . $key;
                                }
                                $pdf->Cell(40, 10, $key . ":" . $value);
                                $pdf->Ln(15);
                        ?>
                                <li class="list-group-item list-group-item-info"> <?php echo '<b>  ' . $key . ' </b>' . " : " . $value  ?> </li>
                        <?php

                            }
                        }
                        ?>
                        <p>
                            <button class="btn mx-auto d-block text-center boton-azul mt-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                Enviar al correo
                            </button>
                        </p>
                        <div class="collapse  text-center" id="collapseExample">
                            <form action="process/sendEmail.php" method="post">
                                <label for="nombre">Introducir correo</label> <br>
                                <input type="email" name="correo">
                                <br>
                                <p>Doesn't work on Free Hosting</p>
                                <button type="submit"  class="btn btn-primary" name="correox" value="create" styles="margin-left: 20px;">Enviar</button>
                            </form>
                            <br>
                        </div>
                </div>
                </ul>

        <?php
            }
        }
        $pdf->Output('pdf/example.pdf', 'F');
        ?>
    </div>

    <footer style="position: fixed; bottom:0; width: 100%;" class="bg-dark text-center text-light">
        <div class="text-center p-3"">
            © 2022 Copyright.
            Todos los derechos reservados.
        </div>
    </footer>


</body>

</html>