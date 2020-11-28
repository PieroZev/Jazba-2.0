
    $(document).ready(function(){

  

    $("#btn_comment").click(function(){

        var comentario = $("#txt_comentario").val();
        var postId = parseInt(document.getElementById("postId").innerHTML);
        if(comentario.trim() != ""){

            $.ajax({
                url:"http://localhost:8081/jazba-web/hacer-comentario.php",
                method:"POST",
                data:{com: comentario, postId:postId}
                
            }).done(function(data){
            
                console.log("comentario hecho");
                window.location.href = "post-detail.php?postId="+postId;
                
            });
        }
        else{
            alert("el comentario estaba vacío");
        }

    });

});

