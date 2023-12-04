<?php
require_once("funcoes/conexao.php");
require_once("funcoes/funcoes_imp.php");

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id_tarefa"])) {
    $id_tarefa = $_GET["id_tarefa"];

    $conexao = conectarBanco();

    // Utilize instruções preparadas para evitar injeção de SQL
    $query = "DELETE FROM tarefas WHERE id_tarefa=$1";
    $result = pg_query_params($conexao, $query, array($id_tarefa));

    if ($result) {
        echo "Tarefa excluída com sucesso!" ."<br>";
    } else {
        echo "Erro ao excluir tarefa: " . pg_last_error($conexao);
    }

    desconexaoPostgresql($conexao);
    require_once("funcoes/listar.php");

}
?>

