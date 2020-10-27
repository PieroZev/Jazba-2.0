// JavaScript Document

$(document).ready(function(){
	
	//listarUsuarios();

    //var correo = window.location.search.substring(1);

    var usuario = {
        correo = document.getElementById("txtCorreo"),
        password = document.getElementById("txtPassword"),
        dni = "",
        nombre = "",
        apePaterno = "",
        apeMaterno = "",
        celular = "",
        idInstitucion = "",
        idTipo = "",
        idEspecialidad = ""
    };

	function createUsuario(){
		$.ajax({
		url:"localhost:8080/jazba/api/v1/usuarios/",
		method:"POST",
        dataType:"json",
        data:{usuario:usuario}
		
	}).done(function(data){
			
        
        window.location.href= "perfil-usuario.html?"+usuario.correo;

		
			});
	}
	
		
	});