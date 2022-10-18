<?php

include "./db/conecta_db.php";



$nome = $_POST["txtNome"];
$data = $_POST["txtData"];
$genero = $_POST["selGenero"];
$peso = $_POST["txtPeso"];
$cor = $_POST["selCor"];
$obs = $_POST["txtObs"];
$especie = $_POST["selEspecie"];
$raca = $_POST["selRaca"];
$dono = $_POST["selDono"];

/*
$sql = "INSERT INTO pet (nome, data_nascimento, macho_femea, peso, cor, obs, especie_id, raca_id, cliente_id)
    VALUES  ('$nome', '$data', '$genero', '$peso', '$cor', '$obs', '$especie', '$raca', '$dono')";

if (executarComando($sql)) {
    echo "<h1> Pet Cadastrado com Sucesso</h1>";
} else {
    echo "<h1> Erro ao cadastrar </h1>";
}
*/



global $conn;
$sql = "INSERT INTO pet (nome, data_nascimento, macho_femea, peso, cor, obs, especie_id, raca_id, cliente_id )
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: pet_form.php?error=falhanostmt");
    exit();
}

mysqli_stmt_bind_param($stmt, "sssssssss", $nome, $data, $genero, $peso, $cor, $obs, $especie, $raca, $dono);

mysqli_stmt_execute($stmt);

mysqli_stmt_close($stmt);

header("location: pet_form.php?error=nenhum");
exit();