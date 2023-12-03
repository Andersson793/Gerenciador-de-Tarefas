<?php
require_once("funcoes/conexao.php");
require_once("funcoes/funcoes_imp.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_tarefa = $_POST["id_tarefa"];
    $titulo = $_POST["titulo"];
    $descricao = $_POST["descricao"];
    $data_venc = $_POST["data_venc"];
    $prioridade = $_POST["prioridade"];
    $status = $_POST["status"];

    // Reformatar a data antes de inserir no banco de dados
    $data_venc_formatada = InverteData($data_venc);

    $conexao = conectarBanco();

    // Utilize instruções preparadas para evitar injeção de SQL
    $query = "UPDATE tarefas SET titulo=$1, descricao=$2, data_venc=$3, prioridade=$4, status=$5 WHERE id_tarefa=$6";
    $resultado = pg_query_params($conexao, $query, array($titulo, $descricao, $data_venc_formatada, $prioridade, $status, $id_usuario, $id_tarefa));

    if ($resultado) {
        echo "Tarefa atualizada com sucesso!". "<br>";
        require_once("funcoes/listar.php");
    } else {
        echo "Erro ao atualizar tarefa: " . pg_last_error($conexao);
    }

    desconexaoPostgresql($conexao);
  

}
?>
