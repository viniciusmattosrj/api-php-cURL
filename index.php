<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API cURL</title>
</head>
<body>
    <?php
        /* API para testes */
        $url = "https://swapi.co/api/people/?page=2";
        $ch = curl_init($url);

        /* Convertendo para não deixar em uma única string. Criando um objeto */
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        /* Explicitando o tipo de requisição */
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");

        $resultado = json_decode(curl_exec($ch));

        var_dump($resultado);

        foreach($resultado->result as $ator) {
            echo "Nome: {$ator->name} <br />";
            echo "Altura: {$ator->height} <br />";

            foreach($ator->films as $filme) {
                echo "Filme {$filme} <br />";
            }
            echo "<hr>";
        }
    ?>
</body>
</html>