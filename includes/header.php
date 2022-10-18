<!DOCTYPE html>

<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="css/estilo.css" class="stylesheet">
    <script src="js/bootstrap.bundle.js"></script>

    <title></title>
</head>

<body>
    <!-- Navbar Inicio -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm py-3 py-lg-0 px-3 px-lg-0">
        <a href="index.php" class="navbar-brand ms-lg-5">
            <h1 class="m-0 text-uppercase text-dark"><i class="bi bi-shop fs-1 text-primary me-3"></i>Pet-Cheiroso</h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="index.php" class="nav-item nav-link active">Página Inicial</a>
                <a href="service.html" class="nav-item nav-link">Banho & Tosa</a>
                <a href="product.html" class="nav-item nav-link">Produtos</a>
                <a href="about.html" class="nav-item nav-link">Sobre Nós</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Cliente e Pets</a>
                    <div class="dropdown-menu m-0">
                        <a href="cliente_form.php" class="dropdown-item">Cadastrar Cliente</a>
                        <a href="team.html" class="dropdown-item">Listar Cliente</a>
                        <a href="pet_form.php" class="dropdown-item">Cadastrar Pets</a>
                        <a href="team.html" class="dropdown-item">Listar Pets</a>


                    </div>
                </div>
                <a href="contact.html" class="nav-item nav-link nav-contact bg-warning px-5 ms-lg-5">Contato
                    <i class="bi bi-arrow-right"></i></a>
            </div>
        </div>
    </nav>
    <!-- Navbar Fim -->