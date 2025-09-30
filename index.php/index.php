<?php 
//Inclua o header.php primeiro. Ele já cuida de iniciar a conexão e a sessão;
include_once('header.php');
?>
<h1>Últimos anúncios</h1>
<div class= "anuncios-grid">
    <?php 
    //Dentro deste bloco PHP, a variável $conexao (vinda do header.php) já existe.
    
    //Query com JOIN para buscar dados de 3 tabelas
    $sql = "SELECT 
    a.id, a.titulo, a.preco,
    a.descricao, c.nome AS categoria_nome,
    u.nome AS usuario_nome
    FROM anuncios a
    JOIN categoria c ON a.id_categoria = c.id
    JOIN usuarios u ON a.id_usuario = u.id
    ORDER BY a.data_publicacao DESC";

    //Executa a Query na conexão que já foi estabelecida
    $resultado = $conexao->query($sql);

    if ($resultado && $resultado->num_rows > 0){
        while ($anuncio =  $resultado->fetch_assoc()){
            echo "<div class='anuncio-card'>";
            echo "<h3>" . htmlspecialchars($anuncio['titulo']) . "</h3>";
            echo "<p class='preco'>R$ " . number_format($anuncio ['preco'], 2, ',',',',) .  "</p>";
            echo "<p class='categoria'>".
            htmlspecialchars($anuncio ['categoria_nome']) . "</p>"; 
       //Usamos nl12br() para que as quebras de linha na descrição sejam exibidas

       echo "<p>" . nl2br(htmlspecialchars ($anuncio['descricao'])) . "</p>";
       echo "<small>Publicado por: " . htmlspecialchars($anuncio['usuario_nome']) ."</small>";

       echo "</div>";
        }
    } else {
        echo "<p>Nenhum anúncio encontrado.</p>";}

    ?>

</div> 
<?php
// iNCLUA O FOOTER.PHP NO FINAL PRA FECHAR AS TAGS HTML E A CONEXÃO COM O BANCO DE DADOS 
include_once('footer.php');
?> 
