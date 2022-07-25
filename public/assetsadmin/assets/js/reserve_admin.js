function saveComment(){
    comment = $("#comment").val().trim();
    if(comment == ""){
        console.log("campo vacío");
    }else{
        csrf_token = $('input[name ="_token"]').val();
        r_user_name = $('#user_name').val();
        r_user_id = $('#user_id').val();
        r_reserve_id = $('#reserve_id').val();
        var comment_data = {        
            comment: comment,        
            user_name: r_user_name,        
            user_id: r_user_id, 
            reserve_id: r_reserve_id
        };
        jQuery.ajax({
        url: "/administrator/notes",
        method: 'post',
        headers: {'X-CSRF-Token': csrf_token},        
        data: comment_data,        
        async: false,
        success: function(result) {
            $('#comment').val("");
            $("#note_list").prepend(result);
        },
        error: function(result) {          
            console.log("fail");
        }
    });        

    }
}


