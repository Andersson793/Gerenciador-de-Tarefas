<?php
session_start(); // Inicia a sessão, se ainda não estiver iniciada

require_once("funcoes/conexao.php");
require_once("funcoes/funcoes_imp.php");

$conexao = conectarBanco();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST["titulo"];
    $descricao = $_POST["descricao"];
    $data_venc = $_POST["data_venc"];
    $prioridade = $_POST["prioridade"];
    $status = $_POST["status"];

    // Supondo que você tenha uma variável que contenha o id_usuario atual
    $id_usuario_atual = $_SESSION["id_usuario"];
    echo "ID do Usuário Atual: " . $_SESSION["id_usuario"] . "<br>";

    $id_tarefa = criaChavePrimaria($conexao, "id_tarefa", "tarefas");
    $data_venc = InverteData($data_venc);

    // Utilize a conexão já existente
    $query = "INSERT INTO tarefas (id_tarefa, titulo, descricao, data_venc, prioridade, status, id_usuario) VALUES ($1, $2, $3, $4, $5, $6, $7)";
    $resultado = pg_query_params($conexao, $query, array($id_tarefa, $titulo, $descricao, $data_venc, $prioridade, $status, $id_usuario_atual));

    if ($resultado) {
        echo "Tarefa adicionada com sucesso!" . "<br>";
    } else {
        // Mensagem de erro mais específica
        echo "Erro ao adicionar tarefa: " . pg_last_error($conexao) . "<br>";
        // Log do erro (em um ambiente de produção, você pode querer registrar em logs)
        error_log("Erro SQL ao adicionar tarefa: " . pg_last_error($conexao));
    }

    // Encerrar a conexão
    desconexaoPostgresql($conexao);
    require_once("funcoes/listar.php");

}
?>