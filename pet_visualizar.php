<?php
// Check existence of id parameter before processing further
if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
    // Include config file
    include "conecta_db.php";

    // Prepare a select statement
    $sql = "SELECT * FROM events WHERE id = ?";

    if ($stmt = mysqli_prepare($conn, $sql)) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);

        // Set parameters
        $param_id = trim($_GET["id"]);

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($result) == 1) {
                /* Fetch result row as an associative array. Since the result set
                contains only one row, we don't need to use while loop */
                $linha2 = mysqli_fetch_array($result, MYSQLI_ASSOC);

                // Retrieve individual field value
                $nome = $linha2["title"];
                $event_date = $linha2["event_date"];
                $numero_ficha = $linha2["numero_ficha"];
                $tipo = $linha2["nome_tipoagenda"];

                $data2 = date_create($event_date);
            } else {
                // URL doesn't contain valid id parameter. Redirect to error page
                echo "Erro no if linha 21";
                exit();
            }
        } else {
            echo "Erro no if linha 18";
        }
    }

    // Close statement
    mysqli_stmt_close($stmt);

    // Close connection
    mysqli_close($conn);
} else {
    // URL doesn't contain id parameter. Redirect to error page
    echo "Erro if linha 3";
    exit();
}
?>

<?php
include "./includes/header.php"; ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="./index.php"><img src="./img/LOGO-HORIZONTAL2.png"
                        class="d-inline-block align-top" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="3_1_agendamentos_cadastrar.php">Cadastrar</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="3_3_agendamentos_pesquisar.php">Listar</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="2_0_tipoagenda.php">Formas</a>
                        </li>

                    </ul>
                </div>
            </nav>
        </div>
    </div>



    <div class="col-sm-12 col-lg-6">
        <h1 class="mt-5 mb-3">Ver Registro</h1>
        <div class="form-group">
            <label>Nome</label>
            <p><b><?php echo $nome; ?></b></p>
        </div>
        <div class="form-group">
            <label>Data do Agendamento</label>
            <p><b><?php echo date_format($data2, "d/m/Y"); ?></b></p>
        </div>
        <div class="form-group">
            <label>Número da ficha</label>
            <p><a
                    href="https://lidi.sisvida.com.br/atendimento/atendimentos/edit_atendimento/<?php echo $numero_ficha ?>"><?php echo $numero_ficha; ?>
                </a>
            </p>
        </div>
        <div class="form-group">
            <label>Tipo de Agendamento</label>
            <p><b><?php echo $tipo; ?></b></p>
        </div>
        <p><a href="3_3_agendamentos_pesquisar.php" class="btn btn-primary">Voltar</a></p>
    </div>

    <?php
    include "./includes/footer.php";
    ?>