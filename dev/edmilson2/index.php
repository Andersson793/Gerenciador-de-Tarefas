<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sua Página</title>
    <link rel="stylesheet" href="CSS/index.css">
</head>
<body>
    <header>
    <figure onclick="toggleCaption()">
        <img src="imagem/gerenciador.png" alt="gerenciar">
        <figcaption id="caption">Bem-vindo ao meu Gerenciador de Tarefas</figcaption>
    </figure>
    
    </header>

    
    <nav>
        <a href="cadastro.php">Ir se cadastrar</a>
        <a href="login.php">Fazer login</a>
    </nav>

    <script>
        function toggleCaption() {
            var caption = document.getElementById("caption");
            caption.style.display = (caption.style.display === "none") ? "block" : "none";
        }
    </script>

</body>
</html>