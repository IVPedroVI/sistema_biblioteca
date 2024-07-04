<!DOCTYPE html> 
<html lang="pt-br"> 
<head>
    <meta charset="UTF-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"> <!-- Link para o CSS do Bootstrap -->
    <title>Adicionar Novo Livro</title> <!-- Título da página -->
</head>
<body>
    <div class="container my-5"> <!-- Container principal com margem superior -->
        <header class="d-flex justify-content-between my-4"> <!-- Cabeçalho com flexbox e margem superior/inferior -->
            <h1>Adicionar Novo Livro</h1> <!-- Título principal da página -->
            <div>
                <a href="index.php" class="btn btn-primary">Voltar</a> <!-- Botão "Voltar" com estilo do Bootstrap -->
            </div>
        </header>
        
        <form action="process.php" method="post"> <!-- Formulário com método POST e ação para processar dados em process.php -->
            <div class="form-element my-4">
                <input type="text" class="form-control" name="title" placeholder="Título do Livro"> <!-- Campo de entrada para o título do livro -->
            </div>
            <div class="form-element my-4">
                <input type="text" class="form-control" name="author" placeholder="Nome do Autor"> <!-- Campo de entrada para o nome do autor -->
            </div>
            <div class="form-element my-4">
                <select name="type" class="form-control"> <!-- Menu suspenso para selecionar o gênero do livro -->
                    <option value="">Selecione o Gênero do Livro</option>
                    <option value="Adventure">Aventura</option>
                    <option value="Scifi">Ficção Científica</option>
                    <option value="Fantasy">Fantasia</option>
                    <option value="Horror">Terror</option>
                </select>
            </div>
            <div class="form-element my-4">
                <input type="text" class="form-control" name="description" placeholder="Descrição do Livro"> <!-- Campo de entrada para a descrição do livro -->
            </div>
            <div class="form-element my-4">
                <input type="submit" name="create" value="Adicionar Livro" class="btn btn-success"> <!-- Botão de envio do formulário -->
            </div>
        </form>
    </div>
</body>
</html>
