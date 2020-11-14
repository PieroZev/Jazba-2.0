$(document).ready(function() {
var id_especialidad , opcion;
opcion = 4;
    
tablaEspecialidades = $('#tablaEspecialidades').DataTable({  
    "ajax":{            
        "url": "bd/crudEspecialidad.php", 
        "method": 'POST', //usamos el metodo POST
        "data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
        "dataSrc":""
    },
    "columns":[
        {"data": "id_especialidad"},
        {"data": "Descripcion"},
        {"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btnEditar'>Editar</button></div></div>"}
    ],
	"language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast":"Último",
                "sNext":"Siguiente",
                "sPrevious": "Anterior"
             },
             "sProcessing":"Procesando...",
        }
	
});     

var fila; //captura la fila, para editar o eliminar
//submit para el Alta y Actualización
$('#formEspecialidades').submit(function(e){                         
    e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
    Descripcion = $.trim($('#Descripcion').val());                              
        $.ajax({
          url: "bd/crudEspecialidad.php",
          type: "POST",
          datatype:"json",    
          data:  {id_especialidad:id_especialidad, Descripcion:Descripcion,opcion:opcion},    
          success: function(data) {
            tablaEspecialidades.ajax.reload(null, false);
           }
        });			        
    $('#modalCRUD').modal('hide');											     			
});
        
 

//para limpiar los campos antes de dar de Alta una Persona
$("#btnNuevo").click(function(){
    opcion = 1; //alta           
    id_especialidad=null;
    $("#formEspecialidades").trigger("reset");
    $(".modal-header").css( "background-color", "#17a2b8");
    $(".modal-header").css( "color", "white" );
    $(".modal-title").text("Nueva Especialidad");
    $('#modalCRUD').modal('show');	    
});

//Editar        
$(document).on("click", ".btnEditar", function(){		        
    opcion = 2;//editar
    fila = $(this).closest("tr");	        
    id_especialidad = parseInt(fila.find('td:eq(0)').text()); //capturo el ID		            
    Descripcion = fila.find('td:eq(1)').text();
    $("#Descripcion").val(Descripcion);
    $(".modal-header").css("background-color", "#007bff");
    $(".modal-header").css("color", "white" );
    $(".modal-title").text("Editar Especialidad");		
    $('#modalCRUD').modal('show');		   
});

//Borrar
// $(document).on("click", ".btnBorrar", function(){
    // fila = $(this);           
    // id_especialidad = parseInt($(this).closest('tr').find('td:eq(0)').text()) ;		
    // opcion = 3; //eliminar        
    // var respuesta = confirm("¿Está seguro de borrar el registro "+id_especialidad+"?");                
    // if (respuesta) {            
        // $.ajax({
          // url: "bd/crudEspecialidad.php",
          // type: "POST",
          // datatype:"json",    
          // data:  {opcion:opcion, id_especialidad:id_especialidad},    
          // success: function() {
              // tablaEspecialidades.row(fila.parents('tr')).remove().draw();                  
           // }
        // });	
    // }
 // });
     
});    