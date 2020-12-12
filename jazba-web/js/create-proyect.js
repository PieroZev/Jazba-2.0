$(document).ready(function(){

    var fileBlob;
    var blob;

    $("#upload").change(function(){
        
        var file = $(this)[0].files[0];

            if (file) {
                var reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onload = function(e) {
                    // browser completed reading file - display it
                    //alert(e.target.result);
                    fileBlob = e.target.result;
                    blob = fetch(fileBlob)
        .then(res => res.blob())
        .then(console.log)
                };
            }
      });

      $("#newProyect").click(function(){

        var title = $("#post-title").val();
        var description = $("#txt_description").val();
        var dni = parseInt(document.getElementById("mydni").innerHTML.substring(5,14));
        
        //alert(title);
        //alert(description);

        if(title.trim()!=""&&description.trim()!=""&&blob!=undefined&&dni!=""){
        debugger;
        $.ajax({
            url:"http://localhost:8081/jazba-web/create-proyect.php",
            method:"POST",
            data:{file:fileBlob, title:title, desc:description, dni:dni}
            
        }).done(function(data){
        
            console.log("paso la data");
            window.location.href = "posts.php";
            
        });

    }
      });


});