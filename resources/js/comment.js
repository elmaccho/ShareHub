$(function(){
    $('.delete-comment-btn').click(function(){
        Swal.fire({
            title: "You won't be able to revert this!",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "grey",
            confirmButtonText: "Yes, delete it!"
          }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    method: "DELETE",
                    url: 'home/comment/' + $(this).data("comment-id"),
                  })
                    .done(function( data ) {
                        window.location.reload()
                    })
                    .fail(function (data){
                        console.error(data)
                        Swal.fire("Oops...", data.responseJSON.message, data.responseJSON.status)
                    })
            }
          });
    })

    $('.commentForm').submit(function(e){
        e.preventDewfault();

        $.ajax({
            method: "POST",
            url: $(this).attr('action'),
            data: $(this).serialize(),
        })
        .done(function( data ) {
            // window.location.reload()
        })
        .fail(function (data){
            console.error(data)
            Swal.fire("Oops...", data.responseJSON.message, data.responseJSON.status)
        })
    })
})