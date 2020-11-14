$(document).ready(function() {
var DNI, opcion;
opcion = 4;
    
tablaUsuarios = $('#tablaUsuarios').DataTable({  
    "ajax":{            
        "url": "bd/crud.php", 
        "method": 'POST', //usamos el metodo POST
        "data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
        "dataSrc":""
    },
    "columns":[
        {"data": "DNI"},
        {"data": "username"},
		{"data": "password"},
		{"data": "email"},
		{"data": "phone"},
		{"data": "file"},
		{"data": "is_enabled"},
		{"data": "id_institucion"},
		{"data": "id_role"},
		{"data": "id_especialidad"},
		{"data": "last_name_father"},
		{"data": "last_name_mother"},
        {"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btnEditar'>Editar</button><button class='btn btn-danger btnBorrar'>Borrar</button></div></div>"}
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
$('#formUsuarios').submit(function(e){                         
    e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
	DNI = $.trim($("#DNI").val());
    username = $.trim($("#username").val());
    password = $.trim($("#password").val());
    email = $.trim($("#email").val());    
    phone = $.trim($("#phone").val());    
    file = $.trim($("#file").val());    
    is_enabled = $.trim($("#is_enabled").val());    
    id_institucion = $.trim($("#id_institucion").val());    
    id_role = $.trim($("#id_role").val());    
    id_especialidad = $.trim($("#id_especialidad").val());    
    last_name_father = $.trim($("#last_name_father").val());    	
    last_name_mother = $.trim($("#last_name_mother").val());
        $.ajax({
          url: "bd/crud.php",
          type: "POST",
          datatype:"json",    
          data:  {DNI:DNI, username:username, password:password, email:email, phone:phone, file:file, is_enabled:is_enabled, id_institucion:id_institucion, id_role:id_role, id_especialidad:id_especialidad, last_name_father:last_name_father, last_name_mother:last_name_mother, opcion:opcion},    
          success: function(data) {
            tablaUsuarios.ajax.reload(null, false);
           }
        });			        
    $('#modalCRUD').modal('hide');											     			
});
        
 

//para limpiar los campos antes de dar de Alta una Persona
$("#btnNuevo").click(function(){
    opcion = 1; //alta           
    //DNI=null;
    $("#formUsuarios").trigger("reset");
    $(".modal-header").css( "background-color", "#17a2b8");
    $(".modal-header").css( "color", "white" );
    $(".modal-title").text("Nuevo Instituto");
    $('#modalCRUD').modal('show');	    
});

//Editar        
$(document).on("click", ".btnEditar", function(){		        
    opcion = 2;//editar
    fila = $(this).closest("tr");	        
    DNI = parseInt(fila.find('td:eq(0)').text());
    username = fila.find('td:eq(1)').text();
    password = fila.find('td:eq(2)').text();
    email = (fila.find('td:eq(3)').text());
	phone = parseInt(fila.find('td:eq(4)').text());
	file = (fila.find('td:eq(5)').text());
	is_enabled = parseInt(fila.find('td:eq(6)').text());
	id_institucion = parseInt(fila.find('td:eq(7)').text());
	id_role = parseInt(fila.find('td:eq(8)').text());
	id_especialidad = parseInt(fila.find('td:eq(9)').text());
	last_name_father = (fila.find('td:eq(10)').text());
	last_name_mother = (fila.find('td:eq(11)').text());
    $("#DNI").val(DNI);
    $("#username").val(username);
    $("#password").val(password);
    $("#email").val(email);
	$("#phone").val(phone);
	$("#file").val(file);
	$("#is_enabled").val(is_enabled);
	$("#id_institucion").val(id_institucion);
	$("#id_role").val(id_role);
	$("#id_especialidad").val(id_especialidad);
	$("#last_name_father").val(last_name_father);
	$("#last_name_mother").val(last_name_mother);
    $(".modal-header").css("background-color", "#007bff");
    $(".modal-header").css("color", "white" );
    $(".modal-title").text("Editar Instituto");		
    $('#modalCRUD').modal('show');		   
});

//Borrar
$(document).on("click", ".btnBorrar", function(){
    fila = $(this);           
    DNI = parseInt($(this).closest('tr').find('td:eq(0)').text()) ;		
    opcion = 3; //eliminar        
    var respuesta = confirm("¿Está seguro de borrar el registro "+DNI+"?");                
    if (respuesta) {            
        $.ajax({
          url: "bd/crud.php",
          type: "POST",
          datatype:"json",    
          data:  {opcion:opcion, DNI:DNI},    
          success: function() {
              tablaUsuarios.row(fila.parents('tr')).remove().draw();                  
           }
        });	
    }
 });
     
});    