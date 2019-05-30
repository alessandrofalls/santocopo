  
<!DOCTYPE html>  
<html>  
 <head>  
  <title>Santo Copo - Pedido Avulso</title>  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
  <meta charset="utf-8">
 </head>  
 <body>
<?php session_start();
if(!isset($_SESSION['logado'])){
	header('Location: index.html');
}else{
	echo "Olá ".$_SESSION['usuario'];
	//clientes.php
	require_once('conectar_bd.php'); 
	$sql = "SELECT * FROM clientes ORDER BY id_cliente DESC";
	$resultado = mysqli_query($conexao, $sql);
} 

 ?>
  <br /><br />  
  <div class="container" style="width:700px;">  
   <h3 align="center">Cadastro de Clientes</h3>  
   <br />  
   <div class="table-responsive">
    <div align="right">
     <button type="button" name="age" id="age" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-warning">Add</button>
    </div>
    <br />
    <div id="employee_table">
     <table class="table table-bordered">
      <tr>
       <th width="70%">Nome</th>  
       <th width="30%">Detalhes</th>
      </tr>
      <?php
      while($row = mysqli_fetch_array($resultado))
      {
      ?>
      <tr>
       <td><?php echo $row["nome"]; ?></td>
       <td><input type="button" name="view" value="view" id="<?php echo $row["id_cliente"]; ?>" class="btn btn-info btn-xs view_data" /></td>
      </tr>
      <?php
      }
      ?>
     </table>
    </div>
   </div>  
  </div>
  <p><a href='sair.php'>Sair</a> </p>
 </body>  
</html>  

<div id="add_data_Modal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Inserir novo cliente</h4>
   </div>
   <div class="modal-body">
    <form method="post" id="insert_form">
     <label>Nome completo</label>
     <input type="text" name="name" id="name" class="form-control" />
     <br />
     <label>Enter Employee Address</label>
     <textarea name="address" id="address" class="form-control"></textarea>
     <br />
     <label>Select Gender</label>
     <select name="gender" id="gender" class="form-control">
      <option value="Male">Male</option>  
      <option value="Female">Female</option>
     </select>
     <br />  
     <label>Enter Designation</label>
     <input type="text" name="designation" id="designation" class="form-control" />
     <br />  
     <label>Enter Age</label>
     <input type="text" name="age" id="age" class="form-control" />
     <br />
     <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />

    </form>
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
  </div>
 </div>
</div>

<div id="dataModal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Detalhes do cliente/h4>
   </div>
   <div class="modal-body" id="employee_detail">
    
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
  </div>
 </div>
</div>

<script>  
$(document).ready(function(){
 $('#insert_form').on("submit", function(event){  
  event.preventDefault();  
  if($('#name').val() == "")  
  {  
   alert("O nome é requerido");  
  }  
  else if($('#address').val() == '')  
  {  
   alert("O endereço é requerido");  
  }  
  else if($('#designation').val() == '')
  {  
   alert("Cargo é requerido");  
  }
   
  else  
  {  
   $.ajax({  
    url:"insert.php",  
    method:"POST",  
    data:$('#insert_form').serialize(),  
    beforeSend:function(){  
     $('#insert').val("Inserting");  
    },  
    success:function(data){  
     $('#insert_form')[0].reset();  
     $('#add_data_Modal').modal('hide');  
     $('#employee_table').html(data);  
    }  
   });  
  }  
 });

 $(document).on('click', '.view_data', function(){
  //$('#dataModal').modal();
  var employee_id = $(this).attr("id");
  $.ajax({
   url:"select.php",
   method:"POST",
   data:{employee_id:employee_id},
   success:function(data){
    $('#employee_detail').html(data);
    $('#dataModal').modal('show');
   }
  });
 });
});  
 </script>