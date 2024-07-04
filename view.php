<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8"> <!-- Define o conjunto de caracteres -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Configurações de viewport para responsividade -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"> <!-- Link para o CSS do Bootstrap -->
    <link rel="stylesheet" href="style.css"> <!-- Link para o arquivo de estilo personalizado (style.css) -->
    <title>Detalhes do Livro</title> <!-- Título da página -->
</head>
<body>
    <div class="container">
        <header class="d-flex justify-content-between my-4">
            <h1>Detalhes do Livro</h1> <!-- Título principal da página -->
            <div>
                <a href="index.php" class="btn btn-primary">Voltar</a> <!-- Botão "Voltar" para retornar à página inicial, com estilo do Bootstrap -->
            </div>
        </header>
        <div class="book-details my-4">
            <?php 
            if (isset($_GET["id"])){ // Verifica se o parâmetro GET "id" está definido na URL
                $id = $_GET["id"]; // Obtém o valor do parâmetro GET "id"
                include("connect.php"); // Inclui o arquivo de conexão com o banco de dados
                $sql = "SELECT * FROM books WHERE id = $id"; // Query SQL para selecionar o livro com o ID especificado
                $result = mysqli_query($conn, $sql); // Executa a query no banco de dados
                $row = mysqli_fetch_array($result); // Obtém o resultado da query como um array associativo
                
                // Exibe os detalhes do livro
                ?>
                <h2>Title</h2>
                <p><?php echo $row["title"]; ?></p>
                <h2>Author</h2>
                <p><?php echo $row["author"]; ?></p>
                <h2>Type</h2>
                <p><?php echo $row["type"]; ?></p>
                <h2>Description</h2>
                <p><?php echo $row["description"]; ?></p>
                <?php 
            }
            ?>
        </div>
    </div>
</body>
</html>
