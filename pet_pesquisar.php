<?php
include "./includes/header.php";
?>

<?php

include "./db/conecta_db.php";

$sqlDono = "SELECT cliente_id, nome FROM cliente ORDER BY nome";
$resultadoDono = retornarDados($sqlDono);

?>


<div class="col-sm-12 col-lg-6">
    <br>
    <h1> Pesquisar Pet </h1>
    <br>
    <form name="formPesquisar" action="pet_listar.php" method="post">


        <div class="input-group mb-3">
            <label class="input-group-text">Dono</label>
            <select class="form-select" name="selDono" aria-label="Default select example">
                <option value="">Escolha o Dono</option>
                <?php while ($linhaDono = mysqli_fetch_assoc($resultadoDono)) { ?>

                <option value="<?php echo $linhaDono["cliente_id"];  ?>"><?php echo $linhaDono["nome"]; ?></option>

                <?php } ?>
            </select>

        </div>

        <div class="input-group">
            <span class="input-group-text">Nome do Animal</span>
            <input type="txt" name="txtNome" class="form-control" />
        </div>


        <div class="form-group">
            <input type="submit" value="Enviar" class="btn btn-primary" />
        </div>
    </form>
</div>



<?php
include "./includes/footer.php";
?>