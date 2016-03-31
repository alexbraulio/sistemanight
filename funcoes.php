<?php 
//para criar conexão.
include "conexao.php";
//variavel que recebe os dados inseridos na tabela
$grava_marca = $_POST['marca'];

//se a variavel funcão for igual a variavel gravar ele faz o bloco de gravar.
if($_GET['funcao'] == "gravar"){
//conecta e grava no db entra as ()coloque as tabelas que serão inserida os dados, separados por virgula.
//sempre colocar em ordem de acordo com as variaveis criadas.
$inseremarca=$pdo->prepare("INSERT INTO marca (marca) value ('$grava_marca')");
$inseremarca->execute();
header('Location:home.php');
}



///////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////
//faz cadastro de novos clientes função grava
///FUNÇÃO GRAVA
$grava_nome 		=	  $_POST['nome'];
$grava_email 		=	  $_POST['email'];
$grava_telefone 	=	  $_POST['telefone'];
$grava_celular 		=	  $_POST['celular'];
$grava_CPF 			=	  $_POST['CPF'];
$grava_endereco 	=	  $_POST['endereco'];
$grava_bairro 		=	  $_POST['bairro'];
$grava_cep 			=	  $_POST['cep'];
$grava_cidade 		=	  $_POST['cidade'];
$grava_estado_UF 	=	  $_POST['estado_UF'];


