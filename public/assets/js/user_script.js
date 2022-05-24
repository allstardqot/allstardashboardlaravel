$("#public_search").on('click',function(){
    searchData=$("#public_pool").val();
    $.ajax({
        url: "home",
        method:"POST",
        data:{'searchData':searchData},
        success: function(result){
        $("#div1").html(result);
      }
    });
    alert("fine"+searchData);
    //setInterval(searching, 2000,2)

})
function searching(id){
    alert("fineee"+id);
}
