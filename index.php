<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"> <!-- Link para o CSS do Bootstrap -->
    <title>Lista de Livros</title> <!-- Título da página -->
</head>
<body>
    <div class="container">
        <header class="d-flex justify-content-between my-4">
            <h1>Lista de Livros</h1> <!-- Título principal da página -->
            <div>
                <a href="create.php" class="btn btn-primary">Adicionar Novo Livro</a> <!-- Botão para adicionar novo livro, com estilo do Bootstrap -->
            </div>
        </header>
        <?php 
        session_start(); // Inicia a sessão PHP para utilizar variáveis de sessão ($_SESSION)
        
        // Exibe mensagem de sucesso se a variável de sessão "edit" estiver definida
        if (isset($_SESSION["edit"])) {
            ?>
            <div class="alert alert-success">
                <?php 
                echo $_SESSION["edit"]; // Exibe o conteúdo da variável de sessão "edit"
                unset($_SESSION["edit"]); // Remove a variável de sessão após exibir
                ?>
            </div>
            <?php
        }
        
        // Exibe mensagem de sucesso se a variável de sessão "delete" estiver definida
        if (isset($_SESSION["delete"])) {
            ?>
            <div class="alert alert-success">
                <?php 
                echo $_SESSION["delete"]; // Exibe o conteúdo da variável de sessão "delete"
                unset($_SESSION["delete"]); // Remove a variável de sessão após exibir
                ?>
            </div>
            <?php
        }
        
        // Exibe mensagem de sucesso se a variável de sessão "create" estiver definida
        if (isset($_SESSION["create"])) {
            ?>
            <div class="alert alert-success">
                <?php 
                echo $_SESSION["create"]; // Exibe o conteúdo da variável de sessão "create"
                unset($_SESSION["create"]); // Remove a variável de sessão após exibir
                ?>
            </div>
            <?php
        }
        ?>

        <table class="table table-bordered"> <!-- Tabela com bordas, estilizada pelo Bootstrap -->
            <thead>
                <tr>
                    <th>#</th> <!-- Cabeçalho da coluna para o ID do livro -->
                    <th>Título</th> <!-- Cabeçalho da coluna para o título do livro -->
                    <th>Autor</th> <!-- Cabeçalho da coluna para o autor do livro -->
                    <th>Gênero</th> <!-- Cabeçalho da coluna para o gênero do livro -->
                    <th>Descrição</th> <!-- Cabeçalho da coluna para a descrição do livro -->
                    <th>Ação</th> <!-- Cabeçalho da coluna para ações disponíveis -->
                </tr>
            </thead>
            <tbody>
                <?php 
                include("connect.php"); // Inclui o arquivo de conexão com o banco de dados
                
                $sql = "SELECT * FROM books"; // Query SQL para selecionar todos os livros da tabela "books"
                $result = mysqli_query($conn, $sql); // Executa a query no banco de dados
                
                while ($row = mysqli_fetch_array($result)) { // Loop para iterar sobre cada registro retornado
                    ?>
                    <tr>
                        <td><?php echo $row["id"]; ?></td> <!-- Coluna com o ID do livro -->
                        <td><?php echo $row["title"]; ?></td> <!-- Coluna com o título do livro -->
                        <td><?php echo $row["author"]; ?></td> <!-- Coluna com o autor do livro -->
                        <td><?php echo $row["type"]; ?></td> <!-- Coluna com o gênero do livro -->
                        <td><?php echo $row["description"]; ?></td> <!-- Coluna com a descrição do livro -->
                        <td>
                            <a href="view.php?id=<?php echo $row['id']; ?>" class="btn btn-info">Ler mais</a> <!-- Botão "Ler mais" para ver detalhes do livro -->
                            <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-warning">Editar</a> <!-- Botão "Editar" para editar informações do livro -->
                            <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Deletar</a> <!-- Botão "Deletar" para deletar o livro -->
                        </td>
                    </tr>
                    <?php 
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
