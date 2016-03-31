<?php 
//conectando com o banco de dados /servidor / usuário/ senha.
////$db = mysql_connect("localhost","root","");
//$db = mysql_connect("mysql.hostinger.com.br","u737997304_igcar","nysMdWJc3bhvPYP9Uy");
// selecionando banco de tabelas ou banco de dados.
////$dados = mysql_select_db("u737997304_siste", $db);

//CONEXÃO COM PDO
$pdo=new PDO
(	"mysql:host=localhost;dbname=u737997304_siste","root","")
//("mysql:host=mysql.hostinger.com.br;dbname=u737997304_siste","u737997304_igcar","nysMdWJc3bhvPYP9Uy")
?>

