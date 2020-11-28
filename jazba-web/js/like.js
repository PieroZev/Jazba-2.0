
    $(".btn_like").click(function(){

        debugger;
        var numLikes = parseInt($(this).parent().children(".num_likes").text());
        var detailId = parseInt($(this).parent().parent().children(".detailId").text());
        var postId = parseInt(document.getElementById("postId").innerHTML);
        
        $.ajax({
            url:"http://localhost:8081/jazba-web/dar-like.php",
            method:"POST",
            data:{numLikes: numLikes, postId:postId, detailId:detailId}
            
        }).done(function(data){
        
            console.log("like dado");
            window.location.href = "post-detail.php?postId="+postId;
            
        });

    });


