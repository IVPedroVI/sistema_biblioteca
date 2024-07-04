<?php 
if (isset($_GET["id"])) { // Verifica se o parâmetro "id" foi passado via GET
    $id = $_GET["id"]; // Obtém o valor do parâmetro "id"
    include("connect.php"); // Inclui o arquivo de conexão com o banco de dados
    $sql = "DELETE FROM books WHERE id = $id"; // Query SQL para deletar o livro com o ID especificado
    if (mysqli_query($conn, $sql)) { // Executa a query no banco de dados
        session_start(); // Inicia a sessão (se ainda não estiver iniciada)
        $_SESSION["delete"] = "Livro Deletado com Sucesso"; // Define uma mensagem de sucesso na sessão
        $sql_reset_auto_increment = "ALTER TABLE books AUTO_INCREMENT = 1"; // Query para resetar o AUTO_INCREMENT
        mysqli_query($conn, $sql_reset_auto_increment); // Executa a query para resetar o AUTO_INCREMENT
        header("Location:index.php"); // Redireciona o usuário de volta para index.php após deletar o livro
    }
}
?>
