<?php
include "./includes/header.php";
?>

<?php

include "./db/conecta_db.php";

$sql2 = "SELECT cliente_id, nome FROM cliente 
               ORDER BY nome";

$resultado = retornarDados($sql2);
?>

<div class="container-fluid">
    <div class="col-sm-12 col-lg-6">
        <br>
        <h1> Cadastrar Pet </h1>
        <br>

        <div class="form-group">
            <label>Nome do Animal</label>
            <input type="text" name="txtNome" class="form-control" required />
        </div>

        <div class="form-group">
            <label>Data de Nascimento</label>
            <input type="date" name="txtData" class="form-control" />
        </div>

        <div class="form-group">
            <label class="form-label">Selecione o gênero</label>

            <select class="form-select" id="sel1" name="selGenero">
                <option value=""></option>
                <option>Macho</option>
                <option>Fêmea</option>

            </select>
        </div>

        <div class="form-group">
            <label>Peso</label>
            <input type="number" name="txtPeso" class="form-control" />
        </div>

        <div class="form-group">
            <label class="form-label">Selecione a cor</label>

            <select class="form-select" id="sel1" name="selCor">
                <option value=""></option>
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

        <div class="form-group">
            <label for="comment">Observações:</label>
            <textarea class="form-control" rows="5" id="comment" name="txtObs"></textarea>
        </div>

        <form name="formCadastrar" action="pet_cadastrarsalvar.php" method="post">
            <div class="form-group">
                <label>Dono</label>
                <select class="form-select" name="selDono" aria-label="Default select example">
                    <option value=""></option>
                    <?php while ($linha = mysqli_fetch_assoc($resultado)) { ?>

                    <option value="<?php echo $linha["cliente_id"];  ?>"><?php echo $linha["nome"]; ?></option>
                    <?php } ?>
                    <br><br>
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