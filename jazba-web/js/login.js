// JavaScript Document
	
	//listarUsuarios();

	/*var usuario = {

		correo = document.getElementById("txtCorreo"),
		password = document.getElementById("txtPassword")
	};*/

	

	

	function getUsuarioByCorreo(){
		var usuario = {

			correo : $("#txtCorreo").val(),
			password : $("#txtPassword").val()
		};

		let USERNAME="jbaza";
		let PASSWORD="12345";

		
		$.ajax({
		url:"http://localhost:8080/jazba/api/v1/usuarios/" + usuario.correo,
		method:"GET"
		
	}).done(function(data){
		//console.log(data);
		if(data.length > 0){

			$.each(data,function(index,value){
			
				if(usuario.correo === value.correo && usuario.password === value.password){
				
				usuario.dni = value.dni;
				usuario.nombre = value.nombre;
				usuario.apePaterno = value.apePaterno;
				usuario.apeMaterno = value.apeMaterno;
				usuario.celular = value.celular;
				
				sessionStorage.setItem("session_user",JSON.stringify(usuario));


				//pasar los datos al perfil-usuario

				//objectURL = URL.createObjectURL(usuario);

				window.location.href= "perfil-usuario.html?"+usuario.correo;
				}
				else{
					alert("Contraseña equivocada");
				}	
			
		});
		}
		else{
			alert("No se encontró el usuario");
		}
		
			});

			return false;
	}
	
	
	