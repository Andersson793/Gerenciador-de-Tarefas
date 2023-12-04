<?php
require_once("funcoes/conexao.php");
require_once("funcoes/funcoes_imp.php");

// Verifique se o ID da tarefa está presente na URL
if (isset($_GET["id_tarefa"])) {
    $id_tarefa = $_GET["id_tarefa"];

    $conexao = conectarBanco();

    // Consulta para obter os detalhes da tarefa pelo ID
    $query = "SELECT * FROM tarefas WHERE id_tarefa=$1";
    $resultado = pg_query_params($conexao, $query, array($id_tarefa));

    if ($resultado && $row = pg_fetch_assoc($resultado)) {
        // Preencha os campos do formulário com os dados obtidos
        $titulo = $row["titulo"];
        $descricao = $row["descricao"];
        $data_venc = $row["data_venc"];
        $prioridade = $row["prioridade"];
    } else {
        echo "Erro ao recuperar os detalhes da tarefa.";
        // Pode ser útil redirecionar para a lista ou lidar de outra forma
    }

    desconexaoPostgresql($conexao);
} else {
    echo "ID da tarefa não fornecido.";
    // Pode ser útil redirecionar para a lista ou lidar de outra forma
}
?>

<!-- Código HTML do formulário -->
<form method="post" action="atualizar.php">
    <input type="hidden" name="id_tarefa" value="<?php echo $id_tarefa; ?>">
    <label>Título: <input type="text" name="titulo" value="<?php echo $titulo; ?>"></label><br>
    <label>Descrição: <input type="text" name="descricao" value="<?php echo $descricao; ?>"></label><br>
    <label>Data de Vencimento: <input type="date" name="data_venc" value="<?php echo $data_venc; ?>"></label><br>
    <label>Prioridade: <input type="text" name="prioridade" value="<?php echo $prioridade; ?>"></label><br>
    <input type="submit" value="Atualizar">
</form>
