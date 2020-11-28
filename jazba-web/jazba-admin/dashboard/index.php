<?php require_once "vistas/parte_superior.php"?>

<!--INICIO del cont principal-->
<div class="container">
    <h1>Usuarios</h1>
    
    
    
 <?php
include_once './bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "SELECT * FROM tbl_user";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
?>


<div class="container">
        <div class="row">
            <div class="col-lg-12">            
            <button id="btnNuevo" type="button" class="btn btn-success" data-toggle="modal">Nuevo</button>    
            </div>    
        </div>    
    </div>    
    <br>  
<div class="container">
        <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">        
                        <table id="tablaUsuarios" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <th>DNI</th>
                                <th>Username</th>
                                <th>Password</th>                                
                                <th>email</th>  
                                <th>phone</th>
								<th>is_enabled</th>
								<th>id_institucion</th>
								<th>id_role</th>
								<th>id_especialidad</th>
								<th>Apellido Paterno</th>
								<th>Apellido Materno</th>
								<th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php                            
                            foreach($data as $dat) {                                                        
                            ?>
                            <tr>
                                <td><?php echo $dat['DNI'] ?></td>
                                <td><?php echo $dat['username'] ?></td>
                                <td><?php echo $dat['password'] ?></td>
                                <td><?php echo $dat['email'] ?></td>
								<td><?php echo $dat['phone'] ?></td>
								<td><?php echo $dat['is_enabled'] ?></td>								
								<td><?php echo $dat['id_institucion'] ?></td>
								<td><?php echo $dat['id_role'] ?></td>								
								<td><?php echo $dat['id_especialidad'] ?></td>
								<td><?php echo $dat['last_name_father'] ?></td>																
								<td><?php echo $dat['last_name_mother'] ?></td>																								
                                <td></td>
                            </tr>
                            <?php
                                }
                            ?>                                
                        </tbody>        
                       </table>                    
                    </div>
                </div>
        </div>  
    </div>    
      
<!--Modal para CRUD-->
<div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
        <form id="formUsuarios" enctype="multipart/form-data">    
            <div class="modal-body">
			<div class="form-group">
                <label for="DNI" class="col-form-label">DNI:</label>
                <input type="text" class="form-control" id="DNI">
                </div>
                <div class="form-group">
                <label for="username" class="col-form-label">Username:</label>
                <input type="text" class="form-control" id="username">
                </div>
                <div class="form-group">
                <label for="password" class="col-form-label">Password:</label>
                <input type="text" class="form-control" id="password">
                </div>                
                <div class="form-group">
                <label for="email" class="col-form-label">Email:</label>
                <input type="text" class="form-control" id="email">
                </div>
                <div class="form-group">
                <label for="phone" class="col-form-label">Numero:</label>
                <input type="text" class="form-control" id="phone">
                </div>
                <div class="form-group">
                <label for="is_enabled" class="col-form-label">is_enabled:</label>
                <input type="text" class="form-control" id="is_enabled">
                </div>
                <div class="form-group">
                <label for="id_institucion" class="col-form-label">Institucion:</label>
                <input type="text" class="form-control" id="id_institucion">
                </div>
                <div class="form-group">
                <label for="id_role" class="col-form-label">Rol:</label>
                <input type="text" class="form-control" id="id_role">
                </div>
                <div class="form-group">
                <label for="id_especialidad" class="col-form-label">Especialidad:</label>
                <input type="text" class="form-control" id="id_especialidad">
                </div>
                <div class="form-group">
                <label for="last_name_father" class="col-form-label">Apellido Paterno:</label>
                <input type="text" class="form-control" id="last_name_father">
                </div>
				<div class="form-group">
                <label for="last_name_mother" class="col-form-label">Apellido Materno:</label>
                <input type="text" class="form-control" id="last_name_mother">
                </div>					
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
            </div>
        </form>    
        </div>
    </div>
</div>  
      
    
    
</div>
<!--FIN del cont principal-->
<?php require_once "vistas/parte_inferior.php"?>