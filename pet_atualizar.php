<?php
// Include config file
require_once "conecta_db.php";

// Define variables and initialize with empty values
$nome = $data = $ficha = "";
$nome_err = $data_err = $ficha_err = "";

// Processing form data when form is submitted
if (isset($_POST["id"]) && !empty($_POST["id"])) {
    // Get hidden input value
    $id = $_POST["id"];

    // Validate name
    $input_name = trim($_POST["title"]);
    if (empty($input_name)) {
        $nome_err = "Por favor, digite o nome do paciente.";
    } elseif (!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
        $nome_err = "Please enter a valid name.";
    } else {
        $nome = $input_name;
    }

    // Validate address address
    $input_data = trim($_POST["data"]);
    if (empty($input_data)) {
        $data_err = "Por favor, digite a data.";
    } else {
        $data = $input_data;
    }

    // Validate salary
    $input_ficha = trim($_POST["numero_ficha"]);
    if (empty($input_ficha)) {
        $ficha_err = "Por favor, digite o número da ficha.";
    } else {
        $ficha = $input_ficha;
    }

    // Check input errors before inserting in database
    if (empty($nome_err) && empty($data_err) && empty($ficha_err)) {
        // Prepare an update statement
        $sql = "UPDATE events SET title=?, event_date=?, numero_ficha=? WHERE id=?";

        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssi", $param_nome, $param_data, $param_ficha, $param_id);

            // Set parameters
            $param_nome = $nome;
            $param_data = $data;
            $param_ficha = $ficha;
            $param_id = $id;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Records updated successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($conn);
} else {
    // Check existence of id parameter before processing further
    if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
        // Get URL parameter
        $id =  trim($_GET["id"]);

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
                    $data = $linha2["event_date"];
                    $ficha = $linha2["numero_ficha"];
                } else {
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);

        // Close connection
        mysqli_close($conn);
    } else {
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>

<?php
include "./includes/header.php"; ?>

<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2 class="mt-5">Atualizar Registro</h2>
                <p>Por favor atualize os dados de registro do paciente e clique em
                    <b>Enviar</b> para confirmar a atualização.
                </p>
                <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                    <div class="form-group">
                        <label>Nome</label>
                        <input type="text" name="title"
                            class="form-control <?php echo (!empty($nome_err)) ? 'is-invalid' : ''; ?>"
                            value="<?php echo $nome; ?>">
                        <span class="invalid-feedback"><?php echo $nome_err; ?></span>
                    </div>
                    <div class="form-group">
                        <?php
                        $data2 = date_create($data);

                        ?>
                        <label>Data - <?php echo date_format($data2, "d/m/Y"); ?></label>
                        <input type="date" name="data"
                            class="form-control <?php echo (!empty($data_err)) ? 'is-invalid' : ''; ?>">
                        <span class="invalid-feedback"><?php echo $data_err; ?></span>
                    </div>
                    <div class="form-group">
                        <label>Número da Ficha</label>
                        <input type="text" name="numero_ficha"
                            class="form-control <?php echo (!empty($ficha_err)) ? 'is-invalid' : ''; ?>"
                            value="<?php echo $ficha; ?>">
                        <span class="invalid-feedback"><?php echo $ficha_err; ?></span>
                    </div>
                    <input type="hidden" name="id" value="<?php echo $id; ?>" />
                    <input type="submit" class="btn btn-primary" value="Enviar">
                    <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
include "./includes/footer.php";
?>