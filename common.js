$("#sendMessage").on("click", function(){
    var groupss = $("#groupss").val().trim();



    $.ajax({
        url:'getcustomer.php',
        type:'POST',
        cache: false,
        data: {'groupss':groupss },
        dataType:'html',
        beforeSend:function(){
            $("#sendMessage").prop("disabled", true);
        },
        success:function(data){
            document.getElementById('result').innerHTML = data;
            
            $("#sendMessage").prop("disabled", false);
        }
    });

});


