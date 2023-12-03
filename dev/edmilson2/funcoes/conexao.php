<?php
function conectarBanco() {
    $host = "localhost";
    $porta = 5432;
    $banco = "gerenciador";
    $cliente = "postgres";
    $senha = "1234";

    $conectar = pg_connect("host=$host port=$porta dbname=$banco user=$cliente password=$senha");

    if (!$conectar) {
        die("Falha na conexão: " . pg_last_error());
    }

    return $conectar;
}
