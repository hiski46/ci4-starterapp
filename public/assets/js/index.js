/** menampilkan modal body dengan view yang didapat melalui url
 * @param string url url view
 */
function modal(url) {
    $.ajax({
        url:url,
        type:'GET',
        beforeSend:function(data){
            $('#loader').show();
        },
        success: function(data){
            $('#loader').fadeOut('slow');
            $('#modal').html(data);
            $('#exampleModal').modal('show');
        }
    })
}

