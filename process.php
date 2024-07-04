<?php
session_start(); // Inicia a sessão PHP para utilizar variáveis de sessão ($_SESSION)

include("connect.php"); // Inclui o arquivo de conexão com o banco de dados

// Se o formulário de criação de livro foi submetido
if (isset($_POST["create"])) {
    $title = mysqli_real_escape_string($conn, $_POST["title"]); // Obtém e escapa o título do livro
    $author = mysqli_real_escape_string($conn, $_POST["author"]); // Obtém e escapa o autor do livro
    $type = mysqli_real_escape_string($conn, $_POST["type"]); // Obtém e escapa o tipo/gênero do livro
    $description = mysqli_real_escape_string($conn, $_POST["description"]); // Obtém e escapa a descrição do livro

    // Query SQL para inserir um novo livro na tabela "books"
    $sql = "INSERT INTO books (title, author, type, description) VALUES ('$title', '$author', '$type', '$description')";

    // Executa a query no banco de dados
    if(mysqli_query($conn, $sql)){
        $_SESSION["create"] = "Livro Adicionado com Sucesso"; // Define mensagem de sucesso na variável de sessão
        header("Location:index.php"); // Redireciona de volta para a página inicial após a inserção
        exit(); // Encerra o script PHP
    } else {
        die("Error: " . mysqli_error($conn)); // Se houver erro na query, mostra mensagem de erro e encerra o script
    }
}

// Se o formulário de edição de livro foi submetido
if (isset($_POST["edit"])) {
    $id = mysqli_real_escape_string($conn, $_POST["id"]); // Obtém e escapa o ID do livro
    $title = mysqli_real_escape_string($conn, $_POST["title"]); // Obtém e escapa o título do livro
    $author = mysqli_real_escape_string($conn, $_POST["author"]); // Obtém e escapa o autor do livro
    $type = mysqli_real_escape_string($conn, $_POST["type"]); // Obtém e escapa o tipo/gênero do livro
    $description = mysqli_real_escape_string($conn, $_POST["description"]); // Obtém e escapa a descrição do livro

    // Query SQL para atualizar informações de um livro na tabela "books"
    $sql = "UPDATE books SET title = '$title', author = '$author', type = '$type', description = '$description' WHERE id = $id";

    // Executa a query no banco de dados
    if(mysqli_query($conn, $sql)){
        $_SESSION["update"] = "Livro Atualizado com Sucesso"; // Define mensagem de sucesso na variável de sessão
        header("Location:index.php"); // Redireciona de volta para a página inicial após a atualização
        exit(); // Encerra o script PHP
    } else {
        die("Error: " . mysqli_error($conn)); // Se houver erro na query, mostra mensagem de erro e encerra o script
    }
}

mysqli_close($conn); // Fecha a conexão com o banco de dados
?>
