<?php 

const API_URL = "https://whenisthenextmcufilm.com/api";

#Inicializar una nueva sesion de Curl
$ch = curl_init(API_URL);

#Indicar que queremos recibir el resultado de la peticion y no mostrarla en pantalla
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

#Ejecutar la peticion
$response = curl_exec($ch);

#Decodificar el JSON
$data = json_decode($response, true);

#Cerrar la sesion de Curl
curl_close($ch);
?>

<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo $data["poster_url"];?> ">
    <title>La proxima pelicula de Marvel</title>
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"
    />
</head>
<body>
    <main>
        <h1>La proxima pelicula de Marvel</h1>
        <h2><?php echo $data["title"]; ?></h2>
        <h3><b><?php echo "se estrena en ". $data["days_until"] . " dias"; ?></b></h3>
        <p>Fecha de estreno: <?php echo $data["release_date"] ?></p>
        <p>La siguiente pelicula es: <?php echo $data["following_production"]["title"];?></p>
    </main>

    <section>
        <img src="<?php echo $data["poster_url"];?>" alt="<?php echo $data["title"]; ?>" width="262">
    </section>
    
    
</body>
</html>




<style>
    :root{
        color-scheme: dark;
    }

    body{
        display: grid;
        place-content: center;
    }

    main{
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: center;
    }

    section{
        display: flex;
        justify-content: center;
        text-align: center;
    }

    img{
        margin: 0 auto;

    }

    h1{
        font-size: 30px;
    }

    h2{
        font-size: 28px;
    }

    h3{
        font-size: 26px;
    }

    p{
        font-size: 20px;
    }

    h1, h2, h3, p{
        margin: 0;
    }
</style>