<?php

require_once("funcoes/conexao.php");
require_once("funcoes/funcoes_imp.php");

$conexao = conectarBanco();

// Supondo que você tenha uma variável que contenha o id_usuario atual
$id_usuario_atual = 1; // Substitua pelo id_usuario real

// Consulta para obter todas as tarefas do usuário atual
$query = "SELECT * FROM tarefas WHERE id_usuario = $id_usuario_atual";
$resultado = pg_query($conexao, $query);

if ($resultado) {
    while ($row = pg_fetch_assoc($resultado)) {
        $data_venc = InverteData($row["data_venc"]);

        // Mostrar o usuário e detalhes
        echo "<details>";
        echo "<summary>ID do Usuário: " . $row["id_usuario"] . "</summary>";
        echo "Tarefa ID: " . $row["id_tarefa"] . " - Título: " . $row["titulo"] . " - Descrição: " . $row["descricao"] . " - Data de Vencimento: " . $data_venc . " - Prioridade: " . $row["prioridade"];

        // Adicione links ou botões para atualizar e excluir dentro do details
        echo "<a href='editar.php?id_tarefa=" . $row["id_tarefa"] . "'>Editar</a>";
        echo " | ";
        echo "<a href='deletar.php?id_tarefa=" . $row["id_tarefa"] . "'>Excluir</a>";

        echo "</details>";
    }
} else {
    echo "Nenhuma tarefa encontrada.";
}

desconexaoPostgresql($conexao);

?>

