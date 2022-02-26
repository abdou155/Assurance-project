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


$(".deleteAgent").click(function(e){

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

$(".deleteCategorie").click(function(e){

    if(!confirm("Do you really want to do this?")) {
       return false;
     }

    e.preventDefault();
    var id = $(this).data("id");
    var token = $("meta[name='csrf-token']").attr("content");

    console.log(id);

    $.ajax({
            url: "delete/"+id,
            type: 'DELETE',
            data: {
                "id": id,
                "_token": token,
            },
        success: function (response){

            console.log(response);
            $( "#categorie" ).fadeOut( "slow", function() {
                return false;
              });

           /*  Swal.fire(
              'Remind!',
              'Company deleted successfully!',
              'success'
            ) */
        }
     });
      return false;

});

$(".deleteService").click(function(e){

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

            /* Swal.fire(
              'Remind!',
              'Company deleted successfully!',
              'success'
            ) */
        }
     });
      return false;

});
