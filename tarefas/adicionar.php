<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de tarefas</title>
    <link rel="stylesheet" href="CSS/adicionar.css">
</head>
<body>
<form method="POST" action="inserir.php">
    <label for="titulo">Título:</label>
    <input type="text" name="titulo" required>

    <label for="descricao">Descrição:</label>
    <textarea name="descricao"></textarea>

    <label for="data_venc">Data de Vencimento:</label>
    <input type="date" name="data_venc" required>

    <label for="prioridade">Prioridade:</label>
    <select name="prioridade">
        <option value="baixa">Baixa</option>
        <option value="media">Média</option>
        <option value="alta">Alta</option>
    </select>
    <label for="status">Status:</label>
    <select name="status">
        <option value="concluído">Concluído</option>
        <option value="inconcluso">Inconcluso</option>
        <option value="em_andamento">Em Andamento</option>
    </select>
    <input type="submit" value="Adicionar Tarefa">
</form>

</body>
</html>