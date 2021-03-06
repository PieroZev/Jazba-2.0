$(document).ready(function() {
var id_institucion, opcion;
opcion = 4;
    
tablaInstitutos = $('#tablaInstitutos').DataTable({  
    "ajax":{            
        "url": "bd/crudInstitute.php", 
        "method": 'POST', //usamos el metodo POST
        "data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
        "dataSrc":""
    },
    "columns":[
        {"data": "id_institucion"},
        {"data": "Nombre"},
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
$('#formInstitutos').submit(function(e){                         
    e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
    Nombre = $.trim($('#Nombre').val());                              
        $.ajax({
          url: "bd/crudInstitute.php",
          type: "POST",
          datatype:"json",    
          data:  {id_institucion:id_institucion, Nombre:Nombre,opcion:opcion},    
          success: function(data) {
            tablaInstitutos.ajax.reload(null, false);
           }
        });			        
    $('#modalCRUD').modal('hide');											     			
});
        
 

//para limpiar los campos antes de dar de Alta una Persona
$("#btnNuevo").click(function(){
    opcion = 1; //alta           
    id_institucion=null;
    $("#formInstitutos").trigger("reset");
    $(".modal-header").css( "background-color", "#17a2b8");
    $(".modal-header").css( "color", "white" );
    $(".modal-title").text("Nuevo Instituto");
    $('#modalCRUD').modal('show');	    
});

//Editar        
$(document).on("click", ".btnEditar", function(){		        
    opcion = 2;//editar
    fila = $(this).closest("tr");	        
    id_institucion = parseInt(fila.find('td:eq(0)').text()); //capturo el ID		            
    Nombre = fila.find('td:eq(1)').text();
    $("#Nombre").val(Nombre);
    $(".modal-header").css("background-color", "#007bff");
    $(".modal-header").css("color", "white" );
    $(".modal-title").text("Editar Instituto");		
    $('#modalCRUD').modal('show');		   
});

//Borrar
// $(document).on("click", ".btnBorrar", function(){
    // fila = $(this);           
    // id_institucion = parseInt($(this).closest('tr').find('td:eq(0)').text()) ;		
    // opcion = 3; //eliminar        
    // var respuesta = confirm("¿Está seguro de borrar el registro "+id_institucion+"?");                
    // if (respuesta) {            
        // $.ajax({
          // url: "bd/crudInstitute.php",
          // type: "POST",
          // datatype:"json",    
          // data:  {opcion:opcion, id_institucion:id_institucion},    
          // success: function() {
              // tablaInstitutos.row(fila.parents('tr')).remove().draw();                  
           // }
        // });	
    // }
 // });
     
});    