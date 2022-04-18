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
    <title>Laboratorio</title>
</head>

<body>

    <nav class="p-3 bg-dark text-light text-center my-0">
    <p class="m-0">Sistema de laboratorio clinico</p>
    </nav>

    <div class="mx-auto d-block text-center">
        <h1 class="h1">Bienvenido al sistema de laboratorio</h1>
        <br />
        <?php
        $ruta = 'dashboardEnfermero';
        ?>

        <form action="process/EorD.php" method="post">
            <select class="form-select w-25 mx-auto" name="select">
                <option value="dashboardEnfermero" selected>Enfermero</option>
                <option value="dashboardDoctor">Doctor </option>
            </select>
            <br />
            <input class="btn boton-verde" type="submit" value="Ingresar">
        </form>
    </div>


    <footer style="position: fixed; bottom:0; width: 100%;" class="bg-dark text-center text-light">
        <div class="text-center p-3"">
            © 2022 Copyright.
            Todos los derechos reservados.
        </div>
    </footer>
</body>

</html>