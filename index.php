<?php 

function autoload($class) {
    include "classes/"  .   $class  .   ".php";
}

spl_autoload_register('autoload');


$reloj = new Clock(date("g"),date("i"), date("s"));

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <title>Document</title>
</head>
<body>

</body>
</html>