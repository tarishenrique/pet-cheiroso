<?php

include "./db/conecta_db.php";



$nome = $_POST["txtNome"];
$telefone = $_POST["txtTelefone"];
$endereco = $_POST["txtEndereco"];

/*
$sql = "INSERT INTO cliente (nome, telefone, endereco)
            VALUES ('$nome', '$telefone', '$endereco')";

if (executarComando($sql)) {
    echo "<h1> Cliente Cadastrado com Sucesso</h1>";
} else {
    echo "<h1> Erro ao cadastrar </h1>";
}
*/

global $conn;
$sql = "INSERT INTO cliente (nome, telefone, endereco)
    VALUES (?, ?, ?)";;

$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: cliente_form.php?error=falhanostmt");
    exit();
}

mysqli_stmt_bind_param($stmt, "sss", $nome, $telefone, $endereco);

mysqli_stmt_execute($stmt);

mysqli_stmt_close($stmt);

header("location: cliente_form.php?error=nenhum");
exit();