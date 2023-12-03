<?php

require_once("funcoes/conexao.php");
require_once("funcoes/funcoes_imp.php");

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera os dados do formulário
    $nome = $_POST['nome'];
    $login1 = $_POST['login1'];
    $senha = $_POST['senha'];
    $ativo = isset($_POST['ativo']) ? true : false;

    // Conexão com o banco de dados (substitua pelas suas configurações)
    $conexao = conectarBanco();

    if ($conexao) {
        // Usando prepared statements para evitar injeção de SQL
        $query = "INSERT INTO usuario (id_usuario, nome, login1, senha, ativo) VALUES ($1, $2, $3, $4, $5)";
        $resultado = pg_query_params($conexao, $query, array(
            criaChavePrimaria($conexao, "id_usuario", "usuario"),
            $nome,
            $login1,
            password_hash($senha, PASSWORD_DEFAULT), // Hash da senha
            $ativo
        ));

        if ($resultado) {
            // Inserção bem-sucedida
            echo "Usuário cadastrado com sucesso";
            require_once("tarefas/adicionar.php");
        } else {
            // Trate os erros se a inserção falhar
            echo "Erro ao inserir dados no PostgreSQL: " . pg_last_error($conexao);
        }

        desconexaoPostgresql($conexao);
    } else {
        echo "Erro na conexão com o PostgreSQL.";
    }
} else {
    echo "Requisição inválida.";
}
?>
