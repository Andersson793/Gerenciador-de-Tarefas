<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <title>Cadastro de Usuário</title>
</head>
<body>
<h2>Cadastro de Usuário</h2>
    <form method="post" action="cadastrar.php">
    Nome:  <input type="text" name ="nome" placeholder="Nome" required><br><br>
    Login: <input type="text" name="login1" placeholder="Login" required><br><br>
    Senha: <input type="password" name="senha" placeholder="Senha" required><br><br>
    Ativo: <input type="checkbox" name="ativo" value= "1"><br><br> 
           <input type="submit" value="Cadastrar">
    </form>
</body>
</html>