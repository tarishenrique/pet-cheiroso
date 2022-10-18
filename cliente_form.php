<?php
include "./includes/header.php";
?>

<div class="container-fluid">
    <div class="col-sm-12 col-lg-6">
        <br>
        <h1> Cadastro Cliente </h1>
        <br>
        <form name="formCadastrar" action="cliente_cadastrarsalvar.php" method="post">

            <div class="form-group">
                <label>Nome do Cliente</label>
                <input type="text" name="txtNome" class="form-control" required />
            </div>

            <div class="form-group">
                <label>Telefone</label>
                <input type="text" name="txtTelefone" class="form-control" />
            </div>

            <div class="form-group">
                <label>Endereço</label>
                <input type="text" name="txtEndereco" class="form-control" />
            </div>


            <input type="submit" value="Enviar" class="btn btn-primary" />
    </div>
    </form>
</div>


<?php
include "./includes/footer.php";
?>