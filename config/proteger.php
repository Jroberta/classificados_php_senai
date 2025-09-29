<?php 
//inclui a conexão que por sua vez inicia a sessão
include_once(__DIR__ . '/conexao.php');

//Verifica se a sessão mão existe
if (!isset($_SESSION['usuario_id'])) {
    header("Location:/mini_classificados/auth/login.php?erro=acesso_negado");
    exit();
}

?>