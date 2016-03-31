<?php 
 include "nav.php";
?>

<div class="container">
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Cadastra Cliente.</button>
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Cadastro de Cliente.</h4>
        </div>
          <div class="modal-body">
          <p>Somente Pessoa Júridica.</p>

                         <div class="row">
                         <?php include "conexao.php";
                         $sql_visualizar = $pdo->query("SELECT * FROM uf");
                         ?>
                              <div class="col-md-12">
                                <form method="post" role="form" action="funcoes.php?funcao=gravar_cliente_pj">
                                  <div class="form-group">
                                    <label class="control-label" for="marca">Razão social:</label>
                                    <input name="razao_social" type="text"class="form-control" id="razao_social">
                                    <label class="control-label" for="marca">E-mail:</label>
                                    <input name="email" type="text"class="form-control" id="email">
                                    <label class="control-label" for="marca">Telefone:</label>
                                    <input name="telefone" type="text"class="form-control" id="telefone">
                                    <label class="control-label" for="marca">Celular:</label>
                                    <input name="celular" type="text"class="form-control" id="celular">
                                    <label class="control-label" for="marca">CNPJ:</label>
                                    <input name="CNPJ" type="text"class="form-control" id="CNPJ">
                                    <label class="control-label" for="marca">Endereço:</label>
                                    <input name="endereco" type="text"class="form-control" id="endereco">
                                    <label class="control-label" for="marca">Bairro:</label>
                                    <input name="bairro" type="text"class="form-control" id="bairro">
                                    <label class="control-label" for="marca">Cep:</label>
                                    <input name="cep" type="text"class="form-control" id="cep">
                                    <label class="control-label" for="marca">Cidade:</label>
                                    <select name="cidade" type="text"class="form-control" id="sel1">
                                    <option>Petrópolis</option>
                                    </select>
                                    <label class="control-label" for="sel1">Estado:</label>
                                   <select name="estado_UF" type="text"class="form-control" id="estado_UF" id="sel1">
                                   <?php  
                                   include "conexao.php";
  $razao_social=$pdo->prepare("SELECT * FROM uf");
  $razao_social->execute();
  while ($linha=$razao_social->fetch(PDO::FETCH_ASSOC)) {
  ?>
                                                                  
                                   <option type="text"><?php  echo  $linha['estado'];      ?><br></option>
                                   <?php } ?>
                                   </select>
                                   </div>
                                  <button type="submit" class="btn btn-default">Cadastrar.</button>
                                </form>
                              </div>
                          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div> <!-- FIM CONTAINER  CADASTRO CLIENTE-->



<div class="container">
      <div class="page-header">
             <h1>Clientes cadastrados. Pessoa Jurídica:</h1>
      </div>
      <div class="row">
        <div class="col-md-12">
                <table class="table table-bordered">
    <thead>
      <tr>
                <th>Razão social</th>
                <th>E-mail</th>
                <th>Telefone</th>
                <th>Celular</th>
                <th>CNPJ</th>
                <th>Endereço</th>
                <th>Bairro</th>
                <th>CEP</th>
                <th>Cidade</th>
                <th>Estado</th>
                <th>Editar</th>
                <th>Excluir</th>

      </tr>
    </thead>

        
  <?php
  //TRAZ OS DADOS PARA EXIBIR NA TELA 
  include "conexao.php";

  $razao_social=$pdo->prepare("SELECT * FROM cliente_pj");
  $razao_social->execute();
  while ($linha=$razao_social->fetch(PDO::FETCH_ASSOC)) {
    $id = $linha['id'];
  ?>
</div>  
   <tbody>
                <tr>
                <td><?php echo   $linha["razao_social"];        ?></td>
                <td><?php echo   $linha['email'];                ?></td>
                <td><?php echo   $linha['telefone'];              ?></td>
                <td><?php echo   $linha['celular'];                        ?></td>
                <td><?php echo   $linha['CNPJ'];                         ?></td>
                <td><?php echo   $linha['endereco'];                       ?></td>
                <td><?php echo   $linha['bairro'];                         ?></td>
                <td><?php echo   $linha['cep'];                         ?></td>
                <td type="text" ><?php echo   $linha['cidade'];                         ?></td>
                <td><?php echo   $linha['estado_UF'];                         ?></td>
                <td>    

  <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal22<?php echo $linha["id"]; ?>"> Editar.</button>
  <div class="modal fade" id="myModal22<?php echo $linha["id"]; ?>" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Cadastro de Cliente.</h4>
        </div>
          <div class="modal-body">
          <p>Somente Pessoa Jurídica</p>



<div class="row">
          <div class="col-md-12">
            <form method="post" role="form" action="funcoes.php?funcao=editar_cliente_pj&id=<?php echo $id ?>">

              <div class="form-group">
                <label class="control-label" for="marca">Razão social:</label>
                <input name="razao_social" type="text"class="form-control" id="razao_social" value="<?php echo  $linha["razao_social"];      ?>">
                <label class="control-label" for="marca">E-mail:</label>
                <input name="email" type="text"class="form-control" id="email" value="<?php echo  $linha['email'];               ?>">
                <label class="control-label" for="marca">Telefone:</label>
                <input name="telefone" type="text"class="form-control" id="telefone" value="<?php echo $linha['telefone'];         ?>">
                <label class="control-label" for="marca">Celular:</label>
                <input name="celular" type="text"class="form-control" id="celular" value="<?php echo $linha['celular'];           ?>">
                <label class="control-label" for="marca">CNPJ:</label>
                <input name="CNPJ" type="text"class="form-control" id="CNPJ" value="<?php echo $linha['CNPJ'];            ?>">
                <label class="control-label" for="marca">Endereço:</label>
                <input name="endereco" type="text"class="form-control" id="endereco" value="<?php echo $linha['endereco'];        ?>">
                <label class="control-label" for="marca">Bairro:</label>
                <input name="bairro" type="text"class="form-control" id="bairro" value="<?php echo  $linha['bairro'];             ?>">
                <label class="control-label" for="marca">Cep:</label>
                <input name="cep" type="text"class="form-control" id="cep" value="<?php echo  $linha['cep'];                ?>">
                <label class="control-label" for="marca">Cidade:</label>
                <input name="cidade" type="text"class="form-control" id="cidade" value="<?php echo  $linha['cidade'];            ?>">
                <label class="control-label" for="marca">Estado:</label>
                <input name="estado_UF" type="text"class="form-control" id="estado_UF" value="<?php echo $linha['estado_UF'];           ?>">
              </div>



              <button type="submit" class="btn btn-success" >Alterar
         </button> 

            </form>
          </div>
      

</div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
       
      </div>
      
    </div>
  </div>   
  </td>

<td><button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal<?php echo $id  ?>" >Excluir</button>
<div class="modal fade" id="exampleModal<?php echo $id  ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Está certo disso?!</h4>
      </div>
     
      <div class="modal-body">
         <a href="funcoes.php?funcao=excluir_cliente_pj&id=<?php echo $id ?>" role="button"  type="button" class="btn btn-lg btn-danger">Excluir </a> 
      </div>
  
    </div>
  </div>
</div> <!-- CRIÇÃO DE NOVO BOTÃO  -->
  

</td>
<?php  
}
?> 
</tr> 
            </tbody>
  </table>

</div>
