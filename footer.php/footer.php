</main>
<footer>
    <p>&copy; <?php echo date('Y')?>Projeto de Classificados - Senai</p>
</footer>
</html>
<?php 
//Fecha a conexão com o banco de dados no final de cada página
if(isset($conexao)) {
    $conexao->close();
}
?>
