$(document).ready(function(){
    //$("#reg_submit").click(function(){alert('hi');});
    $("#reg_submit").on("click",function(e){
        
        var str=$("#pw1").val();
        var str2=$("#pw2").val();
        if(str!=str2)
        {
            e.preventDefault();
            $("#pw1").addClass("alert-danger");
            $("#pw2").addClass("alert-danger");
            alert("A jelszavak nem egyeznek meg!");
        }
      }); 
});