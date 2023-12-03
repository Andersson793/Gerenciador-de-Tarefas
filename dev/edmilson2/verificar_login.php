<?php
// Conexão com o banco de dados
require_once("funcoes/conexao.php");

$conexao = conectarBanco();

// Verificar a conexão
if (!$conexao) {
    die("Erro na conexão: " . pg_last_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login1 = $_POST['login1'];
    $senha = $_POST['senha'];

    // Consulta SQL para obter o hash da senha
    $sql = "SELECT senha FROM usuario WHERE login1 = $1 AND ativo = 't'";
    $result = pg_query_params($conexao, $sql, array($login1));

    if ($result) {
        $row = pg_fetch_assoc($result);
        if ($row) {
            $hashArmazenado = $row['senha'];

            // Verifica se a senha fornecida corresponde ao hash armazenado
            if (password_verify($senha, $hashArmazenado)) {
                // Login bem-sucedido
                echo "Login bem-sucedido!";
                require_once("tarefas/adicionar.php");
            } else {
                // Login falhou
                echo "Login falhou. Verifique suas credenciais ou a ativação da sua conta.";
            }
        } else {
            // Usuário não encontrado
            echo "Usuário não encontrado.";
        }
    } else {
        echo "Erro na consulta SQL: " . pg_last_error($conexao);
    }
}

desconexaoPostgresql($conexao);
?>
