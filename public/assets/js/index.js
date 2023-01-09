function editUser(url) {
    $.ajax({
        url:url,
        type:'GET',
        success: function(data){
            $('#modal').html(data);
            $('#exampleModal').modal('show');
            $('#modal').remove();

        }
    })
}