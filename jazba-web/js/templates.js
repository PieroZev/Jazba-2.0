function listarUsuarios(){
    $.ajax({
    url:"localhost:8080/jazba/api/v1/usuarios",
    method:"GET",
    dataType:"json"
    
}).done(function(data){
    
    $("#main-banner").html("");
    $("#mensaje").html("");
    $("section").html("");	

    $("#noticias").append("<table><thead><th>Dni</th><th>nombre</th><th>correo</th><th>celular</th></thead><tbody></tbody></table>");
    
    $.each(data,function(index,value){
        
        $("#noticias tbody").append("<tr><td>"+value.dni+"</td><td>"+value.nombre+" "+value.apePaterno+" "+value.apeMaterno+"</td><td>"+value.correo+"</td><td>"+value.celular+"</td><td><button id="+value.dni+">Visitar Perfil</button></td></tr>");	
        
    });
        
        $("#noticias button").click(function(){
    var idPerfil=$(this).attr("id");
    
    window.location.href= "profile.html?idPerfil="+idPerfil;
    
});
        });
}