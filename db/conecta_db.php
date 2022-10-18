<?php

//https://therichpost.com/insert-fetch-fullcalendar-events-mysql-database/

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pet_cheiroso";

// Criando nova conexão 
global $conn;
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Verificar a conexão 
if (!$conn) {
    die("Falha na conexão" . mysqli_connect_error());
}

function executarComando($sql)
{
    global $conn;
    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($GLOBALS['$conn']);
        return false;
    }
}

function executarComandoRetornarID($sql)
{
    global $conn;
    if (mysqli_query($conn, $sql)) {
        $ultimo_id = mysqli_insert_id($conn);
        return $ultimo_id;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        return 0;
    }
}

function retornarDados($sql)
{
    global $conn;
    $resultado = mysqli_query($conn, $sql);

    if (mysqli_num_rows($resultado) > 0) {
        return $resultado;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        //return 0;
    }
}

function retornarContagem($sql)
{
    global $conn;
    $result = mysqli_query($conn, $sql);
    $count = mysqli_fetch_assoc($result)['COUNT(*)'];
    return $count;
}