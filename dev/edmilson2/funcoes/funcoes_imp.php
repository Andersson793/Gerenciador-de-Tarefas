<?
function validaSenha( $senha )
{	
	$vetorSenha = explode(' ', $senha );
	
	if ($vetorSenha[1])
		return false;
	else
		return true;

}	

function desconexaoPostgresql($conexao)
{	
	pg_close($conexao );
}	

function criaChavePrimaria($conexao, $chave, $tabela)
{   
    $sql = "SELECT MAX($chave) FROM $tabela";
    $resultado = pg_query($conexao, $sql);

    if ($resultado === false) {
        // Tratamento de erro ao executar a consulta
        die("Query failed: " . pg_last_error($conexao));
    }

    $vetor = pg_fetch_array($resultado);
    $chaveAtual = $vetor[0];
    $proximaChave = $chaveAtual + 1;

    return $proximaChave;
}


function InverteData($data)
{
   $arr=explode('/',$data);
   if($arr['0']!='' and $arr['1']!='' and $arr['2']!='')
   {
	$ano=$arr['0'];
	$mes=$arr['1'];
	$dia=$arr['2'];

	$data = date("d/m/Y",mktime(0,0,0,$mes,$dia,$ano));

	return $data;
   }

   $arr=explode('-',$data);
   if($arr['0']!='' and $arr['1']!='' and $arr['2']!='')
   {
	$ano=$arr['0'];
	$mes=$arr['1'];
	$dia=$arr['2'];
	$data = date("d/m/Y",mktime(0,0,0,$mes,$dia,$ano));

	return $data;
   }
   else
	return false;
}

function mudaPagina($url) {
     
     echo "<script>window.open('$url', '_self');</script>";     
  }
  function logout() {
   session_start(); // Inicia a sessão, se ainda não estiver iniciada

   // Encerra a sessão
   session_destroy();

   // Redireciona para a página de login (ou outra página de sua escolha)
  require_once("login.php");
}

 