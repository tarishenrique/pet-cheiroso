<?php
include "./includes/header.php";
include './db/conecta_db.php';



$dono = $_POST["selDono"];
$nome = $_POST["txtNome"];


//1-0
if (!empty($_POST["selDono"]) && empty($_POST["txtNome"])) {
    $sql2 = "SELECT
    pet.pet_id as pet_id,
    pet.nome as pet_nome,
    pet.data_nascimento,
    pet.macho_femea,
    pet.peso,
    pet.cor,
    pet.obs,
    pet.especie_id,
    pet.raca_id,
    pet.cliente_id,
    cliente.cliente_id,
    cliente.nome as cliente_nome,
    cliente.telefone,
    cliente.endereco,
    raca.raca_id,
    raca.descricao,
    raca.especie_id
FROM
    pet
INNER JOIN cliente ON pet.cliente_id = cliente.cliente_id
INNER JOIN raca ON raca.raca_id = pet.raca_id WHERE pet.cliente_id = '$dono' ORDER BY pet.nome";
    //0-1
} else if (empty($_POST["selDono"]) && !empty($_POST["txtNome"])) {
    $sql2 = "SELECT
    pet.pet_id as pet_id,
    pet.nome as pet_nome,
    pet.data_nascimento,
    pet.macho_femea,
    pet.peso,
    pet.cor,
    pet.obs,
    pet.especie_id,
    pet.raca_id,
    pet.cliente_id,
    cliente.cliente_id,
    cliente.nome as cliente_nome,
    cliente.telefone,
    cliente.endereco,
    raca.raca_id,
    raca.descricao,
    raca.especie_id
FROM
    pet
INNER JOIN cliente ON pet.cliente_id = cliente.cliente_id
INNER JOIN raca ON raca.raca_id = pet.raca_id WHERE pet.nome = '$nome' ORDER BY pet.nome";
    //1-1
} else if (!empty($_POST["selDono"]) && !empty($_POST["txtNome"])) {
    $sql2 = "SELECT
    pet.pet_id as pet_id,
    pet.nome as pet_nome,
    pet.data_nascimento,
    pet.macho_femea,
    pet.peso,
    pet.cor,
    pet.obs,
    pet.especie_id,
    pet.raca_id,
    pet.cliente_id,
    cliente.cliente_id,
    cliente.nome as cliente_nome,
    cliente.telefone,
    cliente.endereco,
    raca.raca_id,
    raca.descricao,
    raca.especie_id
FROM
    pet
INNER JOIN cliente ON pet.cliente_id = cliente.cliente_id
INNER JOIN raca ON raca.raca_id = pet.raca_id WHERE pet.cliente_id = '$dono'AND pet.nome = '$nome' ORDER BY pet.nome";
} else {
    $sql2 = "SELECT
    pet.pet_id as pet_id,
    pet.nome as pet_nome,
    pet.data_nascimento,
    pet.macho_femea,
    pet.peso,
    pet.cor,
    pet.obs,
    pet.especie_id,
    pet.raca_id,
    pet.cliente_id,
    cliente.cliente_id,
    cliente.nome as cliente_nome,
    cliente.telefone,
    cliente.endereco,
    raca.raca_id,
    raca.descricao,
    raca.especie_id
FROM
    pet
INNER JOIN cliente ON pet.cliente_id = cliente.cliente_id
INNER JOIN raca ON raca.raca_id = pet.raca_id";
}

$resultado2 = retornarDados($sql2);

//$data2 = date_create($data);


?>

<form name="formListar" action="" method="post">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">


                <h2>Lista de Pets </h2>

                <div class="form-group">
                    <div class="table-responsive">
                        <table class="table table-striped table-Warning">
                            <thead class="table-light">

                                <th>Nome do Animal</th>
                                <th>Dono</th>
                                <th>Editar</th>
                            </thead>

                            <?php
                            while ($linha2 = mysqli_fetch_assoc($resultado2)) {
                            ?>
                            <tr>


                                <td><?php echo $linha2["pet_nome"]; ?></td>
                                <td><?php echo $linha2["cliente_nome"]; ?></td>





                                <?php

                                    echo "<td>";
                                    echo '<a href="pet_visualizar.php?id=' . $linha2['pet_id'] . '" class="mr-3" title="Visualizar" data-toggle="tooltip"><span class="fa fa-eye" ></span></a>';
                                    echo '<a href="pet_atualizar.php?id=' . $linha2['pet_id'] . '" class="mr-3" title="Editar" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                                    echo '<a href="pet_deletar.php?id=' . $linha2['pet_id'] . '" title="Apagar" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                    echo "</td>";
                                    ?>

                            </tr>

                            <?php } ?>
                        </table>
                    </div>
                </div>
                <input type="button" value="Início" class="btn btn-info" name="btInicio"
                    onclick="location.href='index.php';">
            </div>
        </div>
    </div>

</form>
<?php
include "./includes/footer.php";
?>