if($_GET['funcao'] == "gravar_cliente_pf"){

$inserepdopf=$pdo->prepare("INSERT INTO cliente_pf (nome, email, telefone, celular, CPF, endereco, bairro, cep, cidade, estado_UF) value
	(
'$grava_nome', 	
'$grava_email', 			
'$grava_telefone', 
'$grava_celular', 	
'$grava_CPF', 		
'$grava_endereco', 
'$grava_bairro', 		
'$grava_cep', 		 
'$grava_cidade', 		
'$grava_estado_UF')");
$inserepdopf->execute();
header('Location:cliente_pf.php');
echo "Cliente Cadastrado.";
}
////$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
////
////$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
////
////$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
///////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////
//faz cadastro de novos clientes função grava
///FUNÇÃO GRAVA PESSOA JURIDICA
$pjgrava_razao_social 	=	  $_POST['razao_social'];
$pjgrava_email 		    =	  $_POST['email'];
$pjgrava_telefone 	    =	  $_POST['telefone'];
$pjgrava_celular 		=	  $_POST['celular'];
$pjgrava_CNPJ 		    =	  $_POST['CNPJ'];
$pjgrava_endereco 	    =	  $_POST['endereco'];
$pjgrava_bairro 		=	  $_POST['bairro'];
$pjgrava_cep 			=	  $_POST['cep'];
$pjgrava_cidade 		=	  $_POST['cidade'];
$pjgrava_estado_UF 	    =	  $_POST['estado_UF'];


if($_GET['funcao'] == "gravar_cliente_pj"){

//$sql_gravar = mysql_query

$inserepdo=$pdo->prepare("INSERT INTO cliente_pj (razao_social, email, telefone, celular, CNPJ, endereco, bairro, cep, cidade, estado_UF) value
	(
'$pjgrava_razao_social', 	
'$pjgrava_email', 			
'$pjgrava_telefone', 
'$pjgrava_celular', 	
'$pjgrava_CNPJ', 		
'$pjgrava_endereco', 
'$pjgrava_bairro', 		
'$pjgrava_cep', 		 
'$pjgrava_cidade', 		
'$pjgrava_estado_UF')");
$inserepdo->execute();
header('Location:cliente_pj.php');
echo "<script>
function myFunction() {
    alert();
}
</script>";
}
////$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
////
////$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
////VEICULOS
//$sql = "INSERT INTO `u737997304_siste`.`veiculo` (`id`, `placa`, `marca`, `modelo`, `motor`, `cor`, `combustivel`, `fotos`, `cliente_pf`, `cliente_pj`) VALUES (NULL, \'DAX1234\', \'2\', \'56\', \'2.5\', \'PRATA\', \'GASLINA\', \'\', \'9\', \'7\');";
////$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
///////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////
//COMANDO sql 
//INSERT INTO `u737997304_siste`.`veiculo` (`id`, `placa`, `marca`, `modelo`, `motor`, `cor`, `combustivel`, `fotos`, `cliente_pf`, `cliente_pj`) VALUES (NULL, 'DAX1234', '2', '56', '2.5', 'PRATA', 'GASLINA', '', '9', '7');
//faz cadastro de novos clientes função grava
///FUNÇÃO GRAVA veiculo
$vgrava_placa 	    =	  $_POST['placa'];
$vgrava_marca 		=	  $_POST['marca'];
$vgrava_modelo 	    =	  $_POST['modelo'];
$vgrava_motor 		=	  $_POST['motor'];
$vgrava_cor 		    =	  $_POST['cor'];
$vgrava_combustivel 	=	  $_POST['combustivel'];
$vgrava_fotos 		=	  $_POST['fotos'];
$vgrava_cliente 		=	  $_POST['cliente'];


if($_GET['funcao'] == "gravar_veiculo"){


	if(isset($_FILES["arquivo"])){

$arquivo = $_FILES["arquivo"];

$pasta_dir = "arquivos/";//diretorio dos arquivos
//se nao existir a pasta ele cria uma
if(!file_exists($pasta_dir)){
mkdir($pasta_dir);
}

$arquivo_nome = $pasta_dir . $arquivo["name"];

// Faz o upload da imagem
move_uploaded_file($arquivo["tmp_name"], $arquivo_nome);}

$insertpdocar=$pdo->prepare("INSERT INTO veiculo (
	placa, marca, modelo, motor, cor, combustivel, fotos, cliente) value
	(
'$vgrava_placa', 	
'$vgrava_marca',	  			
'$vgrava_modelo', 
'$vgrava_motor', 	
'$vgrava_cor',		
'$vgrava_combustivel',
'$vgrava_fotos',
'$vgrava_cliente')");
$insertpdocar->execute();
header('Location:veiculo.php');
echo $mensagem;
}
////$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
///////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////
//GRAVA SERVIÇOS REALIZADO
$servico_entrada 	    =	  $_POST['entrada'];
$servico_placa 		    =	  $_POST['placa'];
$servico_servico 	    =	  $_POST['servico'];
$servico_descricao 		=	  $_POST['descricao'];
$servico_saida 		    =	  $_POST['saida'];
$servico_valor 	=	  $_POST['valor'];

if($_GET['funcao'] == "gravar_servico"){

$sql_gravar = $pdo->prepare("INSERT INTO servico (
	entrada, placa, servico, descricao, saida, valor) value
	(
'$servico_entrada', 	
'$servico_placa',	  			
'$servico_servico', 
'$servico_descricao', 	
'$servico_saida',		
'$servico_valor')");
$sql_gravar->execute();
header('Location:servico.php');
}



////$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
////
////$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
////
////$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$



////$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
////FUNÇÃO PARA EDITAR O CONTEUDO PESSOA FISICA

if($_GET['funcao'] == "editar_cliente_pf"){
$id = $_GET['id'];
$insertaleracao=$pdo->prepare("UPDATE cliente_pf SET 
nome='$grava_nome', 	               	
email='$grava_email', 			               
telefone='$grava_telefone',                
celular='$grava_celular', 	               
CPF='$grava_CPF', 		               
endereco='$grava_endereco',                
bairro='$grava_bairro', 		               
cep='$grava_cep', 		                
cidade='$grava_cidade', 		               
estado_UF='$grava_estado_UF'               
WHERE id = '$id'");
$insertaleracao->execute();
header('Location:cliente_pf.php');
}

////$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
////
////$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
////
////$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$


////$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
////FUNÇÃO PARA EDITAR O CONTEUDO PESSOA JURIDICA

if($_GET['funcao'] == "editar_cliente_pj"){
$id = $_GET['id'];
$insertaleracaopj=$pdo->prepare("UPDATE cliente_pj SET 
 razao_social ='$pjgrava_razao_social',	              	
 email='$pjgrava_email', 			               
 telefone='$pjgrava_telefone',                
 celular='$pjgrava_celular', 	               
 CNPJ='$pjgrava_CNPJ', 		               
 endereco='$pjgrava_endereco',                
 bairro='$pjgrava_bairro', 		               
 cep='$pjgrava_cep', 		                
 cidade='$pjgrava_cidade', 		               
 estado_UF='$pjgrava_estado_UF'               
WHERE id = '$id'");
$insertaleracaopj->execute(array(
'razao_social'=> $pjgrava_razao_social,	              	
 'email'=> $pjgrava_email, 			               
 'telefone'=> $pjgrava_telefone,                
 'celular'=> $pjgrava_celular, 	               
 'CNPJ'=> $pjgrava_CNPJ, 		               
 'endereco'=> $pjgrava_endereco,                
 'bairro'=> $pjgrava_bairro, 		               
 'cep'=> $pjgrava_cep, 		                
 'cidade'=> $pjgrava_cidade, 		               
 'estado_UF'=> $pjgrava_estado_UF	));
header('Location:cliente_pj.php');
}

////$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
////
////$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
////
////$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$


////$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
////FUNÇÃO PARA EDITAR O CONTEUDO SERVICO

if($_GET['funcao'] == "editar_servico"){
$id = $_GET['id'];
$sql_alterar = $pdo->prepare("UPDATE servico SET 
 entrada='$servico_entrada',	              	
 placa='$servico_placa', 			               
 servico='$servico_servico',                
 descricao='$servico_descricao', 	               
 saida='$servico_saida', 		               
 valor='$servico_valor'               
WHERE id = '$id'");
$sql_alterar->execute(); 
header('Location:servico.php');
}
////$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
////
////$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
////
////$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$


////$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
////FUNÇÃO PARA EDITAR O CONTEUDO PESSOA JURIDICA

if($_GET['funcao'] == "editar_veiculo"){
$id = $_GET['id'];
$sql_alterar = $pdo->prepare("UPDATE veiculo SET 
placa='$vgrava_placa',	              	
marca='$vgrava_marca', 			               
modelo='$vgrava_modelo',                
motor='$vgrava_motor', 	               
cor='$vgrava_cor', 		               
combustivel='$vgrava_combustivel',                
fotos='$vgrava_fotos', 		               
cliente='$vgrava_cliente'             
WHERE id = '$id'");
$sql_alterar->execute();
header('Location:veiculo.php');
}

////$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
////
////$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
////
////$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$

////$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
////
////$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
////
////$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$

////$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
////
////$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
////
////$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$

////$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
////FUNÇÃO PARA EXCLUIR O carro
if($_GET['funcao'] == "excluir_servico"){
$id = $_GET['id'];
$sql_del_serv = $pdo->prepare('DELETE FROM servico WHERE id = :id');
$sql_del_serv->bindParam(':id', $id); 
$sql_del_serv->execute();
header('Location:servico.php');
}

////$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
////FUNÇÃO PARA EXCLUIR O carro
if($_GET['funcao'] == "excluir_veiculo"){
$id = $_GET['id'];
$sql_del_veic = $pdo->prepare('DELETE FROM veiculo WHERE id = :id');
$sql_del_veic->bindParam(':id', $id); 
$sql_del_veic->execute();
header('Location:veiculo.php');
}


////$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
////FUNÇÃO PARA EXCLUIR O CONTEUDO
if($_GET['funcao'] == "excluir_cliente_pf"){
$id = $_GET['id'];
$sql_del_pf =$pdo->prepare("DELETE FROM cliente_pf WHERE id = '$id'");
$sql_del_pf->bindParam(':id', $id); 
$sql_del_pf->execute();

header('Location:cliente_pf.php');
}



////$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
////FUNÇÃO PARA EXCLUIR O CONTEUDO
if($_GET['funcao'] == "excluir_cliente_pj"){
$id = $_GET['id'];
$sql_delpj =$pdo->prepare("DELETE FROM cliente_pj WHERE id = '$id'");
$sql_delpj->bindParam(':id', $id); 
$sql_delpj->execute();

header('Location:cliente_pj.php');
}



 ?>