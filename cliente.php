
<?php
include_once("protecao.php");
?>

<?php  

//conexão com banco de dados
$pdo =new PDO("mysql:host=localhost;dbname=u737997304_siste","root","");

//inserindo dados comum a uma variavel
$id = '2';
$nome = 'jorge';
$email = 'muitomaismuito@foda';

///fazendo um insert no banco de dados sem mimimi

	$stmt = $pdo->prepare("INSERT INTO cliente(id,nome,email) VALUE ('$id','$nome','$email')"); 
	$stmt->execute(); 

//fazendo update no banco de dados	

$stmt = $pdo->prepare("UPDATE cliente SET 
	nome='$nome', 
	email='$email' 
	WHERE id='$id'");
	$stmt->execute(); 

//deleta o que foi feito ou id desejado

$stmt = $pdo->prepare('DELETE FROM cliente WHERE id = :id');
 $stmt->bindParam(':id', $id); 
$stmt->execute();

//criando visualização com select


  $nome=$pdo->prepare("SELECT cliente FROM nome");
  $nome->execute();
  while ($linha=$nome->fetch(PDO::FETCH_ASSOC)) {
  echo   $linha["nome"];    }

//fim



?>