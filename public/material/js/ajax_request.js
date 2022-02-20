$(".deleteRecord").click(function(e){

    if(!confirm("Do you really want to do this?")) {
       return false;
     }

    e.preventDefault();
    var id = $(this).data("id");
    var token = $("meta[name='csrf-token']").attr("content");


    $.ajax({
            url: "delete/"+id,
            type: 'DELETE',
            data: {
                "id": id,
                "_token": token,
            },
        success: function (response){

            console.log(response);
            $('#row_id_'+response.id).remove();

            Swal.fire(
              'Remind!',
              'Company deleted successfully!',
              'success'
            )
        }
     });
      return false;

});
