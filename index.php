<?php 

require_once ("classes/autoload.php");

$reloj = new Analog(date("g"),date("i"), date("s"));


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/digital.css">
    <title>Document</title>
</head>
<body>
    <h1>Generador de relojes</h1>
    <form action="./" method="GET">
        <label for="">Seleccione el tipo de relo que desea generar:</label>
        <div class="radio_container">

            <?php if ($_GET["clock"] != 'digital'): ?>
                <label for="digital">Digital</label>
                <input type="radio" name="clock" value="digital">
            <?php endif; ?>

            <?php if ($_GET["clock"] != 'analog'): ?>
                <label for="analog">Analógico</label>
            <input type="radio" name="clock" value="analog">
            <?php endif; ?>

        </div>

        <button type="submit">Generar</button>

        <?php 
            if (isset($_GET) && !empty($_GET)) {
                if ($_GET['clock'] == 'digital') {
                    $clock = new Digital(date("g"), date("i"), date("s"), date("a"));
                    echo $clock->clockRender();
                } else {
                    $clock = new Analog(date("h"), date("i"), date("s"));
                    echo $clock->clockRender();
                }
            }
        ?>
        
    </form>
</body>
</html>