<?php
include_once(__DIR__ . "/../../util/config.php");
?>

<nav class="navbar navbar-expand-md navbar-light bg-success">
    <a class="navbar-brand" href="<?= BASE_URL ?>">Futebol</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navSite">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navSite">
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="<?= BASE_URL ?>">Home</a>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navDropDown" data-toggle="dropdown">Cadastros</a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="<?= CADASTRO_JOGADOR ?>">Jogadores</a>
                <a class="dropdown-item" href="<?= TIMES_URL ?>">Times</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Sobre</a>
        </li>
    </ul>
    </div>
</nav>
