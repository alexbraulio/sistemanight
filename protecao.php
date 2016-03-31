<?php
$usuario="admin";
$senha="nightserrana2016";

function msg_erro(){
    header('WWW-Authenticate: Basic realm="NIGHTSERRANA - Acesso Restrito"');
    header('HTTP/1.0 401 Unauthorized');
    echo '<h1>Acesso Restrito - Digite os dados de Autenticação</h1>';
    exit;
}

if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW'])) {
     msg_erro();
}else{
     if ($_SERVER['PHP_AUTH_USER']!=$usuario || $_SERVER['PHP_AUTH_PW']!=$senha) {
              msg_erro();
     }
}
?>