<?php
include "./includes/header.php";
?>

<?php

include "./db/conecta_db.php";

$sqlDono = "SELECT cliente_id, nome FROM cliente ORDER BY nome";
$resultadoDono = retornarDados($sqlDono);

$sqlEspecie = "SELECT especie_id, descricao from especie ORDER BY descricao";
$resultadoEspecie = retornarDados($sqlEspecie);

$sqlRaca = "SELECT raca.raca_id,
CONCAT( especie.descricao, ' - ', raca.descricao ) AS descricao_geral
FROM raca INNER JOIN especie ON raca.especie_id = especie.especie_id;";
$resultadoRaca = retornarDados($sqlRaca);

?>

<div class="container-fluid">
    <div class="col-sm-12 col-lg-6">
        <br>
        <h1> Cadastrar Pet </h1>
        <br>

        <form name="formCadastrar" action="pet_cadastrarsalvar.php" method="post">
            <div class="input-group">
                <span class="input-group-text">Nome do Animal</span>

                <input placeholder="Nome" type="text" name="txtNome" class="form-control" required />
            </div>
            <br>
            <div class="input-group">
                <span class="input-group-text">Data de Nascimento</span>

                <input type="date" name="txtData" class="form-control" />
            </div>
            <br>
            <div class="input-group mb-3">
                <label class="input-group-text">Gênero</label>

                <select class="form-select" id="sel1" name="selGenero">
                    <option value="">Escolha o gênero</option>
                    <option>Macho</option>
                    <option>Fêmea</option>
                </select>
            </div>

            <div class="input-group">
                <span class="input-group-text">Peso</span>
                <input placeholder="Peso em gramas" type="number" name="txtPeso" class="form-control" />
            </div>
            <br>
            <div class="input-group mb-3">
                <label class="input-group-text">Cor</label>

                <select class="form-select" id="sel1" name="selCor">
                    <option value="">Escolha a cor</option>
                    <option>amarelo</option>
                    <option>chocolate</option>
                    <option>branco</option>
                    <option>preto</option>
                    <option>cinzento</option>
                    <option>dourado</option>
                    <option>creme</option>
                    <option>azul</option>
                    <option>vermelho</option>
                    <option>Preto</option>
                    <option>Branco</option>
                    <option>Rajado</option>
                    <option>Cinza</option>
                    <option>Laranja</option>
                    <option>Bicolor</option>
                    <option>Tricolor</option>
                </select>
            </div>

            <div class="input-group">
                <span class="input-group-text">Observações</span>
                <textarea placeholder="Observações Gerais" class="form-control" rows="5" id="comment"
                    name="txtObs"></textarea>
            </div>

            <br>
            <div class="input-group mb-3">
                <label class="input-group-text">Especie</label>
                <select class="form-select" name="selEspecie">
                    <option value="">Escolha a Espécie</option>
                    <?php while ($linhaEspecie = mysqli_fetch_assoc($resultadoEspecie)) { ?>

                    <option value="<?php echo $linhaEspecie["especie_id"];  ?>">
                        <?php echo $linhaEspecie["descricao"]; ?></option>
                    <?php } ?>
                </select>

            </div>

            <div class="input-group mb-3">
                <label class="input-group-text">Raca</label>
                <select class="form-select" name="selRaca">
                    <option value="">Escolha a Raça</option>
                    <?php while ($linhaRaca = mysqli_fetch_assoc($resultadoRaca)) { ?>

                    <option value="<?php echo $linhaRaca["raca_id"];  ?>">
                        <?php echo $linhaRaca["descricao_geral"]; ?>
                    </option>

                    <?php } ?>
                </select>

            </div>

            <div class="input-group mb-3">
                <label class="input-group-text">Dono</label>
                <select class="form-select" name="selDono" aria-label="Default select example">
                    <option value="">Escolha o Dono</option>
                    <?php while ($linhaDono = mysqli_fetch_assoc($resultadoDono)) { ?>

                    <option value="<?php echo $linhaDono["cliente_id"];  ?>"><?php echo $linhaDono["nome"]; ?></option>

                    <?php } ?>
                </select>

            </div>

            <div class="form-group">
                <input type="submit" value="Enviar" class="btn btn-primary" />
            </div>

        </form>
        <br><br>
    </div>


    <?php
    include "./includes/footer.php";
    ?>