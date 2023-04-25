<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Star Wars</title>
</head>

<body>
    <?php

    use LDAP\Result;

    $url = "https://swapi.dev/api/people";

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $resul  = json_decode(curl_exec($ch));

    //var_dump($resul);
    foreach ($resul->results as $ator) {
        echo "Nome:" . $ator->name . "<br>";
        echo "Altura:" . $ator->height . "<br>";
        echo "Cor do Cabelo:" . $ator->hair_color . "<br>";



        foreach ($ator->films as $filme) {
            $titu = file_get_contents($filme);
            $titu = json_decode($titu);
            $titulos = $titu->title;
            echo "Nome do Filme $titulos<br><br>";
        }
        echo "<hr><br>";
    } 

   






    ?>
</body>

</html>