/** set modal body dengan view yang didapat melalui url
 * @param string url url view
 */
function modal(url) {
    $.ajax({
        url:url,
        type:'GET',
        success: function(data){
            $('#modal').html(data);
            $('#exampleModal').modal('show');
        }
    })
}
