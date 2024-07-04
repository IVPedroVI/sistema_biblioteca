<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"> <!-- Link para o CSS do Bootstrap -->
    <title>Editar Livro</title> <!-- Título da página -->
</head>
<body>
    <div class="container my-5"> <!-- Container principal com margem superior -->
        <header class="d-flex justify-content-between my-4"> <!-- Cabeçalho com flexbox e margem superior/inferior -->
            <h1>Editar Livro</h1> <!-- Título principal da página -->
            <div>
                <a href="index.php" class="btn btn-primary">Voltar</a> <!-- Botão "Voltar" com estilo do Bootstrap -->
            </div>
        </header>
        <?php 
        if(isset($_GET["id"])){ // Verifica se o parâmetro "id" foi passado via GET
            $id = $_GET["id"]; // Obtém o valor do parâmetro "id"
            include("connect.php"); // Inclui o arquivo de conexão com o banco de dados
            $sql = "SELECT * FROM books WHERE id = $id"; // Query SQL para selecionar o livro com o ID especificado
            $result = mysqli_query($conn, $sql); // Executa a query no banco de dados
            $row = mysqli_fetch_array($result); // Obtém o resultado da query como um array associativo
        ?>
            <form action="process.php" method="post"> <!-- Formulário para editar informações do livro, com método POST -->
                <div class="form-element my-4">
                    <input type="text" class="form-control" name="title" value="<?php echo $row["title"]; ?>" placeholder="Título do Livro"> <!-- Campo de entrada para o título do livro, preenchido com o valor atual do banco de dados -->
                </div>
                <div class="form-element my-4">
                    <input type="text" class="form-control" name="author" value="<?php echo $row["author"]; ?>" placeholder="Nome do Autor"> <!-- Campo de entrada para o nome do autor, preenchido com o valor atual do banco de dados -->
                </div>
                <div class="form-element my-4">
                    <select name="type" class="form-control"> <!-- Menu suspenso para selecionar o gênero do livro -->
                        <option value="">Selecione o Gênero do Livro:</option>
                        <option value="Adventure" <?php if($row['type']=="Adventure"){ echo "selected";}?> >Aventura</option> <!-- Opção para gênero "Aventura", marcada como selecionada se for o gênero atual do livro -->
                        <option value="Scifi" <?php if($row['type']=="Scifi"){ echo "selected";}?> >Ficção Científica</option> <!-- Opção para gênero "Ficção Científica", marcada como selecionada se for o gênero atual do livro -->
                        <option value="Fantasy" <?php if($row['type']=="Fantasy"){ echo "selected";}?> >Fantasia</option> <!-- Opção para gênero "Fantasia", marcada como selecionada se for o gênero atual do livro -->
                        <option value="Horror" <?php if($row['type']=="Horror"){ echo "selected";}?> >Terror</option> <!-- Opção para gênero "Terror", marcada como selecionada se for o gênero atual do livro -->
                    </select>
                </div>
                <div class="form-element my-4">
                    <textarea class="form-control" name="description" placeholder="Descrição do Livro"><?php echo $row["description"]; ?></textarea> <!-- Área de texto para a descrição do livro, preenchida com a descrição atual do banco de dados -->
                </div>
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>"> <!-- Campo oculto para enviar o ID do livro -->
                <div class="form-element my-4">
                    <input type="submit" name="edit" value="Editar Livro" class="btn btn-success"> <!-- Botão de envio do formulário de edição -->
                </div>
            </form>
        <?php 
        }
        ?>
    </div>
</body>
</html>
