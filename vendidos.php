<?php 

 include "nav.php";

?>

<div class="container">
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Serviço Contratado.</button>
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Cadastro de Veiculo.</h4>
        </div>
          <div class="modal-body">
          <p>Prencha os dados com cuidado.</p>
<div class="row">
  <?php  
  include "conexao.php";
  $Veiculos=$pdo->prepare("SELECT * FROM vedido");
  
                                   
                                   ?>
               <div class="col-md-12">
            <form method="post" role="form" action="funcoes.php?funcao=gravar_veiculo">
              <div class="form-group">
                       <label class="control-label" for="sel1">Tipo:</label>
                                   <select name="tipo" type="text"class="form-control" id="tipo">
                <option>Bar</option>
                <option>Boate</option>
                <option>Restaurante</option>
                <option>Foodtruck</option>
                </select>
                                   </div>
                                
                <label class="control-label" for="sel1">Plano:</label>
                                    <select name="tipo" type="text"class="form-control" id="tipo">
                                    <option>Básico</option>
                <option>Plano Pro</option>
                <option>Plano EXPERT</option>
                <option>Foodtruck</option></SELECT>
                                
                                 
                <label class="control-label" for="marca">valor:</label>
                <input name="valor" type="text"class="form-control" id="valor">
                <label class="control-label" for="marca">data:</label>
                <input name="date" type="text"class="form-control" id="data">
                          
                 <label class="control-label" for="sel1">Cliente:</label>
                                 <select name="cliente" type="text"class="form-control" id="cliente" id="sel1">
                                   <option disabled="disabled" type="text">Pessoa Física:</option>
                                   <?php  
                                   $sql_visualizar = $pdo->prepare("SELECT * FROM cliente_pf");
                                   $sql_visualizar->execute();
                                   while($linhamodelo = $sql_visualizar->fetch(PDO::FETCH_ASSOC)){
                                                                     
                                   ?>
                                   <option ><?php  echo $linhamodelo ['nome'] ?></option>
                                   <?php } ?>
                                   <option disabled="disabled" type="text">Pessoa Júridica:</option>
                                   <?php  
                                   $sql_visualizar = $pdo->prepare("SELECT * FROM cliente_pj");
                                   $sql_visualizar->execute();
                                   while($linhamodelo = $sql_visualizar->fetch(PDO::FETCH_ASSOC)){
                                                                 
                                   ?>
                                   <option><?php  echo $linhamodelo ['razao_social'] ?></option>
                                   <?php } ?>
                                   </select>
             
              <button type="submit" class="btn btn-default">Cadastrar.</button>
               </div>
            
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
  
</div>


<div class="container">
      <div class="page-header">
             <h1>Veiculos cadastrados:</h1>
      </div>
      <div class="row">
        <div class="col-md-12">
                <table class="table table-bordered">
    <thead>
      <tr>
                <th>Cliente</th>
                <th>Tipo</th>
                <th>Plano</th>
                <th>valor</th>
                <th>data</th>
                <th>Editar</th>
                <th>Excluir</th>

      </tr>
    </thead>

        
  <?php
  //TRAZ OS DADOS PARA EXIBIR NA TELA 
  include "conexao.php";
  $sql_visualizar = $pdo->prepare("SELECT * FROM vedido");
  $sql_visualizar->execute();
  while($linha =$sql_visualizar->fetch(PDO::FETCH_ASSOC)){
   $id = $linha['id'];

  ?>
</div>  
   <tbody>
                <tr>
                <td><?php echo       $linha["nome"];                      ?></td>
                <td><?php echo       $linha["tipo"];                      ?></td>
                <td><?php echo       $linha["plano"];                     ?></td>
                <td><?php echo       $linha["valor"];                      ?></td>
                <td><?php echo       $linha["data"];                        ?></td>
                             
                <td>       
  <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal22<?php echo  $linha['id']  ?>">Editar.</button>
  <div class="modal fade" id="myModal22<?php echo  $linha['id']  ?>" role="dialog">
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
            <form method="post" role="form" enctype="multipart/form-data" action="funcoes.php?funcao=editar_veiculo&id=<?php echo  $linha['id'] ?>">
              <div class="form-group">
                <label class="control-label" for="marca">Razão Social:</label>
                <input name="nome" type="text"class="form-control" id="nome" value="<?php echo   $linha['nome'];                             ?>">
                <label class="control-label" for="marca">Tipo:</label>
                <input name="tipo" type="text"class="form-control" id="tipo" value="<?php echo   $linha['tipo'];                                    ?>">
                <label class="control-label" for="marca">Plano:</label>
                <input name="plano" type="text"class="form-control" id="plano" value="<?php echo   $linha['plano'];                                 ?>">
                <label class="control-label" for="marca">valor:</label>
                <input name="valor" type="text"class="form-control" id="valor" value="<?php echo   $linha['valor'];                                  ?>">
                <label class="control-label" for="marca">data:</label>
                <input name="data" type="text"class="form-control" id="data" value="<?php echo   $linha['data'];                                     ?>">
             
                
              </div>
              <button type="submit" class="btn btn-success">Alterar.</button>
            </form>
          </div>
        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger"  data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
        </div>
      
    </div>
  </div>
</div></td>
       <td><button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal<?php echo  $linha['id']  ?>" >Excluir</button>
<div class="modal fade" id="exampleModal<?php echo  $linha['id']  ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Está certo disso?!</h4>
      </div>
     
      <div class="modal-body">
         <a href="funcoes.php?funcao=excluir_veiculo&id=<?php echo  $linha['id'] ?>" role="button"  type="button" class="btn btn-lg btn-danger">Excluir </a> 
      </div>
  
    </div>
  </div>
</div></td>
                </tr> 
                <?php 
                }

                 ?>             
            </tbody>
  </table>
</div>